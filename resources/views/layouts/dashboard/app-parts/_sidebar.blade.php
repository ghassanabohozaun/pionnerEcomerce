    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <!-- begin: Dashboard -->
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="index.html">
                        <i class="la la-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{!! __('dashboard.dashboard') !!}</span>
                        <span class="badge badge badge-info badge-pill float-right mr-2">3</span>
                    </a>

                    <ul class="menu-content">
                        <li class=""><a class="menu-item" href="dashboard-ecommerce.html"
                                data-i18n="nav.dash.ecommerce">eCommerce</a>
                        </li>
                    </ul>
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
                                <a class="menu-item" href="{!! route('dashboard.roles.create') !!}" data-i18n="nav.dash.roles">
                                    {!! __('roles.create_new_role') !!}
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
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                        </a>
                        <!-- begin: admins -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'admins')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.admins.index') !!}" data-i18n="nav.dash.admins">
                                    {!! __('admins.admins') !!}
                                </a>

                            </li>

                            <li class="@if (str_contains(url()->current(), 'admins')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.admins.create') !!}" data-i18n="nav.dash.admins">
                                    {!! __('admins.create_new_admin') !!}
                                </a>
                            </li>
                        </ul>
                        <!-- end: admins -->
                    </li>
                </ul>
            @endcan
            <!-- end: roles -->


            <!-- begin: brands -->
            @can('brands')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="la la-user"></i>
                            <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.brands') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                        </a>
                        <!-- begin: brands -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'brands')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.brands.index') !!}" data-i18n="nav.dash.brands">
                                    {!! __('brands.brands') !!}
                                </a>

                            </li>

                            <li class="@if (str_contains(url()->current(), 'brands')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.brands.create') !!}" data-i18n="nav.dash.brands">
                                    {!! __('brands.create_new_brand') !!}
                                </a>
                            </li>
                        </ul>
                        <!-- end: brands -->
                    </li>
                </ul>
            @endcan
            <!-- end: roles -->

            <!-- begin: categories -->
            @can('categories')
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="#">
                            <i class="la la-user"></i>
                            <span class="menu-title" data-i18n="nav.dash.brand">{!! __('dashboard.categories') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                        </a>
                        <!-- begin: categories -->
                        <ul class="menu-content">
                            <li class="@if (str_contains(url()->current(), 'categories')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.categories.index') !!}" data-i18n="nav.dash.categories">
                                    {!! __('categories.categories') !!}
                                </a>

                            </li>

                            <li class="@if (str_contains(url()->current(), 'categories')) active @endif">
                                <a class="menu-item" href="{!! route('dashboard.categories.create') !!}" data-i18n="nav.dash.categories">
                                    {!! __('categories.create_new_category') !!}
                                </a>
                            </li>
                        </ul>
                        <!-- end: categories -->
                    </li>
                </ul>
            @endcan
            <!-- end: roles -->

        </div>
    </div>
