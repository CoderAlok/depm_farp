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

    <!-- additional css -->
    <link rel="stylesheet" href="{{ asset('public/css/welcome-style.css') }}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- bootstrap -->

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .bg-login {
            background-image: url("{{ asset('public/img/inds-2.jpg') }}");
            background-position: center;
            background-size: cover;
            height: auto;
        }
    </style>

</head>

<body>
    <div class="page-wrapper">
        <div class="page-inner">

            <nav class="navbar topbar py-0">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="#">Govt. of Odisha</a>
                        </li>
                    </ul>
                    <ul class="nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa fa-envelope-o"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa fa-bell"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa fa-user-circle-o"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <nav class="navbar main-nav sticky-top navbar-light bg-white">
                <div class="d-flex align-items-center container p-0">
                    <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center">
                        <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                            <img src="{{ asset('public/img/logo.jpg') }}" alt="SmartAdmin WebApp"
                                aria-roledescription="logo" width="60">
                            <div class="mr-1 text-dark">
                                <div class="page-logo-text">Micro, Small & Medium Enterprise Department</div>
                                <div class="page-logo-text-small mr-1">Government of Odisha</div>
                            </div>
                        </a>
                    </div>
                    <a href="{{ route('exporter.register') }}" class="btn btn-sm bg-clr-1 text-white ml-auto">Create Account</a>
                </div>
            </nav>

            <div class="w-100 bg-login py-5 position-relative d-flex align-items-center">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="row">

                        <div class="col col-md-6 col-lg-7 hidden-sm-down">
                            <h3 class="fs-xxl fw-500 mt-4 text-white mb-5">
                                FARP : Financial Assistance Reimbursement Portal<br>
                                <small class="h6 fw-300 mt-3 mb-5 text-white">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat..</small>
                            </h3>

                            <div class="d-flex justify-content-start">
                                <a href="#" class="btn bg-clr-1 text-white fs-lg fw-500 text-white mr-1">MSME</a>
                                <a href="#" class="btn btn-danger fs-lg fw-500 text-white mx-1">DEPM</a>
                                <a href="#" class="btn bg-clr-2 fs-lg fw-500 text-white mx-1">FARP</a>
                            </div>

                            <div
                                class="d-sm-flex flex-column align-items-center justify-content-center d-md-block mb-3">
                                <div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">Find us on social media</div>
                                <div class="d-flex flex-row opacity-70 login-socials">
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fa fa-twitter-square"></i>
                                    </a>
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fa fa-google-plus-square"></i>
                                    </a>
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                            <div class="card p-4 rounded-plus bg-faded">

                                @if (Session::has('message'))
                                    <p class="alert alert-warning">{{ Session::get('message') }}</p>
                                @endif

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
                                            action="{{ route('exporter.login') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="type" value="1" id="typeUser">
                                            <div class="form-group">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" id="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="your id or email" value="{{ old('email') }}"
                                                    autocomplete="email" autofocus required>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" autocomplete="current-password"
                                                    placeholder="password" value="password123" required>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
                                                {{-- <div class="col-lg-6 pr-lg-1 my-2">
                                                    <a type="button" class="btn btn-info btn-block btn-sm"
                                                        href="{{ route('exporter.register') }}">Register</a>
                                                </div> --}}
                                                <div class="col-lg-12 pl-lg-1 my-2">
                                                    <button id="js-login-btn" type="submit"
                                                        class="btn btn-success btn-block btn-sm">{{ __('Login in') }}</button>
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
                                                <input type="text" id="username" name="username"
                                                    class="form-control" placeholder="your id or username"
                                                    value="" required>
                                                <div class="invalid-feedback">No, you missedd this one.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" id="password" name="password"
                                                    class="form-control" placeholder="password" value=""
                                                    required>
                                                <div class="invalid-feedback">Sorry, you missed this one.</div>
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
                                                {{-- <div class="col-lg-6 pr-lg-1 my-2"> --}}
                                                    {{-- <a type="button" class="btn btn-info btn-block btn-sm"
                                                        href="{{ '#' }}">Register</a> --}}
                                                {{-- </div> --}}
                                                <div class="col-lg-12 pl-lg-1 my-2">
                                                    <button id="js-login-btn" type="submit"
                                                        class="btn btn-success btn-block btn-sm">Login in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /row -->
                </div>
            </div>

            <div class="footer-copy d-flex justify-content-center align-items-center text-white w-100 fw-300"
                style="font-size: 12px;background-color: black;">
                2023 © OASYS by&nbsp;<a href='https://oasystspl.com/' class='text-white opacity-40 fw-500'
                    title='Oasys' target='_blank'>https://oasystspl.com/</a>
            </div>
        </div>
    </div>
</body>

</html>
