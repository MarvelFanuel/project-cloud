<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SNSController extends Controller
{
    public function handleCallback(Request $request)
    {
        try {
            $data = json_decode($request->getContent(), true);

            if (isset($data['Type']) && $data['Type'] === 'SubscriptionConfirmation') {
                file_get_contents($data['SubscribeURL']);
                return response('Subscription confirmed.', 200);
            }

            if (isset($data['Message'])) {
                $message = $data['Message'];

                Mail::raw('Selamat Anda telah lulus interview dan bisa lanjut ke tahap selanjutnya yaitu project.', function ($mail) {
                    $mail->to('c14220113@john.petra.ac.id')
                         ->subject('Notifikasi Kelulusan Interview');
                });

                Log::info('Pesan SNS diterima dan email telah dikirim: ' . $message);
            }

            return response('Notification processed and email sent.', 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error processing SNS callback: ' . $e->getMessage()
            ], 500);
        }
    }
}
