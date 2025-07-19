<div>
    <div class="row">
        <!-- begin: input -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="country_id">{!! __('users.country_id') !!}</label>
                <select type="text" wire:change="changeCountry($event.target.value)" id="country_id" name="country_id"
                    class="form-control">
                    <option value="0" selected='selected'>
                        {!! __('users.select') !!} {!! __('users.country_id') !!}
                    </option>
                    @foreach ($countries as $key => $country)
                        <option value="{!! $country->id !!}"> {!! $country->name !!} </option>
                    @endforeach
                </select>
                <span class="text text-danger">
                    <strong id="country_id_error"></strong>
                </span>
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="governorate_id">{!! __('users.governorate_id') !!}</label>
                <select type="text" wire:model="governorateId" wire:change="changeGovernorate($event.target.value)"
                    id="governorate_id" name="governorate_id" class="form-control">
                    <option value="0" selected='selected'>
                        {!! __('users.select') !!} {!! __('users.governorate_id') !!}
                    </option>
                    @foreach ($governorates as $key => $governorate)
                        <option value="{!! $governorate->id !!}">{!! $governorate->name !!}</option>
                    @endforeach
                </select>
                <span class="text text-danger">
                    <strong id="governorate_id_error"></strong>
                </span>

            </div>
        </div>
        <!-- end: input -->


        <!-- begin: input -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="city_id">{!! __(key: 'users.city_id') !!}</label>
                <select type="text" wire:model="cityId" id="city_id" name="city_id" class="form-control">
                    <option value="0" selected='selected'>
                        {!! __('users.select') !!} {!! __('users.city_id') !!}
                    </option>
                    @foreach ($cities as $key => $city)
                        <option value="{!! $city->id !!}">{!! $city->name !!}</option>
                    @endforeach
                </select>
                <span class="text text-danger">
                    <strong id="city_id_error"></strong>
                </span>

            </div>
        </div>
        <!-- end: input -->
    </div>
</div>
