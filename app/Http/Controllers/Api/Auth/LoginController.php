<?php


namespace App\Http\Controllers\Api\Auth;


use App\Helpers\ResponseHelper;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\AdminResource;
use App\Http\Resources\Auth\UserResoure;
use App\Mail\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController
{
    const ADMIN_TOKEN  = 'adminToken';
    const EDITOR_TOKEN  = 'editorToken';
    const NORMAL_USER_TOKEN = 'normalToken';

    const ROlE_ADMIN = "admin";
    const ROLE_USER = "user";
    const ROLE_EDITOR = "editor";

    public function login(LoginRequest $request)
    {
        try {
            if(Auth::attempt($request->only('email','password'))){
                $user = Auth::user();
                if (!$user->is_active){
                    $id = Auth::id();
                    $unActiveUser = User::where('id', $id)->first();
                    Mail::to($unActiveUser->email)->send(new EmailVerification($unActiveUser));
                    return response()->json(['message' => "Your email isn't verified. Please check your mail to verify your account"], Response::HTTP_UNAUTHORIZED);
                }

                $this->authenticateUser($user);
                $token = $this->generateToken($user);

                return $this->generateSuccessResponse($token, $user);
            }
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }catch (\Throwable $th){
            return ResponseHelper::fail($th->getMessage(),  500);
        }
    }

    protected function authenticateUser($user)
    {
        \auth()->login($user, true);
    }

    protected function generateToken($user)
    {
        return $user->createToken($user->role === self::ROlE_ADMIN ? self::ADMIN_TOKEN : self::NORMAL_USER_TOKEN)->plainTextToken;
    }
    protected function generateSuccessResponse($token, $user)
    {
        if ($user->role === self::ROlE_ADMIN) {
            return response()->json([
                'access_token' => $token,
                'token_type' => self::ADMIN_TOKEN,
                'data' => new AdminResource($user),
            ]);
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => self::NORMAL_USER_TOKEN,
            'data' => new UserResoure($user),
        ]);
    }
}
