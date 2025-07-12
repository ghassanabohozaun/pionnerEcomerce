<?php

namespace App\Repositories\Dashboard;

use App\Models\AttributeValue;

class AttributeValueRepository
{
    // get attibute value
    public function getAttributeValue($id)
    {
        return AttributeValue::find($id);
    }

    // get attribute values
    public function getAttributeValues()
    {
        return AttributeValue::get();
    }

    // store attribute value
    public function storeAttributeValue($attribute, $value)
    {
        return $attribute->attributeValues()->create([
            'value' => $value,
        ]);
    }

    // update attribute value
    public function updateAttributeValue($attribute, $key, $value)
    {
        // you able to use create alternative updateOrCreate  beacuse you will delete old values then add new values in service class
        return $attribute->attributeValues()->updateOrCreate(['id' => $key], ['value' => $value]);
    }
    // destroy attribute value
    public function destroyAttributeValue($attribute)
    {
        return $attribute->attributeValues()->forceDelete();
    }
}
