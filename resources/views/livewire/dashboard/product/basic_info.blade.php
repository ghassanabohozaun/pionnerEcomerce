<!-- begin: product name -->
<div class="row">
    <!-- begin: input -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="name_ar">{!! __('products.name_ar') !!}</label>
            <input type="text" wire:model.live="name_ar" class="form-control" autocomplete="off"
                placeholder="{!! __('products.enter_name_ar') !!}">
            @error('name_ar')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->

    <!-- begin: input -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="name_en">{!! __('products.name_en') !!}</label>
            <input type="text" wire:model.live='name_en' class="form-control" autocomplete="off"
                placeholder="{!! __('products.enter_name_en') !!}">
            @error('name_en')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->
</div>
<!-- end: product name -->

<!-- begin: product small description -->
<div class="row">
    <!-- begin: input -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="small_desc_ar">{!! __('products.small_desc_ar') !!}</label>
            <textarea rows="3" wire:model.live="small_desc_ar" class="form-control" autocomplete="off"
                placeholder="{!! __('products.enter_small_desc_ar') !!}"></textarea>
            @error('small_desc_ar')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->

    <!-- begin: input -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="small_desc_en">{!! __('products.small_desc_en') !!}</label>
            <textarea rows="3" wire:model.live='small_desc_en' class="form-control" autocomplete="off"
                placeholder="{!! __('products.enter_small_desc_en') !!}"></textarea>
            @error('small_desc_en')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->
</div>
<!-- end: product small description -->


<!-- begin: product  description -->
<div class="row">
    <!-- begin: input -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="desc_ar">{!! __('products.desc_ar') !!}</label>
            <textarea rows="5" wire:model.live="desc_ar" class="form-control" autocomplete="off"
                placeholder="{!! __('products.enter_desc_ar') !!}"></textarea>
            @error('desc_ar')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->

    <!-- begin: input -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="desc_en">{!! __('products.desc_en') !!}</label>
            <textarea rows="5" wire:model.live='desc_en' class="form-control" autocomplete="off"
                placeholder="{!! __('products.enter_desc_en') !!}"></textarea>
            @error('desc_en')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->
</div>
<!-- end: product  description -->


<!-- begin: product  category brand SKU -->
<div class="row">

    <!-- begin: input -->
    <div class="col-md-4">
        <div class="form-group">
            <label for="category_id">{!! __('products.category_id') !!}</label>
            <select class="form-control custom_select" id="DefaultSelect" wire:model.live="category_id">
                <option value="" selected>
                    {!! __('general.select_from_list') !!}
                </option>
                @foreach ($categories as $category)
                    <option value="{!! $category->id !!}">
                        {!! $category->name !!}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->


    <!-- begin: input -->
    <div class="col-md-4">
        <div class="form-group">
            <label for="brand_id">{!! __('products.brand_id') !!}</label>
            <select class="form-control custom_select" id="DefaultSelect" wire:model.live="brand_id">
                <option value="" selected>
                    {!! __('general.select_from_list') !!}
                </option>
                @foreach ($brands as $brand)
                    <option value="{!! $brand->id !!}">
                        {!! $brand->name !!}
                    </option>
                @endforeach
            </select>
            @error('brand_id')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->

    <!-- begin: input -->
    <div class="col-md-4">
        <div class="form-group">
            <label for="sku">{!! __('products.sku') !!}</label>
            <input type="text" wire:model.live='sku' class="form-control" autocomplete="off"
                placeholder="{!! __('products.enter_sku') !!}">
            @error('sku')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->

</div>
<!-- end: product  category brand SKU -->

<!-- begin: product available_for tags -->
<div class="row">
    <!-- begin: input -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="available_for">{!! __('products.available_for') !!}</label>
            <input type="date" wire:model.live="available_for" class="form-control" autocomplete="off"
                placeholder="{!! __('products.enter_available_for') !!}">
            @error('available_for')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->

    <!-- begin: input -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="tags">{!! __('products.tags') !!}</label>
            <input type="text" wire:model.live='tags' class="form-control " autocomplete="off"
                placeholder="{!! __('products.enter_tags') !!}">
            @error('tags')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->
</div>
<!-- end: product name -->

<!-- begin: button -->
<div class="row {!! Lang() == 'ar' ? 'pull-left' : 'pull-right' !!}">
    <div class="col-md-12">
        <button type="button" wire:click ="firstStepSubmit" class="btn btn-primary  btn-glow px-2 ">
            {!! __('products.next') !!}
        </button>
    </div>
</div>
<div class="clearfix"></div>
<!-- end: button -->
