<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GovernorateRequest;
use App\Http\Requests\Dashboard\UpdateShippingPriceRequest;
use App\Services\Dashboard\CountryService;
use App\Services\Dashboard\GovernorateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GovernoratiesController extends Controller
{
    protected $governorateService, $countryService;
    // __construct
    public function __construct(GovernorateService $governorateService, CountryService $countryService)
    {
        $this->governorateService = $governorateService;
        $this->countryService = $countryService;
    }
    // index
    public function index()
    {
        $title = __('world.governorates');
        $governorates = $this->governorateService->getGovernoraties();
        return view('dashboard.world.governorates.index', compact('title', 'governorates'));
    }

    // get cities by governorate id
    public function getCitesByGovernrateID($governorate_id)
    {
        $title = __('world.cities');
        $cities = $this->governorateService->getAllCitiesbyGovernorate($governorate_id);
        return view('dashboard.world.cities.index', compact('title', 'cities'));
    }

    //create
    public function create()
    {
        $title = __('world.create_new_governorate');
        $countries = $this->countryService->getCountries();
        return view('dashboard.world.governorates.create', compact('title', 'countries'));
    }

    // store
    public function store(GovernorateRequest $request)
    {
        $governorate = $this->governorateService->storeGovernorate($request);
        if (!$governorate) {
            flash()->error(__('general.add_error_message'));
            return redirect()->back();
        }

        flash()->success(__('general.add_success_message'));
        return redirect()->back();
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        $title = __('world.update_governorate');
        $governorate = $this->governorateService->getGovernorate($id);

        if (!$governorate) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }

        $countries = $this->countryService->getCountries();

        return view('dashboard.world.governorates.edit', compact('title', 'governorate', 'countries'));
    }

    // update
    public function update(GovernorateRequest $request, string $id)
    {
        $governorate = $this->governorateService->getGovernorate($id);
        if (!$governorate) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }

        $governorate = $this->governorateService->updateGovernorate($request, $id);
        if (!$governorate) {
            flash()->error(__('general.update_error_message'));
            return redirect()->back();
        }

        flash()->success(__('general.update_success_message'));
        return redirect()->back();
    }

    // change status
    public function changeStatus($id)
    {
        $governorate = $this->governorateService->changeStatus($id);
        if (!$governorate) {
            return response()->json(['status' => false]);
        }
        $governorate = $this->governorateService->getGovernorate($id);
        return response()->json(['status' => true, 'data' => $governorate]);
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->json()) {
            $governorate = $this->governorateService->destroyGovernorate($request->id);
            if (!$governorate) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        }
    }

    //  get all cities by governorate
    public function getAllCitiesByGovernorate(Request $request)
    {
        if ($request->json()) {
            $cities = $this->governorateService->getAllCitiesbyGovernorate($request->id);
            return response()->json(['data' => $cities]);
        }
    }

    public function updateShippingPrice(UpdateShippingPriceRequest $request)
    {
        if ($request->json()) {
            $shippingPrice = $this->governorateService->updateShippingPrice($request->governorate_id, $request->shipping_price);

            if (!$shippingPrice) {
                return response()->json(['status' => false]);
            }

            $shippingGovernorate = $this->governorateService->getShippingGovernoreate($request->governorate_id);

            return response()->json(['status' => true, 'data' => $shippingGovernorate]);
        }
    }
}
