<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Admin\LoginRequest;
use App\Models\Admin;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiResponse;

    // login
    public function login(LoginRequest $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || Hash::check($request->password, $admin->password) == false) {
            return response()->json(['message' => 'Invalid Admin'], 401);
        }

        $token = $admin->createToken('auth_token', ['*'], now()->addMonth())->plainTextToken;
        $data = ['admin' => $admin, 'token' => $token];
        return $this->ApiResponse($data, __('users.login_success'), 200);

        // return response()->json(['message'=>'Login Successfully' , 'admin'=>$admin , 'token'=>$token] , 200);
    }
}
