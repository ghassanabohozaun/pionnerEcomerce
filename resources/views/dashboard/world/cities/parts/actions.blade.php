<div class="col-xl-12 col-lg-12 mb-1">
    <div class="form-group text-center">

        <a href="{!! route('dashboard.cities.edit', $city->id) !!}" class=" btn btn-social-icon btn-sm mr-1 btn-outline-primary btn-round">
            <i class="la la-edit"></i>
        </a>

        <a href="#" class="btn btn-social-icon btn-sm mr-1 btn-round  btn-outline-danger delete_city_btn"
            data-id="{!! $city->id !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
