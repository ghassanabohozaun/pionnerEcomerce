{{-- <div class="badge badge-pill badge-info badge-md">
    <a href="#" title="{!! __(key: 'world.show_all_governorates') !!}" data-id="{!! $governorate->id !!}" title="{!! __('world.show_all_cities') !!}"
        class="get_all_cities_by_governorate_btn">
        {!! $governorate->cities->count() !!}
    </a>
</div> --}}


<div class="badge badge-pill badge-info badge-md">
    <a href="{!! route('dashboard.governorates.get.cities.by.governorate.id', $governorate->id) !!}" title="{!! __('world.show_all_cities') !!}">
        {!! $governorate->cities_count !!}
    </a>
</div>
