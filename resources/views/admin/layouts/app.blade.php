<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>{{ $page_title ?? '' }}</title>
    <meta name="description" content="Page Titile" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui" />

    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no" />

    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('public/farp1_assets/img/favicon/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('public/farp1_assets/img/favicon/faxvicon-32x32.png') }}" />
    <link rel="mask-icon" href="{{ asset('public/farp1_assets/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5" />
    <!--<link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('public/farp1_assets/css/vendors.bundle.css') }}" />
    <link rel="stylesheet" media="screen, print" href="{{ asset('public/farp1_assets/css/app.bundle.css') }}" />
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('public/farp1_assets/css/notifications/toastr/toastr.css') }}" />
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('public/farp1_assets/css/datagrid/datatables/datatables.bundle.css') }}">


    <!-- External Script libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js">
    </script>


</head>

<body class="mod-bg-1">
    <script>
        /**
         *	This script should be placed right after the body tag for fast execution
         *	Note: the script is written in pure javascript and does not depend on thirdparty library
         **/
        "use strict";

        var classHolder = document.getElementsByTagName("BODY")[0],
            /**
             * Load from localstorage
             **/
            themeSettings = localStorage.getItem("themeSettings") ?
            JSON.parse(localStorage.getItem("themeSettings")) : {},
            themeURL = themeSettings.themeURL || "",
            themeOptions = themeSettings.themeOptions || "";
        /**
         * Load theme options
         **/
        if (themeSettings.themeOptions) {
            classHolder.className = themeSettings.themeOptions;
            console.log("%c✔ Theme settings loaded", "color: #148f32");
        } else {
            console.log(
                "Heads up! Theme settings is empty or does not exist, loading default settings..."
            );
        }
        if (themeSettings.themeURL && !document.getElementById("mytheme")) {
            var cssfile = document.createElement("link");
            cssfile.id = "mytheme";
            cssfile.rel = "stylesheet";
            cssfile.href = themeURL;
            document.getElementsByTagName("head")[0].appendChild(cssfile);
        }
        /**
         * Save to localstorage
         **/
        var saveSettings = function() {
            themeSettings.themeOptions = String(classHolder.className)
                .split(/[^\w-]+/)
                .filter(function(item) {
                    return /^(nav|header|mod|display)-/i.test(item);
                })
                .join(" ");
            if (document.getElementById("mytheme")) {
                themeSettings.themeURL = document
                    .getElementById("mytheme")
                    .getAttribute("href");
            }
            localStorage.setItem(
                "themeSettings",
                JSON.stringify(themeSettings)
            );
        };
        /**
         * Reset settings
         **/
        var resetSettings = function() {
            localStorage.setItem("themeSettings", "");
        };
    </script>

    <!-- BEGIN Page Wrapper -->
    <div class="page-wrapper">
        <div class="page-inner">
            <!-- BEGIN Left Aside -->
            @include('admin.layouts.sidebar')
            <!-- END Left Aside -->

            <div class="page-content-wrapper">
                <!-- BEGIN Page Header -->
                <header class="page-header" role="banner">
                    <div class="ml-auto d-flex">
                        <!-- app user menu -->
                        <div>
                            <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com"
                                class="header-icon d-flex align-items-center justify-content-center ml-2 bg-success">
                                <i class="fa fa-user rounded-circle profile-image"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                    <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                        <span class="mr-2">
                                            <i class="fa fa-user rounded-circle profile-image"></i>
                                        </span>
                                        <div class="info-card-text">
                                            <div class="fs-lg text-truncate text-truncate-lg">
                                                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                            </div>
                                            <span
                                                class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider m-0"></div>
                                <a href="{{ route('admin.profile') }}" class="dropdown-item">
                                    <span data-i18n="drpdwn.reset_layout">Profile</span>
                                </a>
                                <div class="dropdown-divider m-0"></div>
                                <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                    <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                                    <i class="float-right text-muted fw-n">F11</i>
                                </a>
                                <a href="#" class="dropdown-item" data-action="app-print">
                                    <span data-i18n="drpdwn.print">Print</span>
                                    <i class="float-right text-muted fw-n">Ctrl + P</i>
                                </a>
                                <div class="dropdown-divider m-0"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- END Page Header -->

                @yield('content')
                <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
                <!-- END Page Content -->
                <!-- BEGIN Page Footer -->
                <footer class="page-footer" role="contentinfo">
                    <div class="d-flex align-items-center flex-1 text-muted">
                        <span class="hidden-md-down fw-700">2019 © SmartAdmin by&nbsp;<a
                                href="https://www.gotbootstrap.com" class="text-primary fw-500"
                                title="gotbootstrap.com" target="_blank">gotbootstrap.com</a></span>
                    </div>
                    <div>
                        <ul class="list-table m-0">
                            <li>
                                <a href="" class="text-secondary fw-700">About</a>
                            </li>
                            <li class="pl-3">
                                <a href="info_app_licensing.html" class="text-secondary fw-700">License</a>
                            </li>
                            <li class="pl-3">
                                <a href="info_app_docs.html" class="text-secondary fw-700">Documentation</a>
                            </li>
                            <li class="pl-3 fs-xl">
                                <a href="https://wrapbootstrap.com/user/MyOrange" class="text-secondary"
                                    target="_blank"><i class="fal fa-question-circle" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </footer>
                <!-- END Page Footer -->
                <!-- BEGIN Shortcuts -->
                <!-- modal shortcut -->
                <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog"
                    aria-labelledby="modal-shortcut" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <ul class="app-list w-auto h-auto p-0 text-left">
                                    <li>
                                        <a href="intel_introduction.html"
                                            class="app-list-item text-white border-0 m-0">
                                            <div class="icon-stack">
                                                <i class="base base-7 icon-stack-3x opacity-100 color-primary-500"></i>
                                                <i class="base base-7 icon-stack-2x opacity-100 color-primary-300"></i>
                                                <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                                            </div>
                                            <span class="app-list-name">
                                                Home
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_inbox_general.html"
                                            class="app-list-item text-white border-0 m-0">
                                            <div class="icon-stack">
                                                <i class="base base-7 icon-stack-3x opacity-100 color-success-500"></i>
                                                <i class="base base-7 icon-stack-2x opacity-100 color-success-300"></i>
                                                <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                            </div>
                                            <span class="app-list-name">
                                                Inbox
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="intel_introduction.html"
                                            class="app-list-item text-white border-0 m-0">
                                            <div class="icon-stack">
                                                <i class="base base-7 icon-stack-2x opacity-100 color-primary-300"></i>
                                                <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
                                            </div>
                                            <span class="app-list-name">
                                                Add More
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Shortcuts -->
            </div>
        </div>
    </div>
    <!-- END Page Wrapper -->
    <!-- BEGIN Quick Menu -->
    <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
    <nav class="shortcut-menu d-none d-sm-block">
        <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
        <label for="menu_open" class="menu-open-button">
            <span class="app-shortcut-icon d-block"></span>
        </label>
        <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
            <i class="fal fa-arrow-up"></i>
        </a>
        <a href="page_login-alt.html" class="menu-item btn" data-toggle="tooltip" data-placement="left"
            title="Logout">
            <i class="fal fa-sign-out"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip"
            data-placement="left" title="Full Screen">
            <i class="fal fa-expand"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left"
            title="Print page">
            <i class="fal fa-print"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left"
            title="Voice command">
            <i class="fal fa-microphone"></i>
        </a>
    </nav>
    <!-- END Quick Menu -->

    <!-- BEGIN Page Settings -->
    <div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-right modal-md">
            <div class="modal-content">
                <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                    <h4 class="m-0 text-center color-white">
                        Layout Settings
                        <small class="mb-0 opacity-80">User Interface Settings</small>
                    </h4>
                    <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="settings-panel">
                        <div class="mt-4 d-table w-100 px-5">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">App Layout</h5>
                            </div>
                        </div>
                        <div class="list" id="fh">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="header-function-fixed"></a>
                            <span class="onoffswitch-title">Fixed Header</span>
                            <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                        </div>
                        <div class="mt-4 d-table w-100 px-5">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">Mobile Menu</h5>
                            </div>
                        </div>
                        <div class="list" id="nmp">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="nav-mobile-push"></a>
                            <span class="onoffswitch-title">Push Content</span>
                            <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                        </div>
                        <hr class="mb-0 mt-4" />
                        <div class="pl-5 pr-3 py-3 bg-faded">
                            <div class="row no-gutters">
                                <div class="col-6 pr-1">
                                    <a href="#" class="btn btn-outline-danger fw-500 btn-block"
                                        data-action="app-reset">Reset Settings</a>
                                </div>
                                <div class="col-6 pl-1">
                                    <a href="#" class="btn btn-danger fw-500 btn-block"
                                        data-action="factory-reset">Factory Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span id="saving"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Settings -->

    <script src="{{ asset('public/farp1_assets/js/vendors.bundle.js') }}"></script>
    <script src="{{ asset('public/farp1_assets/js/app.bundle.js') }}"></script>
    <script src="{{ asset('public/farp1_assets/js/notifications/toastr/toastr.js') }}"></script>
    <!-- Datatables  -->
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": 500,
            "hideDuration": 100,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    @yield('scripts')

    <!--<script src="js/../script.js"></script>-->

    <script>
        $(document).ready(function() {

            console.log('Amin: ' + '{{ Session::get('status') }}');

            // iziToast.success({
            //     title: 'Success',
            //     message: 'Success',
            //     position: 'topRight'
            // });

            // iziToast.error({
            //     title: 'Error',
            //     message: data.message,
            //     position: 'topRight',
            // });

            // iziToast.warning({
            //     title: 'Caution',
            //     message: 'Caution',
            //     position: 'topRight',
            // });
        });
    </script>

    <style>
        .page-sidebar {
            background: linear-gradient(to top,
                    #4ad4c5 0%,
                    #3772ff 100%) !important;
        }
    </style>
</body>

</html>
