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
        $brand =  Brand::withCount('products')->orderByDesc('created_at')->get();
        return $brand;
    }

    // store brand
    public function store($data)
    {
        return Brand::create([
            'name' => $data['name'],
            'status' => $data['status'],
            'logo' => $data['logo'],
        ]);
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
