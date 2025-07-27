<div class="login-section account-section">

    <div class="review-form" style="height: 100%">
        <h5 class="comment-title">{!! __('auth.register') !!}</h5>

        {{-- errors message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="strong-weight">
                            {!! $error !!}
                        </li>
                    @endforeach

                </ul>
            </div>
        @endif


        <div class=" account-inner-form">
            <div class="review-form-name">
                <label for="name_ar" class="form-label">{!! __('users.name_ar') !!}*</label>
                <input type="text" wire:model.live="name_ar" name="name[ar]" value="{!! old('name.ar') !!}"
                    class="form-control" placeholder="{!! __('users.enter_name_ar') !!}">
                @error('name_ar')
                    <span class="text text-danger">
                        <strong class="strong-weight">{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
            <div class="review-form-name">
                <label for="name_en" class="form-label">{!! __('users.name_en') !!}*</label>
                <input type="text" wire:model.live="name_en" name="name[en]" value="{!! old('name.en') !!}"
                    class="form-control" placeholder="{!! __('users.enter_name_en') !!}">
                @error('name_en')
                    <span class="text text-danger">
                        <strong class="strong-weight">{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>


        {{-- user email --}}
        <div class=" account-inner-form">
            <div class="review-form-name">
                <label for="email" class="form-label">{!! __('users.email') !!}*</label>
                <input type="email" wire:model.live="email" name="email" value="{!! old('email') !!}"
                    class="form-control" placeholder="{!! __('users.enter_email') !!}">
                @error('email')
                    <span class="text text-danger">
                        <strong class="strong-weight">{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- user mobile --}}
        <div class=" account-inner-form">
            <div class="review-form-name">
                <label for="mobile" class="form-label">{!! __('users.mobile') !!}*</label>
                <input type="mobile" wire:model.live="mobile" name="mobile" value="{!! old('mobile') !!}"
                    class="form-control" placeholder="{!! __('users.enter_mobile') !!}">
                @error('mobile')
                    <span class="text text-danger">
                        <strong class="strong-weight">{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- user password --}}
        <div class=" account-inner-form">
            <div class="review-form-name">
                <label for="password" class="form-label">{!! __('users.password') !!}*</label>
                <input type="text" wire:model.live="password" name="password" value="{!! old('password') !!}"
                    class="form-control" placeholder="{!! __('users.enter_password') !!}">
                @error('password')
                    <span class="text text-danger">
                        <strong class="strong-weight">{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- user password confirm --}}
        <div class=" account-inner-form">
            <div class="review-form-name">
                <label for="password_confirm" class="form-label">{!! __('users.password_confirm') !!}*</label>
                <input type="text" wire:model.live="password_confirm" name="password_confirm"
                    value="{!! old('password_confirm') !!}" class="form-control" placeholder="{!! __('users.enter_password_confirm') !!}">
                @error('password_confirm')
                    <span class="text text-danger">
                        <strong class="strong-weight">{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- user address --}}
        <div class="review-form-name mb-5">
            <div>
                <div class="row">
                    <!-- begin: input -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="country_id">{!! __('users.country_id') !!}</label>
                            <select type="text" wire:model="country_id"
                                wire:change="changeCountry($event.target.value)" name="country_id" class="form-control">
                                <option value="0" selected='selected'>
                                    {!! __('users.select') !!} {!! __('users.country_id') !!}
                                </option>
                                @foreach ($countries as $key => $country)
                                    <option value="{!! $country->id !!}"> {!! $country->name !!} </option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <span class="text text-danger">
                                    <strong class="strong-weight">{!! $message !!}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end: input -->

                    <!-- begin: input -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="governorate_id">{!! __('users.governorate_id') !!}</label>
                            <select type="text" wire:model="governorate_id"
                                wire:change="changeGovernorate($event.target.value)" id="governorate_id"
                                name="governorate_id" class="form-control">
                                <option value="0" selected='selected'>
                                    {!! __('users.select') !!} {!! __('users.governorate_id') !!}
                                </option>
                                @foreach ($governorates as $key => $governorate)
                                    <option value="{!! $governorate->id !!}">{!! $governorate->name !!}</option>
                                @endforeach
                            </select>
                            @error('governorate_id')
                                <span class="text text-danger">
                                    <strong class="strong-weight">{!! $message !!}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end: input -->


                    <!-- begin: input -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city_id">{!! __(key: 'users.city_id') !!}</label>
                            <select type="text" wire:model="city_id" id="city_id" name="city_id"
                                wire:change="changeCity($event.target.value)" class="form-control">
                                <option value="0" selected='selected'>
                                    {!! __('users.select') !!} {!! __('users.city_id') !!}
                                </option>
                                @foreach ($cities as $key => $city)
                                    <option value="{!! $city->id !!}">{!! $city->name !!}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <span class="text text-danger">
                                    <strong class="strong-weight">{!! $message !!}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end: input -->
                </div>
            </div>

        </div>

        {{-- user terms --}}
        <div class="review-form-name checkbox">
            <div class="checkbox-item">
                <input type="checkbox" name="terms" wire:model="terms">
                <p class="remember">
                    {!! __('auth.i_agree_all_terms') !!}
                    <span class="inner-text">{!! $settings->site_name !!}.
                    </span>
                </p>
                @error('terms')
                    <div>
                        <span class="text text-danger">
                            <strong class="strong-weight">{!! $message !!}</strong>
                        </span>
                    </div>
                @enderror
            </div>

        </div>


        {{-- user submit --}}
        <div class="login-btn text-center">
            <a href="#" wire:click.prevent="registerUser()" class="shop-btn">
                {!! __('auth.register') !!}
            </a>
            <span class="shop-account">
                {!! __('auth.already_have_an_account') !!} ?
                <a href="{!! route('website.get.login') !!}">{!! __('auth.login') !!}</a>
            </span>
        </div>
    </div>


</div>
