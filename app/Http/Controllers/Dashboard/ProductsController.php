<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Services\Dashboard\ProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $productService;

    // __construct
    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    // index
    public function index()
    {
        //
    }

    // create
    public function create()
    {
        $title = __('products.create_new_product');
        $brands = Brand::all();
        $categories = Category::all();
        return view('dashboard.products.create', compact('title', 'brands', 'categories'));
    }

    // get all
    public function getAll(){

        return $this->productService->getAll();
    }
    // store
    public function store(Request $request)
    {
        //
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        //
    }

    // update
    public function update(Request $request, string $id)
    {
        //
    }

    // destroy
    public function destroy(string $id)
    {
        //
    }
}
