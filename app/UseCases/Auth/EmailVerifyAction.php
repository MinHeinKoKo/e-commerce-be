<?php


namespace App\UseCases\Auth;


use App\Interfaces\Auth\AuthInterface;

class EmailVerifyAction
{
    private $authRepository;

    public function __construct(AuthInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function __invoke(int $id , string $hash)
    {
        return $this->authRepository->verify($id , $hash);
    }
}
