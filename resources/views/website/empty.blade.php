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
@endsection
