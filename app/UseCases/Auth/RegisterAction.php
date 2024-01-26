<?php

namespace App\UseCases\Auth;

use App\Interfaces\Auth\AuthInterface;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterAction
{
    private $authRepository;

    public function __construct(AuthInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function __invoke(array $data)
    {
        $user = $this->authRepository->register($data);

        return Mail::to($user->email)->send(new EmailVerification($user));
    }
}
