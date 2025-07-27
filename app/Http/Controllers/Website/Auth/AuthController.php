<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthController extends Controller implements HasMiddleware
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    // middleware
    public static function middleware()
    {
        return [new Middleware(middleware: 'guest:web', except: ['logout'])];
    }

    //get login
    public function getLogin()
    {
        $title = __('website.login');
        return view('website.auth.login', compact('title'));
    }

    // post login
    public function postLogin(LoginRequest $request)
    {
        $credinatioals = $request->only(['email', 'password']);
        $remmber = $request->has('remmber') ? true : false;

        $checkLogin = $this->authService->login($credinatioals, $remmber, 'web');
        if (!$checkLogin) {
            flash()->error(__('general.login_faild'));
            return redirect()->back();
        } else {
            flash()->success(__('general.login_success'));
            return redirect()->intended(route('website.profile.index'));
        }
    }

    // logout
    public function logout()
    {
        $this->authService->logout('web');
        return redirect()->route('website.get.login');
    }
}
