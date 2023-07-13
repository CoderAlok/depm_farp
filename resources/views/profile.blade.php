@extends('layouts.app')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Profile
                <sup class="badge badge-primary fw-500">*</sup>
            </h1>
            <div class="subheader-block">All the exporter details will be listed here.</div>
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
                        <div class="accordion accordion-outline mt-3" id="js_demo_accordion-3">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                        data-target="#js_demo_accordion-3a" aria-expanded="true">
                                        <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                        Exporter Details
                                        <span class="ml-auto">
                                            <span class="collapsed-reveal">
                                                <i class="fal fa-minus fs-xl"></i>
                                            </span>
                                            <span class="collapsed-hidden">
                                                <i class="fal fa-plus fs-xl"></i>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div id="js_demo_accordion-3a" class="collapse show" data-parent="#js_demo_accordion-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h6>1. Type of Exporter</h6>
                                                @php
                                                    $role_name = ['', 'Super Admin', 'Publicity Officer', 'Director of DEPM', 'MSME Department', 'Principal Secretary', 'Exporters', 'Exporters'];
                                                    $type = ['Merchant', 'Manufacturer'];
                                                @endphp
                                                <b>{{ $role_name[$data->role_id] ?? '' }},
                                                    {{ $type[$data->type] ?? '' }}</b>
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion-outline" id="js_demo_accordion-3">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                        data-target="#js_demo_accordion-3b" aria-expanded="true">
                                        <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                        Chief Executive Details
                                        <span class="ml-auto">
                                            <span class="collapsed-reveal">
                                                <i class="fal fa-minus fs-xl"></i>
                                            </span>
                                            <span class="collapsed-hidden">
                                                <i class="fal fa-plus fs-xl"></i>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div id="js_demo_accordion-3b" class="collapse show" data-parent="#js_demo_accordion-3">
                                    <div class="card-body">
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
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion-outline" id="js_demo_accordion-3">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                        data-target="#js_demo_accordion-3c" aria-expanded="true">
                                        <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                        Address
                                        <span class="ml-auto">
                                            <span class="collapsed-reveal">
                                                <i class="fal fa-minus fs-xl"></i>
                                            </span>
                                            <span class="collapsed-hidden">
                                                <i class="fal fa-plus fs-xl"></i>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div id="js_demo_accordion-3c" class="collapse show" data-parent="#js_demo_accordion-3">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($data->get_address_details as $key => $item)
                                                <div class="col-md-12 mb-2">
                                                    <div class="col-md-12">
                                                        <b class="" style="margin-left: -15px;">
                                                            {{ $key == 0 ? 'Registered Office Address' : 'Registered Factory Office Address' }}
                                                        </b>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-4">
                                                            <label class="form-label">At : </label>
                                                            <b>{{ $item->address ?? '' }}</b>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Post : </label>
                                                            <b>{{ $item->post ?? '' }}</b>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">City : </label>
                                                            <b>{{ $item->city ?? '' }}</b>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="form-label">District : </label>
                                                            <b>{{ $item->get_district_details->name ?? '' }}</b>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">PIN : </label>
                                                            <b>{{ $item->pincode ?? '' }}</b>
                                                        </div>
                                                        <div class="col-md-4">
                                                            &nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion-outline" id="js_demo_accordion-3">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                        data-target="#js_demo_accordion-3d" aria-expanded="true">
                                        <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                        Bank Details
                                        <span class="ml-auto">
                                            <span class="collapsed-reveal">
                                                <i class="fal fa-minus fs-xl"></i>
                                            </span>
                                            <span class="collapsed-hidden">
                                                <i class="fal fa-plus fs-xl"></i>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div id="js_demo_accordion-3d" class="collapse show" data-parent="#js_demo_accordion-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Bank name : </label>
                                                <b>{{ $data->get_bank_details->name ?? '' }}</b>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Account No. : </label>
                                                <b>{{ $data->get_bank_details->account_no ?? '' }}</b>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">IFSC Code : </label>
                                                <b>{{ $data->get_bank_details->ifsc ?? '' }}</b>
                                            </div>
                                            <div class="col-md-4 mt-3" id="js-lightgallery">
                                                <label class="form-label">Cancelled Cheque : </label>
                                                <br />
                                                <a href="javascript:void(0);"
                                                    onclick="view_file('{{ asset('public/storage/images/exporters/' . ($data->get_bank_details->cheque_img ?? '')) }}')">
                                                    <span class="text-warning badge bg-dark p-1">View file</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion accordion-outline" id="js_demo_accordion-3">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                        data-target="#js_demo_accordion-3e" aria-expanded="true">
                                        <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                        Other Details
                                        <span class="ml-auto">
                                            <span class="collapsed-reveal">
                                                <i class="fal fa-minus fs-xl"></i>
                                            </span>
                                            <span class="collapsed-hidden">
                                                <i class="fal fa-plus fs-xl"></i>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div id="js_demo_accordion-3e" class="collapse show" data-parent="#js_demo_accordion-3">
                                    <div class="card-body">
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
                                </div>
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
    @if (Session::has('message'))
        <script>
            iziToast.success({
                title: 'Success',
                message: "{{ Session::get('message') }}",
                position: 'topRight'
            });
        </script>
    @endif
@endsection
