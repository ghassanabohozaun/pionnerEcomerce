<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //index
    public function index()
    {
        $title = __('website.profile');
        return view('website.profile.index', compact('title'));
    }
}
