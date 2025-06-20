<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CountryRequest;
use App\Models\Country;
use App\Services\Dashboard\CountryService;
use App\Services\Dashboard\GovernorateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountriesController extends Controller
{
    protected $countryService, $governorateService;

    // __construct
    public function __construct(CountryService $countryService, GovernorateService $governorateService)
    {
        $this->countryService = $countryService;
        $this->governorateService = $governorateService;
    }

    // index
    public function index()
    {
        $title = __('world.countries');
        $countries = $this->countryService->getCountries();
        return view('dashboard.world.countries.index', compact('title', 'countries'));
    }

    // create
    public function create()
    {
        $title = __('world.create_new_country');
        return view('dashboard.world.countries.create', compact('title'));
    }

    // store
    public function store(CountryRequest $request)
    {
        $country = $this->countryService->storeCountry($request);
        if (!$country) {
            flash()->error(__('general.add_error_message'));
            return redirect()->back();
        }

        flash()->success(__('general.add_success_message'));
        return redirect()->back();
    }

    //show
    public function show(string $id)
    {
        //
    }

    //edit
    public function edit(string $id)
    {
        $title = __('world.update_country');
        $country = $this->countryService->getCountry($id);
        if (!$country) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }
        return view('dashboard.world.countries.edit', compact('title', 'country'));
    }

    // update
    public function update(CountryRequest $request, string $id)
    {
        $country = $this->countryService->getCountry($id);
        if (!$country) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }

        $country = $this->countryService->updateCountry($request, $id);
        if (!$country) {
            flash()->error(__('general.update_error_message'));
            return redirect()->back();
        }

        flash()->success(__('general.update_success_message'));
        return redirect()->back();
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->json()) {
            $country = $this->countryService->destroyCountry($request->id);
            if (!$country) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        }
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->json()) {
            $country = $this->countryService->changeStatus($request->id, $request->statusSwitch);
            if (!$country) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        }
    }

    // get all governoratis by county
    public function getAllGovernoratiesByCountry(Request $request)
    {
        if ($request->json()) {
            $governoraties = $this->countryService->getAllGovernoratiesByCountry($request->id);
            return response()->json(['data' => $governoraties]);
        }
    }

}
