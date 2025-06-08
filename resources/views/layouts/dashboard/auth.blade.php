<!DOCTYPE html>
<html class="loading"
    @if (Config::get('app.locale') == 'ar') lang="ar" data-textdirection="rtl" @else  lang="en" data-textdirection="ltr" @endif>

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
        {!! __('dashbard.dashboard') !!} | @yield('title')
    </title>
    <link rel="apple-touch-icon" href="{!! asset('assets/dashbaord') !!}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('assets/dashbaord') !!}/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css"
        href="{!! asset('assets/dashbaord') !!}/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
    @if (Config::get('app.locale') == 'ar')
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/vendors.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/app.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/custom-rtl.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css-rtl/pages/login-register.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/style-rtl.css">
    @else
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/vendors.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/app.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/custom-rtl.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/pages/login-register.css">
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/css/style.css">
    @endif
</head>

<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- fixed-top ////////////////////////////////////////////////////////////////////////////-->

    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">&nbsp;</a></li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">
                            {{-- <img class="brand-logo" alt="modern admin logo"
                                src="{!! asset('assets/dashbaord') !!}/images/logo/logo.png"> --}}
                            <h3 class="brand-text">&nbsp;</h3>
                        </a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                                class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
                    <ul class="nav navbar-nav" style="{!! Config::get('app.locale') == 'ar' ? 'margin-left:35px' : '' !!}">

                        {{-- dropdown-language --}}
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                @if (Config::get('app.locale') == 'ar')
                                    <img class="flag-icon"
                                        src="{{ asset('assets/dashbaord/media/svg/flags/العربية.svg') }}" />
                                @else
                                    <img class="flag-icon"
                                        src="{{ asset('assets/dashbaord/media/svg/flags/English.svg') }}" />
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">

                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <i class="flag-icon">
                                            <img src="{{ asset('assets/dashbaord/media/svg/flags/' . $properties['native'] . '.svg') }}"
                                                alt="" />
                                        </i>
                                        <span>
                                            {{ $properties['native'] }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </li>

                        {{-- settings --}}
                        <li class="dropdown nav-item">
                            <a class="nav-link mr-2 nav-link-label" href="#" data-toggle="dropdown">&nbsp;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- content ////////////////////////////////////////////////////////////////////////////-->
    @yield('content')

    <!-- footer ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow"
        style="  margin-right: 0px !important; margin-top: -12px;">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">{!! __('dashbard.copyright') !!} &copy;
                {!! date('Y') !!} <a class="text-bold-800 grey darken-2" href="#"
                    target="_blank">{!! __('dashbard.site_name') !!}
                </a>, {!! __('dashbard.all_rights_reserved') !!}. </span>
        </p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript">
    </script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <!-- BEGIN MODERN JS-->
    <script src="{!! asset('assets/dashbaord') !!}/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/core/app.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    {!! NoCaptcha::renderJs() !!}

</body>

</html>
