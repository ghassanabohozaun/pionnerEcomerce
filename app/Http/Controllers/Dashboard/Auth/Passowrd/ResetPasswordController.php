<?php

namespace App\Http\Controllers\Dashboard\Auth\Passowrd;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{

    // show Reset From
    public function showResetFrom($email){

        return view('dashboard.auth.password.reset' , ['email'=>$email]);
    }

    // reset Pasword
    public function resetPasword(Request $request)  {

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
            'confirm_password' =>'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if(!$admin){
            Session::flash('error' , __('auth.try_again_later'));
            return redirect()->back();
        }

        $admin->update([
            'password'=>bcrypt($request->password),
        ]);

        return redirect()->route('dashboard.get.login')->with(['success'=>__('auth.your_password_update_successfully')]);
    }
}
