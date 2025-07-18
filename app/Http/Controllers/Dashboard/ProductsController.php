<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Services\Dashboard\AttributeService;
use App\Services\Dashboard\BrandService;
use App\Services\Dashboard\CategorySevice;
use App\Services\Dashboard\ProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $productService, $categorySevice, $brandService, $attributeService;

    // __construct
    public function __construct(ProductService $productService, CategorySevice $categorySevice, BrandService $brandService, AttributeService $attributeService)
    {
        $this->productService = $productService;
        $this->categorySevice = $categorySevice;
        $this->brandService = $brandService;
        $this->attributeService = $attributeService;
    }

    // index
    public function index()
    {
        $title = __('products.products');
        return view('dashboard.products.index', compact('title'));
    }

    // get all
    public function getAll()
    {
        return $this->productService->getAll();
    }

    // create
    public function create()
    {
        $title = __('products.create_new_product');
        $categories = $this->categorySevice->getCategories();
        $brands = $this->brandService->getBrands();
        return view('dashboard.products.create', compact('title', 'brands', 'categories'));
    }

    // store
    public function store(Request $request)
    {
        //
    }

    // show
    public function show(string $id)
    {
        $product = $this->productService->getProductWithRelations($id);
        if (!$product) {
            flash()->error(__('general.no_record_found'));
            return redirect()->route('dashboard.products.index');
        }
        $title = __('products.show_product');
        return view('dashboard.products.show', compact('title', 'product'));
    }

    // edit
    public function edit(string $id)
    {
        $product = $this->productService->getProduct($id);
        if(!$product){
            flash()->error(__("general.no_record_found"));
            return redirect()->route('dashboard.products.index');
        }

        $categories = $this->categorySevice->getCategories();
        $brands = $this->brandService->getBrands();
        $attributes = $this->attributeService->getAttributes();
        $title = __('products.update_product');
        return view('dashboard.products.edit', compact('id',  'categories', 'brands', 'attributes','title',));
    }

    // update
    public function update(Request $request, string $id)
    {
        //
    }

    // destroy
    public function destroy(string $id)
    {
        $product = $this->productService->destroyProduct($id);
        if (!$product) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }
    //change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $product = $this->productService->changeStatus($request->id, $request->statusSwitch);
            if (!$product) {
                return response()->json(['status' => false], 500);
            }
            return response()->json(['status' => true], 200);
        }
    }

    // destroy product varaint
    public function destroyProductVaraint(Request $request, string $id)
    {
        $product = $this->productService->getProduct($request->product_id);

        if ($product->productVariants->count() > 1) {
            $varaint = $this->productService->destroyProductVaraint($id);
            if (!$varaint) {
                return response()->json(['status' => false], 500);
            }
            return response()->json(['status' => true], 200);
        } else {
            return response()->json(['status' => false], 500);
        }
    }
}
