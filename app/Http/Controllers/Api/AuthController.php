<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    # sign In using ticket number
    public function signIn(Request $request)
    {
        $rules = [
            'ticket_no' => 'required',
        ];

        $incomingRequest = $request->only(['ticket_no']);

        $validator = Validator::make($incomingRequest, $rules);
        
        # threw error if validation fails
        if ($validator->fails()) {
            return Redirect::back()->withError('Cannot process the request.');
        }

        # collect the validated request
        $validated = $request->collect();

        # can be customized depends on the endpoint
        $endpoint = "http://127.0.0.1:8000/api/v1/get/user/by/TKT/{$validated['ticket_no']}";

        # create 
        $response = Http::get($endpoint);

        # catch when sending the request to $endpoints failed
        if ($response->failed()) {

            return response()->json([
                'success' => false,
                'message' => 'Cannot process the request.'
            ]);
        }
        
        # catch the success if request to $endpoints failed but not giving 500 error code
        if ($response['success'] === false) 
            return $response;

        $data = $response->collect('data');


        if (!$user = User::where('ticket_id', $data['clientevent']['ticket_id'])->first()) {

            # insert user into edu all assessment db
            $user = new User();
            $user->uuid = Str::uuid();
            $user->ticket_id = $data['clientevent']['ticket_id'];
            $user->full_name =  $data['client']['full_name'];
            $user->email = $data['client']['email'];
            $user->phone_number = $data['client']['phone'];
            $user->created_at = Carbon::now();
            $user->save();
        }

        
        $token = $user->createToken('Access-EduAll-Assessment')->accessToken;
        $data['token'] = $token;
        
        return response()->json([
            'success' => true,
            'message' => 'Access granted',
            'data' => $data
        ]);
        
    }

    public function signOut(Request $request)
    {
        try {

            # revoke the access token
            $request->user()->token()->revoke();

        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => "We've encountered an issue that prevents us from continuing the process further."
            ], 500);

        }

        return response()->json([
            'success' => true,
            'message' => 'Signed out'
        ]);

    }
}
