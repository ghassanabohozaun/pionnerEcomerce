<?php

use App\Models\AttributeValue;
use Illuminate\Support\Facades\Config;
use App\Models\Setting;

//  setting Helper Function
if (!function_exists('setting')) {
    function setting()
    {
        return Setting::orderBy('id', 'desc')->first();
    }
}

//  get language Helper Function
if (!function_exists('Lang')) {
    function Lang()
    {
        return app()->getLocale();
    }
}

//  get admin Helper Function
if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin');
    }
}


//  get specific attribute Helper Function
if (!function_exists('getSpecificAttributeValue')) {
    function getSpecificAttributeValue($id)
    {
        return AttributeValue::find($id);
    }
}
