<div class="row">

    <!-- begin:  has variant  , price-->
    <!-- begin: input -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="has_variants">{!! __('products.has_variants') !!}</label>
            <select wire:model.live="has_variants" class="form-control">
                <option value="0" selected>{!! __('general.no') !!}</option>
                <option value="1">{!! __('general.yes') !!}</option>
            </select>
            @error('has_variants')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->

    <!-- begin: input -->
    @if ($has_variants == 0)
        <div class="col-md-6">
            <div class="form-group">
                <label for="price">{!! __('products.price') !!}</label>
                <input type="number" wire:model.live="price" class="form-control" autocomplete="off"
                    placeholder="{!! __('products.enter_price') !!}">
                @error('price')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
    @endif
    <!-- end: input -->
    <!-- end: row has variant  , price -->


    @if ($has_variants == 0)
        <!-- begin:  manage stock  , quantity-->
        <!-- begin: input -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="manage_stock">{!! __('products.manage_stock') !!}</label>
                <select wire:model.live="manage_stock" class="form-control">
                    <option value="0" selected>{!! __('general.no') !!}</option>
                    <option value="1">{!! __('general.yes') !!}</option>
                </select>
                @error('manage_stock')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        @if ($manage_stock == 1)
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="quantity">{!! __('products.quantity') !!}</label>
                    <input type="number" wire:model.live="quantity" class="form-control" autocomplete="off"
                        placeholder="{!! __('products.enter_quantity') !!}">
                    @error('quantity')
                        <span class="text text-danger">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        @endif
        <!-- end: input -->
        <!-- end:  manage stock  , quantity -->
    @endif


    <!-- begin:  has discount  , discount-->
    <!-- begin: input -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="has_discount">{!! __('products.has_discount') !!}</label>
            <select wire:model.live="has_discount" class="form-control">
                <option value="0" selected>{!! __('general.no') !!}</option>
                <option value="1">{!! __('general.yes') !!}</option>
            </select>
            @error('has_discount')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->

    <!-- begin: input -->
    @if ($has_discount == 1)
        <div class="col-md-6">
            <div class="form-group">
                <label for="discount">{!! __('products.discount') !!}</label>
                <input type="number" wire:model.live="discount" class="form-control" autocomplete="off"
                    placeholder="{!! __('products.enter_discount') !!}">
                @error('discount')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
    @endif
    <!-- end: input -->
    <!-- end: has discount  , discount -->


    <!-- begin: start discount  ,end discount-->
    <!-- begin: input -->
    @if ($has_discount == 1)
        <div class="col-md-6">
            <div class="form-group">
                <label for="start_discount">{!! __('products.start_discount') !!}</label>
                <input type="date" wire:model.live="start_discount" class="form-control" autocomplete="off"
                    placeholder="{!! __('products.enter_start_discount') !!}">
                @error('start_discount')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
    @endif
    <!-- end: input -->

    <!-- begin: input -->
    @if ($has_discount == 1)
        <div class="col-md-6">
            <div class="form-group">
                <label for="end_discount">{!! __('products.end_discount') !!}</label>
                <input type="date" wire:model.live="end_discount" class="form-control" autocomplete="off"
                    placeholder="{!! __('products.enter_end_discount') !!}">
                @error('end_discount')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
    @endif
    <!-- end: input -->
    <!-- end: start discount  ,end discount -->

</div>

@if ($has_variants == 1)
    <hr style="background-color: rgb(119, 116, 116)">

    @for ($i = 0; $i < $valueRowCount; $i++)
        <div class="row">

            <!-- begin: input  prices-->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">{!! __('products.price') !!}</label>
                    <input wire:model="prices.{!! $i !!}" class="form-control"
                        placeholder="{!! __('products.enter_price') !!}" />
                    @error('prices')
                        <span class="text text-danger">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                    @error('prices.' . $i)
                        <span class="text text-danger">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->

            <!-- begin: input -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">{!! __('products.quantity') !!}</label>
                    <input wire:model="quantities.{{ $i }}" class="form-control"
                        placeholder="{!! __('products.enter_quantity') !!}" />
                    @error('quantities')
                        <span class="text text-danger">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                    @error('quantities.' . $i)
                        <span class="text text-danger">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- end: input -->

            @foreach ($productAttribute as $attr)
                <!-- begin: input -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="has_variants">{!! $attr->name !!}</label>
                        <select wire:model="variantAttributes.{{ $i }}.{{ $attr->id }}"
                            class="form-control">

                            <option value="" class=" {!! empty($$attr->attributeValues) ? 'displayNone' : '' !!}">
                                {!! __('products.select') !!}
                                {!! $attr->name !!}
                            </option>

                            @foreach ($attr->attributeValues as $item)
                                <option value="{!! $item->id !!}" @selected(($variantAttributes[$i][$attr->id] ?? null) == $item->id)>
                                    {!! $item->value !!}</option>
                            @endforeach
                        </select>
                        {{-- @error('attributeValues.' . $i . '.' . $attr->id)
                            <span class="text text-danger">
                                <strong>{!! $message !!}</strong>
                            </span>
                        @enderror --}}
                    </div>
                </div>
                <!-- end: input -->
            @endforeach

        </div>
        <hr style="background-color: rgb(119, 116, 116)">
    @endfor

    <button type="button" wire:click ="addNewVariant" class="btn btn-success btn-glow px-2">
        <li class="la la-plus"></li>
        {{-- {!! __('products.add_new_variant') !!} --}}
    </button>

    @if ($valueRowCount > 1)
        <button type="button" wire:click ="removeVariant" class="btn btn-danger btn-glow px-2">
            <li class="la la-close"></li>
            {{-- {!! __('products.remove_varaint') !!} --}}
        </button>
    @endif
@endif

<!-- begin: button -->
<div class="row {!! Lang() == 'ar' ? 'pull-left' : 'pull-right' !!}">
    <div class="col-md-12 ">
        <button type="button" wire:click ="backStep(1)" class="btn btn-info btn-glow px-2  ">
            {!! __('products.back') !!}
        </button>
        <button type="button" wire:click="secondStepSubmit" class="btn btn-primary btn-glow px-2  ">
            {!! __('products.next') !!}
        </button>
    </div>
</div>
<div class="clearfix"></div>
<!-- end: button -->
