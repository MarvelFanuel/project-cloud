<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3Controller extends Controller
{
    public function uploadStore(Request $request, $slug)
    {
        // Validate file based on slug
        $request->validate([
            $slug => 'required|file|mimes:jpg,png,jpeg,pdf|max:5120',  // 5MB max
        ]);

        if ($request->hasFile($slug)) {
            $file = $request->file($slug);
            $fileName = time() . '_' . $file->getClientOriginalName();

            try {
                // Save file to S3
                $path = $file->storePubliclyAs('uploads', $fileName, 's3');
                $path = $file->storePubliclyAs('uploads/' . $slug, $fileName, 'public');
                $user = User::where('email', session('email'))->first();
                $user->update([$slug => $path]);
                $fileUrl = Storage::disk('s3')->url($path);

                return response()->json([
                    'success' => true,
                    'message' => 'File uploaded successfully!',
                    'file_url' => $fileUrl,
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Upload failed!',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
    }
}
