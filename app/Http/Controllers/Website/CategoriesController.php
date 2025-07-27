<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\GlobalService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        $title = __('website.categories');
        $categories = $this->globalService->getCategories();
        return view('website.categories', compact('title', 'categories'));
    }

    public function getProductsByCategory($slug)
    {
        if (!$slug) {
            flash()->error('general.page_not_found');
            return redirect()->route('website.index');
        }

        $title = __('website.products');
        $products = $this->globalService->getProductsByCategory($slug);
        if (!$products) {
            flash()->error('general.page_not_found');
            return redirect()->route('website.index');
        }

        return view('website.products', compact('title', 'slug', 'products'));
    }
}
