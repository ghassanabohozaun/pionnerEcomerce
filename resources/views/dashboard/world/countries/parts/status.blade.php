<div class="badge badge-md {!! $country->status == 'on' ? 'badge-success' : 'badge-danger' !!} country_status_{!! $country->id !!}">
    {!! $country->status == 'on' ? __('general.enable') : __('general.disabled') !!}
</div>
