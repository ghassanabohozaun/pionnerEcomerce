<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CouponRequest;
use App\Services\Dashboard\CouponService;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    protected $couponService;
    // __constructor
    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }
    // index
    public function index()
    {
        $title = __('coupons.coupons');
        return view('dashboard.coupons.index', compact('title'));
    }

    // get all
    public function getAll()
    {
        return $this->couponService->getAll();
    }

    // show
    public function create()
    {
        $title = __('coupons.create_new_coupon');
        return view('dashboard.coupons.create', compact('title'));
    }

    // store
    public function store(CouponRequest $request)
    {
        $data = $request->only(['code', 'discount_percentage', 'start_date', 'end_date', 'limit', 'is_active']);
        $coupon = $this->couponService->store($data);
        if (!$coupon) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $coupon], 201);
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        $coupon = $this->couponService->getCoupon($id);
        if (!$coupon) {
            flash()->error(__('general.no_record_found'));
            return redirect()->route('dashboard.coupons.index');
        }
        $title = __('coupons.update_coupon');
        return view('dashboard.coupons.edit', compact('title', 'coupon'));
    }

    // update
    public function update(CouponRequest $request, string $id)
    {
        $data = $request->only(['id', 'code', 'discount_percentage', 'start_date', 'end_date', 'limit', 'time_used', 'is_active']);
        $coupon = $this->couponService->update($data);
        if (!$coupon) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // destroy
    public function destroy(string $id)
    {
        $coupon = $this->couponService->destroy($id);
        if (!$coupon) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $coupon = $this->couponService->changeStatus($request->id, $request->statusSwitch);
            if (!$coupon) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        }
    }
}
