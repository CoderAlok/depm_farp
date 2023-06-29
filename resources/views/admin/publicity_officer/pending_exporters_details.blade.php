@extends('admin.layouts.app')

@section('content')
    <!-- BEGIN Page Content -->
    <div class="col p-4 offset-md-3 offset-sm-4 offset-xl-2 offset-1">
        <div class="w-100">
            <div class="w-100 bg-white position-relative rounded regFormBox my-3">
                <h3 class="bg-green text-white text-center py-2 mb-2">
                    Exporters details
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
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <td>Name </td>
                                                        <td>{{ $data->name }}</td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td>Role </td><td>{{ $data->name }}</td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td>Category </td>
                                                        <td>{{ $data->get_category_details->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cheif executive name </td>
                                                        <td>{{ $data->chief_ex_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email </td>
                                                        <td>{{ $data->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Username </td>
                                                        <td>{{ $data->username }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone </td>
                                                        <td>{{ $data->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address </td>
                                                        <td>
                                                            {{ $data->get_address_details->address }},
                                                            {{ $data->get_address_details->post }},
                                                            {{ $data->get_address_details->city }},
                                                            {{ $data->get_address_details->district }},
                                                            {{ $data->get_address_details->pincode }},
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bank Name </td>
                                                        <td>
                                                            {{ $data->get_bank_details->name }}

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Account no. </td>
                                                        <td>
                                                            {{ $data->get_bank_details->account_no }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>IFSC Code. </td>
                                                        <td>
                                                            {{ $data->get_bank_details->ifsc }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cheque image. </td>
                                                        <td>
                                                            <img src="{{ asset('public/storage/images/exporters/' . $data->get_bank_details->cheque_img) }}"
                                                                alt="Cheque image" width="15%">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>IEC </td>
                                                        <td>
                                                            {{ $data->get_other_code_details->iec }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>RCMC </td>
                                                        <td>
                                                            {{ $data->get_other_code_details->rcmc }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>EPC </td>
                                                        <td>
                                                            {{ $data->get_other_code_details->epc }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>URN </td>
                                                        <td>
                                                            {{ $data->get_other_code_details->urn }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>HSN </td>
                                                        <td>
                                                            {{ $data->get_other_code_details->hsm }}
                                                        </td>
                                                    </tr>

                                                    <form
                                                        action="{{ route('admin.publicity.officer.pending.exporters.status') }}"
                                                        method="post" name="pending_approval_form" id="pending_approval_form">
                                                        @csrf
                                                        <tr>
                                                            <td>Approval Status</td>
                                                            <td>
                                                                <input type="hidden" name="exporter_id" id="exporter_id" value="{{ $data->id }}">
                                                                <select name="approval_status" id="approval_status"
                                                                    class="form-control">
                                                                    <option value="1">Approve</option>
                                                                    <option value="2">Reject</option>
                                                                </select>

                                                                <button type="submit" class="btn btn-info sbmt"
                                                                    id="sbmt">Update</button>
                                                                {{-- {{ $data->get_other_code_details->hsm }} --}}
                                                            </td>
                                                        </tr>
                                                    </form>

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
        $(document).ready((e) => {
            // Edit model show
            // $("body").on("click", ".edit-user", function(e) {
            // e.preventDefault();
            // var id = $(this).attr("data-id");

            // console.log('ID : ' + id);
            // $.ajax({
            //     type: 'get',
            //     url: route('exporter.details', id),
            //     success: function(data) {
            //         console.log(data);
            //     },
            //     error: function(error) {
            //         console.log(error)
            //     }
            // });
            // });
        });
    </script>
@endsection
