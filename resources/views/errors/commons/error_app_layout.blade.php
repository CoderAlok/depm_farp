{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Big Error - Page Views - SmartAdmin v4.0.1
    </title>
    <meta name="description" content="Big Error">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('public/farp1_assets/css/vendors.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('public/farp1_assets/css/app.bundle.css') }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/farp1_assets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/farp1_assets/img/favicon/favicon-32x32.png') }}">
    <link rel="mask-icon" href="{{ asset('public/farp1_assets/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <!-- Optional: page related CSS-->
</head>

<body>
    <!-- BEGIN Page Wrapper -->
    @yield('error_contents')
    <!-- END Page Wrapper -->
    <!-- BEGIN Quick Menu -->
    <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
    {{-- <nav class="shortcut-menu d-none d-sm-block">
        <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
        <label for="menu_open" class="menu-open-button ">
            <span class="app-shortcut-icon d-block"></span>
        </label>
        <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
            <i class="fal fa-arrow-up"></i>
        </a>
        <a href="page_login-alt.html" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
            <i class="fal fa-sign-out"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left"
            title="Full Screen">
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
    </nav> --}}
    <!-- END Quick Menu -->
    <!-- base vendor bundle:
   DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
      + pace.js (recommended)
      + jquery.js (core)
      + jquery-ui-cust.js (core)
      + popper.js (core)
      + bootstrap.js (core)
      + slimscroll.js (extension)
      + app.navigation.js (core)
      + ba-throttle-debounce.js (core)
      + waves.js (extension)
      + smartpanels.js (extension)
      + src/../jquery-snippets.js (core) -->
    <script src="{{ asset('public/farp1_assets/js/vendors.bundle.js') }}"></script>
    <script src="{{ asset('public/farp1_assets/js/app.bundle.js') }}"></script>
</body>

</html>
