@extends('layouts.app')

@section('content')
    <!-- BEGIN Page Content -->
    <!-- the #js-page-content id is needed for some plugins to initialize -->
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i>
                Dashboard
                <sup class="badge badge-primary fw-500">+</sup>
            </h1>
            <div class="subheader-block">
                All the application details
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                Welcome,  {{ Auth::guard('exporter')->user()->name }}
            </div>
        </div>
    </main>
    <!-- this overlay is activated only when mobile menu is triggered -->
@endsection
