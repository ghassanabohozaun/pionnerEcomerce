<section class="product-category">
    <div class="container">
        <div class="section-title">
            <h5>{!! __('website.our_categories') !!}</h5>
            <a href="{!! route('website.categories.index') !!}" class="view">{!! __('website.view_all') !!}</a>
        </div>
        <div class="category-section">
            @forelse ($limitCategories as $category)
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                    <div class="wrapper-img">
                        <img src="{!! asset('uploads/categories/' . $category->icon) !!}" alt="{!! $category->name !!}">
                    </div>
                    <div class="wrapper-info">
                        <a href="{!! route('website.products.by.category', $category->slug) !!}" class="wrapper-details">{!! $category->name !!}</a>
                    </div>
                </div>
            @empty
                <div>
                    <h5 class="text text-danger mt-5 pt-5"> {!! __('website.no_categories') !!}</h5>
                </div>
            @endforelse

        </div>
    </div>
</section>
