<?php

namespace App\Repositories\Dashboard;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\VariantAttribute;

class ProductRepository
{
    // get product
    public function getProduct($id)
    {
        return Product::find($id);
    }

    // get products
    public function getProducts()
    {
        return Product::get();
    }

    //*********************************************************************** */
    // create product
    public function createProduct($data)
    {
        return Product::create($data);
    }

    // create product variants
    public function createProductVariants($data)
    {
        return ProductVariant::create($data);
    }

    // create product variant attributes
    public function createProductVariantAttributes($data)
    {
        return VariantAttribute::create($data);
    }

    //*********************************************************************** */
    // update Product
    public function updateProduct($product, $data)
    {
        return $product->update($data);
    }

    // destroy product
    public function desctroyProduct($product)
    {
        return $product->delete();
    }
}
