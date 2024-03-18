<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        # check if email has exist on db
        if (!$admin = Admin::where('email', $request->email)->first()) {

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

        return response()->json([
            'success' => true,
            'message' => "Welcome back, {$admin_name}",
            'data' => [
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
