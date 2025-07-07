<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\CouponRepository;
use Illuminate\Support\Facades\Cache;
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
        return DataTables::of($coupons)
            ->addIndexColumn()
            ->addColumn('is_active', function ($coupon) {
                return $coupon->is_active == 1 ? __('general.active') : __('general.inactive');
            })
            ->addColumn('manage_status', function ($coupon) {
                return view('dashboard.coupons.parts.is_active_manage', compact('coupon'));
            })
            ->addColumn('actions', function ($coupon) {
                return view('dashboard.coupons.parts.actions', compact('coupon'));
            })
            ->addColumn('discount_percentage', function ($coupon) {
                return $coupon->discount_percentage . ' % ';
            })
            ->make(true);
    }

    // store coupon
    public function store($data)
    {
        $coupon = $this->couponRepository->store($data);
        if (!$coupon) {
            return false;
        }
        $this->couponCache();
        return $coupon;
    }

    // update coupon
    public function update($data)
    {
        $coupon = $this->getCoupon($data['id']);

        $coupon = $this->couponRepository->update($coupon, $data);
        if (!$coupon) {
            return false;
        }
        $this->couponCache();
        return $coupon;
    }

    // destory coupon
    public function destroy($id)
    {
        $coupon = $this->getCoupon($id);
        $coupon = $this->couponRepository->destroy($coupon);
        if (!$coupon) {
            return false;
        }
        $this->couponCache();
        return $coupon;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $coupon = $this->getCoupon($id);
        $coupon = $this->couponRepository->changeStatus($coupon, $status);

        if (!$coupon) {
            return false;
        }
        return $coupon;
    }

    public function couponCache()
    {
        Cache::forget('coupons_count');
    }
}
