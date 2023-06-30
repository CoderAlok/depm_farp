@extends('admin.layouts.app')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Registration Page
                <sup class="badge badge-primary fw-500">ADDON</sup>
            </h1>
            <div class="subheader-block">Register to create your account</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Establishment Details</h2>
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
                        {{-- Main content start here --}}
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

                            <form action="{{ route('admin.publicity.officer.pending.exporters.status') }}"
                                method="post" name="pending_approval_form" id="pending_approval_form">
                                @csrf
                                <tr>
                                    <td>Approval Status</td>
                                    <td>
                                        <input type="hidden" name="exporter_id" id="exporter_id"
                                            value="{{ $data->id }}">
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
                        {{-- Main content end here --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
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
