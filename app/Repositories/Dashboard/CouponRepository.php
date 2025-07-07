<?php

namespace App\Repositories\Dashboard;

use App\Models\Coupon;

class CouponRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // get coupon
    public function getCoupon($id)
    {
        return Coupon::find($id);
    }

    // get coupons
    public function getCoupons()
    {
        return Coupon::latest()->get();
    }

    // store coupon
    public function store($data)
    {
        return Coupon::create($data);
    }

    // update coupon
    public function update($coupon, $data)
    {
        return $coupon->update($data);
    }

    // destory coupon
    public function destroy($coupon)
    {
        return $coupon->delete();
    }

    // change status
    public function changeStatus($coupon, $status)
    {
        return $coupon->update([
            'is_active' => $status,
        ]);
    }
}
