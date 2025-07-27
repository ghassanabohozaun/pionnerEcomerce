<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SliderRequest;
use App\Services\Dashboard\SliderService;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    protected $sliderService;
    //__construct
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    // index
    public function index()
    {
        $title = __('sliders.sliders');
        return view('dashboard.sliders.index', compact('title'));
    }

    // get all
    public function getAll()
    {
        return $this->sliderService->getAll();
    }

    // create
    public function create()
    {
        $title = __('sliders.create_new_slider');
        return view('dashboard.sliders.create', compact('title'));
    }

    // store
    public function store(SliderRequest $request)
    {
        $data = $request->only(['title', 'details', 'url', 'photo', 'status', 'details_status', 'button_status']);
        $slider = $this->sliderService->create($data);
        if (!$slider) {
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
        $title = __('sliders.update_slider');
        $slider = $this->sliderService->getSlider($id);
        return view('dashboard.sliders.edit', compact('title', 'slider'));
    }

    // update
    public function update(SliderRequest $request, string $id)
    {
        $data = $request->only(['id', 'title', 'details', 'url', 'photo', 'status', 'details_status', 'button_status']);
        $slider = $this->sliderService->update($data);
        if (!$slider) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
    }

    // destroy
    public function destroy(string $id)
    {
        $slider = $this->sliderService->destroy($id);
        if (!$slider) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }
    // changeStatus
    public function changeStatus(Request $request)
    {
        $slider = $this->sliderService->changeStatus($request['id'], $request['statusSwitch']);
        if (!$slider) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }
}
