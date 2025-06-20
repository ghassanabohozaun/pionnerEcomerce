<?php

namespace App\Repositories\Dashboard;
use App\Models\Governorate;

class GovernorateRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // get governorate
    public function getGovernorate($id)
    {
        return Governorate::find($id);
    }

    // get governorates
    public function getgovernoraties()
    {
        return Governorate::orderByDesc('id')->select('id', 'name', 'country_id')->paginate(10);
    }

    // get all cities by governorate
    public function getAllCitiesbyGovernorate($governorate)
    {
        $cities = $governorate->cities;
        return $cities;
    }

    // store governorate
    public function storeGovernorate($request)
    {
        $governorate = Governorate::create([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'country_id' => $request->country_id,
        ]);
        return $governorate;
    }

    // update governorate
    public function updateGovernorate($request, $id)
    {
        $governorate = self::getGovernorate($id);
        $governorate = $governorate->update([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'country_id' => $request->country_id,
        ]);

        return $governorate;
    }

    // destory governorate
    public function destroyGovernorate($governorate)
    {
        $governorate = $governorate->forceDelete();
        return $governorate;
    }


}
