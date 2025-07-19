<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserRequest;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\CountryService;
use App\Services\Dashboard\GovernorateService;
use App\Services\Dashboard\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $userService, $countryService, $governorateService, $cityService;
    // __construct
    public function __construct(UserService $userService, CountryService $countryService, GovernorateService $governorateService, CityService $cityService)
    {
        $this->userService = $userService;

        $this->countryService = $countryService;
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
    }
    // index
    public function index()
    {
        $title = __('users.users');
        return view('dashboard.users.index', compact('title'));
    }

    // get all
    public function getAll()
    {
        return $this->userService->getAll();
    }

    // create
    public function create()
    {
        //
    }

    // store
    public function store(UserRequest $request)
    {
        $data = $request->except(['_token']);
        $user = $this->userService->storeUser($data);
        if (!$user) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
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
        $user = $this->userService->destroyUser($id);
        if (!$user) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // change status
    public function changeStatus(Request $request)
    {
        $user = $this->userService->changeStatus($request->id, $request->statusSwitch);
        if (!$user) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }
}
