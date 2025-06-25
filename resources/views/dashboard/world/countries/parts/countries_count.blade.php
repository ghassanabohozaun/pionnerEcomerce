  <div class="badge badge-pill badge-info badge-md">
      <a href="#" class="get_all_governorate_by_country_btn" data-id="{!! $country->id !!}"
          title="{!! __('world.show_all_governorates') !!}">
          {!! $country->governorates->count() !!}
      </a>
  </div>
