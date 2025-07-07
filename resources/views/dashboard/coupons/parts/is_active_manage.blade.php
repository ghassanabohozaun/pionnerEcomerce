<input type="checkbox" id="input-15" class="change_status" aria-busy="" id="change_status"
    {{ $coupon->is_active == 1 ? 'checked' : '' }} data-id="{{ $coupon->id }}" />
