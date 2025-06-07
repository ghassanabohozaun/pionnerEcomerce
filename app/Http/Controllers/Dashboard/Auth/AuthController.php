<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbaord\AdminLoginRequest;
 use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller implements HasMiddleware
{
     public static function middleware(){
              return [
                new Middleware(middleware:'guest:admin' , except:['logout']),
              ];
     }


    // get login function
    public function getLogin()
    {
        return view('dashboard.auth.login');
    }

    // post login function
    public function postLogin(AdminLoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remmber = $request->has('remmber') ? true : false;

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remmber)) {
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
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.get.login');
    }
}
