@extends('admin.layouts.app')

@section('content')
    <!-- BEGIN Page Content -->
    <!-- the #js-page-content id is needed for some plugins to initialize -->
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i>
                Users
                <sup class="badge badge-primary fw-500">ADDON</sup>
            </h1>
            <div class="subheader-block">
                All the users are listed here
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Users Details</h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <form action="{{ route('admin.users.add') }}" method="post" id="admin_user_form"
                                name="admin_user_form">
                                @csrf
                                <div class="w-100 mb-3">
                                    <label class="form-label text-uppercase" for="name-f">User Name
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-success">
                                                <i class="fa fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" aria-label="Establishment Name" class="form-control"
                                            placeholder="User name" id="user_name" name="user_name" />
                                    </div>
                                </div>

                                <div class="w-100 clearfix">
                                    <button type="submit"
                                        class="btn btn-md btn-success waves-effect waves-themed float-right">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>User</h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <table class="table">
                                <thead>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>
                                    @foreach ($users as $key => $value)
                                        <tr>
                                            <td>{{ $value->id ?? '' }}</td>
                                            <td>{{ $value->username ?? '' }}</td>
                                            <td>{{ $value->first_name . ' ' . $value->last_name }}</td>
                                            <td>{{ $value->email ?? '' }}</td>
                                            <td>{{ $value->phone ?? '' }}</td>
                                            <td><a href="{{ '#' . $value->id }}">Edit</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- this overlay is activated only when mobile menu is triggered -->
@endsection
