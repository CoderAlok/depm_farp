@extends('layouts.app')

@section('content')
    <style>
        .page-logo-text {
            font-size: 20px;
            line-height: 20px;
            font-weight: 600;
            color: #4ad4c5;
        }

        .page-logo-text-small {
            font-size: 15px;
            line-height: 18px;
            font-weight: 600;
            color: #ffce67;
        }
    </style>

    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i>
                <sup class="badge badge-primary fw-500"></sup>
            </h1>
            <div class="subheader-block">Application form for scheme 2</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            {{-- Scheme :
                            {{ strlen($scheme->long_name) > 200 ? substr($scheme->long_name, 0, 200) . '...' : $scheme->long_name }} --}}
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

                    <div class="container-fluid">
                        <!-- Main content starts here -->
                        {{-- <form method="POST" class="p-4" action="{{ route('exporter.application.annexure2.submit') }}" --}}
                        <form method="POST" class="p-4" action="{{ route('exporter.application.annexure1.submit') }}"
                            id="annexure2_form" name="annexure2_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="exporter_id" id="" value="{{ $data->id ?? '' }}" />
                            <input type="hidden" name="scheme_id" id="scheme_id" value="{{ $scheme->id ?? '' }}" />

                            <div class="row">
                                <div class="col-md-6 my-3 mx-auto">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-3 text-right">
                                            <img src="{{ asset('public/img/odisha-govt-logo-black.png') }}"
                                                alt="SmartAdmin WebApp" aria-roledescription="logo" class="img-fluid"
                                                width="50%">
                                        </div>
                                        <div class="col-md-9 text-left">
                                            <div class="col-md-12 page-logo-text mb-2">Micro, Small & Medium Enterprise
                                                Department
                                            </div>
                                            <div class="col-md-12 page-logo-text-small mr-1 ml-2">Government of Odisha</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <p style="font-size: 25px !important"><b>Scheme : </b> <span
                                            class="fifty-chars">{{ $scheme->long_name ?? '' }}</span></p>
                                    <p style="font-size: 15px !important"><b></b> <span class="fifty-chars">Financial
                                            support for participating in National/International Events </span></p>
                                </div>
                            </div>

                            <div class="accordion accordion-outline" id="js_demo_accordion-3">
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
                                                <div class="col-md-4 mb-3">
                                                    <h6>(a). IEC Number Issued by DGFT <span class="text-danger">*</span>
                                                    </h6>
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Enter IEC No." name="iec" id="iec"
                                                        value="{{ $data->get_other_code_details->iec ?? '' }}" readonly />
                                                    @if ($errors->has('iec'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('iec') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <h6>(b). Name of Exporter <span class="text-danger">*</span></h6>
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Exporting Orgatization " name="exptr_name"
                                                        id="exptr_name" value="{{ $data->name ?? '' }}" readonly />
                                                    @if ($errors->has('exptr_name'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('exptr_name') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <h6>(c). Name Of Proprietor/Director/CEO <span
                                                            class="text-danger">*</span></h6>
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Enter Proprietor/Director/CEO" name="dir_ceo"
                                                        id="dir_ceo" value="{{ $data->chief_ex_name ?? '' }}"
                                                        readonly />
                                                    @if ($errors->has('dir_ceo'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('dir_ceo') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <h6>
                                                        (d). Import Export Code (IEC) Certificate: <span
                                                            class="text-danger">*</span>
                                                    </h6>
                                                    <input class="form-control form-control-sm" type="file"
                                                        id="file_iec" name="file_iec" />
                                                    @if ($errors->has('file_iec'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('file_iec') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Row -->

                            <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                            data-target="#js_demo_accordion-3b" aria-expanded="true">
                                            <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                            Exporter Contact Details
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
                                    <div id="js_demo_accordion-3b" class="collapse show"
                                        data-parent="#js_demo_accordion-3">
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(a). Exporter's Email<span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" class="form-control form-control-sm"
                                                        placeholder="Enter Exporter Email id" name="exptr_email"
                                                        id="exptr_email" value="{{ $data->email ?? '' }}" readonly />
                                                    @if ($errors->has('exptr_email'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('exptr_email') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(b). Contact No.<span
                                                            class="text-danger">*</span></label>
                                                    <input type="tel" class="form-control form-control-sm"
                                                        placeholder="Enter Exporter Contact No." name="exptr_phone"
                                                        id="exptr_phone" value="{{ $data->phone ?? '' }}" readonly />
                                                    @if ($errors->has('exptr_phone'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('exptr_phone') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Row -->

                            <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                            data-target="#js_demo_accordion-3c" aria-expanded="true">
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
                                    <div id="js_demo_accordion-3c" class="collapse show"
                                        data-parent="#js_demo_accordion-3">
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(a). Name Of Bank<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="State Bank of India" name="bank_name" id="bank_name"
                                                        value="{{ $data->get_bank_details->name ?? '' }}" readonly />
                                                    @if ($errors->has('bank_name'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('bank_name') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(b). Details A/c No.<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        placeholder="Account No." name="bank_ac" id="bank_ac"
                                                        value="{{ $data->get_bank_details->account_no ?? '' }}"
                                                        readonly />
                                                    @if ($errors->has('bank_ac'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('bank_ac') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(c). IFSC Code<span
                                                            class="text-danger">*</span></label>
                                                    <input type="tel" class="form-control form-control-sm"
                                                        placeholder="IFSC code" name="bank_ifsc" id="bank_ifsc"
                                                        value="{{ $data->get_bank_details->ifsc ?? '' }}" readonly />
                                                    @if ($errors->has('bank_ifsc'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('bank_ifsc') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(d). Cancelled Cheque. <span
                                                            class="text-danger"
                                                            title="Image of the respective cancelled cheque.">*</span></label>
                                                    <input class="form-control form-control-sm" name="file_bank_cheque"
                                                        id="file_bank_cheque" type="file">
                                                    @if ($errors->has('bank_cheque'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('bank_cheque') }}.</strong>
                                                        </span>
                                                    @endif
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
                                            data-target="#js_demo_accordion-3d" aria-expanded="true">
                                            <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                            Certificate Details
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
                                    <div id="js_demo_accordion-3d" class="collapse show"
                                        data-parent="#js_demo_accordion-3">
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label h6">(a). Type of Certificate<span
                                                            class="text-danger">*</span></label> <br>

                                                    @switch($id)
                                                        @case(7)
                                                            <select name="type_of_certificate" id="type_of_certificate"
                                                                class="form-control">
                                                                <option value="">Select a type</option>
                                                                @foreach ($certi_type[$id] as $item)
                                                                    <option value="{{ $item }}">{{ $item }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('type_of_certificate'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('type_of_certificate') }}.</strong>
                                                                </span>
                                                            @endif
                                                        @break

                                                        @default
                                                            <input type="text" name="type_of_certificate"
                                                                value="{{ $certi_type[$id] }}" id="type_of_certificate"
                                                                class="form-control" readonly />
                                                            @if ($errors->has('type_of_certificate'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('type_of_certificate') }}.</strong>
                                                                </span>
                                                            @endif
                                                    @endswitch
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(b). Name of Certificate. :<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Certificate" name="certificate_name"
                                                        id="certificate_name" />
                                                    @if ($errors->has('certificate_name'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('certificate_name') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(c). Certificate Issuing Authority
                                                        :<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Certificate from" name="certificate_iss_auth"
                                                        id="certificate_iss_auth" />
                                                    @if ($errors->has('certificate_iss_auth'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('certificate_iss_auth') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(d). Cost of Certificate (Rs) (₹):<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        placeholder="Certificate Cost" name="certificate_cost"
                                                        id="certificate_cost" />
                                                    @if ($errors->has('certificate_cost'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('certificate_cost') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(e). Upload Payment Reciept :<span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" class="form-control form-control-sm"
                                                        name="file_payment_reciept" id="file_payment_reciept" />
                                                    @if ($errors->has('file_payment_reciept'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('file_payment_reciept') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /end row -->
                            {{-- 
                            <div class="accordion accordion-outline d-none" id="js_demo_accordion-3">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                            data-target="#js_demo_accordion-3d" aria-expanded="true">
                                            <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                            Documents Upload
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
                                    <div id="js_demo_accordion-3d" class="collapse show"
                                        data-parent="#js_demo_accordion-3">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Import Export Code
                                                                (IEC)
                                                                Certificate</label>
                                                        </div>
                                                        <div class="col-md-5"><input class="form-control form-control-sm"
                                                                type="file" id="file_iec" name="file_iec" />
                                                            @if ($errors->has('file_iec'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('file_iec') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">RCMC</label>
                                                        </div>
                                                        <div class="col-md-5"><input class="form-control form-control-sm"
                                                                type="file" id="file_rcmc" name="file_rcmc" />
                                                            @if ($errors->has('file_rcmc'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('file_rcmc') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Copy of
                                                                Certificate and Proof
                                                                of
                                                                Payment For the certificate</label>
                                                        </div>
                                                        <div class="col-md-5"><input class="form-control form-control-sm"
                                                                type="file" id="file_payoc" name="file_payoc" />
                                                            @if ($errors->has('file_payoc'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('file_payoc') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Copy of Shipping
                                                                bill/bill of
                                                                export
                                                                lading</label>
                                                        </div>
                                                        <div class="col-md-5"><input class="form-control form-control-sm"
                                                                type="file" id="file_ship_bill"
                                                                name="file_ship_bill" />
                                                            @if ($errors->has('file_ship_bill'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('file_ship_bill') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Copy of
                                                                certificate of origin
                                                                of
                                                                shipment of goods</label>
                                                        </div>
                                                        <div class="col-md-5"><input class="form-control form-control-sm"
                                                                type="file" id="file_shipment_origin"
                                                                name="file_shipment_origin" />
                                                            @if ($errors->has('file_shipment_origin'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('file_shipment_origin') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Copy of country
                                                                specific
                                                                Quality
                                                                standard certificate with name of issuing authority</label>
                                                        </div>
                                                        <div class="col-md-5"><input class="form-control form-control-sm"
                                                                type="file" id="file_csqs" name="file_csqs" />
                                                            @if ($errors->has('file_csqs'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('file_csqs') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Copy of name of
                                                                the
                                                                organization
                                                                provides technology for upgrdation of product</label>
                                                        </div>
                                                        <div class="col-md-5"><input class="form-control form-control-sm"
                                                                type="file" id="file_org" name="file_org" />
                                                            @if ($errors->has('file_org'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('file_org') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Proof of payment
                                                                for the
                                                                certificate</label>
                                                        </div>
                                                        <div class="col-md-5"><input class="form-control form-control-sm"
                                                                type="file" id="file_popc" name="file_popc" />
                                                            @if ($errors->has('file_popc'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('file_popc') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row --> --}}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="terms"
                                            id="terms">
                                        <label class="form-check-label h6" for="travel_details">
                                            I solemnly declare that all the details given above are accurate,
                                            and I bear the responsibility for any variation from them in the future. I
                                            hereby confirm and verify that all the information mentioned here, and I take
                                            full responsibility for its accuracy and authenticity.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-sm bg-info text-white w-100">Submit</button>
                                </div>
                            </div>
                        </form>
                        <!-- Main content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
