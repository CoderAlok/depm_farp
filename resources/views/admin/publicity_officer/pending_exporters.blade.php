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
                                            <h2>Application Details</h2>
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
                                                <table id="table" class="table table-responsive" style="width:100%">
                                                    <thead>
                                                        <th>ID</th>
                                                        <th>Type</th>
                                                        <th>Category</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </thead>

                                                    <tbody>
                                                        @php
                                                            $type = ['', '', '', '', '', '', 'Merchant', 'Manufacturer'];
                                                            $reg_status = ['Pending', 'Approved', 'Rejected'];
                                                            $reg_status_color = ['warning', 'success', 'danger'];
                                                        @endphp
                                                        @foreach ($exporters as $key => $item)
                                                            <tr>
                                                                <td width="5%">{{ ++$key }}</td>
                                                                <td width="20%">{{ $type[$item->role_id] }}</td>
                                                                <td width="20%">{{ $item->get_category_details->name }}
                                                                </td>
                                                                <td width="20%">{{ $item->name }}</td>
                                                                <td width="60%">{{ $item->email }}</td>
                                                                <td width="10%"
                                                                    class="text-{{ $reg_status_color[$item->regsitration_status] }}">
                                                                    {{ $reg_status[$item->regsitration_status] }}</td>
                                                                <td width="5%">
                                                                    {{-- <a class="edit-user p-3 btn btn-info view_exporter"
                                                                        data-toggle="modal" data-target="#viewmodal"
                                                                        data-id="{{ $item->id }}">
                                                                        <i class="fa fa-address-book-o"
                                                                            aria-hidden="true"></i>
                                                                    </a> --}}

                                                                    <a class="edit-user p-3 btn btn-info view_exporter"
                                                                        href="{{ route('exporter.details', ['id' => $item->id]) }}">
                                                                        <i class="fa fa-address-book-o"
                                                                            aria-hidden="true"></i>
                                                                    </a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /END ROW -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @routes
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

        $(document).ready((e) => {
            // Edit model show
            $("body").on("click", ".edit-user", function(e) {
                // e.preventDefault();
                var id = $(this).attr("data-id");

                // console.log('ID : ' + id);
                $.ajax({
                    type: 'get',
                    url: route('exporter.details', id),
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });
        });
    </script>
@endsection
