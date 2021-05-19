<?php

namespace App\Http\Controllers;

use App\Mail\Subscribed;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LandingPageController extends Controller
{
    /**
     * Render the landing page to the user
     */
    public function show()
    {
        return view('landing');
    }

    /**
     * Test email templates
     */
    public function email()
    {
        return view('email.subscribed');
    }

    /**
     * Signup the user and send them their gift
     */
    public function signup(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns'
        ]);

        if ($validator->fails()) {
            return response()
                ->json(json_encode($validator->errors()))
                ->setStatusCode(422);
        }

        $client = new \SendGrid(env('SENDGRID_API_KEY'));
        $resp = $client->client
            ->marketing()
            ->contacts()
            ->put([
                'contacts' => [
                    [
                        'email' => $request->input('email'),
                    ],
                ],
            ]);

        if ($resp->statusCode() !== 202) {
            $body = json_decode($resp->body());
            return response()->json([
                'status' => false,
                'message' => 'subscription failed',
                'reason' => $body->errors,
            ])->setStatusCode($resp->statusCode());
        }

        try {
            Mail::to($request->input('email'))
                ->send(new Subscribed());
        } catch (ClientException $e) {
            return response()->json([
                'status' => false,
                'message' => 'registration failed',
                'reason' => $e->getMessage()
            ])->setStatusCode(500);
        }

        return response()->json([
            'status' => true,
            'message' => 'registration is completed'
        ]);
    }
}
