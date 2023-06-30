@extends('admin.layouts.app')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Roles
                <sup class="badge badge-primary fw-500">+</sup>
            </h1>
            <div class="subheader-block">All the roles details are listed here</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2></h2>
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
                        <div class="panel-container show">
                            <div class="panel-content">
                                <form action="{{ route('admin.roles.add') }}" method="post" id="admin_role_form"
                                    name="admin_role_form">
                                    @csrf
                                    <div class="w-100 mb-3">
                                        <label class="form-label text-uppercase" for="name-f">Role Details
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-success">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                            <input type="text" aria-label="Role Name" class="form-control"
                                                placeholder="Role name" id="role_name" name="role_name" required />
                                        </div>
                                        <span id="role_name_error" class=""></span>
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

                        <div class="panel-container show">
                            <div class="panel-content">
                                <table class="table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($roles as $key => $value)
                                            <tr>
                                                <td>{{ $value->id ?? '' }}</td>
                                                <td>{{ $value->name ?? '' }}</td>
                                                <td><a href="{{ '#' . $value->id }}">Edit</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Main content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    @routes
    <script>
        $('#role_name').on('blur', (e) => {
            let role_name = $('#role_name').val();

            $.ajax({
                type: "get",
                url: route('admin.roles.check'),
                data: {
                    role_name: role_name,
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    // $("#role_name_error").text(data.message);
                    // $("#role_name_error").addClass('text-danger');

                    iziToast.error({
                        title: 'Error',
                        message: data.message,
                        position: 'topRight',
                    });
                },
            });
        });
    </script>
@endsection
