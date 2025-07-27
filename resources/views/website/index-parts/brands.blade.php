<section class="product brand margin-bottom-40" data-aos="fade-up">
    <div class="container">
        <div class="section-title">
            <h5>{!! __('website.brand_of_product') !!}</h5>
            <a href="{!! route('website.brands.index') !!}" class="view">{!! __('website.view_all') !!}</a>
        </div>
        <div class="brand-section">
            @forelse ($limitBrands as  $brand)
                <div class="product-wrapper">
                    <a href="{!! route('website.products.by.brands', $brand->slug) !!}">
                        <div class="wrapper-img">
                            <img src="{!! asset('uploads/brands/' . $brand->logo) !!}" alt="{!! $brand->name !!}">
                        </div>
                    </a>
                </div>
            @empty
                <div>
                    <h5 class="text text-danger mt-5 pt-5"> {!! __('website.no_categories') !!}</h5>
                </div>
            @endforelse
        </div>
    </div>
</section>
