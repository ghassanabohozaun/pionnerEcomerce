<div class="col-xl-12 col-lg-12 mb-1">
    <div class="form-group text-center">

        <a href="#"
            class="btn btn-social-icon btn-sm mr-1 btn-round  btn-outline-warning get_all_governorate_by_country_btn"
            data-id="{!! $country->id !!}" title="{!! __('world.show_all_governorates') !!}">
            <i class="la la-eye"></i>
        </a>

        <a href="{!! route('dashboard.countries.edit', $country->id) !!}" class=" btn btn-social-icon btn-sm mr-1 btn-outline-primary btn-round">
            <i class="la la-edit"></i>
        </a>


        <a href="#" class="btn btn-social-icon btn-sm mr-1 btn-round  btn-outline-danger delete_country_btn"
            data-id="{!! $country->id !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
