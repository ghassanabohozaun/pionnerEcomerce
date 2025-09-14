<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\GlobalService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $globalService;
    // __construct
    public function __construct(GlobalService $globalService)
    {
        $this->globalService = $globalService;
    }

    // index
    public function index()
    {
        $title = __('website.home');
        $sliders = $this->globalService->getSliders();
        $limitCategories = $this->globalService->getCategories(12);
        $limitBrands = $this->globalService->getBrands(12);

        $homePageProducts = $this->globalService->getHomePageProducts(8);


        return view('website.index', compact('title', 'sliders', 'limitCategories', 'limitBrands','homePageProducts'));
    }
}
