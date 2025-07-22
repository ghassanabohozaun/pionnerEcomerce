<!doctype html>
<html
    @if (Config::get('app.locale') == 'ar') lang="ar" data-textdirection="rtl" @else  lang="en" data-textdirection="ltr" @endif>


<!-- begin head -->

<head>
    @include('layouts.website.app-parts._head')
    @stack('style')
</head>

<!-- end head -->

<body>

    <!-- begin  header -->
    <header id="header" class="header">
        @include('layouts.website.app-parts._header-top')
        @include('layouts.website.app-parts._header-center')
        @include('layouts.website.app-parts._header-bottom')
    </header>
    <!-- end  header -->

    @yield('content')

    <!-- begin  footer -->
    @include('layouts.website.app-parts._footer')
    <!-- end  footer -->

</body>
<!-- begin   scripts -->
@include('layouts.website.app-parts._scripts')
@stack('scripts')
<!-- end scripts -->

</html>
