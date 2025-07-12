<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AttributeValueRepository;
use Yajra\DataTables\Facades\DataTables;

class AttributeValueService
{
    protected $attributeValueRepository;
    //__construct
    public function __construct(AttributeValueRepository $attributeValueRepository)
    {
        $this->attributeValueRepository = $attributeValueRepository;
    }

    // get attibute value
    public function getAttributeValue($id)
    {
        $attributeValue = $this->attributeValueRepository->getAttributeValue($id);
        if (!$attributeValue) {
            return false;
        }
        return $attributeValue;
    }

    // get attribute values
    public function getAttributeValues()
    {
        return $this->attributeValueRepository->getAttributeValues();
    }

    // get all
    public function getAll()
    {
        $attributesValues = $this->attributeValueRepository->getAttributeValues();
        return DataTables::of($attributesValues)->addIndexColumn()->make(true);
    }

    // store attribute value
    public function storeAttributeValue($data)
    {
        $attributeValue = $this->attributeValueRepository->storeAttributeValue($data);
        if (!$attributeValue) {
            return false;
        }
        return $attributeValue;
    }

    // update attribute value
    public function updateAttributeValue($data, $id)
    {
        $attributeValue = self::getAttributeValue($data['id']);

        $attributeValue = $this->attributeValueRepository->updateAttributeValue($attributeValue, $data);
        if (!$attributeValue) {
            return false;
        }
        return $attributeValue;
    }
    // destroy attribute value
    public function destroyAttributeValue($id)
    {
        $attributeValue = self::getAttributeValue($id);
        $attributeValue = $this->attributeValueRepository->destroyAttributeValue($attributeValue);
        if (!$attributeValue) {
            return false;
        }
        return $attributeValue;
    }
}
