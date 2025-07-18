<?php

namespace App\Repositories\Dashboard;

use App\Models\Product;
use App\Models\productImage;
use App\Models\ProductVariant;
use App\Models\VariantAttribute;

class ProductRepository
{
    // get product
    public function getProduct($id)
    {
        return Product::find($id);
    }

    // get product with relation egar loading
    public function getProductWithRelations($id)
    {
        return Product::with('productVariants.variantAttributes')->find($id);
    }

    // get products
    public function getProducts()
    {
        return Product::with(['category', 'brand'])
            ->latest()
            ->get();
    }

    // create product
    public function createProduct($data)
    {
        return Product::create($data);
    }

    // update Product
    public function updateProduct($product, $data)
    {
        return $product->update($data);
    }

    // destroy product
    public function destroyProduct($product)
    {
        return $product->forceDelete();
    }

    // change status
    public function changeStatus($product, $status)
    {
        return $product->update([
            'status' => $status,
        ]);
    }

    ########################################### product varaints ########################################
    // get product variant
    public function getProductVaraint($id)
    {
        return ProductVariant::find($id);
    }
    // create product variants
    public function createProductVariants($data)
    {
        return ProductVariant::create($data);
    }

    // destroy one product variant
    public function destroyOneProductVaraint($varaint)
    {
        return $varaint->forceDelete();
    }

    // destroy all  product variants
    public function destroyaAllProductVaraints($product)
    {
        return $product->productVariants()->forceDelete();
    }

    #################################### product varaint attributes ######################################
    // create product variant attributes
    public function createProductVariantAttributes($data)
    {
        return VariantAttribute::create($data);
    }

    #################################### product images ######################################

    // get product image
    public function getProductImage($id)
    {
        return productImage::find($id);
    }
    // delete product image
    public function deleteProductImage($imageId)
    {
        return productImage::where('id', $imageId)->forceDelete();
    }
    // delete all product images
    public function deleteAllProductImages($product){
        return $product->images()->forceDelete();
    }
}
