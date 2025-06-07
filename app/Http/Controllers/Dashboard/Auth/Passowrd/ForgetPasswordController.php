<?php

namespace App\Http\Controllers\Dashboard\Auth\Passowrd;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Notifications\sendOTPNotify;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ForgetPasswordController extends Controller
{
    protected $otp2;

    // __construct
    public function __construct()
    {
        $this->otp2 = new Otp();
    }

    // show Email Form
    public function showEmailForm()
    {
        return view('dashboard.auth.password.email');
    }

    // send OTP
    public function sendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect()
                ->back()
                ->withErrors(['error' => __('auth.sorry_email_is_not_registerd')]);
        }

        $admin->notify(new sendOTPNotify());
        return redirect()->route('dashboard.password.verify', ['email' => $admin->email]);
    }

    // show Verify OTP Form
    public function showVerifyOTPForm($email)
    {
        return view('dashboard.auth.password.verify', ['email' => $email]);
    }

    //verify OTP
    public function verifyOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|min:5',
        ]);

        $otp = $this->otp2->validate($request->email, $request->code);
        if ($otp->status == false) {
            return redirect()
                ->back()
                ->withErrors(['error' => __('auth.code_is_invalid')]);
        }

        return redirect()->route('dashboard.password.reset', ['email' => $request->email]);
    }
}
