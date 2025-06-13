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
<<<<<<< HEAD
        $loginCheck = $this->authRepository->login($credinatioals, $remmber, $gaurd);
        if (!$loginCheck) {
=======
        $checkLogin = $this->authRepository->login($credinatioals, $remmber, $gaurd);
        if (!$checkLogin) {
>>>>>>> admin
            return false;
        }
        return true;
    }

    public function logout($gaurd)
    {
<<<<<<< HEAD
        return $this->authRepository->logout($gaurd);
=======
        $this->authRepository->logout($gaurd);
>>>>>>> admin
    }
}
