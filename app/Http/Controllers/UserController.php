<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\HttpResponse;
use App\Utils\HttpResponseCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    use HttpResponse;
    public function googleAuth()
    {
        return Socialite::driver('google')->redirect();
    }

    public function processLogin(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();

            $email = $user->getEmail();
            $name = $user->getName();

            if (!str_ends_with($email, '@john.petra.ac.id')) {
                return redirect()->route('index')->with('error', 'Please use your @john.petra.ac.id email');
            }

            // Simpan email dan nama di session
            $request->session()->put('email', $email);
            $request->session()->put('name', $name);

            if (str_ends_with($email, '@john.petra.ac.id')) {
                $request->session()->put('nrp', substr($email, 0, 9));
            }
            $user = User::where('email', $email)->first();

            if ($user) {
                $phase = $user->phase;
                $request->session()->put('id', $user->id);
            } else {
                $phase = 0;
            }

            $request->session()->put('phase', $phase);

            // Redirect berdasarkan phase
            switch ($phase) {
                case 0:
                    return redirect()->route('biodata');
                case 1:
                    return redirect()->route('files');
                case 2:
                    return redirect()->route('schedule');
                case 3:
                case 4:
                    return redirect()->route('project');
                default:
                    return redirect()->route('index');
            }
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'Error during Google login, please try again.');
        }
    }

    public function storeProject(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'submission' => 'required',
            'pilihan' => 'required',
        ], [
            'submission.required' => 'Link project tidak boleh kosong',
            'pilihan.required' => 'Pilih divisi terlebih dahulu',
        ]);

        if ($valid->fails()) {
            return $this->error($valid->errors()->first());
        }
        $user = User::where('email', session('email'))->first();
        if ($request->pilihan == 'choice1') {
            $user->update([
                'project_link_1' => $request->submission,
            ]);
        } else if ($request->pilihan == 'choice2') {
            $user->update([
                'project_link_2' => $request->submission,
            ]);
        } else {
            return $this->error('Pilih divisi terlebih dahulu');
        }
        return $this->success('Project berhasil disimpan');
    }

    public function storeBiodata(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'birth_place' => 'required',
            'religion' => 'required',
            'major' => 'required',
            'birth_date' => 'required|date',
            'gpa' => 'required|numeric',
            'line_id' => 'required',
            'instagram' => 'required',
            'motivation' => 'required',
            'strength' => 'required',
            'weakness' => 'required',
            'choice_1' => 'required',
            'choice_2' => 'required',
            'organization_experience' => 'required',
            'committee_experience' => 'required',
        ]);

        if ($valid->fails()) {
            return $this->error($valid->errors()->first(), HttpResponseCode::HTTP_BAD_REQUEST);
        }

        User::create($request->all());
        session(['phase' => 1]);
        return $this->success('Biodata saved successfully', null, HttpResponseCode::HTTP_CREATED);
    }

    public function storeFiles(Request $request, $slug)
    {
        $valid = Validator::make($request->all(), [
            $slug => 'required|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($valid->fails()) {
            return $this->error($valid->errors()->first(), HttpResponseCode::HTTP_BAD_REQUEST);
        }

        if ($request->hasFile($slug)) {
            $file = $request->file($slug);
            $file_name =  session('nrp') . '_' . session('name') . '_' . now()->format('d-m-Y_H-i-s.') . $file->getClientOriginalExtension();
            $file_path = $file->storePubliclyAs('uploads/' . $slug,  $file_name, 'public');

            $user = User::where('email', session('email'))->first();
            $user->update([$slug => $file_path]);
            return $this->success('File uploaded successfully', HttpResponseCode::HTTP_CREATED);
        }
        return $this->error('Failed to upload file', HttpResponseCode::HTTP_BAD_REQUEST);
    }

    public function checkFiles()
    {
        // $user = User::where('email', session('email'))->select('ktm', 'grade', 'skkk', 'photo', 'cheats')->first();
        // if ($user->ktm == null || $user->grade == null || $user->skkk == null || $user->photo == null || $user->cheats == null) {
        //     return $this->error('File belum lengkap', HttpResponseCode::HTTP_BAD_REQUEST);
        // }

        $userx = User::where('email', session('email'))->first();
        $userx->update(['phase' => 2]);
        session(['phase' => 2]);
        return $this->success('Files checked successfully', HttpResponseCode::HTTP_OK);
    }


    public function checkInterview()
    {
        $user = User::where('email', session('email'))->first();
        $phase = $user->phase;

        if ($phase == 2) {
            return $this->error('You have not done the interview yet');
        } else if ($phase == 3) {
            session(['phase' => 3]);
            return $this->success('You Have Done The Interview, You can proceed to the next phase');
        }
    }
}
