<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\ProductService;
use Illuminate\Foundation\Providers\FoundationServiceProvider;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    // get product by slug
    public function getProductBySlug($slug = null)
    {
        if ($slug == null) {
            abort(404);
        }

        $product = $this->productService->getProduct($slug);

        if (!$product) {
            abort(404);
        }

        $relatedProducts = $this->productService->getRelatedProducts($slug, 4);
        return view('website.show-proudct', compact('product', 'relatedProducts'));
    }

    // get products by type
    public function getProductsByType($type = null)
    {
        if ($type == 'new-arrivals-products') {
            $products = $this->productService->newArrivalProducts();
        } elseif ($type == 'timer-products') {
            $products = $this->productService->getFlashSaleProductsWithTimer();
        } elseif ($type == 'flash-products') {
            $products = $this->productService->getFlashSaleProducts();
        } else {
            abort(404);
        }
        $title = __('website.products');

        $productType = $type == 'timer-products' ? true : false;
        return view('website.products', compact('title', 'products', 'productType'));
    }

    // get related products
    public function getRelatedProducts($slug = null)
    {
        $products = $this->productService->getRelatedProducts($slug);
        $title = __('website.products');
        $productType = false;
        return view('website.products', compact('title', 'products', 'productType'));
    }
}
