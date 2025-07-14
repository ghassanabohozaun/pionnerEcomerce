<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\ProductRepository;
use App\Utils\ImageManager;
use Exception;
use function Livewire\of;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ProductService
{
    protected $productRepository, $imageManager;
    /**
     * Create a new class instance.
     */
    public function __construct(ProductRepository $productRepository, ImageManager $imageManager)
    {
        $this->productRepository = $productRepository;
        $this->imageManager = $imageManager;
    }

    // get product
    public function getProduct($id)
    {
        $product = $this->productRepository->getProduct($id);
        if (!$product) {
            return false;
        }
        return $product;
    }

    // get products
    public function getProducts()
    {
        return $this->productRepository->getProducts();
    }

    // get All
    public function getAll()
    {
        $products = $this->productRepository->getProducts();
        return DataTables::of($products)->addIndexColumn()->make(true);
    }

    // create product with details
    public function createProductWithDetails($productData, $productVaraintsData, $images)
    {
        try {
            DB::beginTransaction();

            $product = $this->productRepository->createProduct($productData);

            foreach ($productVaraintsData as $variantItem) {
                $variantItem['product_id'] = $product->id;
                $productVariant = $this->productRepository->createProductVariants($variantItem);

                foreach ($variantItem['attribute_value_ids'] as $attribute_value_id) {
                    $this->productRepository->createProductVariantAttributes([
                        'product_variant_id' => $productVariant->id,
                        'attribute_value_id' => $attribute_value_id,
                    ]);
                }
            }

            if (!empty($images)) {
                $this->imageManager->uploadImages($images, $product, 'products');
            }

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            Log::error('Error Creating Product Attributes : ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return false;
        }
    }

    // update Product
    public function updateProduct($product, $data)
    {
        //
    }

    // destroy product
    public function desctroyProduct($product)
    {
        //
    }
}
