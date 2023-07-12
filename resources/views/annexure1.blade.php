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
            <div class="subheader-block">Application form for scheme 1</div>
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

                        {{-- <pre>{{ print_r($errors->toArray()) }}</pre> --}}
                        {{-- <pre>{{ print_r(Session::all()) }}</pre> --}}
                        <!-- Main content starts here -->
                        <form method="POST" class="p-4" action="{{ route('exporter.application.annexure1.submit') }}"
                            name="annexure1_form" id="annexure1_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="exporter_id" id="exporter_id" value="{{ $data->id ?? '' }}" />
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

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                </div>
                                <div class="col-md-4 mb-3"></div>
                                <div class="col-md-4 mb-3"></div>
                            </div>
                            <!-- End Row -->

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
                                                    <h6>(a). IEC Number Issued by DGFT: <span class="text-danger">*</span>
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
                                                    <h6>
                                                        (b). Name of the Exporting Orgatization: <span
                                                            class="text-danger">*</span>
                                                    </h6>
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Exporting Orgatization " name="exporting_organization"
                                                        id="exporting_organization" value="{{ $data->name ?? '' }}"
                                                        readonly />
                                                    @if ($errors->has('exporting_organization'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('exporting_organization') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <h6>
                                                        (c). Name Of the Proprietor/Director/CEO: <span
                                                            class="text-danger">*</span>
                                                    </h6>
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
                                                    <label class="form-label h6">(a).Exporter's Email : <span
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
                                                    <label class="form-label h6">(b).Contact No. : <span
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
                                                    <label class="form-label h6">(a). Name Of the Bank : <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Bank name" name="bank_name" id="bank_name"
                                                        value="{{ $data->get_bank_details->name ?? '' }}" readonly />
                                                    @if ($errors->has('bank_name'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('bank_name') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(b). Details A/c No. : <span
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
                                                    <label class="form-label h6">(c). IFSC Code : <span
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
                            <!-- /End Row -->

                            <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                            data-target="#js_demo_accordion-3d" aria-expanded="true">
                                            <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                            Event Details
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
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(a). Details <span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control form-control-sm" rows="4" placeholder="Certificate Details " name="event_detail"
                                                        id="" value="{{ old('event_detail') }}"></textarea>
                                                    @if ($errors->has('event_detail'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('event_detail') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                {{-- Tooltip will be here --}}
                                                <div class="col-md-8 mt-5">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-info-circle"
                                                            style="
                                                        width: 45px;
                                                        height: 45px;
                                                        display: block;
                                                        float: left;
                                                        text-align: center;
                                                        line-height: 18px;
                                                        background: #ffffff00;
                                                        margin-right: 12px;
                                                        font-size: 30px;
                                                        border-radius: 6px;
                                                    "></i>
                                                        Allotment of stall from the
                                                        organizer i.e
                                                        ITPO/EPCs/ITPO/FIEO/Industries
                                                        Association/Organizations
                                                        recognized/ India/State Govt.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row col-md-12">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(b). Name of the event <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Name" name="event_name" id="event_name" />
                                                    @if ($errors->has('event_name'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('event_name') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(c). Type of event <span
                                                            class="text-danger">*</span></label>
                                                    <br />
                                                    <div class="form-check form-check-inline mr-3">
                                                        <input class="form-check-input" type="radio" name="event_type"
                                                            id="event_type_1" value="Exhibition">
                                                        <label class="form-check-label"
                                                            for="event_type_1">Exhibition</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mr-3">
                                                        <input class="form-check-input" type="radio" name="event_type"
                                                            id="event_type_2" value="Conference">
                                                        <label class="form-check-label"
                                                            for="event_type_2">Conference</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mr-3">
                                                        <input class="form-check-input" type="radio" name="event_type"
                                                            id="event_type_3" value="Others">
                                                        <label class="form-check-label" for="event_type_3">Others</label>
                                                    </div>
                                                    <br />
                                                    @if ($errors->has('event_type'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('event_type') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-3 d-none other_event_details_div">
                                                    <label class="form-label h6">Other events details <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="other_event_details"
                                                        id="other_event_details" class="form-control"
                                                        placeholder="Enter other event details...">
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(d).Type of Participation <span
                                                            class="text-danger">*</span></label>
                                                    <br />
                                                    <div class="form-check form-check-inline mr-3">
                                                        <input class="form-check-input" type="radio"
                                                            name="participation_type" id="participation_type1"
                                                            value="Delegate">
                                                        <label class="form-check-label"
                                                            for="participation_type1">Delegate</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mr-3">
                                                        <input class="form-check-input" type="radio"
                                                            name="participation_type" id="participation_type2"
                                                            value="Exhibit">
                                                        <label class="form-check-label"
                                                            for="participation_type2">Exhibit</label>
                                                    </div>
                                                    <br />
                                                    @if ($errors->has('participation_type'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('participation_type') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row col-md-12">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(e). City of event <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="City" name="event_city" id="event_city" />
                                                    @if ($errors->has('event_city'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('event_city') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(f). Country <span
                                                            class="text-danger">*</span></label>
                                                    <select name="event_country" id="event_country" class="form-control">
                                                        <option value="">Select a country</option>
                                                        @foreach (getCountry() as $item)
                                                            <option value="{{ $item }}">{{ $item }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('event_country'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('event_country') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                            data-target="#js_demo_accordion-3e" aria-expanded="true">
                                            <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                            Travel/Stall Details
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
                                    <div id="js_demo_accordion-3e" class="collapse show"
                                        data-parent="#js_demo_accordion-3">
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="col-md-4 mb-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="travel_details">
                                                        <label class="form-check-label h6" for="travel_details">
                                                            Travel Details
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="stall_details">
                                                        <label class="form-check-label h6" for="stall_details">
                                                            Stall Details
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Travel details div --}}
                                            <div class="row col-md-12 travel_details_div d-none">
                                                <div class="col-md-4 mb-1">
                                                    <label class="form-label h6">(a). Travel Destination Type <span
                                                            class="text-danger">*</span></label>
                                                    <br />
                                                    <select name="travel_destination_type" id="travel_destination_type"
                                                        class="form-control">
                                                        <option value="">Select travel destination type</option>
                                                        <option value="1">Within India</option>
                                                        <option value="2">Outside India</option>
                                                    </select>
                                                    <br />
                                                    @if ($errors->has('travel_destination_type'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('travel_destination_type') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-1">
                                                    <label class="form-label h6">(b). Upload Visa Invitation Letter <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" name="file_visa_invitation_letter"
                                                        id="file_visa_invitation_letter" class="form-control">
                                                    @if ($errors->has('visa_invitation_letter'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('visa_invitation_letter') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-1">
                                                    <label class="form-label h6">(c). Name of the Traveller <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="traveller_name" id="traveller_name"
                                                        class="form-control">
                                                    @if ($errors->has('traveller_name'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('traveller_name') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-1">
                                                    <label class="form-label h6">(d). Designation <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="traveller_designation"
                                                        id="traveller_designation" class="form-control">
                                                    @if ($errors->has('traveller_designation'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('traveller_designation') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-1">
                                                    <label class="form-label h6">(e). Mode of Travel <span
                                                            class="text-danger">*</span></label>
                                                    <select name="mode_of_travel" id="mode_of_travel"
                                                        class="form-control">
                                                        <option value="">Choose a mode</option>
                                                        <option value="1">Flight</option>
                                                        <option value="2">Train</option>
                                                    </select>
                                                    @if ($errors->has('mode_of_travel'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('mode_of_travel') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-1">
                                                    <label class="form-label h6">(f). Class of Travel <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="class_of_tarvel" id="class_of_travel"
                                                        class="form-control" readonly>
                                                    @if ($errors->has('class_of_tarvel'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('class_of_tarvel') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-1">
                                                    <label class="form-label h6">(g). Upload ticket <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" name="file_ticket" id="file_ticket"
                                                        class="form-control">
                                                    @if ($errors->has('file_ticket'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('file_ticket') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-1 boarding_pass_div d-none">
                                                    <label class="form-label h6">(h). Upload boarding pass <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" name="file_boarding_pass"
                                                        id="file_boarding_pass" class="form-control">
                                                    @if ($errors->has('file_boarding_pass'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('file_boarding_pass') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(i). Total expense made for travel
                                                        (Rs) <span class="text-danger">*</span><br /></label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        placeholder="Rs" name="total_travel_expense"
                                                        id="total_travel_expense" />
                                                    @if ($errors->has('total_travel_expense'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('total_travel_expense') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(j). Incentive claimed towards travel
                                                        (Rs) <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        placeholder="Rs" name="travel_incentive" id="travel_incentive" />
                                                    @if ($errors->has('travel_incentive'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('travel_incentive') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            {{-- Stall Details div --}}
                                            <div class="row col-md-12 stall_details_div d-none">
                                                <div class="col-md-4 mb-1">
                                                    <label class="form-label h6">(a). Name of the Event : <span
                                                            class="text-danger">*</span></label>
                                                    <br />
                                                    <input type="text" name="stall_event_name" id="stall_event_name"
                                                        class="form-control" placeholder="Name of the event">
                                                    @if ($errors->has('mode_of_travel'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('stall_event_name') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-1">
                                                    <label class="form-label h6">(b). Upload Stall Allotment / Registration
                                                        Letter : <span class="text-danger">*</span></label>
                                                    <br />
                                                    <input type="file" name="file_stall_allot_letter"
                                                        id="file_stall_allot_letter" class="form-control">
                                                    @if ($errors->has('file_stall_allot_letter'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('file_stall_allot_letter') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-1">
                                                    <label class="form-label h6">(c). Upload Stall Registration payment
                                                        reciept
                                                        : <span class="text-danger">*</span></label>
                                                    <br />
                                                    <input type="file" name="file_stall_pay_recpt"
                                                        id="file_stall_pay_recpt" class="form-control">
                                                    @if ($errors->has('file_stall_pay_recpt'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('file_stall_pay_recpt') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(d). Total stall registration cost
                                                        (Rs) <span class="text-danger">*</span><br /></label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        placeholder="Rs" name="total_stall_reg_cost"
                                                        id="total_stall_reg_cost" />
                                                    @if ($errors->has('total_stall_reg_cost'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('total_stall_reg_cost') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label h6">(e). Incentive claimed towards Stall
                                                        registration (Rs) <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        placeholder="Rs" name="stall_incentive" id="stall_incentive" />
                                                    @if ($errors->has('stall_incentive'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('stall_incentive') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /End Row -->
                            {{-- <hr /> --}}

                            <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                            data-target="#js_demo_accordion-3f" aria-expanded="true">
                                            <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                            Additional Details
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
                                    <div id="js_demo_accordion-3f" class="collapse show"
                                        data-parent="#js_demo_accordion-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <h6>(a). Upload Tour Dairy : <span class="text-danger">*</span></h6>
                                                    <input type="file" class="form-control form-control-sm"
                                                        name="file_tour_dairy" id="file_tour_dairy" />
                                                    @if ($errors->has('file_tour_dairy'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('file_tour_dairy') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>


                                                <div class="col-md-4 mb-3">
                                                    <h6>(b). Details of B2B / B2C meeteing held: <span
                                                            class="text-danger">*</span></h6>
                                                    <textarea class="form-control" name="meeting_detail" id="meeting_detail"></textarea>
                                                    @if ($errors->has('meeting_detail'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('meeting_detail') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <h6>(c). Details of Participation of event such as Sale of Products,
                                                        Business deals made etc: <span class="text-danger">*</span></h6>
                                                    <textarea class="form-control" name="participation_det" id="participation_det"></textarea>
                                                    @if ($errors->has('participation_det'))
                                                        <span class="invalid feedback text-danger"role="alert">
                                                            <strong>{{ $errors->first('participation_det') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion accordion-outline d-none" id="js_demo_accordion-4">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                            data-target="#js_demo_accordion-4f" aria-expanded="true">
                                            <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                            Required Documents Upload
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
                                    <div id="js_demo_accordion-4f" class="collapse show"
                                        data-parent="#js_demo_accordion-4">
                                        <div class="card-body">
                                            <label class="form-label h6">9. Documents for Verification to be
                                                uploaded</label>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Import Export Code
                                                                Certificate valid at the
                                                                time of the claim</label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            {{-- <input class="form-control form-control-sm" type="file"
                                                                name="file_iec" id="file_iec" /> --}}
                                                            {{-- @if ($errors->has('file_iec'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('file_iec') }}.</strong>
                                                                </span>
                                                            @endif --}}
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Original ticket
                                                                and
                                                                boarding passes as
                                                                application to be
                                                                submitted on completion
                                                                of travel</label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input class="form-control form-control-sm" type="file"
                                                                name="file_ticket" id="file_ticket" />
                                                            @if ($errors->has('file_ticket'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('file_ticket') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Registration
                                                                confirmation from the
                                                                event orginizer</label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input class="form-control form-control-sm" type="file"
                                                                name="reg_conf_file" id="reg_conf_file" />
                                                            @if ($errors->has('reg_conf_file'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('reg_conf_file') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Quotation for the
                                                                stall
                                                                from the event
                                                                organizer</label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input class="form-control form-control-sm" type="file"
                                                                name="quot_file" id="quot_file" />
                                                            @if ($errors->has('quot_file'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('quot_file') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Details of B2B /
                                                                B2C
                                                                meeting heldDetails of
                                                                the application of event
                                                                such as sale of
                                                                products, business deals
                                                                made etc.</label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input class="form-control form-control-sm" type="file"
                                                                name="b2b_detl_file" id="b2b_detl_file" />
                                                            @if ($errors->has('b2b_detl_file'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('b2b_detl_file') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Visa Invitation
                                                                letter</label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input class="form-control form-control-sm" type="file"
                                                                name="visa_file" id="visa_file" />
                                                            @if ($errors->has('visa_file'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('visa_file') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label for="formFile" class="form-label h6">Tour Diary of the
                                                                participation of
                                                                event</label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input class="form-control form-control-sm" type="file"
                                                                name="tour_file" id="tour_file" />
                                                            @if ($errors->has('tour_file'))
                                                                <span class="invalid feedback text-danger"role="alert">
                                                                    <strong>{{ $errors->first('tour_file') }}.</strong>
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
                            <!-- /End Row -->
                            {{-- <hr /> --}}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="terms"
                                            id="terms">
                                        <label class="form-check-label h6" for="travel_details">
                                            I solemnly declare that all the details given above are accurate,
                                            and I bear
                                            the responsibility for any variation from them in the future. I hereby confirm
                                            and
                                            verify that all the information mentioned here, and I take full responsibility
                                            for its
                                            accuracy and authenticity.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-sm bg-info text-white w-100">
                                        Submit
                                    </button>
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

@section('scripts')
    <script>
        $(document).ready((e) => {
            // To show the travel details form 
            $('#travel_details').change(function() {
                if (this.checked) {
                    $('.travel_details_div').removeClass('d-none');
                } else {
                    $('.travel_details_div').addClass('d-none');
                }
            });

            // To show the stall details form
            $('#stall_details').change(function() {
                if (this.checked) {
                    $('.stall_details_div').removeClass('d-none');
                } else {
                    $('.stall_details_div').addClass('d-none');
                }
            });

            // Display Economy if 20 = Flight else 2nd Ac for Train
            $('#mode_of_travel').on('change', (e) => {
                let mode = $('select#mode_of_travel option:selected').val();
                if (mode == 1) {
                    $('#class_of_travel').val('Flight');
                    $('.boarding_pass_div').removeClass('d-none');
                } else {
                    $('#class_of_travel').val('2nd AC');
                    $('.boarding_pass_div').addClass('d-none');
                }
            })

            // Condition for other event type details.
            $('#event_type_1').on('click', (e) => {
                $('.other_event_details_div').addClass('d-none');
            })
            $('#event_type_2').on('click', (e) => {
                $('.other_event_details_div').addClass('d-none');
            })
            $('#event_type_3').on('click', (e) => {
                $('.other_event_details_div').removeClass('d-none');
            })

        });
    </script>
@endsection
