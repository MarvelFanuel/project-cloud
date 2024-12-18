<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Division;
use App\Models\User;
use App\Utils\HttpResponse;
use Aws\Sns\SnsClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class AdminController extends Controller
{
    use HttpResponse;
    public function login()
    {
        $data['title'] = 'Login';
        return view('admin.login', $data);
    }
    public function authManual(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if (($admin && Hash::check($request->password, $admin->password))) {
            session()->put('id', $admin->id);
            session()->put('email', $admin->email);
            session()->put('name', $admin->name);
            session()->put('nrp', substr($admin->email, 0, 9));

            return redirect()->route('admin.index')->with('success', 'Login berhasil!');
        } else {
            return redirect()->route('admin.login')->with('error', 'Email atau password salah!');
        }
    }

    public function index()
    {
        $data['title'] = 'Login';
        $data['applicants'] = User::with('choice1', 'choice2')->get();
        return view('admin.index', $data);
    }
    public function project()
    {
        $data['title'] = 'Project Links';
        $data['divisions'] = Division::all();
        return view('admin.project', $data);
    }

    public function updateLink(Request $request, Division $division)
    {
        $division->update(['project_link' => $request->link]);
        return $this->success('Link has been updated');
    }

    public function auth()
    {
        return Socialite::driver('google')->redirectUrl(env('GOOGLE_ADMIN_REDIRECT_URI'))->redirect();
    }

    public function processLogin(Request $request)
    {
        try {
            $user = Socialite::driver('google')->redirectUrl(env('GOOGLE_ADMIN_REDIRECT_URI'))->user();
            $email = $user->getEmail();
            $name = $user->getName();

            if (!str_ends_with($email, '@john.petra.ac.id')) {
                return redirect()->route('admin.login')->with('error', 'Please use your @john.petra.ac.id email');
            }


            $admin = Admin::where('email', $email)->first();
            if (!$admin) {
                return redirect()->route('admin.login')->with('error', 'You are not authorized');
            }

            $request->session()->put('id', $admin->id);
            $request->session()->put('email', $email);
            $request->session()->put('name', $name);

            if (str_ends_with($email, '@john.petra.ac.id')) {
                $request->session()->put('nrp', substr($email, 0, 9));
            }

            return redirect()->route('admin.index');
        } catch (\Exception $e) {
            return redirect()->route('admin.login')->with('error', $e->getMessage());
        }
    }

    private function addEmailToSubscription(SnsClient $snsClient, string $email)
    {
        try {
            $result = $snsClient->listSubscriptionsByTopic([
                'TopicArn' => env('AWS_SNS_TOPIC_ARN'),
            ]);


            $existingSubscriptions = $result['Subscriptions'];
            $emailExists = false;

            foreach ($existingSubscriptions as $subscription) {
                if ($subscription['Endpoint'] === $email) {
                    $emailExists = true;
                    break;
                }
            }


            if (!$emailExists) {
                $snsClient->subscribe([
                    'TopicArn' => env('AWS_SNS_TOPIC_ARN'),
                    'Protocol' => 'email',
                    'Endpoint' => $email,
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Failed to add email to SNS subscription: ' . $e->getMessage());
        }
    }

    public function validateInterview(Request $request)
    {
        try {
            // Validasi ID
            $request->validate([
                'id' => 'required|exists:users,id',
            ]);

            // Mencari user berdasarkan ID
            $user = User::findOrFail($request->id);

            // Update phase ke 3
            $user->update(['phase' => 3]);


            // Kirim SNS
            $admin = Admin::where('email', session('email'))->first();

            $snsClient = new SnsClient([
                'credentials' => [
                    'key' => env('AWS_ACCESS_KEY_ID'),
                    'secret' => env('AWS_SECRET_ACCESS_KEY'),
                    'token' => env('AWS_SESSION_TOKEN')
                ],
                'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
                'version' => 'latest'
            ]);

            $message = sprintf(
                "Your interview is confirmed as done.\n\nCheck your projects at http://3.86.195.173/",
            );

            $snsClient->publish([
                'TopicArn' => env('AWS_SNS_TOPIC_ARN'),
                'Message' => $message,
                'Subject' => 'Interview Confirmation',
            ]);
            
            // Menambahkan email admin ke subscription SNS jika belum ada
            $this->addEmailToSubscription($snsClient, $user->email);

            // Mengembalikan respon sukses
            return response()->json([
                'success' => true,
                'message' => 'User has been successfully validated.',
            ]);
        } catch (\Exception $e) {
            // Jika ada error, kembalikan respon gagal
            return response()->json([
                'success' => false,
                'message' => 'Failed to validate user. Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
