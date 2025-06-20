<?php

namespace App\Repositories\Dashboard;

use App\Models\City;

class CityRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


      // get city
    public function getCity($id)
    {
        return City::find($id);
    }

    // get countries
    public function getCities()
    {
        return City::orderByDesc('id')->select('name', 'governorate_id')->paginate(10);
    }

    // store city
    public function storeCity($request)
    {
        $city = City::create([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'governorate_id' => $request->governorate_id,
        ]);
        return $city;
    }

    // update city
    public function updateCity($request, $id)
    {
        $city = self::getCity($id);
        $city = $city->update([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'status' => $request->has('status') ? 1 : 0,
            'phone_code' => $request->phone_code,
        ]);

        return $city;
    }

    // change status
    public function changeStatus($city, $status)
    {
        $city=  $city->update([
            'status' => $status,
        ]);
        return $city;
    }
}
