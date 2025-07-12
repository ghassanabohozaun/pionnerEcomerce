    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">

            <!-- begin: Dashboard -->
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="index.html">
                        <i class="la la-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{!! __('dashboard.dashboard') !!}</span>
                        {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                    </a>

                    <ul class="menu-content">
                        <li class=""><a class="menu-item" href="dashboard-ecommerce.html"
                                data-i18n="nav.dash.ecommerce">eCommerce</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- end: Dashboard -->


            <!-- begin: settings -->
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="{!! route('dashboard.settings.index') !!}">
                        <i class="la la-cog"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{!! __('settings.settings') !!}</span>
                    </a>
                </li>
            </ul>
            <!-- end: Dashboard -->


            <!-- begin: roles -->
            @can('roles')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="la la-lock"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">{!! __('dashboard.roles') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                        </a>
                        <!-- begin: roles -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'roles')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.roles.index') !!}" data-i18n="nav.dash.roles">
                                    {!! __('roles.roles') !!}
                                </a>

                            </li>
                        </ul>
                        <!-- end: roles -->
                    </li>
                </ul>
            @endcan
            <!-- end: roles -->

            <!-- begin: admins -->
            @can('admins')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="la la-user"></i>
                            <span class="menu-title" data-i18n="nav.dash.admins">{!! __('dashboard.admins') !!}</span>
                            <span class="badge badge badge-info badge-pill float-right mr-2">{!! $admins_count !!}</span>
                        </a>
                        <!-- begin: admins -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'admins')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.admins.index') !!}" data-i18n="nav.dash.admins">
                                    {!! __('admins.admins') !!}
                                </a>

                            </li>
                        </ul>
                        <!-- end: admins -->
                    </li>
                </ul>
            @endcan
            <!-- end: admins -->


            <!-- begin: world -->
            @can('world')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="la la-flag-o"></i>
                            <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.world') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                        </a>

                        <ul class="menu-content">
                            <!-- begin: countries -->
                            <li class="@if (str_contains(url()->current(), 'countries')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.countries.index') !!}" data-i18n="nav.dash.countries">
                                    {!! __('world.countries') !!}
                                </a>
                            </li>
                            <!-- end: countries -->

                            <!-- begin: governorates -->
                            <li class="@if (str_contains(url()->current(), 'governorates')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.governorates.index') !!}" data-i18n="nav.dash.governorates">
                                    {!! __('world.governorates') !!}
                                </a>
                            </li>
                            <!-- end: governorates -->

                            <!-- begin: cities -->
                            <li class="@if (str_contains(url()->current(), 'cities')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.cities.index') !!}" data-i18n="nav.dash.cities">
                                    {!! __('world.cities') !!}
                                </a>
                            </li>
                            <!-- end: cities -->

                        </ul>

                    </li>
                </ul>
            @endcan
            <!-- end: world -->

            <!-- begin: categories -->
            @can('categories')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.categories') !!}</span>
                            <span class="badge badge badge-info badge-pill float-right mr-2">{!! $categories_count !!}</span>
                        </a>
                        <!-- begin: categories -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'categories')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.categories.index') !!}" data-i18n="nav.dash.categories">
                                    {!! __('categories.categories') !!}
                                </a>

                            </li>
                        </ul>
                        <!-- end: categories -->
                    </li>
                </ul>
            @endcan
            <!-- end: categories -->


            <!-- begin: brands -->
            @can(abilities: 'brands')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="la la-clone"></i>
                            <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.brands') !!}</span>
                            <span class="badge badge badge-info badge-pill float-right mr-2">{!! $brands_count !!}</span>
                        </a>
                        <!-- begin: brands -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'brands')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.brands.index') !!}" data-i18n="nav.dash.brands">
                                    {!! __('brands.brands') !!}
                                </a>

                            </li>
                        </ul>
                        <!-- end: brands -->
                    </li>
                </ul>
            @endcan
            <!-- end: brands -->

            <!-- begin: coupons -->
            @can(abilities: 'coupons')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="la la-opencart"></i>
                            <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.coupons') !!}</span>
                            <span class="badge badge badge-info badge-pill float-right mr-2">{!! $coupons_count !!}
                            </span>
                        </a>
                        <!-- begin: coupons -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'coupons')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.coupons.index') !!}" data-i18n="nav.dash.coupons">
                                    {!! __('coupons.coupons') !!}
                                </a>

                            </li>
                        </ul>
                        <!-- end: coupons -->
                    </li>
                </ul>
            @endcan
            <!-- end: coupons -->

            <!-- begin: faqs -->
            @can('faqs')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="la la-question"></i>
                            <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.faqs') !!}</span>
                            <span
                                class="badge badge badge-info badge-pill float-right mr-2">{!! $faqs_count !!}</span>
                        </a>
                        <!-- begin: faqs -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'faqs')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.faqs.index') !!}" data-i18n="nav.dash.faqs">
                                    {!! __('faqs.faqs') !!}
                                </a>

                            </li>
                        </ul>
                        <!-- end: faqs -->
                    </li>
                </ul>
            @endcan
            <!-- end: faqs -->

            <!-- begin: products -->

            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="#">
                        <i class="la la-cart-arrow-down"></i>
                        <span class="menu-title" data-i18n="nav.dash.products">{!! __('dashboard.products') !!}</span>
                    </a>
                    <!-- begin: faqs -->
                    <ul class="menu-content">
                        @can('attributes')
                            <li class="@if (str_contains(url()->current(), 'attributes')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.attributes.index') !!}" data-i18n="nav.dash.attributes">
                                    {!! __('attributes.attributes') !!}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            </ul>

            <!-- end: products -->



        </div>
    </div>
