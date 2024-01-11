<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VerifyController extends Controller
{
    public function verify(int $id , string $hash)
    {
        try {
            //call email verify action to verify account
            //find user by using $id and $hash
            $user = User::where('id', $id)->where('email_verification_token', $hash)->first();

            if($user){
                //mark as verified
                $user->markEmailAsVerified();
                $user->is_active = true ;
                $user->update();
            }
            return Redirect::to("https://www.google.com");
//            return Redirect::to(env('FRONTEND_URL') . "/login");

        }catch (\Throwable $th){
            //if error is happening
            return ResponseHelper::fail($th->getMessage(),  500);
        }
    }
}
