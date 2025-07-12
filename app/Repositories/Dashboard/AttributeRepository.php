<?php

namespace App\Repositories\Dashboard;

use App\Models\Attribute;

class AttributeRepository
{
    // get attibute
    public function getAttribute($id)
    {
        return Attribute::find($id);
    }

    // get attributes
    public function getAttributes()
    {
        return Attribute::with('attributeValues')->latest()->get();
    }

    // store attribute
    public function storeAttribute($data)
    {
        return Attribute::create([
            'name' => $data,
        ]);
    }

    // update attribute
    public function updateAttribute($attribute, $data)
    {
        return $attribute->update($data);
    }
    // destroy attribute
    public function destroyAttribute($attribute)
    {
        return $attribute->forceDelete();
    }
}
