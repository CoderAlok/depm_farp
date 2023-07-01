@extends('admin.layouts.app')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Profile
                <sup class="badge badge-primary fw-500">*</sup>
            </h1>
            <div class="subheader-block">User profile details are listed here.</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Welcome, {{ Auth::user()->first_name ?? '' }} {{ Auth::user()->last_name ?? '' }}</h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <!-- Main content starts here -->
                        <div class="mb-4 row">
                            <div class="col-md-4">
                                <h6>Name </h6>
                                <b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</b>
                            </div>
                            <div class="col-md-4">
                                <h6>Email</h6>
                                <b>{{ Auth::user()->email }}</b>
                            </div>
                            <div class="col-md-4">
                                <h6>Phone</h6>
                                <b>{{ Auth::user()->phone }}</b>
                            </div>
                        </div>
                        <!-- Main content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
