<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $title = __('contacts.contacts');
        return view('dashboard.contacts.index', compact('title'));
    }
}
