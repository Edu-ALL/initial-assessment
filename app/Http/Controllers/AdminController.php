<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function signIn(Request $request)
    {
        $incomingRequest = $request->only(['email', 'password']);

        $validator = Validator::make($incomingRequest, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['error' => $validator->errors()->all()]);


        # check if email has exist on db
        if (!$admin = User::where('email', $request->email)->first()) {

            return response()->json([
                'success' => false,
                'message' => 'Admin does not exist.'
            ], 500);
        }

        # check if the password is match
        if (!Hash::check($request->password, $admin->password)) {

            return response()->json([
                'success' => false,
                'message' => 'The provided credentials do not match our records. '
            ], 500);
        }

        # generate token
        $token = $admin->createToken('Access-EduAll-Assessment', ['admin'])->accessToken;

        $admin_name = $admin->name;

        $data =  [
            'id' => $admin->id,
            'is_vip' => false,
            'full_name' => $admin_name,
            'email' => $admin->email,
            'phone' => $admin->phone_number,
            'address' => [
                'state' => $admin->state,
                'city' => $admin->city,
                'address' => $admin->address,
            ],
            'education' => [
                'school' => $admin->school,
                'grade' => $admin->grade,
            ],
            'country' => $admin->destination != null ? json_decode($admin->destination) : [
                null
            ],
            'took_quest' => intval($admin->took_quest),
            'type' => 1
        ];

        return response()->json([
            'success' => true,
            'message' => "Welcome back, {$admin_name}",
            'data' => [
                'client' => $data,
                'token' => $token,
            ]
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
