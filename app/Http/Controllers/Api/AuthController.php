<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
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

        $validated = $request->collect();

        $endpoint = "http://127.0.0.1:8000/api/v1/get/user/by/TKT/{$validated['ticket_no']}";
        $response = Http::get($endpoint);

        $data = $response->collect('data');

        if ($response->failed()) {

            return response()->json([
                'success' => false,
                'message' => 'Cannot process the request.'
            ]);
        }

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
        
        return $data;
        
    }
}
