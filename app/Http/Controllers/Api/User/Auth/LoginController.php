<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\LoignRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiResponse;

    // login
    public function login(LoignRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || Hash::check($request->password, $user->password) == false) {
            return response()->json(['message' => 'Invalid User'], 401);
        }

        // if ($user->id == 1) {
        //     $token = $user->createToken('auth_token', ['read' , 'write','update','delete'], now()->addWeek())->plainTextToken;
        // } else {
        //     $token = $user->createToken('auth_token', ['read'], now()->addWeek())->plainTextToken;
        // }

        $token = $user->createToken('auth_token', ['*'], now()->addWeek())->plainTextToken;
        $data = ['user' => $user, 'token' => $token];
        return $this->ApiResponse($data, __('users.login_success'), 200);
        // return response()->json(['message'=>'Login Successfully' , 'user'=>$user , 'token'=>$token] , 200);
    }
}
