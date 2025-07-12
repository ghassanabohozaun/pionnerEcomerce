<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\AttributeValueService;
use Illuminate\Http\Request;

class AttributeValuesController extends Controller
{
    protected $attributeValueService;
    // __construct
    public function __construct(AttributeValueService $attributeValueService)
    {
        $this->attributeValueService = $attributeValueService;
    }

    // index
    public function index()
    {
        $title = __('attributes.attibute_values');
        //return view('dashboard.attributes.index', compact('title'));
    }

    public function getALL()
    {
        return $this->attributeValueService->getAll();
    }

    // create
    public function create()
    {
        //
    }

    //store
    public function store(Request $request)
    {
        $data = $request->only(['attribute_id', 'value']);
        $attributeValue = $this->attributeValueService->storeAttributeValue($data);
        if (!$attributeValue) {
            return response()->json(['status', false], 500);
        }
        return response()->json(['status', true], 201);
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
    public function update(Request $request, string $id)
    {
        $data = $request->only(['id', 'attribute_id', 'name']);
        $attributeValue = $this->attributeValueService->updateAttributeValue($data, $id);
        if (!$attributeValue) {
            return response()->json(['status', false], 500);
        }
        return response()->json(['status', true], 201);
    }

    //destroy
    public function destroy(Request $request)
    {
        $attributeValue = $this->attributeValueService->destroyAttributeValue($request->id);
        if (!$attributeValue) {
            return response()->json(['status', false], 500);
        }
        return response()->json(['status', true], 201);
    }
}
