<?php

namespace App\Repositories\Dashboard;
use App\Models\Governorate;
use App\Models\ShippingGovernorate;

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
        $governorates = Governorate::withCount(['cities', 'users'])
            ->with(['country', 'shippingPrice'])
            ->when(!empty(request()->keyword), function ($q) {
                $q->where('name', 'like', '%' . request()->keyword . '%');
            })
            ->orderByDesc('id')
            ->paginate(10);

        return $governorates;
    }

    // get all governorates without relations
    public function getAllGovernoratesWithoutRelations()
    {
        return Governorate::get();
    }

    // get all cities by governorate
    public function getAllCitiesbyGovernorate($governorate)
    {
        $cities = $governorate->cities()->get();
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

        ShippingGovernorate::create([
            'price' => $request->shipping_price,
            'governorate_id' => $governorate->id,
        ]);

        return $governorate;
    }

    // update governorate
    public function updateGovernorate($request, $id)
    {
        $governorate = self::getGovernorate($id);
        $governorateUpdate = $governorate->update([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar'],
            ],
            'country_id' => $request->country_id,
        ]);

        $governorate->shippingPrice()->update([
            'price' => $request->shipping_price,
            'governorate_id' => $governorate->id,
        ]);

        return $governorateUpdate;
    }

    // change status
    public function changeStatus($governorate)
    {
        $governorate = $governorate->update([
            'status' => $governorate->status == 'on' ? 0 : 1,
        ]);
        return $governorate;
    }
    // destory governorate
    public function destroyGovernorate($governorate)
    {
        $governorate = $governorate->forceDelete();
        return $governorate;
    }

    // get shipping governorate

    public function getShippingGovernoreate($id)
    {
        return ShippingGovernorate::where('governorate_id', $id)->first();
    }
    // store shipping price
    public function storeShippingPrice($shippingGovernorate, $price)
    {
        $shippingGovernorate = shippingGovernorate::create([
            'price' => $price,
            'governorate_id' => $shippingGovernorate,
        ]);
        return $shippingGovernorate;
    }

    // update shipping price
    public function updateShippingPrice($shippingGovernorate, $price)
    {
        $shippingGovernorate = $shippingGovernorate->update([
            'price' => $price,
        ]);
        return $shippingGovernorate;
    }
}
