<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetCode;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function sendResetMail(Request $request)
    {
        $request->validate([
            "email" => "required|exists:users,email",
        ]);

        PasswordResetCode::where("email", $request->email)->delete();
        $code = mt_rand(100000 , 999999);

    }
}
