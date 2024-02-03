<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function sendResetMail(Request $request)
    {
        $data = $request->validate([
            "email" => "required|exists:users,email",
        ]);

        PasswordResetCode::where("email", $request->email)->delete();
        $code = mt_rand(100000 , 999999);
        $data["code"] = $code;
        $resetCode = PasswordResetCode::create($data);
        Mail::to($request->email)->queue()
    }
}
