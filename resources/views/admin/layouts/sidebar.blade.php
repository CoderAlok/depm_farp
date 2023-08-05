<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative"
            data-toggle="modal" data-target="#modal-shortcut">
            <img src="{{ asset('public/img/DEPM.png') }}" alt="SmartAdmin WebApp" aria-roledescription="logo"
                style="width:80%" />
            <span class="page-logo-text mr-1"></span>
            {{-- <span class="page-logo-text mr-1">EIRP</span> --}}
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
                    <li class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'admin.schemes' ? 'active' : '' }}">
                        <a href="{{ route('admin.schemes') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Schemes</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'admin.users' ? 'active' : '' }}">
                        <a href="{{ route('admin.users') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">User</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'admin.roles' ? 'active' : '' }}">
                        <a href="{{ route('admin.roles') }}" title="Theme Settings" data-filter-tags="theme settings">
                            <i class="fal fa-cog text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.theme_settings">Roles</span>
                        </a>
                    </li>
                    {{-- <li class="{{ Route::currentRouteName() === 'admin.roles' ? 'active' : '' }}">
                        <a href="{{ route('roles.index') }}" title="Theme Settings" data-filter-tags="theme settings">
                            <i class="fal fa-cog text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.theme_settings">Rolesd</span>
                        </a>
                    </li> --}}
                    <li class="{{ Route::currentRouteName() === 'admin.category' ? 'active' : '' }}">
                        <a href="{{ route('admin.category') }}" title="Theme Settings" data-filter-tags="theme settings">
                            <i class="fal fa-cog text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.theme_settings">Category</span>
                        </a>
                    </li>
                </ul>
            @break

            @case(2)
                <ul id="js-nav-menu" class="nav-menu">
                    <li class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Exporters List</span>
                        </a>
                    </li>
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters.applications' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters.applications') }}"
                            title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Applications List </span>
                            @if (get_pending_list_count_for_admin(2) > 0)
                                <b class="badge badge-danger">{{ get_pending_list_count_for_admin(2) }}</b>
                            @endif
                        </a>
                    </li>
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.sanctioned.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.sanctioned.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Sanctioned Applications</span>
                            @if (get_sanctioned_applied_list_count_for_admin(2) > 0)
                                <b class="badge badge-danger">{{ get_sanctioned_applied_list_count_for_admin(2) }}</b>
                            @endif
                        </a>
                    </li>
                </ul>
            @break

            @case(3)
                <ul id="js-nav-menu" class="nav-menu">
                    <li class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Exporters List</span>
                        </a>
                    </li>
                    {{-- <li
                        class="d-none {{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Pending exporters</span>
                        </a>
                    </li> --}}
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters.applications' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters.applications') }}"
                            title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Applications List </span>
                            @if (get_pending_list_count_for_admin(3) > 0)
                                <b class="badge badge-danger">{{ get_pending_list_count_for_admin(3) }}</b>
                            @endif
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'dir-depm.pending.applied.application' ? 'active' : '' }}">
                        <a href="{{ route('dir-depm.pending.applied.application') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Appealed Applications</span>
                        </a>
                    </li>
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.sanctioned.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.sanctioned.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Sanctioned Applications</span>
                            @if (get_sanctioned_applied_list_count_for_admin(3) > 0)
                                <b class="badge badge-danger">{{ get_sanctioned_applied_list_count_for_admin(3) }}</b>
                            @endif
                        </a>
                    </li>
                </ul>
            @break

            @case(4)
                <ul id="js-nav-menu" class="nav-menu">
                    <li class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Exporters List</span>
                        </a>
                    </li>
                    {{-- <li
                        class="d-none {{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Pending exporters</span>
                        </a>
                    </li> --}}
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters.applications' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters.applications') }}"
                            title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Applications List</span>
                            @if (get_pending_list_count_for_admin(4) > 0)
                                <b class="badge badge-danger">{{ get_pending_list_count_for_admin(4) }}</b>
                            @endif
                        </a>
                    </li>
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.sanctioned.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.sanctioned.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Sanctioned Applications</span>
                            @if (get_sanctioned_applied_list_count_for_admin(4) > 0)
                                <b class="badge badge-danger">{{ get_sanctioned_applied_list_count_for_admin(4) }}</b>
                            @endif
                        </a>
                    </li>
                </ul>
            @break

            @case(5)
                <ul id="js-nav-menu" class="nav-menu">
                    <li class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Exporters List</span>
                        </a>
                    </li>
                    {{-- <li
                        class="d-none {{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Pending exporters</span>
                        </a>
                    </li> --}}
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters.applications' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters.applications') }}"
                            title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Applications List</span>
                            @if (get_pending_list_count_for_admin(5) > 0)
                                <b class="badge badge-danger">{{ get_pending_list_count_for_admin(5) }}</b>
                            @endif
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'dept-sectry.pending.applied.application' ? 'active' : '' }}">
                        <a href="{{ route('dept-sectry.pending.applied.application') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Pending appealed list</span>
                            {{-- <b>{{ get_pending_applied_list_count_for_admin }}</b> --}}
                        </a>
                    </li>
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.sanctioned.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.sanctioned.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Sanctioned Applications</span>
                            @if (get_sanctioned_applied_list_count_for_admin(5) > 0)
                                <b class="badge badge-danger">{{ get_sanctioned_applied_list_count_for_admin(5) }}</b>
                            @endif
                        </a>
                    </li>
                </ul>
            @break

            @case(7)
                <ul id="js-nav-menu" class="nav-menu">
                    <li class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Exporters List</span>
                        </a>
                    </li>
                    {{-- <li
                        class="d-none {{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Pending exporters</span>
                        </a>
                    </li> --}}
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters.applications' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters.applications') }}"
                            title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Sanctioned Applications</span>
                            @if (get_sanctioned_applied_list_count_for_admin(7) > 0)
                                <b class="badge badge-danger">{{ get_sanctioned_applied_list_count_for_admin(7) }}</b>
                            @endif
                        </a>
                    </li>
                </ul>
            @break

            @case(10)
                <ul id="js-nav-menu" class="nav-menu">
                    <li class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Pending exporters</span>
                        </a>
                    </li> --}}
                    <li
                        class="d-none {{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" title="Application Intel"
                            data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Pending exporters</span>
                        </a>
                    </li>
                    <li
                        class="{{ Route::currentRouteName() === 'admin.publicity.officer.pending.exporters.applications' ? 'active' : '' }}">
                        <a href="{{ route('admin.publicity.officer.pending.exporters.applications') }}"
                            title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Applications List</span>
                        </a>
                    </li>
                </ul>
            @break

            @default
                <ul id="js-nav-menu" class="nav-menu">
                    <li class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" title="Application Intel" data-filter-tags="application intel">
                            <i class="fal fa-info-circle text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel">Application</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" title="Theme Settings" data-filter-tags="theme settings">
                            <i class="fal fa-cog text-white"></i>
                            <span class="nav-link-text" data-i18n="nav.theme_settings">Application Status</span>
                        </a>
                    </li>
                    <li class="">
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
