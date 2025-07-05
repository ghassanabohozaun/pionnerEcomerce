<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\CouponRepository;
use Yajra\DataTables\Facades\DataTables;

class CouponService
{
    protected $couponRepository;
    // __construct
    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    // get coupon
    public function getCoupon($id)
    {
        $coupon = $this->couponRepository->getCoupon($id);
        if (!$coupon) {
            return false;
        }
        return $coupon;
    }

    // get coupons
    public function getCoupons()
    {
        $coupons = $this->couponRepository->getCoupons();
        return $coupons;
    }

    // get all coupons
    public function getAll()
    {
        $coupons = $this->couponRepository->getCoupons();
        DataTables::of($coupons)->make(true);
    }

    // store coupon
    public function store($data)
    {
        $coupon = $this->couponRepository->store($data);
        if (!$coupon) {
            return false;
        }
        return $coupon;
    }

    // update coupon
    public function update($data)
    {
        $coupon = self::getCoupon($data['id']);

        $coupon = $this->couponRepository->update($coupon, $data);
        if (!$coupon) {
            return false;
        }
        return $coupon;
    }

    // destory coupon
    public function destroy($id)
    {
        $coupon = self::getCoupon($id);
        $coupon = $this->couponRepository->destroy($coupon);
        if (!$coupon) {
            return false;
        }
        return $coupon;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $coupon = self::getCoupon($id);
        $coupon = $this->couponRepository->changeStatus($coupon , $status);
        if (!$coupon) {
            return false;
        }
        return $coupon;
    }
}
