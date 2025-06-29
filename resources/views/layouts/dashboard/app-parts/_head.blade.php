 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
 <meta name="description" content="">
 <meta name="keywords" content="">
 <meta name="author" content="PIXINVENT">
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <title>{!! __('dashboard.dashboard') !!} | @yield('title')</title>
 <link rel="apple-touch-icon" href="{!! asset('assets/dashbaord') !!}/images/ico/apple-icon-120.png">
 <link rel="shortcut icon" type="image/x-icon" href="{!! asset('assets/dashbaord') !!}/images/ico/favicon.ico">
 <link
     href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
     rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/fonts/line-awesome/css/line-awesome.min.css">



 <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/vendors/css/weather-icons/climacons.min.css">
 <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/fonts/meteocons/style.css">
 <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/vendors/css/charts/morris.css">
 <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/vendors/css/charts/chartist.css">
 <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/vendors/css/charts/chartist-plugin-tooltip.css">
 <link rel="stylesheet" type="text/css" href="{!! asset(path: 'assets/dashbaord') !!}/fonts/simple-line-icons/style.css">
 <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/my-style.css">
 <link href="{!! asset('vendor/flasher/flasher.min.css') !!}" rel="stylesheet">

 @if (Config::get('app.locale') == 'ar')
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/vendors.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/app.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/custom-rtl.css">
     <link rel="stylesheet" type="text/css"
         href="{!! asset('assets/dashbaord') !!}/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/core/colors/palette-gradient.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/core/colors/palette-gradient.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/pages/timeline.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/pages/dashboard-ecommerce.css">
     {{-- <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/assets/css/style-rtl.css"> --}}
     <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet" />
     <style>
         body,
         html {
             font-family: "Poppins", "ArbFONTSBEINNormalAR", sans-serif;
             font-weight: normal;
             font-style: normal;
         }
     </style>
 @else
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/vendors.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/app.css">
     <link rel="stylesheet" type="text/css"
         href="{!! asset('assets/dashbaord') !!}/css/core/menu/menu-types/vertical-menu-modern.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/core/colors/palette-gradient.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/core/colors/palette-gradient.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/pages/timeline.css">
     <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/pages/dashboard-ecommerce.css">
 @endif
