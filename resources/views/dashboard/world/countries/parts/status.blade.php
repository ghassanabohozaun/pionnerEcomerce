<input type="checkbox" class="change_status" aria-busy="" id="change_status_{!! $country->id !!}"
    {{ $country->status == 'on' ? 'checked' : '' }} data-id="{{ $country->id }}" />
