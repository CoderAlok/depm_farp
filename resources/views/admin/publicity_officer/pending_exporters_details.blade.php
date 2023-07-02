@extends('admin.layouts.app')

@section('content')
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('public/farp1_assets/css/miscellaneous/lightgallery/lightgallery.bundle.css') }}">
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i>Exporter Details  
                <sup class="badge badge-primary fw-500">*</sup>
            </h1>
            <div class="subheader-block">All The details regarding exporters are listed here.</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Application No : <b class="text-uppercase font-size-600">{{ $data->app_no ?? '' }}</b></h2>
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
                        <div class="mt-4 mb-4 row">
                            <div class="col-md-4">
                                <h6>1. Type of Exporter</h6>
                                @php
                                    $role_name = ['', 'Super Admin', 'Publicity Officer', 'Director of DEPM', 'MSME Department', 'Principal Secretary', 'Exporters, Merchant', 'Exporters, Manufacturer'];
                                @endphp
                                <b>{{ $role_name[$data->role_id] ?? '' }}</b>
                            </div>
                            <div class="col-md-4">
                                <h6>2. Choose Category</h6>
                                <b>{{ $data->get_category_details->name ?? '' }}</b>
                            </div>
                            <div class="col-md-4">
                                <h6>3. Name of Exporter</h6>
                                <b>{{ $data->name ?? '' }}</b>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6>4. Name of the chief executive</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Name : </label>
                                    <b>{{ $data->chief_ex_name ?? '' }}</b>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Mobile : </label>
                                    <b>{{ $data->phone ?? '' }}</b>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">E-Mail : </label>
                                    {{ $data->email ?? '' }}
                                </div>
                            </div>
                        </div>


                        <div class="mb-4">
                            <h6>5. Registered Office Address</h6>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label">At : </label>
                                    <b>{{ $data->get_address_details->address ?? '' }}</b>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Post : </label>
                                    {{ $data->get_address_details->post ?? '' }}
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">City : </label>
                                    {{ $data->get_address_details->city ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">District : </label>
                                    {{ $data->get_address_details->get_district_details->name ?? '' }}
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">PIN : </label>
                                    <b>{{ $data->get_address_details->pincode ?? '' }}</b>
                                </div>
                                <div class="col-md-4">
                                    &nbsp;
                                </div>
                            </div>
                        </div>


                        <div class="mb-4">
                            <h6>6. Name Of the Bank</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <b>{{ $data->get_bank_details->name ?? '' }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6>7. Bank Account Details </h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Account No. : </label>
                                    <b>{{ $data->get_bank_details->account_no ?? '' }}</b>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">IFSC Code : </label>
                                    <b>{{ $data->get_bank_details->ifsc ?? '' }}</b>
                                </div>
                                <div class="col-md-4" id="js-lightgallery">
                                    <label class="form-label">Consult Cheque : </label>
                                    <br />
                                    {{-- <a class=""
                                        href="{{ asset('public/storage/images/exporters/' . $data->get_bank_details->cheque_img) }}"
                                        data-sub-html="The free in pointed they their for the so fame.">
                                        <img src="{{ asset('public/storage/images/exporters/' . $data->get_bank_details->cheque_img) }}"
                                            alt="Cheque image" class="img-responsive" alt="image" width="15%">
                                    </a> --}}

                                    <a href="javascript:void(0);"
                                        onclick="view_file('{{ asset('public/storage/images/exporters/' . $data->get_bank_details->cheque_img ?? '') }}')">
                                        <span class="text-warning badge bg-dark p-1">View file</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <h6>8. IEC (Import Export Code) : </h6>
                                    <b>{{ $data->get_other_code_details->iec ?? '' }}</b>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <h6>9. RCMC NO. : </h6>
                                    <b>{{ $data->get_other_code_details->rcmc ?? '' }}</b>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <h6>10. Name of the EPC : </h6>
                                    <b>{{ $data->get_other_code_details->epc ?? '' }}</b>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <h6>11. Udayam Registration No. : </h6>
                                    <b>{{ $data->get_other_code_details->urn ?? '' }}</b>
                                </div>
                                <div class="col-md-4">
                                    <h6>12. HSM Code : </h6>
                                    <b>{{ $data->get_other_code_details->hsm ?? '' }}</b>
                                </div>
                            </div>
                        </div>

                        <form class="form-group mb-3"
                            action="{{ route('admin.publicity.officer.pending.exporters.status') }}" method="post"
                            name="pending_approval_form" id="pending_approval_form">
                            @csrf


                            <div class="form-group row">
                                <input type="hidden" name="exporter_id" id="exporter_id" value="{{ $data->id ?? '' }}">

                                <label class="form-label col-md-2" for="approval_status">Approval Status</label>


                                @if (in_array($data->regsitration_status, [1, 2]))
                                    @php
                                        $reg_status = ['Pending', 'Approved', 'Rejected'];
                                        $reg_status_color = ['warning', 'success', 'danger'];
                                    @endphp
                                    <p class="text-white badge bg-{{ $reg_status_color[$data->regsitration_status] }}">
                                        {{ $reg_status[$data->regsitration_status] }}</p>
                                @else
                                    <select name="approval_status" id="approval_status" class="form-control m-3">
                                        <option value="">Choose an option</option>
                                        <option value="1">Approve
                                        </option>
                                        <option value="2">Reject
                                        </option>
                                    </select>
                                @endif


                                {{-- <div class="custom-control custom-switch col-md-10">
                                    <input type="checkbox" class="custom-control-input approval_status" id="approval_status"
                                        name="approval_status" {{ $data->regsitration_status == 1 ? 'checked disabled' : '' }}>
                                    <label class="custom-control-label" for="approval_status"></label>
                                </div> --}}
                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                @if (in_array($data->regsitration_status, [1, 2]))
                                    <p>{{ $data->get_remarks_details->remarks }}</p>
                                @else
                                    <input type="text" name="remarks" id="remarks" class="form-control d-none"
                                        value="" placeholder="Enter your remarks..." />
                                @endif
                            </div>
                            @if (in_array($data->regsitration_status, [1, 2]))
                            @else
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info sbmt" id="sbmt">Submit</button>
                                </div>
                            @endif
                        </form>
                        {{-- Main content end here --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('public/farp1_assets/js/miscellaneous/lightgallery/lightgallery.bundle.js') }}"></script>
    @routes
    <script defer>
        function view_file(url) {
            Swal.fire({
                imageUrl: url,
                width: 1200,
                imageWidth: 1200,
                imageHeight: 800,
                imageAlt: 'Custom image',
                showConfirmButton: false,
                showCancelButton: false,
                showCloseButton: true
            })
        }

        $(document).ready((e) => {
            $('#approval_status').on('change', (e) => {
                let status = $('#approval_status').val();
                if (status == 1 || status != 2) {
                    $('#remarks').addClass('d-none');
                } else {
                    $('#remarks').removeClass('d-none');
                }
            });


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
        });
    </script>
@endsection
