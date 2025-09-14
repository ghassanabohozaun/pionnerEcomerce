<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\GlobalService;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    protected $globalService;
    //__construct
    public function __construct(GlobalService $globalService)
    {
        $this->globalService = $globalService;
    }

    // index
    public function index()
    {
        $title = __('website.brands');
        $brands = $this->globalService->getBrands();
        return view('website.brands', compact('title', 'brands'));
    }

    public function getProudctsByBrand($slug)
    {
        if (!$slug) {
            flash()->error(__('general.page_not_found'));
            return redirect()->route('website.index');
        }

        $title = __('website.products');
        $products = $this->globalService->getProductsByBrand($slug);
        if (!$products) {
            flash()->error('general.page_not_found');
            return redirect()->route('website.index');
        }
        return view('website.products', compact('title', 'products'));
    }
}
