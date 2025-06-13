<?php
namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepository;

class AuthService
{
    protected $authRepository;

    // __construct
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    // login
    public function login($credinatioals, $remmber, $gaurd)
    {
        $checkLogin = $this->authRepository->login($credinatioals, $remmber, $gaurd);
        if (!$checkLogin) {
            return false;
        }
        return true;
    }

    public function logout($gaurd)
    {
        $this->authRepository->logout($gaurd);
    }
}
