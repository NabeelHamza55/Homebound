<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\LuluImage;
use Illuminate\Http\Request;

class LuluController extends Controller
{
    public function createBook(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'front_cover_files' => 'required|array',
            'front_cover_files.*' => 'required|mimes:jpg,png|max:2048',
            'interior_files' => 'required|array',
            'interior_files.*' => 'required|mimes:jpg,png,pdf|max:2048',
            'back_cover_file' => 'required|mimes:jpg,png|max:2048',
        ]);

        $frontCoverFiles = $request->file('front_cover_files');
        $interiorFiles = $request->file('interior_files');
        $backCoverFile = $request->file('back_cover_file');
        $accessToken = $this->getAccessToken();

        $uploadedFrontCoverFiles = $this->uploadAndSaveFiles($frontCoverFiles, $accessToken, 'front_cover');
        $uploadedInteriorFiles = $this->uploadAndSaveFiles($interiorFiles, $accessToken, 'interior');
        $uploadedBackCoverFile = $this->uploadAndSaveFile($backCoverFile, $accessToken, 'back_cover');

        $response = $this->createPrintJob(
            $request->input('title'),
            $uploadedFrontCoverFiles,
            $uploadedInteriorFiles,
            $uploadedBackCoverFile,
            $accessToken
        );

        if (isset($response['id'])) {
            return response()->json(['message' => 'Book created successfully!', 'print_job_id' => $response['id']], 200);
        } else {
            return response()->json(['message' => 'Failed to create book.'], 500);
        }
    }

    private function getAccessToken()
    {
        $client = new Client();
        $response = $client->post(env('LULU_API_URL') . '/auth/realms/glasstree/protocol/openid-connect/token', [
            'form_params' => [
                'grant_type'    => 'client_credentials',
                'client_id'     => env('LULU_API_CLIENT_ID'),
                'client_secret' => env('LULU_API_CLIENT_SECRET'),
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['access_token'];
    }

    private function uploadAndSaveFiles($files, $accessToken, $type)
    {
        $client = new Client();
        $uploadedFiles = [];

        foreach ($files as $file) {
            $response = $client->post(env('LULU_API_URL') . '/files', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept'        => 'application/json',
                ],
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                    ]
                ]
            ]);

            $responseData = json_decode($response->getBody(), true);
            $uploadedFiles[] = $responseData['file'];

            // Save to database
            LuluImage::create([
                'file_id'  => $responseData['file']['id'],
                'filename' => $file->getClientOriginalName(),
                'type'     => $type,
            ]);
        }

        return $uploadedFiles;
    }

    private function uploadAndSaveFile($file, $accessToken, $type)
    {
        $client = new Client();
        $response = $client->post(env('LULU_API_URL') . '/files', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Accept'        => 'application/json',
            ],
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($file->getPathname(), 'r'),
                    'filename' => $file->getClientOriginalName(),
                ]
            ]
        ]);

        $responseData = json_decode($response->getBody(), true);

        // Save to database
        LuluImage::create([
            'file_id'  => $responseData['file']['id'],
            'filename' => $file->getClientOriginalName(),
            'type'     => $type,
        ]);

        return $responseData['file'];
    }

    private function createPrintJob($title, $frontCoverFiles, $interiorFiles, $backCoverFile, $accessToken)
    {
        $client = new Client();
        $response = $client->post(env('LULU_API_URL') . '/print-jobs', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Accept'        => 'application/json',
            ],
            'json' => [
                'title'             => $title,
                'cover_file_id'     => $frontCoverFiles[0]['id'],
                'back_cover_file_id' => $backCoverFile['id'],
                'interior_file_id'  => array_map(function ($file) { return $file['id']; }, $interiorFiles),
                'print_job_spec'    => [
                    'cover' => [
                        'type'    => 'perfect_bound',
                        'file_id' => $frontCoverFiles[0]['id'],
                    ],
                    'back_cover' => [
                        'file_id' => $backCoverFile['id'],
                    ],
                    'interior' => [
                        'file_id' => array_map(function ($file) { return $file['id']; }, $interiorFiles),
                    ]
                ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
