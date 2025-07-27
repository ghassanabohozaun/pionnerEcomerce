<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\UserRequest;
use App\Services\Dashboard\UserService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RegisterController extends Controller implements HasMiddleware
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public static function middleware()
    {
        return [new Middleware(middleware: 'guest:web')];
    }

    //index
    public function index()
    {
        $title = __('website.register');
        return view('website.auth.register', compact('title'));
    }

    // register
    public function store(UserRequest $request)
    {
        if (!$this->checkTerms($request->terms)) {
            return redirect()
                ->back()
                ->withErrors([__('auth.please_accept_terms')]);
        }
        $data = $request->only(['name', 'email', 'password', 'mobile', 'country_id', 'governorate_id', 'city_id']);
        $user = $this->userService->storeUser($data);
        if (!$user) {
            flash()->error(__('general.add_error_message'));
            return redirect()->back();
        }
        flash()->success(__('general.add_success_message'));
        return redirect()->route('website.get.login');
    }

    // check terms
    public function checkTerms($terms)
    {
        if ($terms == 'on' || $terms == 1) {
            return true;
        } else {
            return false;
        }
    }
}
