<?php

namespace App\Livewire\Dashboard\Product;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\VariantAttribute;
use App\Services\Dashboard\AttributeService;
use App\Services\Dashboard\ProductService;
use App\Utils\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $currentStep = 1;
    public $categories, $brands;
    public $images, $name_ar, $name_en, $small_desc_ar, $small_desc_en, $desc_ar, $desc_en, $category_id, $brand_id, $sku, $available_for, $tags;
    public $price, $quantity, $discount, $start_discount, $end_discount;
    public $prices = [],
        $quantities = [],
        $attributeValues = [];
    public $fullScreenImage = '';
    public $has_variants = 0,
        $manage_stock = 0,
        $has_discount = 0;
    public $valueRowCount = 1;

    protected ProductService $productService;
    protected AttributeService $attributeService;
    public function boot(ProductService $productService, AttributeService $attributeService)
    {
        $this->productService = $productService;
        $this->attributeService = $attributeService;
    }

    // this function call when component create
    public function mount($categories, $brands)
    {
        $this->categories = $categories;
        $this->brands = $brands;
    }

    // rules معرفة مسبقا
    protected function rules()
    {
        // return [
        //     'name' => ['required', 'min:5', 'max:100'],
        //     'description' => ['required', 'min:5'],
        //     'price' => ['required', 'numeric'],
        //     'quantity' => ['required', 'numeric'],
        // ];
    }
    // updated hock
    public function updated()
    {
        // $this->validate();
        // $this->validateOnly('name'); // use when you need to validate specific input
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
            $data['attributeValues'] = 'required|array|min:1';
            $data['attributeValues.*'] = 'required|array';
            $data['attributeValues.*.*'] = 'required|integer|exists:attribute_values,id';
        }

        $this->validate($data);

        $this->currentStep = 3;
    }

    // third step submit
    public function thirdStepSubmit()
    {
        $this->validate([
            'images' => ['required', 'array'],
        ]);
        $this->currentStep = 4;
    }

    // public function submitForm()
    // {
    //     // add basic info
    //     $product = Product::create([
    //         'name' => ['ar' => $this->name_ar, 'en' => $this->name_en],
    //         'small_desc' => ['ar' => $this->small_desc_ar, 'en' => $this->small_desc_en],
    //         'desc' => ['ar' => $this->desc_ar, 'en' => $this->desc_en],
    //         'category_id' => $this->category_id,
    //         'brand_id' => $this->brand_id,
    //         'sku' => $this->sku,
    //         'available_for' => $this->available_for,
    //         'has_variants' => $this->has_variants,
    //         'price' => $this->has_variants == 1 ? null : $this->price,
    //         'manage_stock' => $this->manage_stock,
    //         'quantity' => $this->manage_stock == 1 ? $this->quantity : null,
    //         'has_discount' => $this->has_discount,
    //         'discount' => $this->has_discount == 1 ? $this->discount : null,
    //         'start_discount' => $this->has_discount == 1 ? $this->start_discount : null,
    //         'end_discount' => $this->has_discount == 1 ? $this->end_discount : null,
    //     ]);

    //     // add variants
    //     if ($this->has_variants) {
    //         foreach ($this->prices as $index => $price) {
    //             $variant = ProductVariant::create([
    //                 'product_id' => $product->id,
    //                 'price' => $price,
    //                 'stock' => $this->quantities[$index] ?? 0,
    //             ]);

    //             foreach ($this->attributeValues[$index] as $attributeValueId) {
    //                 VariantAttribute::create([
    //                     'product_variant_id' => $variant->id,
    //                     'attribute_value_id' => $attributeValueId,
    //                 ]);
    //             } //end second foreach
    //         } // end prices foreach
    //     } // end if has vaiants

    //     // upload images
    //     $imageManger = new ImageManager();
    //     $imageManger->uploadImages($this->images, $product, 'products');
    //     // $this->reset();
    //     $this->resetForm();
    //     flash()->success(__('general.add_success_message'));
    //     // $this->successMessage = ;
    //     $this->currentStep = 1;
    // }

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
            // 'tags' => $this->tags,
            'has_variants' => $this->has_variants,
            'price' => $this->has_variants == 1 ? null : $this->price,
            'manage_stock' => $this->manage_stock,
            'quantity' => $this->manage_stock == 1 ? $this->quantity : null,
            'has_discount' => $this->has_discount,
            'discount' => $this->has_discount == 1 ? $this->discount : null,
            'start_discount' => $this->has_discount == 1 ? $this->start_discount : null,
            'end_discount' => $this->has_discount == 1 ? $this->end_discount : null,
        ];

        // add variants
        $productVaraints = [];
        if ($this->has_variants) {
            foreach ($this->prices as $index => $price) {
                $productVaraints[] = [
                    'product_id' => null,
                    'price' => $price,
                    'stock' => $this->quantities[$index] ?? 0,
                    'attribute_value_ids' => $this->attributeValues[$index],
                ];
            } // end prices foreach
        } // end if has vaiants

        $productCreated = $this->productService->createProductWithDetails($productData, $productVaraints, $this->images);

        if (!$productCreated) {
            flash()->error(message: __('general.add_error_message'));
            $this->currentStep = 1;
        } else {
            flash()->success(message: __('general.add_success_message'));
            $this->resetExcept(['categories', 'brands', 'successMessage']);
            $this->currentStep = 1;
        }
    }

    // back setp
    public function backStep($step)
    {
        $this->currentStep = $step;
    }

    // add new varaint
    public function addNewVariant()
    {
        $this->prices[] = null;
        $this->quantities[] = null;
        $this->attributeValues[] = [];
        $this->valueRowCount = count($this->prices);
    }

    //  remove varaint
    public function removeVariant()
    {
        if ($this->valueRowCount > 1) {
            $this->valueRowCount--;
            array_pop($this->prices);
            array_pop($this->quantities);
            array_pop($this->attributeValues);
        }
    }

    // reset form
    public function resetForm()
    {
        $this->name_ar = '';
        $this->name_en = '';
        $this->small_desc_ar = '';
        $this->small_desc_en = '';
        $this->desc_ar = '';
        $this->desc_en = '';
        $this->category_id = '';
        $this->brand_id = '';
        $this->sku = '';
        $this->available_for = '';
        // $this->tags = '';
        $this->has_variants = 0;
        $this->price = '';
        $this->manage_stock = 0;
        $this->quantity = '';
        $this->has_discount = 0;
        $this->discount = '';
        $this->start_discount = '';
        $this->end_discount = '';
        $this->images = '';
        $this->fullScreenImage = '';
        // $this->price[] = '';
        // $this->quantities[] = '';
        // $this->attributeValues[] = [];
    }

    // deal with images
    // delete image
    public function deleteImage($key)
    {
        unset($this->images[$key]);
    }

    // full screen image
    public function openFullScreen($key)
    {
        $this->fullScreenImage = $this->images[$key]->temporaryUrl();
        $this->dispatch('showFullScreenModal');
    }

    // render
    public function render()
    {
        $attributes = $this->attributeService->getAttributes();
        return view('livewire.dashboard.product.create-product', ['attributes' => $attributes]);
    }
}
