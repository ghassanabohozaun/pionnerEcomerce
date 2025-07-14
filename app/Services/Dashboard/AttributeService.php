<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AttributeRepository;
use App\Repositories\Dashboard\AttributeValueRepository;
 use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class AttributeService
{
    protected $attributeRepository, $attributeValueRepository;
    //__construct
    public function __construct(AttributeRepository $attributeRepository, AttributeValueRepository $attributeValueRepository)
    {
        $this->attributeRepository = $attributeRepository;
        $this->attributeValueRepository = $attributeValueRepository;
    }

    // get attibute
    public function getAttribute($id)
    {
        $attribute = $this->attributeRepository->getAttribute($id);
        if (!$attribute) {
            return false;
        }
        return $attribute;
    }

    // get attributes
    public function getAttributes()
    {
        return $this->attributeRepository->getAttributes();
    }

    // get all
    public function getAll()
    {
        $attributes = $this->attributeRepository->getAttributes();
        return DataTables::of($attributes)
            ->addIndexColumn()
            ->addColumn('name', function ($attribute) {
                return $attribute->getTranslation('name', Lang());
            })
            ->addColumn('attributeValues', function ($attribute) {
                return view('dashboard.attributes.parts.attributes_values', compact('attribute'));
            })
            ->addColumn('actions', function ($attribute) {
                return view('dashboard.attributes.parts.actions', compact('attribute'));
            })
            ->make(true);
    }

    // store attribute
    public function storeAttribute($data)
    {
        try {
            DB::beginTransaction();

            // store attribute
            $attribute = $this->attributeRepository->storeAttribute($data['name']);

            // store attribute values
            foreach ($data['value'] as $value) {
                $this->attributeValueRepository->storeAttributeValue($attribute, $value);
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
           // dd($e->getMessage());
            Log::error('Error Creating Product Attributes : ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return false;
        }
    }

    // update attribute
    public function updateAttribute($data, $id)
    {
        try {
            $attributeObj = self::getAttribute($id);

            DB::beginTransaction();

            // update attribute
            $this->attributeRepository->updateAttribute($attributeObj, $data);

            // delete old  attribute values
            $this->attributeValueRepository->destroyAttributeValue($attributeObj);

            //update attribute values
            foreach ($data['value'] as $value) {
                $this->attributeValueRepository->storeAttributeValue($attributeObj, $value);
            }

            //update attribute values use this when you only update values without add more or delete
            // foreach ($data['value'] as $key => $value) {
            // $this->attributeValueRepository->updateAttributeValue($attributeObj, $key, $value);
            // }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::error('Error In Update Product Attribute : ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);

            return false;
        }
    }
    // destroy attribute
    public function destroyAttribute($id)
    {
        $attribute = self::getAttribute($id);
        $attribute = $this->attributeRepository->destroyAttribute($attribute);
        if (!$attribute) {
            return false;
        }
        return $attribute;
    }
}
