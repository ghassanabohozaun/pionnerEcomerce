<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\ProductRepository;
use App\Utils\ImageManager;
use Exception;
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

    // get product with relation
    public function getProductWithRelations($id)
    {
        $product = $this->productRepository->getProductWithRelations($id);
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
        return DataTables::of($products)
            ->addIndexColumn()
            ->addColumn('name', function ($product) {
                return $product->getTranslation('name', Lang());
            })
            ->addColumn('category_id', function ($product) {
                return $product->category->name;
            })
            ->addColumn('brand_id', function ($product) {
                return $product->brand->name;
            })
            ->addColumn('has_variants', function ($product) {
                return $product->has_variants == 1 ? __('general.yes') : __('general.no');
            })
            ->addColumn('images', function ($product) {
                return view('dashboard.products.parts.images', compact('product'));
            })
            ->addColumn('status', function ($product) {
                return $product->status == 1 ? __('general.active') : __('general.inactive');
            })

            ->addColumn('manage_status', function ($product) {
                return view('dashboard.products.parts.status_manage', compact('product'));
            })
            ->addColumn('price', function ($product) {
                return $product->priceAttributeFunction();
            })
            ->addColumn('quantity', function ($product) {
                return $product->quantityAttributeFunction();
            })

            ->addColumn('actions', function ($product) {
                return view('dashboard.products.parts.actions', compact('product'));
            })

            ->make(true);
    }

    // create product with details
    public function createProductWithDetails($productData, $productVaraintsData, $images)
    {
        try {
            DB::beginTransaction();

            $product = $this->productRepository->createProduct($productData);

            if (!$product) {
                return false;
            }

            foreach ($productVaraintsData as $variantItem) {
                $variantItem['product_id'] = $product->id;
                $productVariant = $this->productRepository->createProductVariants($variantItem);
                if (!$productVariant) {
                    return false;
                }

                foreach ($variantItem['attribute_value_ids'] as $attribute_value_id) {
                    $productVariantAttribues = $this->productRepository->createProductVariantAttributes([
                        'product_variant_id' => $productVariant->id,
                        'attribute_value_id' => $attribute_value_id,
                    ]);

                    if (!$productVariantAttribues) {
                        return false;
                    }
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
            Log::error('Error Creating Product  : ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return false;
        }
    }

    // update product with detalis
    public function updateProductWithDetails($product, $productData, $productVaraintsData, $images)
    {
        try {
            DB::beginTransaction();

            // update product
            $productUpdated = $this->productRepository->updateProduct($product, $productData);
            if (!$productUpdated) {
                return false;
            }

            // delete old variants
            $this->productRepository->destroyaAllProductVaraints($product);

            // create new varaints
            foreach ($productVaraintsData as $variantItem) {
                $variantItem['product_id'] = $product->id;
                $productVariantUpdated = $productVariant = $this->productRepository->createProductVariants($variantItem);
                if (!$productVariantUpdated) {
                    return false;
                }

                foreach ($variantItem['attribute_value_ids'] as $attribute_value_id) {
                    $productVariantAttributesUpdated = $this->productRepository->createProductVariantAttributes([
                        'product_variant_id' => $productVariant->id,
                        'attribute_value_id' => $attribute_value_id,
                    ]);
                    if (!$productVariantAttributesUpdated) {
                        return false;
                    }
                }
            }

            // create new image -> old image delete by delete button in front

            if (!empty($images)) {
                $this->imageManager->uploadImages($images, $product, 'products');
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            Log::error('Error Creating Product  : ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return false;
        }
    }

    // destroy product
    public function destroyProduct($id)
    {
        $product = self::getProduct($id);
        $product = $this->productRepository->destroyProduct($product);
        if (!$product) {
            return false;
        }
        return $product;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $product = self::getProduct($id);
        $product = $this->productRepository->changeStatus($product, $status);
        if (!$product) {
            return false;
        }
        return $product;
    }

    ########################################### product varaints ########################################
    // get product variant
    public function getProductVaraint($id)
    {
        $productVaraint = $this->productRepository->getProductVaraint($id);
        if (!$productVaraint) {
            return false;
        }
        return $productVaraint;
    }
    //destroy one product varaint
    public function destroyOneProductVaraint($id)
    {
        $varaint = self::getProductVaraint($id);
        $varaint = $this->productRepository->destroyOneProductVaraint($varaint);

        if (!$varaint) {
            return false;
        }
        return $varaint;
    }

    #################################### product images ######################################

    // get product image
    public function getProductImage($id)
    {
        $image = $this->productRepository->getProductImage($id);
        if (!$image) {
            return false;
        }
        return $image;
    }

    // delete product image
    public function deleteProductImage($imageId, $imageName)
    {
        $image = self::getProductImage($imageId);
        if (!$image) {
            return false;
        }
        $this->imageManager->removeImageFromLocal($imageName, 'products');
        $image = $this->productRepository->deleteProductImage($imageId);
        if (!$image) {
            return false;
        }
        return $image;
    }
}
