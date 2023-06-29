@extends('admin.layouts.app')

@section('content')
    <!-- BEGIN Page Content -->
    <div class="col p-4 offset-md-3 offset-sm-4 offset-xl-2 offset-1">
        <div class="w-100">
            <div class="w-100 bg-white position-relative rounded regFormBox my-3">
                <h3 class="bg-green text-white text-center py-2 mb-2">
                    Dashboard
                </h3>

                <div class="row">
                    <div class="col-xl-12">
                        <div id="panel-1" class="panel">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div id="panel-1" class="panel">
                                        <div class="panel-hdr">
                                            <h2>Catgeories
                                                <button type="button" class="ml-3 badge badge-primary" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    Add Category
                                                </button>
                                            </h2>
                                            <div class="panel-toolbar">
                                                <button class="btn btn-panel" data-action="panel-collapse"
                                                    data-toggle="tooltip" data-offset="0,10"
                                                    data-original-title="Collapse"></button>
                                                <button class="btn btn-panel" data-action="panel-fullscreen"
                                                    data-toggle="tooltip" data-offset="0,10"
                                                    data-original-title="Fullscreen"></button>
                                                <button class="btn btn-panel" data-action="panel-close"
                                                    data-toggle="tooltip" data-offset="0,10"
                                                    data-original-title="Close"></button>
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
                                                        @if (isset($category))
                                                            @foreach ($category as $value)
                                                                <tr>
                                                                    <td>{{ $value->id ?? '' }}</td>
                                                                    <td>{{ $value->name ?? '' }}</td>
                                                                    <td>
                                                                        <a class="btn btn-info btn-lg edit-user"
                                                                            data-toggle="modal"
                                                                            data-target="#edit_user_modal"
                                                                            data-id="{{ $value->id }}">edit</a>
                                                                        <button type="button" id="delete_cat"
                                                                            data-id="{{ $value->id }}"
                                                                            class="btn btn-danger btn-lg delete-user delete_cat"><i
                                                                                class="glyphicon
                                                                            glyphicon-trash"></i>
                                                                            Delete</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td>
                                                                    <p>No Data</p>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /END ROW -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" name="user_add_modal_form" id="user_add_modal_form" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cat_name">Name</label>
                            <input type="text" name="cat_name" id="cat_name" class="form-control" value=""
                                placeholder="Category name" />
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Select one</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" name="user_edit_modal_form" id="user_edit_modal_form" method="post">
                    {{-- @csrf --}}
                    <div class="modal-body">
                        <input type="hidden" name="edit_cat_id" id="edit_cat_id" value="" />
                        <div class="form-group">
                            <label for="edit_cat_name">Name</label>
                            <input type="text" name="edit_cat_name" id="edit_cat_name" class="form-control"
                                value="" placeholder="Category name" />
                        </div>
                        <div class="form-group">
                            <label for="edit_status">Status</label>
                            <select name="edit_status" id="edit_status" class="form-control" required>
                                <option value="">Select one</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
                    url: route('admin.category.store'),
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

            // Edit model show
            $("body").on("click", ".edit-user", function(e) {
                e.preventDefault();
                var id = $(this).attr("data-id");

                // console.log('ID : ' + id);
                $.ajax({
                    type: 'get',
                    url: route('admin.category.show', id),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        $('#edit_cat_id').val(data.data.id);
                        $('#edit_cat_name').val(data.data.name);
                        $('#edit_status').val(data.data.status);
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
                    url: route('admin.category.edit'),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: $('#user_edit_modal_form').serialize(),
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

            // Delete Category
            $("body").on("click", "#delete_cat", function(e) {
                e.preventDefault();
                var id = $(this).attr("data-id");
                let url = route('admin.category.delete', id);
                Swal.fire({
                    title: "Do you really want to delete?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Confirm"
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: url,
                            method: "GET",
                            success: function(data) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal("Cancelled", "Your data is safe :)", "error");
                    }
                });
            });
        });
    </script>
@endsection
