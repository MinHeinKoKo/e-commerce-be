<?php

namespace App\Repositories\Auth;
use App\Interfaces\Auth\AuthInterface;
use App\Models\User;
use Illuminate\Support\Str;

class AuthRepository implements AuthInterface {

    public function register(array $data)
    {
        //adding user data to the database
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        //generate email_verification_token to validate user email
        $user->email_verification_token = Str::uuid()->toString();
        $user->save();

        return $user;
    }

    public function logout()
    {
        // TODO: Implement logout() method.
    }

    public function verify(int $id , string $hash)
    {
        //find user by using $id and $hash
        $user = User::where('id', $id)->where('email_verification_token', $hash)->first();
        if($user){
            //mark as verified
            $user->maskEmailAsVerified();
            $user->update(['is_active'=> true]);
        }
        return true;
    }
}
