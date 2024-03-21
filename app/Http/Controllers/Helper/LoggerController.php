<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoggerController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = [
            'id' => auth()->guard('api')->user()->id,
            'full_name' => auth()->guard('api')->user()->full_name
        ];
    }

    public function accessing_warning($function_names)
    {
        Log::warning("User is accessing {$function_names}", [
            'user' => $this->user
        ]);
    }

    public function trying_warning($function_names, $request = null)
    {
        Log::warning("User is trying to {$function_names}", [
            'user' => $this->user,
            'request' => $request
        ]);
    }

    public function error($function_names, $error)
    {
        Log::error("Failed to {$function_names} | {$error['message']} | {$error['file']} on line {$error['error_line']}", [
            'user' => $this->user,
        ]);
    }

    public function success($function_names)
    {
        Log::info("User {$function_names} successfully", [
            'user' => $this->user
        ]);
    }
}
