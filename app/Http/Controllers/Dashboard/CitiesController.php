<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CityRequest;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\GovernorateService;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    protected $cityService, $governorateService;

    public function __construct(CityService $cityService, GovernorateService $governorateService)
    {
        $this->cityService = $cityService;
        $this->governorateService = $governorateService;
    }
    // index
    public function index()
    {
        $title = __('world.cities');
        $cities = $this->cityService->getCities();
        return view('dashboard.world.cities.index', compact('title', 'cities'));
    }

    // create
    public function create()
    {
        $title = __('world.create_new_city');
        $governorates = $this->governorateService->getGovernoraties();
        return view('dashboard.world.cities.create', compact('title', 'governorates'));
    }

    // store
    public function store(CityRequest $request)
    {
        $city = $this->cityService->storeCity($request);
        if (!$city) {
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
        $title = __('world.update_city');
        $city = $this->cityService->getCity($id);
        if (!$city) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }
        $governorates = $this->governorateService->getGovernoraties();
        return view('dashboard.world.cities.edit', compact('title', 'city', 'governorates'));
    }

    // update
    public function update(CityRequest $request, string $id)
    {
        $city = $this->cityService->getCity($id);
        if (!$city) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }

        $city = $this->cityService->updateCity($request, $id);
        if (!$city) {
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
            $city = $this->cityService->destroyCity($request->id);
            if (!$city) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        }
    }
}
