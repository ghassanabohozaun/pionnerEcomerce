<div class="row">

    <!-- begin: basic information -->
    <h2>{!! __('products.basic_information') !!}</h2>
    <table class="table table-responsive" style=" width:100%;">
        <tbody>
            <tr>
                <td style="background-color: #f1f1f1">{!! __('products.name_ar') !!}</td>
                <td>{!! $name_ar !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.name_en') !!}</td>
                <td>{!! $name_en !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.small_desc_ar') !!}</td>
                <td>{!! $small_desc_ar !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.small_desc_en') !!}</td>
                <td>{!! $small_desc_en !!}</td>
            </tr>

            <tr>
                <td style="background-color: #f1f1f1">{!! __('products.desc_ar') !!}</td>
                <td>{!! $desc_ar !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.desc_en') !!}</td>
                <td>{!! $desc_en !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.category_id') !!}</td>
                <td>{!! $category_id !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.brand_id') !!}</td>
                <td>{!! $brand_id !!}</td>

            </tr>

            <tr>
                <td style="background-color: #f1f1f1">{!! __('products.sku') !!}</td>
                <td>{!! $sku !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.available_for') !!}</td>
                <td>{!! $available_for !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.tags') !!}</td>
                <td>{!! $tags !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.has_variants') !!}</td>
                <td>{!! $has_variants == 1 ? __('general.yes') : __('general.no') !!}</td>

            </tr>

            <tr>
                <td style="background-color: #f1f1f1">{!! __('products.price') !!}</td>
                <td>{!! $has_variants == 1 ? 0 : $price !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.manage_stock') !!}</td>
                <td>{!! $manage_stock == 1 ? __('general.yes') : __('general.no') !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.quantity') !!}</td>
                <td>{!! $quantity !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.has_discount') !!}</td>
                <td>{!! $has_discount == 1 ? __('general.yes') : __('general.no') !!}</td>
            </tr>
            <tr>
                <td style="background-color: #f1f1f1">{!! __('products.discount') !!}</td>
                <td>{!! $discount !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.start_discount') !!}</td>
                <td>{!! $start_discount !!}</td>
                <td style="background-color: #f1f1f1">{!! __('products.end_discount') !!}</td>
                <td>{!! $end_discount !!}</td>
            </tr>


        </tbody>

    </table>
    <!-- end: basic information -->

    <!-- begin: product variants -->
    @if ($has_variants == 1)
        <h2 class=" mt-3">{!! __('products.product_variants') !!}</h2>
        <table class="table table-responsive  mb-3" style=" width:100%;">
            <thead>
                <tr>
                    <td>{!! __('products.prices') !!}</td>
                    <td>{!! __('products.quantities') !!}</td>
                    <td>{!! __('products.attributes') !!}</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $index => $price)
                    <tr>
                        <td> {!! $price !!}</td>
                        <td> {!! $quantities[$index] ?? 0 !!}</td>
                        <td>
                            @foreach ($attributeValues[$index] as $attribute)
                                {!! getSpecificAttributeValue($attribute)->value !!} |
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <!-- end: product variants -->

    <!-- begin: product images -->
    @if ($images)
        <h2 class="mb-2">{!! __('products.product_images') !!}</h2>
        <!-- begin: slider-->
        <div class="col-12 mb-2">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 50%">
                <div class="carousel-inner">
                    @foreach ($images as $key => $image)
                        <div class="carousel-item {!! $key == 0 ? 'active' : '' !!}">
                            <img src="{!! $image->temporaryUrl() !!}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                    <a href="#carouselExampleControls}" class="carousel-control-prev" type="button"
                        data-target="#carouselExampleControls" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">{!! __('general.previous') !!}</span>
                    </a>
                    <a href="#carouselExampleControls" class="carousel-control-next" type="button"
                        data-target="#carouselExampleControls" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">{!! __('general.next') !!}</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end: slider-->
    @endif
    <!-- end: product images -->
</div>

<!-- begin: button -->
<div class="row {!! Lang() == 'ar' ? 'pull-left' : 'pull-right' !!}">
    <div class="col-md-12">
        <button type="button" wire:click ="backStep(3)" class="btn btn-info btn-glow px-2">
            {!! __('products.back') !!}
        </button>
        <button type="button" wire:click="submitForm" class="btn btn-primary btn-glow px-2">
            {!! __('products.submit') !!}
        </button>
    </div>
</div>
<div class="clearfix"></div>
<!-- end: button -->
