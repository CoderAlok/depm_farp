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
        {{-- <div class="row">
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
        </div> --}}

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>User
                            <button type="button" class="ml-3 badge badge-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Add User
                            </button>
                        </h2>
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
                                            <td>
                                                {{-- <button type="button" class="ml-3 badge badge-primary" data-toggle="modal"
                                                    data-target="#edit_user_modal">
                                                    Edit
                                                </button> --}}
                                                <a class="btn btn-info btn-lg edit-user" data-toggle="modal"
                                                    data-target="#edit_user_modal" data-id="{{ $value->id }}">edit</a>
                                            </td>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" name="user_add_modal_form" id="user_add_modal_form" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select name="role_id" id="role_id" class="form-control" required>
                                <option value="">Select one</option>
                                @foreach ($roles as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value=""
                                placeholder="Your first name" />
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value=""
                                placeholder="Your last name" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value=""
                                placeholder="Your email address" />
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value=""
                                placeholder="Your user name" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" value=""
                                placeholder="**********" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control" value=""
                                placeholder="Your phone number" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" name="user_edit_modal_form" id="user_edit_modal_form" method="post">
                    {{-- @csrf --}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_role_id">Role</label>
                            <input type="hidden" name="edit_user_id" id="edit_user_id" value="" />
                            <select name="edit_role_id" id="edit_role_id" class="form-control" required>
                                <option value="">Select one</option>
                                @foreach ($roles as $key => $item)
                                    <option value="{{ $key }}">
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_first_name">First Name</label>
                            <input type="text" name="edit_first_name" id="edit_first_name" class="form-control"
                                value="" placeholder="Your first name" />
                        </div>
                        <div class="form-group">
                            <label for="edit_last_name">Last Name</label>
                            <input type="text" name="edit_last_name" id="edit_last_name" class="form-control"
                                value="" placeholder="Your last name" />
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="email" name="edit_email" id="edit_email" class="form-control" value=""
                                placeholder="Your email address" />
                        </div>
                        <div class="form-group">
                            <label for="edit_username">Username</label>
                            <input type="text" name="edit_username" id="edit_username" class="form-control"
                                value="" placeholder="Your user name" />
                        </div>
                        {{-- <div class="form-group">
                            <label for="edit_password">Password</label>
                            <input type="password" name="edit_password" id="edit_password" class="form-control"
                                value="" placeholder="**********" />
                        </div> --}}
                        <div class="form-group">
                            <label for="edit_phone">Phone</label>
                            <input type="tel" name="edit_phone" id="edit_phone" class="form-control" value=""
                                placeholder="Your phone number" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @routes
    <script>
        $(document).ready((e) => {
            // Add models
            $('#user_add_modal_form').on('submit', (e) => {
                $.ajax({
                    type: "post",
                    url: route('admin.users.add'),
                    data: $('#user_add_modal_form').serialize(),
                    dataType: "json",
                    success: function(data) {
                        iziToast.success({
                            title: 'Success',
                            message: data.message,
                            position: 'topRight',
                        });
                        window.location.reload();
                    },
                });
            })

            // Edit model called
            $("body").on("click", ".edit-user", function(e) {
                e.preventDefault();
                var id = $(this).attr("data-id");

                console.log('ID : ' + id);
                $.ajax({
                    type: 'post',
                    url: route('admin.users.show'),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        console.log(data);
                        // console.log(data.data.status);
                        $('#edit_user_id').val(data.data.id);
                        $('#edit_role_id').val(data.data.role_id);
                        $('#edit_first_name').val(data.data.first_name);
                        $('#edit_last_name').val(data.data.last_name);
                        $('#edit_email').val(data.data.email);
                        $('#edit_username').val(data.data.username);
                        // $('#edit_password').val(data.data.password);
                        $('#edit_phone').val(data.data.phone);
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });

            // Edit modal update
            $('#user_edit_modal_form').on('submit', (e) => {
                $.ajax({
                    type: "post",
                    url: route('admin.users.edit'),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: $('#user_edit_modal_form').serialize(),
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        iziToast.success({
                            title: 'Success',
                            message: data.message,
                            position: 'topRight',
                        });
                        window.location.reload();
                    },
                });
            })
        });
    </script>
@endsection
