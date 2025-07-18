<?php

namespace App\Livewire\Dashboard\Product;

use App\Services\Dashboard\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $currentStep = 1,
        $successMessage = '',
        $valueRowCount = 1;

    public $categories, $brands, $productID, $images, $newImages, $fullScreenImage;
    public $name_ar, $name_en, $small_desc_ar, $small_desc_en, $desc_ar, $desc_en, $category_id, $brand_id, $sku, $available_for, $tags;
    public $has_variants, $price, $manage_stock, $quantity, $has_discount, $discount, $start_discount, $end_discount;

    public $prices = [],
        $quantities = [],
        $variants = [],
        $variantAttributes = [];

    public $product,
        $productAttribute = [];

    protected ProductService $productService;

    // boot for dependency injection
    public function boot(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // mount fot initalizing properites of component
    public function mount($categories, $brands, $productID, $productAttribute)
    {
        $this->product = $this->productService->getProductWithRelations($productID);
        $this->categories = $categories;
        $this->brands = $brands;
        $this->productID = $productID;
        $this->productAttribute = $productAttribute;
        $this->images = $this->product->images;

        // basic info properties
        $this->name_ar = $this->product->getTranslation('name', 'ar');
        $this->name_en = $this->product->getTranslation('name', 'en');

        $this->small_desc_ar = $this->product->getTranslation('small_desc', 'ar');
        $this->small_desc_en = $this->product->getTranslation('small_desc', 'en');
        $this->desc_ar = $this->product->getTranslation('desc', 'ar');
        $this->desc_en = $this->product->getTranslation('desc', 'en');
        $this->category_id = $this->product->category_id;
        $this->brand_id = $this->product->brand_id;
        $this->sku = $this->product->sku;
        $this->available_for = $this->product->available_for;

        // product varaint properties
        $this->has_variants = $this->product->has_variants;
        $this->price = $this->product->price;
        $this->manage_stock = $this->product->manage_stock;
        $this->quantity = $this->product->quantity;
        $this->has_discount = $this->product->has_discount;
        $this->discount = $this->product->discount;
        $this->start_discount = $this->product->start_discount;
        $this->end_discount = $this->product->end_discount;

        if ($this->has_variants == 1) {
            $this->variants = $this->product->productVariants;
            $this->valueRowCount = count($this->variants);

            foreach ($this->variants as $key => $variant) {
                $this->prices[$key] = $variant->price;
                $this->quantities[$key] = $variant->stock;
                foreach ($variant->variantAttributes as $attribute) {
                    $this->variantAttributes[$key][$attribute->attributeValue->attribute_id] = $attribute->attribute_value_id;
                }
            }
        }
    }

    // render function
    public function render()
    {
        return view('livewire.dashboard.product.edit-product');
    }

    // first step submit
    public function firstStepSubmit()
    {
        $this->validate([
            'name_ar' => ['required', 'string', 'min:5'], // 20
            'name_en' => ['required', 'string', 'min:5'], // 20
            'small_desc_ar' => ['required', 'string', 'min:5'], //80
            'small_desc_en' => ['required', 'string', 'min:5'], //80
            'desc_ar' => ['required', 'string', 'min:5'], //1000
            'desc_en' => ['required', 'string', 'min:5'], //1000
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'sku' => ['required', 'string', 'min:20'],
            'available_for' => ['required', 'date'],
            // 'tags' => ['required', 'string'],
        ]);

        $this->currentStep = 2;
    }

    // second step submit
    public function secondStepSubmit()
    {
        $data = [
            'has_variants' => ['required', 'in:0,1'],
            'manage_stock' => ['required', 'in:0,1'],
            'has_discount' => ['required', 'in:0,1'],
        ];

        if ($this->has_variants == 0) {
            $data['price'] = ['required', 'numeric', 'decimal:0,2'];
        }

        if ($this->manage_stock == 1) {
            $data['quantity'] = ['required', 'min:1', 'max :1000000'];
        }

        if ($this->has_discount == 1) {
            $data['discount'] = ['required', 'numeric', 'min:1', 'max:100'];
            $data['start_discount'] = ['required', 'date', 'before:end_discount'];
            $data['end_discount'] = ['required', 'date', 'after:start_discount'];
        }
        if ($this->has_variants == 1) {
            $data['prices'] = 'required|array|min:1';
            $data['prices.*'] = 'required|numeric|min:1|max:1000000';
            $data['quantities'] = 'required|array|min:1';
            $data['quantities.*'] = 'required|integer|min:0';
            $data['variantAttributes'] = 'required|array|min:1';
            $data['variantAttributes.*'] = 'required|array';
            $data['variantAttributes.*.*'] = 'required|integer|exists:attribute_values,id';
        }

        $this->validate($data);
        $this->currentStep = 3;
    }

    // second step submit
    public function thirdStepSubmit()
    {
        $this->validate([
            'images' => ['required', 'array'],
        ]);
        $this->currentStep = 4;
    }

    // back step
    public function backStep($step)
    {
        $this->currentStep = $step;
    }

    public function submitForm()
    {
        // add basic info
        $productData = [
            'name' => ['ar' => $this->name_ar, 'en' => $this->name_en],
            'small_desc' => ['ar' => $this->small_desc_ar, 'en' => $this->small_desc_en],
            'desc' => ['ar' => $this->desc_ar, 'en' => $this->desc_en],
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'sku' => $this->sku,
            'available_for' => $this->available_for,
            'has_variants' => $this->has_variants,
            'price' => $this->has_variants == 1 ? null : $this->price,
            'manage_stock' => $this->manage_stock,
            'quantity' => $this->manage_stock == 1 ? $this->quantity : null,
            'has_discount' => $this->has_discount,
            'discount' => $this->has_discount == 1 ? $this->discount : null,
            'start_discount' => $this->has_discount == 1 ? $this->start_discount : null,
            'end_discount' => $this->has_discount == 1 ? $this->end_discount : null,
            // 'tags'=> $this->tags,
        ];

        // add variants
        $productVaraints = [];
        if ($this->has_variants) {
            foreach ($this->prices as $index => $price) {
                $productVaraints[] = [
                    'product_id' => $this->product->id,
                    'price' => $price,
                    'stock' => $this->quantities[$index] ?? 0,
                    'attribute_value_ids' => $this->variantAttributes[$index],
                ];
            } // end prices foreach
        } // end if has vaiants

        $productUpdated = $this->productService->updateProductWithDetails($this->product, $productData, $productVaraints, $this->newImages);


        if (!$productUpdated) {
            $this->currentStep = 1;
            flash()->error(message: __('general.update_error_message'));
        } else {
            flash()->success(message: __('general.update_success_message'));
            $this->currentStep = 1;
        }
    }

    //  add variant
    public function addNewVariant()
    {
        $this->prices[] = '';
        $this->quantities[] = '';
        $this->variantAttributes[] = [];
        $this->valueRowCount = count($this->prices);
    }

    //  remove variant
    public function removeVariant()
    {
        if ($this->valueRowCount > 1) {
            $this->valueRowCount--;
            array_pop($this->prices);
            array_pop($this->quantities);
            array_pop($this->variantAttributes);
        }
    }

    // delete old image
    public function deleteOldImage($key, $image)
    {
        $imageId = $image['id']; // to delete image from database
        $imageName = $image['file_name']; // to delete image from local

        $image = $this->productService->deleteProductImage($imageId, $imageName);

        if (!$image) {
            flash()->error(__('general.delete_image_error_message'));
        }

        unset($this->images[$key]); // to delete image from temporery
        flash()->success(__('general.delete_image_success_message'));
    }

    // delete new image
    public function deleteNewImage($key)
    {
        unset($this->newImages[$key]);
        flash()->success(__('general.delete_image_success_message'));
    }

    // open old image full screen
    public function openOldImageFullScreen($key, $image)
    {
        $this->fullScreenImage = asset('uploads/products/' . $image['file_name']);
        $this->dispatch('showFullScreenModal');
    }

    // open new image full screen
    public function openNewImageFullScreen($key)
    {
        $this->fullScreenImage = $this->newImages[$key]->temporaryUrl();
        $this->dispatch('showFullScreenModal');
    }
}
