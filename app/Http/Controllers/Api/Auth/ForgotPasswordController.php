<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendPasswordResetCode;
use App\Models\PasswordResetCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
        Mail::to($request->email)->queue(new SendPasswordResetCode($resetCode->code));
        return response()->json([
            "message" => "We send a email to reset your password."
        ], Response::HTTP_OK);
    }

    public function resetPassword(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                "code" => "required|string|password_reset_codes",
                "password" => "required|string|min:5|confirmed"
            ]);

            $resetCode = PasswordResetCode::firstWhere("code" , $request->code);

            if($resetCode->created_at >now()->addHour()){
                $resetCode->delete();
                return \response()->json([
                    "message" => "Your reset code is expired."
                ]);
            }

            $user = User::firstWhere("email" , $resetCode->email);

            $user->update($request->only("password"));

            $resetCode->delete();

            DB::commit();;

            return response()->json([
                "message" => "Your email password is successfully reset."
            ], Response::HTTP_OK);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json([
                "message" => $exception->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
