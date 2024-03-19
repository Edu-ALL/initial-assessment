<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type', 0)->get();

        $message = $users->count() > 0 ? 'Users found' : 'No user found';

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $users
        ]);
    }
}
