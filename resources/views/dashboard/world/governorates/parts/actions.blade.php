<div class="col-xl-12 col-lg-12 mb-1">
    <div class="form-group text-center">

        <a href="#" class="btn btn-social-icon btn-sm mr-1 btn-round  btn-outline-warning show_shipping_price_modal"
            data-id="{!! $governorate->id !!}">
            <i class="la la-dollar"></i>
        </a>

        <a href="{!! route('dashboard.governorates.edit', $governorate->id) !!}" class=" btn btn-social-icon btn-sm mr-1 btn-outline-primary btn-round">
            <i class="la la-edit"></i>
        </a>

        <a href="#" class="btn btn-social-icon btn-sm mr-1 btn-round  btn-outline-danger delete_governorate_btn"
            data-id="{!! $governorate->id !!}">
            <i class="la la-trash"></i>
        </a>

        {{-- <a href="{!! route('dashboard.governorates.destroy', $governorate->id) !!}" class=" btn btn-social-icon btn-sm mr-1 btn-round  btn-outline-danger">
            <i class="la la-trash"></i>
        </a> --}}

        {{-- <form action="{!! route('dashboard.governorates.destroy', $governorate->id) !!}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class=" btn btn-social-icon btn-sm mr-1 btn-round  btn-outline-danger">
                <i class="la la-trash"></i>
            </button>
        </form> --}}

    </div>
</div>
