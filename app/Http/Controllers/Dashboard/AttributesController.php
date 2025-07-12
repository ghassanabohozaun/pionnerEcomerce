<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AttributeRequest;
use App\Models\Attribute;
use App\Services\Dashboard\AttributeService;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    protected $attributeService;
    // __construct
    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    // index
    public function index()
    {
        $title = __('attributes.attributes');
        return view('dashboard.attributes.index', compact('title'));
    }

    public function getALL()
    {
        return $this->attributeService->getAll();
    }

    // create
    public function create()
    {
        //
    }

    //store
    public function store(AttributeRequest $request)
    {
        $data = $request->only(['name', 'value']);
        $attribute = $this->attributeService->storeAttribute($data);
        if (!$attribute) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
    }

    //show
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
    public function update(AttributeRequest $request, string $id)
    {


        $data = $request->only(['id', 'name','value']);
        $attribute = $this->attributeService->updateAttribute($data, $id);
        if (!$attribute) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    //destroy
    public function destroy(string $id)
    {
        $attribute = $this->attributeService->destroyAttribute($id);
        if (!$attribute) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], status: 200);
    }
}
