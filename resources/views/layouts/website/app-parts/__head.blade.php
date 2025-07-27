<title>{!! $settings->site_name !!} | @yield('title')</title>

<meta charset="utf-8">
<meta name="keywords" content="{!! $settings->keywords !!}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="{!! $settings->description !!}">
<meta name="application-name" content="{!! $settings->site_name !!}" />
<meta name="author" content="{!! $settings->site_name !!}" />

<link rel="apple-touch-icon" href="{!! asset('uploads/settings/' . $settings->favicon) !!}">
<link rel="shortcut icon" type="image/x-icon" href="{!! asset('uploads/settings/' . $settings->favicon) !!}">
<link rel="icon" href="{!! asset('uploads/settings/' . $settings->favicon) !!}">

<link rel="stylesheet" href="{!! asset('assets/website/css/swiper10-bundle.min.css') !!}">

<link rel="stylesheet" href="{!! asset('assets/website/css/bootstrap-5.3.2.min.css') !!}">

<link rel="stylesheet" href="{!! asset('assets/website/css/nouislider.min.css') !!}">

<link rel="stylesheet" href="{!! asset('assets/website/css/aos-3.0.0.css') !!}">

<link rel="stylesheet" href="{!! asset('assets/website/css/style.css') !!}">
<link rel="stylesheet" href="{!! asset('assets/website/css/my-style.css') !!}">
@stack('style')
