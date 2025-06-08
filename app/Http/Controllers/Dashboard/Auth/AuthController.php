<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminLoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller implements HasMiddleware
{
    protected $authService;
    // __construct  dependency injection
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public static function middleware()
    {
        return [new Middleware(middleware: 'guest:admin', except: ['logout'])];
    }

    // get login function
    public function getLogin()
    {
        return view('dashboard.auth.login');
    }

    // post login function
    public function postLogin(AdminLoginRequest $request)
    {
        // $email = $request->input('email');
        // $password = $request->input('password');

        $credinatioals = $request->only(['email', 'password']);
        $remmber = $request->has('remmber') ? true : false;

        if ($this->authService->login($credinatioals, $remmber, 'admin')) {
            // Session::flash('success', 'login successfully');
            // return redirect()->back();
            // return view('dashboard.welcome');
            return redirect()->intended(route('dashboard.welcome'));
        } else {
            Session::flash('error', 'someting was wrong');
            return redirect()->back();
            //return redirect()->back()->with('error','Invalid Email Or Password');
        }
    }

    public function logout()
    {
        $this->authService->logout('admin');
        return redirect()->route('dashboard.get.login');
    }
}
