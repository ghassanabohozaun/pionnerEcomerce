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

    <section class="product brand margin-bottom-100" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h5>{!! __('website.brand_of_product') !!}</h5>
            </div>
            <div class="brand-section">
                @forelse ($brands as  $brand)
                    <div class="product-wrapper p-2">
                        <div class="wrapper-img">
                            <a href="{!! route('website.products.by.brands', $brand->slug) !!}">
                                <img src="{!! asset('uploads/brands/' . $brand->logo) !!}" alt="{!! $brand->name !!}">
                            </a>
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
