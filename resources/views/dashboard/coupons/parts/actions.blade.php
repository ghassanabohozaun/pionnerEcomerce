<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        {{-- edit --}}
        <button class="btn btn-sm btn-outline-primary edit_coupon_button" title="{!! __('general.edit') !!}"
            coupon-id="{!! $coupon->id !!}" coupon-code="{!! $coupon->code !!}"
            coupon-discount_percentage="{!! $coupon->discount_percentage !!}" coupon-start_date="{!! $coupon->start_date !!}"
            coupon-end_date="{!! $coupon->end_date !!}" coupon-limit="{!! $coupon->limit !!}"
            coupon-is_active="{!! $coupon->is_active !!}">
            <i class="la la-edit"></i>
        </button>

        {{-- delete --}}
        <button class="btn btn-sm btn-outline-danger delete_coupon_btn" title="{!! __('general.delete') !!}"
            data-id="{!! $coupon->id !!}">
            <i class="la la-trash"></i>
        </button>

    </div>
</div>
