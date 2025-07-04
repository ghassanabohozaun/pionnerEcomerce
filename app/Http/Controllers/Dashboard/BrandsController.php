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
    // index
    public function index()
    {
        $title = __('brands.brands');
        $brands = $this->brandService->getBrands();
        return view('dashboard.brands.index', compact('title'));
    }

    // get all
    public function getAll()
    {
        return $this->brandService->getAll();
    }

    // create
    public function create()
    {
        $title = __('brands.create_new_brand');
        return view('dashboard.brands.create', compact('title'));
    }

    // store
    public function store(BrandRequest $request)
    {
        $brand = $request->only(['logo', 'name', 'status']);
        $brand = $this->brandService->store($brand);
        if (!$brand) {
            flash()->error(__('general.add_error_message'));
            return redirect()->back();
        }

        flash()->success(__('general.add_success_message'));
        return redirect()->back();
    }

    // edit
    public function edit(string $id)
    {
        $title = __('brands.update_brand');
        $brand = $this->brandService->getBrand($id);
        if (!$brand) {
            flash()->error(__('general.no_record_found'));
            return redirect()->route('dashboard.categories.index');
        }

        return view('dashboard.brands.edit', compact('title', 'brand'));
    }

    // update
    public function update(BrandRequest $request)
    {
        $brand = $request->only(['logo', 'name', 'status', 'id']);
        $brand = $this->brandService->update($brand);
        if (!$brand) {
            flash()->error(__('general.update_error_message'));
            return redirect()->back();
        }

        flash()->success(__('general.update_success_message'));
        return redirect()->back();
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $brand = $this->brandService->destroy($request->id);
            if (!$brand) {
                return response()->json(['status' => false], 404);
            }
            return response()->json(['status' => true]);
        }
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $brand = $this->brandService->changeStatus($request->id, $request->statusSwitch);
            if (!$brand) {
                return response()->json(['status' => false], 404);
            }
            return response()->json(['status' => true]);
        }
    }
}
