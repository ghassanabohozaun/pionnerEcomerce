<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BrandRequest;
use App\Services\Dashboard\BrandService;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    protected $brandService;
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }
    // index brand
    public function index()
    {
        $title = __('brands.brands');
        $brands = $this->brandService->getBrands();
        return view('dashboard.brands.index', compact('title', 'brands'));
    }

    //create brand
    public function create()
    {
        $title = __('brands.create_new_brand');
        return view('dashboard.brands.create', compact('title'));
    }

    //store brand
    public function store(BrandRequest $request)
    {



        $brand = $this->brandService->storeBrand($request);

        if (!$brand) {
            flash()->error(__('general.add_error_message'));
            return redirect()->back();
        }
        flash()->success(__('general.add_success_message'));
        return redirect()->back();
    }

    //show brand
    public function show(string $id) {}

    // edit brand
    public function edit(string $id)
    {
        $brand = $this->brandService->getBrand($id);
        if (!$brand) {
            flash()->error(__('general.no_record_found'));
            return redirect()->route('dashboard.brands.index');
        }

        $title = __('brands.update_brand');
        return view('dashboard.brands.edit', compact('brand', 'title'));
    }

    // update brand
    public function update(BrandRequest $request, string $id)
    {
        $brand = $this->brandService->updateBrand($request, $id);
        if (!$brand) {
            flash()->error(__('general.update_error_message'));
            return redirect()->back();
        }
        flash()->success(__('general.update_success_message'));
        return redirect()->back();
    }

    // destroy brand
    public function destroy(Request $request)
    {
        if ($request->json()) {
            $brand = $this->brandService->destroyBrand($request->id);
            if (!$brand) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        }
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->json()) {
            $brand = $this->brandService->changeStatusBrand($request->id, $request->statusSwitch);
            if (!$brand) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        }
    }
}
