<!DOCTYPE html>
<!--
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.0
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>
        {{ $page_title ?? '' }}
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/vendors.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/app.bundle.css') }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <!-- Optional: page related CSS-->
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/fa-brands.css') }}">
</head>

<body>
    <div class="page-wrapper">
        <div class="page-inner bg-brand-gradient">
            <div class="page-content-wrapper bg-transparent m-0">
                <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                    <div class="d-flex align-items-center container p-0">
                        <div
                            class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                            <a href="javascript:void(0)"
                                class="page-logo-link press-scale-down d-flex align-items-center">
                                <img src="{{ asset('img/logo.png') }}" alt="SmartAdmin WebApp"
                                    aria-roledescription="logo">
                                <span class="page-logo-text mr-1">FARM WebApp</span>
                            </a>
                        </div>
                        <a href="{{ route('register') }}" class="btn-link text-white ml-auto">Create Account</a>
                    </div>
                </div>
                <div class="flex-1"
                    style="background: url({{ asset('img/svg/pattern-1.svg') }}) no-repeat center bottom fixed; background-size: cover;">
                    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                        <div class="row">
                            <div class="col col-md-6 col-lg-7 hidden-sm-down">
                                <h2 class="fs-xxl fw-500 mt-4 text-white">
                                    FARP : Financial Assistance Reimbursement Programme
                                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..
                                    </small>
                                </h2>
                                <a href="#" class="fs-lg fw-500 text-white opacity-70">Learn more &gt;&gt;</a>
                                <div class="d-sm-flex flex-column align-items-center justify-content-center d-md-block">
                                    <div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">
                                        Find us on social media
                                    </div>
                                    <div class="d-flex flex-row opacity-70">
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-google-plus-square"></i>
                                        </a>
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                                <div class="card p-4 rounded-plus bg-faded">

                                    <ul class="nav nav-pills justify-content-center" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                href="#js_change_pill_direction-1">Exporter</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="#js_change_pill_direction-2">User</a></li>
                                    </ul>
                                    <div class="tab-content py-3">
                                        <div class="tab-pane fade show active" id="js_change_pill_direction-1"
                                            role="tabpanel">
                                            <form id="exporter-login-form" name="exporter-login-form" novalidate=""
                                                action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="type" value="1" id="typeUser">
                                                <div class="form-group">
                                                    <label class="form-label" for="username">Username</label>
                                                    <input type="email" id="email" name="email"
                                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                        placeholder="your id or email" value="{{ old('email') }}"
                                                        autocomplete="email" autofocus required>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="help-block">Your unique username to app</div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password" id="password"
                                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                        name="password" autocomplete="current-password"
                                                        placeholder="password" value="password123" required>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="help-block">Your password</div>
                                                </div>
                                                <div class="form-group text-left">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="remember" id="remember"
                                                            {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="rememberme"> Remember
                                                            me for the next 30 days</label>
                                                    </div>
                                                </div>
                                                <div class="row no-gutters">
                                                    <div class="col-lg-6 pr-lg-1 my-2">
                                                        <button type="button"
                                                            class="btn btn-info btn-block btn-lg">Sign in with <i
                                                                class="fab fa-google"></i></button>
                                                    </div>
                                                    <div class="col-lg-6 pl-lg-1 my-2">
                                                        <button id="js-login-btn" type="submit"
                                                            class="btn btn-danger btn-block btn-lg">Secure
                                                            {{ __('Login') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="js_change_pill_direction-2" role="tabpanel">
                                            <form id="user-login-form" name="user-login-form" novalidate=""
                                                action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="type" value="2" id="typeUser">
                                                <div class="form-group">
                                                    <label class="form-label" for="username">Username</label>
                                                    <input type="email" id="email" name="email"
                                                        class="form-control form-control-lg"
                                                        placeholder="your id or email"
                                                        value="drlantern@gotbootstrap.com" required>
                                                    <div class="invalid-feedback">No, you missedd this one.</div>
                                                    <div class="help-block">Your unique username to app</div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password" id="password" name="password"
                                                        class="form-control form-control-lg" placeholder="password"
                                                        value="password123" required>
                                                    <div class="invalid-feedback">Sorry, you missed this one.</div>
                                                    <div class="help-block">Your password</div>
                                                </div>
                                                <div class="form-group text-left">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="rememberme">
                                                        <label class="custom-control-label" for="rememberme"> Remember
                                                            me for the next 30 days</label>
                                                    </div>
                                                </div>
                                                <div class="row no-gutters">
                                                    <div class="col-lg-6 pr-lg-1 my-2">
                                                        <button type="button"
                                                            class="btn btn-info btn-block btn-lg">Sign in with <i
                                                                class="fab fa-google"></i></button>
                                                    </div>
                                                    <div class="col-lg-6 pl-lg-1 my-2">
                                                        <button id="js-login-btn" type="submit"
                                                            class="btn btn-danger btn-block btn-lg">Secure
                                                            login</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                            2023 © OASYS by&nbsp;<a href='https://oasystspl.com/' class='text-white opacity-40 fw-500'
                                title='Oasys' target='_blank'>https://oasystspl.com/</a>

                            {{-- Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    <script src="{{ asset('js/vendors.bundle.js') }}"></script>
    <script src="{{ asset('js/app.bundle.js') }}"></script>
    <script>
        $("#js-login-btn").click(function(event) {

            // Fetch form to apply custom Bootstrap validation
            var form = $("#js-login")

            if (form[0].checkValidity() === false) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.addClass('was-validated');
            // Perform ajax submit here...
        });
    </script>

    <style>
        .page-inner {
            background: linear-gradient(to top, #4ad4c5 0%, #3772FF 100%) !important;
        }
    </style>
</body>

</html>
