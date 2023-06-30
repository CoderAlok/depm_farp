@extends('layouts.app')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Dashboard
                <sup class="badge badge-primary fw-500">*</sup>
            </h1>
            <div class="subheader-block">All the exporter details are listed here.</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Welcome, {{ $data->name ?? '' }}</h2>
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
                        <form action="{{ '' }}" method="post">
                            <div class="form-group">
                                <label for="">Old password</label>
                                <input type="password" class="form-control" name="" id=""
                                    placeholder="Enter old password">
                            </div>
                            <div class="form-group">
                                <label for="">New password</label>
                                <input type="password" class="form-control" name="" id=""
                                    placeholder="Enter new password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm new password</label>
                                <input type="password" class="form-control" name="" id=""
                                    placeholder="Confirm new password">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-info" name="" id=""
                                    value="Reset password">
                            </div>
                        </form>
                        <!-- Main content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
