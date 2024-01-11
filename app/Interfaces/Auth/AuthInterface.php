<?php

namespace App\Interfaces\Auth;

interface AuthInterface {
    public function register (array $data);
    public function logout ();
    public function verify(int $id , string $hash);
}
