<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\ValidateEmailSendJob;
use App\Mail\EmailVerification;
use App\Models\User;
use App\UseCases\Auth\EmailVerifyAction;
use App\UseCases\Auth\RegisterAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            //call login action

            //adding user data to the database
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            //generate email_verification_token to validate user email
            $user->email_verification_token = Str::uuid()->toString();
            $user->save();

            ValidateEmailSendJob::dispatch($user);

            return ResponseHelper::success("Please check your email , you need to verify your email account .", null , Response::HTTP_OK);

        } catch (\Throwable $th){ //if the error is happening
            return ResponseHelper::fail($th->getMessage(),  500);
        }
    }
}
