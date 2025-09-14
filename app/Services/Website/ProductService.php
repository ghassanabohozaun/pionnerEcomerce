<?php

namespace App\Services\Website;

use App\Models\Product;

class ProductService
{
    // get product
    public function getProduct($slug)
    {
        $product = Product::with('images', 'category', 'brand', 'productPreivews')->active()->select('id', 'name', 'price', 'has_variants', 'has_discount', 'slug')->where('slug', $slug)->first();
        return $product;
    }

    // new arriavls products
    public function newArrivalProducts($limit = null)
    {
        $products = Product::query()->with('images', 'category', 'brand')->active()->select('id', 'name', 'price', 'has_variants', 'has_discount', 'slug', 'category_id', 'brand_id')->latest();
        if ($limit) {
            return $products->paginate($limit);
        }
        return $products->paginate(20);
    }

    // get  flash sale products
    public function getFlashSaleProducts($limit = null)
    {
        $products = Product::query()->with('images', 'category', 'brand')->where('has_discount', 1)->active()->latest()->select('id', 'name', 'price', 'has_variants', 'has_discount', 'slug', 'category_id', 'brand_id');

        if ($limit) {
            return $products->paginate($limit);
        }
        return $products->paginate(20);
    }

    // get  flash sale products with timer
    public function getFlashSaleProductsWithTimer($limit = null)
    {
        $products = Product::query()->with('images', 'category', 'brand')->where('has_discount', 1)->where('available_for', date('Y-m-d'))->whereNotNull('available_for')->latest()->active()->select('id', 'name', 'price', 'has_variants', 'has_discount', 'slug', 'category_id', 'brand_id');

        if ($limit) {
            return $products->paginate($limit);
        }
        return $products->paginate(20);
    }

    // get related products
    public function getRelatedProducts($slug, $limit = null)
    {
        $categoryId = Product::whereSlug($slug)->first()->category_id;
        $porducts = Product::query()->whereCategoryId($categoryId)->active()->select('id', 'name', 'price', 'has_variants', 'has_discount', 'slug', 'category_id', 'brand_id')->latest();


        if ($limit) {
            return $porducts->paginate($limit);
        }
        return $porducts->paginate(20);
    }
}
