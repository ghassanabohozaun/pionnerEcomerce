@extends('layouts.website.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    {{-- breadcrump and header title --}}
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('website.index') }}">{{ __('website.home') }}</a></span>
                <span class="devider">/</span>
                <span><a href="javascript:void(0)" class="active">{!! $title !!}</a></span>
            </div>

            <div class="blog-heading about-heading">
                <h1 class="heading">{!! $title !!}</h1>
            </div>

        </div>
    </section>

    <section class="product-category margin-bottom-100">
        <div class="container ">
            <div class="section-title">
                <h5>{!! __('website.our_categories') !!}</h5>
            </div>
            <div class="category-section ">
                @forelse ($categories as $category)
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
@endsection
