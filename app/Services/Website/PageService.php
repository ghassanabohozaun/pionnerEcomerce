<?php

namespace App\Services\Website;

use App\Models\Page;

class PageService
{
    // get daynamic page
    public function getDaynamincPage($slug)
    {
        $page = Page::active()->where('slug->en', $slug)->orWhere('slug->ar', $slug)->first();
        return $page;
    }
}
