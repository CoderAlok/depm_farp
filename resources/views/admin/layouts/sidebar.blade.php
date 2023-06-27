<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative"
            data-toggle="modal" data-target="#modal-shortcut">
            <img src="{{ asset('img/logo.png') }}" alt="SmartAdmin WebApp" aria-roledescription="logo" />
            <span class="page-logo-text mr-1">Registration - FARP</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>

    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control"
                    tabindex="0" />
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off"
                    data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>

        @switch(Auth::user()->role_id)
            @case(1)
                <ul id="js-nav-menu" class="nav-menu">
                    <li>
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.roles') }}" title="Theme Settings" data-filter-tags="theme settings">
                            <i class="fal fa-cog text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.theme_settings">Roles</span>
                        </a>
                    </li>
                </ul>
            @break

            @case(2)
                <ul id="js-nav-menu" class="nav-menu">
                    <li>
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Application</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Theme Settings" data-filter-tags="theme settings">
                            <i class="fal fa-cog text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.theme_settings">Application Status</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Package Info" data-filter-tags="package info">
                            <i class="fal fa-tag text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.package_info">Login</span>
                        </a>
                    </li>
                    <li class="nav-title text-white">
                        Tools & Components
                    </li>
                </ul>
            @break

            @default
                <ul id="js-nav-menu" class="nav-menu">
                    <li>
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Application</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Theme Settings" data-filter-tags="theme settings">
                            <i class="fal fa-cog text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.theme_settings">Application Status</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Package Info" data-filter-tags="package info">
                            <i class="fal fa-tag text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.package_info">Login</span>
                        </a>
                    </li>
                    <li class="nav-title text-white">
                        Tools & Components
                    </li>
                </ul>
        @endswitch
    </nav>
    <!-- END PRIMARY NAVIGATION -->

    <!-- NAV FOOTER -->
    <div class="nav-footer shadow-top">
        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify"
            class="hidden-md-down">
            <i class="ni ni-chevron-right text-white"></i>
            <i class="ni ni-chevron-right text-white"></i>
        </a>
        <ul class="list-table m-auto nav-footer-buttons">
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                    <i class="fal fa-comments text-white"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                    <i class="fal fa-life-ring text-white"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                    <i class="fal fa-phone text-white"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- END NAV FOOTER -->
</aside>
