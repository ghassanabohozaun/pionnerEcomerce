<?php

namespace App\Services\Website;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class GlobalService
{
    protected $productService;

    //__construct
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // get sliders
    public function getSliders()
    {
        return Slider::latest()->get();
    }

    // get categories
    public function getCategories($limit = null)
    {
        if ($limit == null) {
            return Category::active()->latest()->get();
        }

        return Category::active()->latest()->limit($limit)->get();
    }

    // get brands
    public function getBrands($limit = null)
    {
        if ($limit == null) {
            return Brand::active()->latest()->get();
        }
        return Brand::active()->latest()->limit($limit)->get();
    }

    // get products by category
    public function getProductsByCategory($slug)
    {
        // $category = Category::where('slug->ar', $slug)->orWhere('slug->en', $slug)->first();

        // $products = Product::with(['images', 'category', 'brand'])
        //     ->active()
        //     ->latest()
        //     ->where('category_id', $category->id)
        //     ->select('id','name','slug','category_id','brand_id','has_variants','has_discount','price','discount')
        //     ->paginate(2);
        // return $products;

        $category = Category::where('slug->ar', $slug)->orWhere('slug->en', $slug)->first();
        if (!$category) {
            return false;
        }

        $products = $category
            ->products()
            ->with(['images', 'category', 'brand'])
            ->latest()
            ->active()
            ->select('id', 'name', 'slug', 'category_id', 'brand_id', 'has_variants', 'has_discount', 'price', 'discount')
            ->paginate(8);

        return $products;
    }

    // get products by brand
    public function getProductsByBrand($slug)
    {
        $brand = Brand::where('slug->ar', $slug)->orWhere('slug->en', $slug)->first();

        if (!$brand) {
            return false;
        }
        $products = $brand->products()->active()->latest()->select('id', 'name', 'slug', 'category_id', 'brand_id', 'has_variants', 'has_discount', 'price', 'discount')->paginate(2);

        return $products;
    }

    // get home page products
    public function getHomePageProducts($limit = null): array
    {
        return [
            'newArrivalsProducts' => $this->productService->newArrivalProducts($limit),
            'flashSaleProducts' => $this->productService->getFlashSaleProducts($limit),
            'flashSaleProductsWithTimer' => $this->productService->getFlashSaleProductsWithTimer($limit),
        ];
    }
}
