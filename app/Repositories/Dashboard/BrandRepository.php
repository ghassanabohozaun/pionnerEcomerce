<?php

namespace App\Repositories\Dashboard;

use App\Models\Brand;

class BrandRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // get brand
    public function getBrand($id)
    {
        $brand = Brand::find($id);
        return $brand;
    }

    // get brands
    public function getBrands()
    {
        $brands = Brand::orderByDesc('created_at')->select('id', 'name', 'logo', 'status')->paginate(5);
        return $brands;
    }

    // store brand
    public function storeBrand($request, $logo)
    {
        $brand = Brand::create([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],

            'logo' => $logo,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return $brand;
    }

    public function updateBrand($request, $id, $logo)
    {
        $brand = self::getBrand($id);
        $brand = $brand->update([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'logo' => $logo,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return $brand;
    }

    // destroy brand
    public function destroyBrand($brand)
    {
        return $brand->forceDelete();
    }

    // change status
    public function changeStatusBrand($brand, $status)
    {
        $brand = $brand->update([
            'status' => $status,
        ]);
        return $brand;
    }
}
