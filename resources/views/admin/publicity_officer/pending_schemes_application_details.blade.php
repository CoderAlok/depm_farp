@extends('admin.layouts.app')

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
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    {{-- <div class="panel-hdr">
                        <h2>
                            Hi, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                            <b
                                class="text-uppercase font-size-600 ml-2">({{ \Spatie\Permission\Models\Role::select('name')->where('id', Auth::user()->role_id)->first()->name ?? '' }})</b>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
                        </div>
                    </div> --}}

                    <div class="container-fluid">
                        {{-- Main content start here --}}
                        <div class="row">
                            <div class="col-md-6 my-3 mx-auto">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-3 text-right">
                                        <img src="{{ asset('public/img/odisha-govt-logo-black.png') }}"
                                            alt="SmartAdmin WebApp" aria-roledescription="logo" class="img-fluid"
                                            width="50%">
                                    </div>
                                    <div class="col-md-9 text-left">
                                        <div class="col-md-12 page-logo-text mb-2">Directorate of Export Promotion &
                                            Marketing
                                        </div>
                                        <div class="col-md-12 page-logo-text-small mr-1 ml-2">Government of Odisha</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <p style="font-size: 25px !important">
                                    <span
                                        class="fifty-chars">{{ $applications->get_scheme_details->short_name ?? '' }}</span>
                                </p>
                            </div>
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
                                                    value="{{ $applications->get_other_code_details->iec ?? '' }}"
                                                    readonly />
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <h6>
                                                    (b). Name of the Exporting Orgatization: <span
                                                        class="text-danger">*</span>
                                                </h6>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Exporting Orgatization " name="exporting_organization"
                                                    id="exporting_organization"
                                                    value="{{ $applications->get_exporter_details->name ?? '' }}"
                                                    readonly />
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <h6>
                                                    (c). Name Of the Proprietor/Director/CEO: <span
                                                        class="text-danger">*</span>
                                                </h6>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Proprietor/Director/CEO" name="dir_ceo"
                                                    id="dir_ceo"
                                                    value="{{ $applications->get_exporter_details->chief_ex_name ?? '' }}"
                                                    readonly />
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <h6>
                                                    (d). Upload IEC ( Valid Certificate): <span class="text-danger"
                                                        title="Upload IEC ( Valid Certificate)">* <i data-toggle="tooltip"
                                                            data-placement="right" title="Import export code certificate"
                                                            class="fa fa-info-circle"></i></span>
                                                </h6>
                                                @if ($applications->get_file_details->iec_file)
                                                    <a href="javascript:void(0);"
                                                        onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/iec' . '/' . ($applications->get_file_details->iec_file ?? '')) }}')">
                                                        <span class="text-warning badge bg-dark p-1">View file</span>
                                                    </a>
                                                @endif
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label h6">(a).Exporter's Email : <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control form-control-sm"
                                                    placeholder="Enter Exporter Email id" name="exptr_email"
                                                    id="exptr_email"
                                                    value="{{ $applications->get_exporter_details->email ?? '' }}"
                                                    readonly />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label h6">(b).Contact No. : <span
                                                        class="text-danger">*</span></label>
                                                <input type="tel" class="form-control form-control-sm"
                                                    placeholder="Enter Exporter Contact No." name="exptr_phone"
                                                    id="exptr_phone"
                                                    value="{{ $applications->get_exporter_details->phone ?? '' }}"
                                                    readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Exporter Details Row -->

                        <div class="accordion accordion-outline" id="js_demo_accordion-3">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                        data-target="#js_demo_accordion-3b" aria-expanded="true">
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
                                <div id="js_demo_accordion-3b" class="collapse show" data-parent="#js_demo_accordion-3">
                                    <div class="card-body">
                                        <div class="row col-md-12">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label h6">(a). Name Of the Bank : <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Bank name" name="bank_name" id="bank_name"
                                                    value="{{ $applications->get_bank_details->name ?? '' }}" readonly />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label h6">(b). Account No. : <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control form-control-sm"
                                                    placeholder="Account No." name="bank_ac" id="bank_ac"
                                                    value="{{ $applications->get_bank_details->account_no ?? '' }}"
                                                    readonly />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label h6">(c). IFSC Code : <span
                                                        class="text-danger">*</span></label>
                                                <input type="tel" class="form-control form-control-sm"
                                                    placeholder="IFSC code" name="bank_ifsc" id="bank_ifsc"
                                                    value="{{ $applications->get_bank_details->ifsc ?? '' }}" readonly />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label h6">(d). Upload cancelled Cheque. <span
                                                        class="text-danger"
                                                        title="Image of the respective cancelled cheque.">*</span></label>
                                                <a href="javascript:void(0);"
                                                    onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/bank' . '/' . ($applications->get_file_details->cancelled_cheque_file ?? '')) }}')">
                                                    <span class="text-warning badge bg-dark p-1">View file</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Bank Details Row -->
                        @switch($applications->scheme_id)
                            @case(1)
                                <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                                data-target="#js_demo_accordion-3c" aria-expanded="true">
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
                                        <div id="js_demo_accordion-3c" class="collapse show" data-parent="#js_demo_accordion-3">
                                            <div class="card-body">
                                                <div class="row col-md-12">
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label h6">(a). Type of event <span
                                                                class="text-danger">*</span></label>
                                                        <br />
                                                        @php
                                                            $event_type = ['', 'Exhibition', 'Conference', 'Others'];
                                                        @endphp
                                                        <input type="text" name="event_type" id="event_type"
                                                            class="form-control"
                                                            value="{{ $applications->get_event_details->event_type ? $event_type[$applications->get_event_details->event_type] : '' }}"
                                                            readonly />
                                                    </div>

                                                    <div class="col-md-4 mb-3 other_event_details_div">
                                                        <label class="form-label h6">Other events details <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="other_event_details" id="other_event_details"
                                                            class="form-control"
                                                            value="{{ $applications->get_event_details->other_event_type ?? '' }}"
                                                            placeholder="Enter other event details..." readonly>
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label h6">(b). Name of the event <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $applications->get_event_details->details ?? '' }}"
                                                            name="event_name" id="event_name" readonly />
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label h6">(c).Type of Participation <span
                                                                class="text-danger">*</span></label>
                                                        <br />
                                                        @php
                                                            $participation_type = ['', 'Delegate', 'Exhibit'];
                                                        @endphp
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $applications->get_event_details->participation_type ? $participation_type[$applications->get_event_details->participation_type] : '' }}"
                                                            name="participation_type" id="participation_type" readonly />
                                                    </div>
                                                </div>

                                                <div class="row col-md-12">
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label h6">(d). City of event <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $applications->get_event_details->city ?? '' }}"
                                                            name="event_city" id="event_city" readonly />
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label h6">(e). Country <span
                                                                class="text-danger">*</span></label>
                                                        @php
                                                            $country = getCountry();
                                                        @endphp
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $applications->get_event_details->country_id ? $country[$applications->get_event_details->country_id] : '' }}"
                                                            name="event_country" id="event_country" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Event Details Row -->

                                @if ($applications->get_travel_details)
                                    <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                                    data-target="#js_demo_accordion-3d" aria-expanded="true">
                                                    <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                                    Travel Details
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
                                                    {{-- Travel details div --}}
                                                    <div class="row col-md-12 travel_details_div">
                                                        <div class="col-md-4 mb-1">
                                                            <label class="form-label h6">(a). Travel Destination Type <span
                                                                    class="text-danger">*</span></label>
                                                            <br />
                                                            @php
                                                                $destination_type = ['', 'Within India', 'Outside India'];
                                                            @endphp
                                                            <input type="text" name="travel_destination_type"
                                                                id="travel_destination_type" class="form-control"
                                                                value="{{ $applications->get_travel_details->destination_type ? $destination_type[$applications->get_travel_details->destination_type] : '' }}"
                                                                readonly />
                                                        </div>

                                                        <div class="col-md-4 mb-1 upload_visa_div">
                                                            <label class="form-label h6">(b). Upload Visa Invitation Letter <span
                                                                    class="text-danger">*</span></label>
                                                            <a href="javascript:void(0);"
                                                                onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/visa_image' . '/' . ($applications->get_travel_details->file_visa ?? '')) }}')">
                                                                <span class="text-warning badge bg-dark p-1">View file</span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4 mb-1">
                                                            <label class="form-label h6">(c). Name of the Traveller <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="traveller_name" id="traveller_name"
                                                                class="form-control"
                                                                value="{{ $applications->get_travel_details->traveller_name ?? '' }}"
                                                                reaonly />
                                                        </div>
                                                        <div class="col-md-4 mb-1">
                                                            <label class="form-label h6">(d). Designation <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="traveller_designation"
                                                                id="traveller_designation" class="form-control"
                                                                value="{{ $applications->get_travel_details->designation ?? '' }}"
                                                                readonly />
                                                        </div>

                                                        <div class="col-md-4 mb-1">
                                                            <label class="form-label h6">(e). Mode of Travel <span
                                                                    class="text-danger">*</span></label>
                                                            @php
                                                                $mode_of_travel = ['', 'Flight', 'Train'];
                                                            @endphp
                                                            <input type="text" name="mode_of_travel" id="mode_of_travel"
                                                                class="form-control"
                                                                value="{{ $applications->get_travel_details->mode_of_travel ? $mode_of_travel[$applications->get_travel_details->mode_of_travel] : '' }}"
                                                                readonly />
                                                        </div>

                                                        <div class="col-md-4 mb-1">
                                                            <label class="form-label h6">(f). Class of Travel <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="class_of_tarvel" id="class_of_tarvel"
                                                                class="form-control"
                                                                value="{{ $applications->get_travel_details->class_of_travel ?? '' }}"
                                                                readonly />
                                                        </div>

                                                        <div class="col-md-4 mb-1">
                                                            <label class="form-label h6">(g). Upload ticket <span
                                                                    class="text-danger">*</span></label>
                                                            <a href="javascript:void(0);"
                                                                onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/ticket' . '/' . ($applications->get_file_details->file_ticket ?? '')) }}')">
                                                                <span class="text-warning badge bg-dark p-1">View file</span>
                                                            </a>
                                                        </div>

                                                        <div class="col-md-4 mb-1 boarding_pass_div">
                                                            <label class="form-label h6">(h). Upload Boarding Pass <span
                                                                    class="text-danger">*</span></label>
                                                            <a href="javascript:void(0);"
                                                                onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/boarding_pass' . '/' . ($applications->get_file_details->file_boarding_pass ?? '')) }}')">
                                                                <span class="text-warning badge bg-dark p-1">View file</span>
                                                            </a>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label h6">(i). Total expense made for travel
                                                                (₹) <span class="text-danger">*</span><br /></label>

                                                            <input type="text" name="total_travel_expense"
                                                                id="total_travel_expense" class="form-control"
                                                                value="{{ '₹ ' . IND_money_format($applications->get_travel_details->total_expense) ?? '' }}"
                                                                readonly />
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label h6">(j). Incentive claimed towards travel
                                                                (₹)<span class="text-danger">*</span></label>
                                                            <input type="text" name="travel_incentive" id="travel_incentive"
                                                                class="form-control"
                                                                value="{{ '₹ ' . IND_money_format($applications->get_travel_details->incentive_claimed) ?? '' }}"
                                                                readonly />
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- End Travel Details Row -->
                                @if ($applications->get_stall_details)
                                    <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                                    data-target="#js_demo_accordion-3e" aria-expanded="true">
                                                    <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                                    Stall Details
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
                                                        {{-- <div class="col-md-4 mb-1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="travel_details" name="travel_details">
                                                                <label class="form-check-label h6" for="travel_details">
                                                                    Travel Details
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1"
                                                                    id="stall_details" name="stall_details">
                                                                <label class="form-check-label h6" for="stall_details">
                                                                    Stall Details
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                    </div>

                                                    {{-- Stall Details div --}}
                                                    <div class="row col-md-12 stall_details_div">
                                                        <div class="col-md-4 mb-1">
                                                            <label class="form-label h6">(a). Name of the Event : <span
                                                                    class="text-danger">*</span></label>
                                                            <br />
                                                            <input type="text" name="stall_event_name" id="stall_event_name"
                                                                class="form-control" placeholder="Name of the event"
                                                                value="{{ $applications->get_stall_details->get_event_details->details ?? '' }}"
                                                                readonly>
                                                        </div>
                                                        <div class="col-md-4 mb-1">
                                                            <label class="form-label h6">(b). Upload Stall Allotment / Registration
                                                                Letter : <span class="text-danger">*</span></label>
                                                            <br />
                                                            <a href="javascript:void(0);"
                                                                onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/stall_allotment' . '/' . ($applications->get_file_details->stall_allot_letter ?? '')) }}')">
                                                                <span class="text-warning badge bg-dark p-1">View file</span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4 mb-1">
                                                            <label class="form-label h6">(c). Upload Stall Registration payment
                                                                reciept
                                                                : <span class="text-danger">*</span></label>
                                                            <br />
                                                            <a href="javascript:void(0);"
                                                                onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/stall_pay_reciept' . '/' . ($applications->get_file_details->stall_reg_pay_recipt ?? '')) }}')">
                                                                <span class="text-warning badge bg-dark p-1">View file</span>
                                                            </a>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label h6">(d). Total stall registration cost
                                                                (₹) <span class="text-danger">*</span><br /></label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="₹" name="total_stall_reg_cost"
                                                                id="total_stall_reg_cost"
                                                                value="{{ '₹ ' . IND_money_format($applications->get_stall_details->total_cost) ?? '' }}"
                                                                readonly />
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label h6">(e). Incentive claimed towards Stall
                                                                registration (₹) <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="₹" name="stall_incentive" id="stall_incentive"
                                                                value="{{ '₹ ' . IND_money_format($applications->get_stall_details->claimed_cost) ?? '' }}"
                                                                readonly />
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!-- End Stall Details Row -->

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
                                        <div id="js_demo_accordion-3f" class="collapse show" data-parent="#js_demo_accordion-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <h6>(a). Upload Tour Dairy : <span class="text-danger">*</span></h6>
                                                        <a href="javascript:void(0);"
                                                            onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/tour_dairy' . '/' . ($applications->get_file_details->tour_dairy ?? '')) }}')">
                                                            <span class="text-warning badge bg-dark p-1">View file</span>
                                                        </a>
                                                    </div>


                                                    <div class="col-md-12 mb-3">
                                                        <h6>(b). Details of B2B / B2C meeteing held: <span
                                                                class="text-danger">*</span></h6>
                                                        <p>{{ $applications->meeting_details ?? '' }}</p>
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <h6>(c). Details of Participation of event: <span class="text-danger"
                                                                title="Upload IEC ( Valid Certificate)">*
                                                                {{-- <i data-toggle="tooltip"
                                                                data-placement="right"
                                                                title="Details of Participation of event such as Sale of Products,
                                                                Business deals made etc"
                                                                class="fa fa-info-circle"></i> --}}
                                                            </span>
                                                        </h6>
                                                        <p>{{ $applications->participation_details ?? '' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Additional Details Row -->
                            @break

                            @default
                                <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                                data-target="#js_demo_accordion-3g" aria-expanded="true">
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
                                        <div id="js_demo_accordion-3g" class="collapse show" data-parent="#js_demo_accordion-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <h6>(a). Type of Certificate : <span class="text-danger">*</span></h6>
                                                        <input type="text" name="" id="" class="form-control"
                                                            value="{{ $applications->certi_type ?? '' }}" readonly>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <h6>(b). Name of Certificate. : <span class="text-danger">*</span></h6>
                                                        <input type="text" name="" id="" class="form-control"
                                                            value="{{ $applications->certi_name ?? '' }}" readonly>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <h6>(c). Certificate Issuing Authority : <span class="text-danger">*</span>
                                                        </h6>
                                                        <input type="text" name="" id="" class="form-control"
                                                            value="{{ $applications->certi_iss_auth ?? '' }}" readonly>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <h6>(d). Cost of Certification (₹) (₹) : <span class="text-danger">*</span>
                                                        </h6>
                                                        <input type="text" name="" id="" class="form-control"
                                                            value="{{ $applications->certi_cost ?? '' }}" readonly>
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <h6>(e). Payment Reciept : <span class="text-danger">*</span></h6>
                                                        <a href="javascript:void(0);"
                                                            onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/certificate_payment_reciept' . '/' . ($applications->get_file_details->certi_payment_reciept_file ?? '')) }}')">
                                                            <span class="text-warning badge bg-dark p-1">View file</span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Certificate Details Row -->
                        @endswitch

                        {{-- <div class="accordion accordion-outline" id="js_demo_accordion-3">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                        data-target="#js_demo_accordion-3h" aria-expanded="true">
                                        <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                        Remarks
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

                                <div id="js_demo_accordion-3h" class="collapse show" data-parent="#js_demo_accordion-3">
                                    <div class="card-body">
                                        <table class="table table-responsive table-bordered">
                                            <thead>
                                                <th></th>
                                                <th></th>
                                                <!-- SO -->
                                                @if ($applications->get_application_progress_master_details->created_by == Auth::user()->id)
                                                    <th class="text-center" colspan="3">SO</th>
                                                @endif
                                                <!-- Director -->
                                                <th class="text-center" colspan="3">Director</th>
                                                <!-- AddlSpl -->
                                                <th class="text-center" colspan="3">Add/Spl</th>
                                                <!-- DDO -->
                                                <th class="text-center" colspan="3">DDO</th>
                                            </thead>
                                            <thead>
                                                <th>Total Expenditure</th>
                                                <th>Incentive Amount</th>
                                                <!-- SO -->
                                                @if ($applications->get_application_progress_master_details->created_by == Auth::user()->id)
                                                    <th>Remarks By</th>
                                                    <th>Remarks Details</th>
                                                    <th>Remarks On</th>
                                                @endif
                                                <!-- Director -->
                                                <th>Remarks By</th>
                                                <th>Remarks On</th>
                                                <th>Remarks Details</th>
                                                <!-- AddlSpl -->
                                                <th>Remarks By</th>
                                                <th>Remarks On</th>
                                                <th>Remarks Details</th>
                                                <!-- DDO -->
                                                <th>Remarks By</th>
                                                <th>Remarks On</th>
                                                <th>Remarks Details</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-right">
                                                        {{ '₹ ' . IND_money_format($total_expenditure) ?? '' }}</td>
                                                    <td class="text-right">
                                                        {{ '₹ ' . IND_money_format($incentive_amount) ?? '' }}</td>

                                                    <!-- SO -->
                                                    @if ($applications->get_application_progress_master_details->created_by == Auth::user()->id)
                                                        <td>{{ ($applications->get_application_progress_master_details->get_user_details->first_name ?? '') . ' ' . ($applications->get_application_progress_master_details->get_user_details->last_name ?? '') }}
                                                        </td>
                                                        <td>{{ $applications->get_application_progress_master_details->remarks ?? '' }}
                                                        </td>
                                                        <td>{{ date('d-m-Y', strtotime($applications->get_application_progress_master_details->created_at)) ?? '' }}
                                                        </td>
                                                    @endif

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- Main form for approval started  --}}
                        <div class="accordion accordion-outline" id="js_demo_accordion-3">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                        data-target="#js_demo_accordion-3i" aria-expanded="true">
                                        <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                        Officer's Remarks Details
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

                                <div id="js_demo_accordion-3i" class="collapse show" data-parent="#js_demo_accordion-3">
                                    <div class="card-body">
                                        <div class="col-md-12">

                                            @php
                                                $route_name = '';
                                                $table_showing_status = '';
                                                
                                                switch (Auth::user()->role_id) {
                                                    case 2:
                                                        $route_name = 'admin.publicity.officer.pending.exporters.applications.details.update';
                                                        $table_showing_status = !empty($applications->get_application_progress_master_details[0]) ?? false;
                                                        break;
                                                
                                                    case 3:
                                                        $route_name = 'dir-depm.pending.application.update';
                                                        $table_showing_status = !empty($applications->get_application_progress_master_details[1]) ?? false;
                                                        break;
                                                
                                                    case 4:
                                                        $route_name = 'spl-sectry.pending.application.update';
                                                        $table_showing_status = !empty($applications->get_application_progress_master_details[2]) ?? false;
                                                        break;
                                                
                                                    case 5:
                                                        $route_name = 'dept-sectry.pending.application.update';
                                                        $table_showing_status = !empty($applications->get_application_progress_master_details[3]) ?? false;
                                                        break;
                                                
                                                    case 7:
                                                        $route_name = 'ddo.pending.application.update';
                                                        $table_showing_status = !empty($applications->get_application_progress_master_details[4]) ?? false;
                                                        break;
                                                
                                                    default:
                                                        break;
                                                }
                                            @endphp

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row mt-5 mb-5">
                                                        @switch($applications->scheme_id)
                                                            @case(1)
                                                                <div class="col-md-4">
                                                                    <label for="" class="text-uppercase">Total
                                                                        expenses of Exporter : </label>
                                                                    <b>{{ '₹ ' . IND_money_format($total_expenditure) ?? '' }}</b>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="" class="text-uppercase">Amount suggested
                                                                        for reimbursement : </label>
                                                                    <b>{{ @$applications->get_application_progress_master_details[0]->incentive_amount ? '₹ ' . IND_money_format($applications->get_application_progress_master_details[0]->incentive_amount) : '' }}</b>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    @if (in_array($applications->status, [8, 9]))
                                                                        <label for="" class="text-uppercase">Incentive
                                                                            Sanctioned Amount : </label>
                                                                        <b>{{ @$applications->get_application_progress_master_details[0]->incentive_amount ? '₹ ' . IND_money_format($applications->get_application_progress_master_details[0]->incentive_amount) : '' }}</b>
                                                                    @endif
                                                                </div>
                                                            @break

                                                            @case(2)
                                                                <div class="col-md-4">
                                                                    <label for="" class="text-uppercase">Total
                                                                        cost of certification : </label>
                                                                    <b>{{ '₹ ' . IND_money_format($applications->certi_cost) ?? '' }}</b>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="" class="text-uppercase">Amount suggested
                                                                        for reimbursement:
                                                                    </label>
                                                                    <b>{{ @$applications->get_application_progress_master_details[0]->incentive_amount ? '₹ ' . IND_money_format($applications->get_application_progress_master_details[0]->incentive_amount) : '' }}</b>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    @if (in_array($applications->status, [8, 9]))
                                                                        <label for="" class="text-uppercase">Sanctioned
                                                                            Amount
                                                                            :
                                                                        </label>
                                                                        <b
                                                                            style="font-size: 25px">{{ @$applications->get_application_progress_master_details[0]->incentive_amount ? '₹ ' . IND_money_format($applications->get_application_progress_master_details[0]->incentive_amount) : '' }}</b>
                                                                    @endif
                                                                </div>
                                                            @break

                                                            @default
                                                                <div class="col-md-6">
                                                                    <label for="" class="text-uppercase">Total
                                                                        cost of certification : </label>
                                                                    <b>{{ '₹ ' . IND_money_format($applications->certi_cost) ?? '' }}</b>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="" class="text-uppercase">Amount suggested
                                                                        for reimbursement:
                                                                    </label>
                                                                    <b>{{ @$applications->get_application_progress_master_details[0]->incentive_amount ? '₹ ' . IND_money_format($applications->get_application_progress_master_details[0]->incentive_amount) : '' }}</b>
                                                                </div>
                                                        @endswitch

                                                    </div>
                                                    <table class="table table-responsive table-bordered" width="100%">
                                                        {{-- @if (isset($applications->get_application_progress_master_details[0]))
                                                            <thead>
                                                                <th>SlNo</th>
                                                                <th>Notes</th>
                                                                <th>Put Up By</th>
                                                                <th>Date</th>
                                                            </thead>
                                                        @elseif (isset($applications->get_application_progress_master_details[1]))
                                                            <thead>
                                                                <th>SlNo</th>
                                                                <th>Note</th>
                                                                <th>Put Up By</th>
                                                                <th>Date</th>
                                                            </thead>
                                                        @elseif (isset($applications->get_application_progress_master_details[2]))
                                                            <thead>
                                                                <th>SlNo</th>
                                                                <th>Note</th>
                                                                <th>Put Up By</th>
                                                                <th>Date</th>
                                                            </thead>
                                                        @elseif (isset($applications->get_application_progress_master_details[3]))
                                                            <thead>
                                                                <th>SlNo</th>
                                                                <th>Note</th>
                                                                <th>Put Up By</th>
                                                                <th>Date</th>
                                                            </thead>
                                                        @elseif (isset($applications->get_application_progress_master_details[4]))
                                                            <thead>
                                                                <th>SlNo</th>
                                                                <th>Note</th>
                                                                <th>Put Up By</th>
                                                                <th>Date</th>
                                                            </thead>
                                                        @else 
                                                        @endif --}}
                                                        <thead>
                                                            <th>SlNo</th>
                                                            <th>Notes</th>
                                                            <th>Put Up By</th>
                                                            <th>Date</th>
                                                        </thead>

                                                        {{-- Way 1 Start --}}
                                                        <body>
                                                            {{-- <pre>{{ print_r($applications->get_application_progress_master_details->toArray()) }}</pre> --}}
                                                            @php
                                                                $bg_array = ['#22355a', '#223a5a', '#54599a', '#e445aa', '#ea96aa', '#ff4566', '#ef6569', '#fff696', '#ff8596', '#556dff'];
                                                            @endphp
                                                            @foreach ($applications->get_application_progress_master_details as $key => $item)
                                                                <tr class="bg-{{ $item->get_user_details->role_id == 1 ? 'secondary': '' }}" style="">
                                                                    <td width="5%">
                                                                        {{ ++$key }}
                                                                    </td>
                                                                    <td width="65%">
                                                                        {{ $item->remarks ?? '' }}
                                                                    </td>
                                                                    <td width="10%" class="">
                                                                        {{-- class="text-white" style="background-color: {{ $bg_array[$item->get_user_details ? $item->get_user_details->role_id : 0] }}"> --}}
                                                                        {{-- ({{ $item->get_user_details->role_id == 1 ? 'Exporter' : $item->get_user_details->get_role_details->name }}) --}}
                                                                        <b>({{ $item->get_user_details->role_id == 1 ? 'Exporter' : $item->get_user_details->get_role_details->name }})</b>
                                                                    </td>
                                                                    <td width="20%">
                                                                        {{ date('d-m-Y h:i:s a', strtotime($item->created_at)) ?? '' }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </body>
                                                        {{-- Way 1 end --}}

                                                        {{-- Way 2 start --}}
                                                        {{-- <tbody>

                                                            @if (isset($applications->get_application_progress_master_details[0]))
                                                                <tr>
                                                                    <td width="5%">
                                                                        1
                                                                    </td>
                                                                    <td width="65%">
                                                                        {{ $applications->get_application_progress_master_details[0]->remarks ?? '' }}
                                                                    </td>
                                                                    <td width="10%">
                                                                        ({{ $applications->get_application_progress_master_details[0]->get_user_details->get_role_details->name ?? '' }})
                                                                    </td>
                                                                    <td width="20%">
                                                                        {{ date('d-m-Y h:i:s a', strtotime($applications->get_application_progress_master_details[0]->created_at)) ?? '' }}
                                                                    </td>
                                                                </tr>
                                                            @endif

                                                            @if (isset($applications->get_application_progress_master_details[1]))
                                                                <tr>
                                                                    <td width="5%">
                                                                        2
                                                                    </td>
                                                                    <td width="65%">
                                                                        {{ $applications->get_application_progress_master_details[1]->remarks ?? '' }}
                                                                    </td>
                                                                    <td width="10%">
                                                                        ({{ $applications->get_application_progress_master_details[1]->get_user_details->get_role_details->name ?? '' }})
                                                                    </td>
                                                                    <td width="20%">
                                                                        {{ date('d-m-Y h:i:s a', strtotime($applications->get_application_progress_master_details[1]->created_at)) ?? '' }}
                                                                    </td>
                                                                </tr>
                                                            @endif

                                                            @if (isset($applications->get_application_progress_master_details[2]))
                                                                <tr>
                                                                    <td width="5%">
                                                                        3
                                                                    </td>
                                                                    <td width="65%">
                                                                        {{ $applications->get_application_progress_master_details[2]->remarks ?? '' }}
                                                                    </td>
                                                                    <td width="10%">
                                                                        ({{ $applications->get_application_progress_master_details[2]->get_user_details->get_role_details->name ?? '' }})
                                                                    </td>
                                                                    <td width="20%">
                                                                        {{ date('d-m-Y h:i:s a', strtotime($applications->get_application_progress_master_details[2]->created_at)) ?? '' }}
                                                                    </td>
                                                                </tr>
                                                            @endif

                                                            @if (isset($applications->get_application_progress_master_details[3]))
                                                                <tr>

                                                                    <td width="5%">
                                                                        4
                                                                    </td>
                                                                    <td width="65%">
                                                                        {{ $applications->get_application_progress_master_details[3]->remarks ?? '' }}
                                                                    </td>
                                                                    <td width="10%">
                                                                        ({{ $applications->get_application_progress_master_details[3]->get_user_details->get_role_details->name ?? '' }})
                                                                    </td>
                                                                    <td width="20%">
                                                                        {{ date('d-m-Y h:i:s a', strtotime($applications->get_application_progress_master_details[3]->created_at)) ?? '' }}
                                                                    </td>
                                                                </tr>
                                                            @endif

                                                            @if (isset($applications->get_application_progress_master_details[4]))
                                                                <tr>

                                                                    <td width="5%">
                                                                        5
                                                                    </td>
                                                                    <td width="65%">
                                                                        {{ $applications->get_application_progress_master_details[4]->remarks ?? '' }}
                                                                    </td>
                                                                    <td width="10%">
                                                                        ({{ $applications->get_application_progress_master_details[4]->get_user_details->get_role_details->name ?? '' }})
                                                                    </td>
                                                                    <td width="20%">
                                                                        {{ date('d-m-Y h:i:s a', strtotime($applications->get_application_progress_master_details[4]->created_at)) ?? '' }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tbody> --}}
                                                        {{-- Way 2 End --}}
                                                    </table>
                                                </div>
                                            </div>
                                            {{-- @else --}}
                                            <form action="{{ route($route_name, $applications->id) }}"
                                                class="form-group mb-3" id="status_approval_form"
                                                name="status_approval_form" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    @switch (Auth::user()->role_id)
                                                        @case(2)
                                                            @switch($applications->scheme_id)
                                                                @case(1)
                                                                    @if (!$table_showing_status)
                                                                        <div class="form-group col-md-3">
                                                                            <label for="">Total Expense of Exporter <span
                                                                                    class="text-danger">*</span>
                                                                                <i data-toggle="tooltip" data-placement="right"
                                                                                    title="Total expenses of travel + Total expenses of stall."
                                                                                    class="fa fa-info-circle"></i>
                                                                            </label>
                                                                            <input type="hidden" class="form-control"
                                                                                name="total_expenses" value="{{ $total_expenditure }}" />
                                                                            <input type="text" class="form-control"
                                                                                placeholder="{{ '₹ ' . IND_money_format($total_expenditure) ?? '' }}"
                                                                                readonly />
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label for="">Incentive Amount <span
                                                                                    class="text-danger">*</span>
                                                                                <i data-toggle="tooltip" data-placement="right"
                                                                                    title="Incentive amount of exporters"
                                                                                    class="fa fa-info-circle"></i>
                                                                            </label>
                                                                            <input type="number" name="incentive_amount"
                                                                                class="form-control" id="incentive_amount" value=""
                                                                                placeholder="₹" required />
                                                                        </div>
                                                                    @endif
                                                                @break

                                                                @case(2)
                                                                    @if (!$table_showing_status)
                                                                        <div class="form-group col-md-3">
                                                                            <label for="">Total Certification cost of Exporter
                                                                                <span class="text-danger">*</span>
                                                                                <i data-toggle="tooltip" data-placement="right"
                                                                                    title="Total expenses of travel + Total expenses of stall."
                                                                                    class="fa fa-info-circle"></i>
                                                                            </label>
                                                                            <input type="hidden" class="form-control"
                                                                                name="total_expenses"
                                                                                value="{{ $applications->certi_cost }}" />
                                                                            <input type="text" class="form-control"
                                                                                placeholder="{{ '₹ ' . IND_money_format($applications->certi_cost) ?? '' }}"
                                                                                readonly />
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label for="">Amount by SO :<span
                                                                                    class="text-danger">*</span>
                                                                                <i data-toggle="tooltip" data-placement="right"
                                                                                    title="Incentive amount of exporters"
                                                                                    class="fa fa-info-circle"></i>
                                                                            </label>
                                                                            <input type="number" name="incentive_amount"
                                                                                class="form-control" id="incentive_amount" value=""
                                                                                placeholder="₹" required />
                                                                        </div>
                                                                    @endif
                                                                @break

                                                                @default
                                                                    @if (!$table_showing_status)
                                                                        <div class="form-group col-md-3">
                                                                            <label for="">Total Certification cost of Exporter
                                                                                <span class="text-danger">*</span>
                                                                                <i data-toggle="tooltip" data-placement="right"
                                                                                    title="Total expenses of travel + Total expenses of stall."
                                                                                    class="fa fa-info-circle"></i>
                                                                            </label>
                                                                            <input type="hidden" class="form-control"
                                                                                name="total_expenses"
                                                                                value="{{ $applications->certi_cost }}" />
                                                                            <input type="text" class="form-control"
                                                                                placeholder="{{ '₹ ' . IND_money_format($applications->certi_cost) ?? '' }}"
                                                                                readonly />
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label for="">Amount by SO :<span
                                                                                    class="text-danger">*</span>
                                                                                <i data-toggle="tooltip" data-placement="right"
                                                                                    title="Incentive amount of exporters"
                                                                                    class="fa fa-info-circle"></i>
                                                                            </label>
                                                                            <input type="number" name="incentive_amount"
                                                                                class="form-control" id="incentive_amount" value=""
                                                                                placeholder="₹" required />
                                                                        </div>
                                                                    @endif
                                                            @endswitch
                                                        @break

                                                        @default
                                                            @switch($applications->scheme_id)
                                                                @case(1)
                                                                    <input type="hidden" class="form-control" name="total_expenses"
                                                                        value="{{ $total_expenditure ?? 0 }}" />
                                                                @break

                                                                @case(2)
                                                                    <input type="hidden" class="form-control" name="total_expenses"
                                                                        value="{{ $applications->certi_cost ?? 0 }}" />
                                                                @break

                                                                @default
                                                            @endswitch
                                                            <input type="hidden" class="form-control" name="incentive_amount"
                                                                value="{{ $applications->get_application_progress_master_details[0]->incentive_amount ?? 0 }}" />
                                                    @endswitch

                                                    @switch (Auth::user()->role_id)
                                                        @case(2)
                                                            @if ($applications->status == 1)
                                                                {{-- SO --}}
                                                                {{-- Enter the uploaded file In a table here for the departmental users --}}
                                                                @if ($applications->get_complaince_details->isNotEmpty())
                                                                    <div class="row col-md-12">
                                                                        <span class="m-3">Exporter remarks :
                                                                            <b>{{ $applications->get_complaince_details[0]->exporters_remarks ?? '' }}</b></span>
                                                                        <table
                                                                            class="table table-responsive table-bordered w-100 col-md-12">
                                                                            <thead class="bg-dark text-white">
                                                                                <th width="10%">SlNo</th>
                                                                                <th width="40%">Document Related To</th>
                                                                                <th width="40%">Remarks</th>
                                                                                <th width="60%">Document file view</th>
                                                                            </thead>

                                                                            {{-- loop with the latest complaince table data  --}}
                                                                            <tbody>
                                                                                @foreach ($applications->get_complaince_details as $key => $item)
                                                                                    <tr>
                                                                                        <td>{{ ++$key }}</td>
                                                                                        <td>
                                                                                            <select name="" id=""
                                                                                                class="form-control" disabled>
                                                                                                <option value="">--- Select a
                                                                                                    section
                                                                                                    ---
                                                                                                </option>
                                                                                                <option value="1"
                                                                                                    {{ $item->section_type == 1 ? 'selected' : '' }}>
                                                                                                    Exporter Details
                                                                                                </option>
                                                                                                <option value="2"
                                                                                                    {{ $item->section_type == 2 ? 'selected' : '' }}>
                                                                                                    Bank Details
                                                                                                </option>
                                                                                                {{-- <option value="3" {{ $item->section_type == 3 ? 'selected':'' }}>Event Details</option> --}}
                                                                                                <option value="4"
                                                                                                    {{ $item->section_type == 4 ? 'selected' : '' }}>
                                                                                                    Travel Details
                                                                                                </option>
                                                                                                <option value="5"
                                                                                                    {{ $item->section_type == 5 ? 'selected' : '' }}>
                                                                                                    Stall Details
                                                                                                </option>
                                                                                                <option value="6"
                                                                                                    {{ $item->section_type == 6 ? 'selected' : '' }}>
                                                                                                    Additional Details
                                                                                                </option>
                                                                                            </select>
                                                                                        </td>
                                                                                        <td>{{ $item->description ?? '' }}</td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);"
                                                                                                onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/complaince' . $applications->id . '/' . ($item->file_name ?? '')) }}')">
                                                                                                <span
                                                                                                    class="text-warning badge bg-dark p-1">View
                                                                                                    file</span>
                                                                                            </a>

                                                                                            {{-- {{ $item->file_name ?? '' }} --}}
                                                                                            {{-- {{ $item->insert_status }} --}}
                                                                                            <input type="hidden"
                                                                                                name="complaince[status][]"
                                                                                                value="{{ $item->insert_status }}">
                                                                                            <input type="hidden"
                                                                                                name="complaince[id][]"
                                                                                                value="{{ $item->id }}">
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                @endif

                                                                <div class="row col-md-12">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" id="status"
                                                                            class="form-control mb-3 col-md-2">
                                                                            <option value="2">Forward</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control"
                                                                            placeholder="Enter your remarks..." required></textarea>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        @php
                                                                            $button_array = ['', '', 'Forward to Director, DEPM', 'Forward to Addl Special Secretary', 'Forward to Department Secretary', 'Forward to Director, DEPM', '', 'Sanction'];
                                                                        @endphp
                                                                        <input type="submit"
                                                                            class="btn btn-primary text-uppercase"
                                                                            value="{{ $button_array[Auth::user()->role_id] }}">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @break

                                                        @case(3)
                                                            {{-- DIR DEPM --}}
                                                            @if ($applications->status == 2)
                                                                <div class="row col-md-12">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" id="status"
                                                                            class="form-control mb-3 col-md-2">
                                                                            <option value="4">Forward
                                                                            </option>
                                                                            <option value="5">Query
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control"
                                                                            placeholder="Enter your remarks..." required></textarea>
                                                                    </div>

                                                                    {{-- add  more section starts --}}
                                                                    <div class="add_div_div col-md-12 d-none">
                                                                        <div class="form-group col-md-12 add_div" id="add_div0">
                                                                            <div class="row">
                                                                                <!-- form sections -->
                                                                                <div class="form-group col-md-6">
                                                                                    <select name="complaince[0][section_name]"
                                                                                        id="section_name0" class="form-control"
                                                                                        disabled>
                                                                                        <option value="">--- Select a section
                                                                                            ---
                                                                                        </option>
                                                                                        <option value="1">Exporter Details
                                                                                        </option>
                                                                                        <option value="2">Bank Details
                                                                                        </option>
                                                                                        {{-- <option value="3">Event Details</option> --}}
                                                                                        <option value="4">Travel Details
                                                                                        </option>
                                                                                        <option value="5">Stall Details
                                                                                        </option>
                                                                                        <option value="6">Additional Details
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <!-- text -->
                                                                                <div class="form-group col-md-5">
                                                                                    <input type="text"
                                                                                        name="complaince[0][file_name]"
                                                                                        id="file_name0" class="form-control"
                                                                                        placeholder="Enter the file type"
                                                                                        value="" disabled />
                                                                                </div>
                                                                                <!-- file -->
                                                                                {{-- <div class="form-group col-md-3">
                                                                                    <input type="file"
                                                                                        name="complaince[0][comp_doc]"
                                                                                        id="comp_doc0" class="form-control">
                                                                                </div> --}}

                                                                                <!-- Button -->
                                                                                <div class="form-group col-md-1 text-right">
                                                                                    <button type="button" id="add-more"
                                                                                        name="add-more" onclick="addmore()"
                                                                                        class="btn btn-primary">+</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- Add more section ends --}}

                                                                    <div class="form-group col-md-12">
                                                                        @php
                                                                            $button_array = ['', '', 'Forward to Director, DEPM', 'Forward to Addl Special Secretary', 'Forward to Department Secretary', 'Forward to Director, DEPM', '', 'Sanction'];
                                                                        @endphp
                                                                        <input type="submit"
                                                                            class="btn btn-primary text-uppercase btn-name"
                                                                            value="{{ $button_array[Auth::user()->role_id] }}">
                                                                    </div>
                                                                    <script>
                                                                        $('#status').on('change', (e) => {
                                                                            let op = $('#status').val();

                                                                            if (op == 5) {
                                                                                $('.btn-name').val('Query to exporter');
                                                                            } else {
                                                                                $('.btn-name').val('Forward to Addl Special Secretary');
                                                                            }
                                                                        });
                                                                    </script>
                                                                </div>
                                                            @endif
                                                        @break

                                                        @case(4)
                                                            {{-- ADL SCR STY --}}
                                                            @if ($applications->status == 4)
                                                                <div class="row col-md-12">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" id="status"
                                                                            class="form-control mb-3 col-md-2">
                                                                            <option value="6">Approve
                                                                            </option>
                                                                            <option value="7">Query
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control"
                                                                            placeholder="Enter your remarks..." required></textarea>
                                                                    </div>

                                                                    {{-- add  more section starts --}}
                                                                    <div class="add_div_div col-md-12 d-none">
                                                                        <div class="form-group col-md-12 add_div" id="add_div0">
                                                                            <div class="row">
                                                                                <!-- form sections -->
                                                                                <div class="form-group col-md-6">
                                                                                    <select name="complaince[0][section_name]"
                                                                                        id="section_name0" class="form-control"
                                                                                        disabled>
                                                                                        <option value="">--- Select a section
                                                                                            ---
                                                                                        </option>
                                                                                        <option value="1">Exporter Details
                                                                                        </option>
                                                                                        <option value="2">Bank Details
                                                                                        </option>
                                                                                        {{-- <option value="3">Event Details</option> --}}
                                                                                        <option value="4">Travel Details
                                                                                        </option>
                                                                                        <option value="5">Stall Details
                                                                                        </option>
                                                                                        <option value="6">Additional Details
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <!-- text -->
                                                                                <div class="form-group col-md-5">
                                                                                    <input type="text"
                                                                                        name="complaince[0][file_name]"
                                                                                        id="file_name0" class="form-control"
                                                                                        placeholder="Enter the file type"
                                                                                        value="" disabled />
                                                                                </div>
                                                                                <!-- file -->
                                                                                {{-- <div class="form-group col-md-3">
                                                                                    <input type="file"
                                                                                        name="complaince[0][comp_doc]"
                                                                                        id="comp_doc0" class="form-control">
                                                                                </div> --}}

                                                                                <!-- Button -->
                                                                                <div class="form-group col-md-1 text-right">
                                                                                    <button type="button" id="add-more"
                                                                                        name="add-more" onclick="addmore()"
                                                                                        class="btn btn-primary">+</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- Add more section ends --}}
                                                                    <div class="form-group col-md-12">
                                                                        @php
                                                                            $button_array = ['', '', 'Forward to Director, DEPM', 'Forward to Addl Special Secretary', 'Forward to Department Secretary', 'Forward to Director, DEPM', '', 'Sanction'];
                                                                        @endphp
                                                                        <input type="submit"
                                                                            class="btn btn-primary text-uppercase btn-name"
                                                                            value="{{ $button_array[Auth::user()->role_id] }}">
                                                                    </div>
                                                                    <script>
                                                                        $('#status').on('change', (e) => {
                                                                            let op = $('#status').val();

                                                                            if (op == 7) {
                                                                                $('.btn-name').val('Query to exporter');
                                                                            } else {
                                                                                $('.btn-name').val('Forward to Department Secretary');
                                                                            }
                                                                        });
                                                                    </script>
                                                                </div>
                                                            @endif
                                                        @break

                                                        @case(5)
                                                            {{-- DEPT SECTRY --}}
                                                            @if ($applications->status == 6)
                                                                <div class="row col-md-12">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" id="status"
                                                                            class="form-control mb-3 col-md-2">
                                                                            <option value="8">Approve
                                                                            </option>
                                                                            <option value="9">Query
                                                                            </option>
                                                                            <option value="10">Reject application
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control"
                                                                            placeholder="Enter your remarks..." required></textarea>
                                                                    </div>
                                                                    {{-- add  more section starts --}}
                                                                    <div class="add_div_div col-md-12 d-none">
                                                                        <div class="form-group col-md-12 add_div" id="add_div0">
                                                                            <div class="row">
                                                                                <!-- form sections -->
                                                                                <div class="form-group col-md-6">
                                                                                    <select name="complaince[0][section_name]"
                                                                                        id="section_name0" class="form-control"
                                                                                        disabled>
                                                                                        <option value="">--- Select a section
                                                                                            ---
                                                                                        </option>
                                                                                        <option value="1">Exporter Details
                                                                                        </option>
                                                                                        <option value="2">Bank Details
                                                                                        </option>
                                                                                        {{-- <option value="3">Event Details</option> --}}
                                                                                        <option value="4">Travel Details
                                                                                        </option>
                                                                                        <option value="5">Stall Details
                                                                                        </option>
                                                                                        <option value="6">Additional Details
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <!-- text -->
                                                                                <div class="form-group col-md-5">
                                                                                    <input type="text"
                                                                                        name="complaince[0][file_name]"
                                                                                        id="file_name0" class="form-control"
                                                                                        placeholder="Enter the file type"
                                                                                        value="" disabled />
                                                                                </div>
                                                                                <!-- file -->
                                                                                {{-- <div class="form-group col-md-3">
                                                                                    <input type="file"
                                                                                        name="complaince[0][comp_doc]"
                                                                                        id="comp_doc0" class="form-control">
                                                                                </div> --}}

                                                                                <!-- Button -->
                                                                                <div class="form-group col-md-1 text-right">
                                                                                    <button type="button" id="add-more"
                                                                                        name="add-more" onclick="addmore()"
                                                                                        class="btn btn-primary">+</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- Add more section ends --}}
                                                                    <div class="form-group col-md-12">
                                                                        @php
                                                                            $button_array = ['', '', 'Forward to Director, DEPM', 'Forward to Addl Special Secretary', 'Forward to Department Secretary', 'Approve & Forward to Director, DEPM', '', 'Sanction'];
                                                                        @endphp
                                                                        <input type="submit"
                                                                            class="btn btn-primary text-uppercase btn-name"
                                                                            value="{{ $button_array[Auth::user()->role_id] }}">
                                                                    </div>
                                                                    <script>
                                                                        $('#status').on('change', (e) => {
                                                                            let op = $('#status').val();

                                                                            if (op == 9) {
                                                                                $('.btn-name').val('Query to exporter');
                                                                            } else if (op == 10) {
                                                                                $('.btn-name').val('Reject application');
                                                                            } else {
                                                                                $('.btn-name').val('Approve & Forward to Director, DEPM');
                                                                            }
                                                                        });
                                                                    </script>
                                                                </div>
                                                            @endif
                                                        @break

                                                        @case(7)
                                                            {{-- DDO --}}
                                                            @if ($applications->status == 8)
                                                                <div class="row col-md-12">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" id="status"
                                                                            class="form-control mb-3">
                                                                            <option value="7">Sanctioned by DDO</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control"
                                                                            placeholder="Enter your remarks..."></textarea>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        @php
                                                                            $button_array = ['', '', 'Forward to Director, DEPM', 'Forward to Addl Special Secretary', 'Forward to Department Secretary', 'Approve', '', 'Sanction'];
                                                                        @endphp
                                                                        <input type="submit"
                                                                            class="btn btn-primary text-uppercase"
                                                                            value="{{ $button_array[Auth::user()->role_id] }}">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @break

                                                        @default
                                                            <div></div>
                                                    @endswitch
                                                </div>
                                            </form>
                                            {{-- @endif --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Main form for approval Ended  --}}

                        {{-- Main content end here --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    @routes
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/farp1_assets/js/formplugins/select2/select2.bundle.js') }}"></script>
    <script src="{{ asset('public/farp1_assets/js/miscellaneous/lightgallery/lightgallery.bundle.js') }}"></script>
    <script>
        function addmore() {
            var lastId = $(".add_div").last().attr("id");
            var res = lastId.split("add_div");
            var counter = parseInt(res[1]) + 1;
            var cols = "";
            var newCols = $('<div class="form-group col-md-12 add_div" id="add_div' + counter + '">');
            cols += '<div class="row">';

            cols +=
                `<div class="form-group col-md-6">
                    <select name="complaince[${counter}][section_name]" id="section_name${counter}"
                        class="form-control" >
                        <option value="">--- Select a section ---
                        </option>
                        <option value="1">Exporter Details
                        </option>
                        <option value="2">Bank Details</option>
                        <option value="4">Travel Details</option>
                        <option value="5">Stall Details</option>
                        <option value="6">Additional Details
                        </option>
                    </select>
                </div>`;
            cols +=
                '<div class="form-group col-md-5"><input type="text" name="complaince[' + counter +
                '][file_name]" id="file_name' + counter +
                '" class="form-control" placeholder="Enter the file type" value="" /></div>';
            // cols += '<div class="form-group col-md-3"><input type="file" name="complaince[' + counter +
            //     '][comp_doc]" id="comp_doc' + counter + '" class="form-control"></div>';
            cols +=
                '<div class="form-group col-md-1 text-right"><button type="button" id="add-more" name="add-more" onclick="removeAdd(' +
                counter + ')" class="btn btn-danger"><i class="fa fa-trash"></i></button></div>';

            cols += "</div>";
            cols += "</div>";
            newCols.append(cols);
            $("#" + lastId).after(newCols);
        }

        function removeAdd(key) {
            $("#add_div" + key).remove();
        }
    </script>

    <script>
        $(document).ready(function() {

            iziToast.success({
                title: 'Success',
                message: {{ Session::get('message') }},
                position: 'topRight'
            });

            // iziToast.error({
            //     title: 'Error',
            //     message: data.message,
            //     position: 'topRight',
            // });

            $(".amount_field").keyup(function() {
                convertToINRFormat($(this).val(), $(this));
            });
            convertToINRFormat($("#total_expenses").val(), $("#total_expenses"));
            convertToINRFormat($("#incentive_amount").val(), $("#incentive_amount"));
        });

        function convertToINRFormat(value, inputField) {
            var number = Number(value.replace(/,/g, ""));
            // India uses thousands/lakh/crore separators
            $('#result').html(number.toLocaleString('en-IN'));

            $('#result1').html(number.toLocaleString('en-IN', {
                maximumFractionDigits: 2,
                style: 'currency',
                currency: 'INR'
            }));

            $(inputField).val(number.toLocaleString('en-IN'));
        }
    </script>
    <script defer>
        function view_file(url) {
            console.log(url);
            Swal.fire({
                title: '<strong>Document</strong>',
                icon: 'info',
                html: '<embed src="' + url + '" width="100%" height="800px" />',
                width: 1200,
                imageWidth: 1200,
                imageHeight: 800,
                showCloseButton: false,
                showCancelButton: false,
                focusConfirm: false,
                showConfirmButton: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                cancelButtonAriaLabel: 'Thumbs down'
            })
        }

        $(document).ready((e) => {
            $('#approval_status').on('change', (e) => {
                let status = $('#approval_status').val();
                if (status == 1 || status != 2) {
                    $('#remarks_label').addClass('d-none');
                    $('#remarks').addClass('d-none');
                } else {
                    $('#remarks_label').removeClass('d-none');
                    $('#remarks').removeClass('d-none');
                }
            });

            $('[data-toggle="tooltip"]').tooltip();

            // 
            $('#status').on('change', (e) => {
                var status = $('#status').val();
                var array = [3, 5, 7, 9];

                if (status == 3 || status == 5 || status == 7 || status == 9) {
                    console.log('yes');
                    // $('.add_div_div').removeClass('d-none');

                    $('#section_name0').removeAttr('disabled');
                    $('#file_name0').removeAttr('disabled');
                } else {
                    console.log('no');
                    // $('.add_div_div').addClass('d-none');

                    $('#section_name0').attr('disabled', 'disabled');
                    $('#file_name0').attr('disabled', 'disabled');
                }
            });
        });
    </script>
@endsection
