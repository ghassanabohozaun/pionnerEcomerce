<!doctype html>
<html
    @if (Config::get('app.locale') == 'ar') lang="ar" data-textdirection="rtl" @else  lang="en" data-textdirection="ltr" @endif>


<!-- begin head -->

<head>
    @include('layouts.website.app-parts.__head')
    @stack('style')
</head>

<!-- end head -->

<body>

    <!-- begin  header -->
    <header id="header" class="header">
        @include('layouts.website.app-parts.__header-top')
        @include('layouts.website.app-parts.__header-center')
        @include('layouts.website.app-parts.__header-bottom')
    </header>
    <!-- end  header -->

    @yield('content')

    <!-- begin  footer -->
    @include('layouts.website.app-parts.__footer')
    <!-- end  footer -->

</body>
<!-- begin   scripts -->
@include('layouts.website.app-parts.__scripts')
@stack('scripts')
<!-- end scripts -->

</html>
