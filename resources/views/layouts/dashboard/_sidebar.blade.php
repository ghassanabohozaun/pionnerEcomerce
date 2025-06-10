    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <!-- begin: Dashboard -->
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title"
                            data-i18n="nav.dash.main">{!! __('dashboard.dashboard') !!}</span><span
                            class="badge badge badge-info badge-pill float-right mr-2">3</span></a>

                    <ul class="menu-content">
                        <li class="active"><a class="menu-item" href="dashboard-ecommerce.html"
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
                        <a href="index.html">
                            <i class="la la-lock"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">{!! __('dashboard.roles') !!}</span>
                            {{-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> --}}
                        </a>
                        <!-- begin: ceCommerce -->
                        <ul class="menu-content">
                            <li class="">
                                <a class="menu-item" href="{!! route('dashboard.roles.index') !!}" data-i18n="nav.dash.roles">
                                    {!! __('roles.roles') !!}
                                </a>
                                <a class="menu-item" href="{!! route('dashboard.roles.create') !!}" data-i18n="nav.dash.roles">
                                    {!! __('roles.create_new_role') !!}
                                </a>
                            </li>
                        </ul>
                        <!-- end: eCommerce -->
                    </li>
                </ul>
            @endcan
            <!-- end: roles -->

        </div>
    </div>
