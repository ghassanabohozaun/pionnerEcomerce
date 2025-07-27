<?php

namespace App\Repositories\Dashboard;

use App\Models\Brand;

class BrandRepositroy
{
    //__construct
    public function __construct()
    {
        //
    }

    // get brand
    public function getBrand($id)
    {
        return Brand::find($id);
    }

    // get brands
    public function getBrands()
    {
        return Brand::withCount('products')->latest()->get();
    }

    // store brand
    public function store($data)
    {
        return Brand::create($data);
    }

    // update brand
    public function update($brand, $data)
    {
        $brand = $brand->update($data);
        return $brand;
    }

    // destroy brand
    public function destroy($brand)
    {
        return $brand->forceDelete();
    }

    // change status
    public function changeStatus($brand, $status)
    {
        return $brand->update([
            'status' => $status,
        ]);
    }
}
