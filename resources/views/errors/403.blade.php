<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>
        {!! __('dashboard.access_restricted') !!}
    </title>

    <link rel="apple-touch-icon" href="{!! asset('assets/dashbaord') !!}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('assets/dashbaord') !!}/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->

    @if (Config::get('app.locale') == 'ar')
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/vendors.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/app.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/custom-rtl.css">
        <link rel="stylesheet" type="text/css"
            href="{!! asset('assets/dashbaord') !!}/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/pages/error.css">
    @else
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/vendors.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/app.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/custom-rtl.css">
        <link rel="stylesheet" type="text/css"
            href="{!! asset('assets/dashbaord') !!}/css/core/menu/menu-types/vertical-menu-modern.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/pages/error.css">
    @endif


</head>

<body class="vertical-layout vertical-menu-modern 1-column  menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu-modern" data-col="1-column">
    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-border navbar-shadow"
        {{-- class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow" --}}>
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">
                            {{-- <img class="brand-logo" alt="modern admin logo"
                                src="{!! asset('assets/dashbaord') !!}/images/logo/logo.png"> --}}
                            <h3 class="brand-text">{!! __('dashboard.site_name') !!}</h3>
                        </a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                                class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="col-sm-5 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4 box-shadow-2 mt-6">
                    <div class="card border-grey border-lighten-3 px-2 my-0 row">
                        <div class="card-header no-border pb-1">
                            <div class="card-body">
                                <h2 class="error-code text-center mb-2">403</h2>
                                <h4 class="text-uppercase text-center">{!! __('dashboard.access_denied') !!}</h4>
                            </div>
                        </div>
                        <div class="card-content px-2">
                            <fieldset class="row py-1">
                                <div class="input-group col-12">
                                    <input type="text" class="form-control border-grey border-lighten-1"
                                        placeholder="{!! __('dashboard.search') !!}" aria-describedby="button-addon2">
                                    <span class="input-group-append" id="button-addon2">
                                        <button class="btn btn-lg btn-secondary border-grey border-lighten-1"
                                            type="button"><i class="la la-search"></i></button>
                                    </span>
                                </div>
                            </fieldset>
                            <div class="row py-2">
                                <div class="col-12">
                                    <a href="{{ route('dashboard.index') }}"
                                        class="btn btn-primary btn-block btn-lg"><i class="la la-home"></i>
                                        {!! __('dashboard.back_to_home') !!}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript">
    </script>
    <script src="{!! asset('assets/dashbaord') !!}/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/core/app.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/customizer.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
</body>

</html>
