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
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">

    <!-- External Script libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js">
    </script>

    <style>
        .page-sidebar {
            @switch(Auth::user()->role_id)
                @case(1)

                background: linear-gradient(to top,
                    #4ad4c5 0%,
                    #3772ff 100%) !important;

            @break @case(2)

            background: linear-gradient(to top,
                #996655 0%,
                #3772ff 100%) !important;

        @break @case(3)

        background: linear-gradient(to top,
            #996655 0%,
            #3772ff 100%) !important;

    @break @case(4)

    background: linear-gradient(to top,
        #996655 0%,
        #3772ff 100%) !important;

@break @case(5)

background: linear-gradient(to top,
    #996655 0%,
    #3772ff 100%) !important;

@break @case(7)

background: linear-gradient(to top,
#996655 0%,
#3772ff 100%) !important;

@break @case(10)

background: linear-gradient(to top,
#996655 0%,
#3772ff 100%) !important;
@break @default background: linear-gradient(to top,
#4ad4c5 0%,
#3772ff 100%) !important;
@break
@endswitch
}

</style>




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
<span style="font-size: 20px; color: #444">Welcome to EIRP Portal, DEPM Odisha</span>
    <span style="width: 14rem;height: 3rem;background-color: aquamarine;font-size: 18px;color: #444;font-weight: 600;position:absolute;right: 3.5rem;padding: 12px 0px 0px 10px;margin: 0px 0px 0px 18px;border-bottom-left-radius: 15px;border-top-left-radius: 15px;">    {{ \Spatie\Permission\Models\Role::select('name')->where('id', Auth::user()->role_id)->first()->name ?? '' }}
</span>
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
                <span class="text-truncate text-truncate-md opacity-80">
                    <i>{{ \Spatie\Permission\Models\Role::select('name')->where('id', Auth::user()->role_id)->first()->name ?? '' }}</i>
                </span>
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
@include('admin.layouts.footer')
