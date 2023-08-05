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
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    {{-- <div class="panel-hdr">
                        <h2>Application No : <b
                                class="text-uppercase font-size-600 ml-2">{{ $applications->app_no ?? '' }}</b></h2>
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
                                                <a href="javascript:void(0);"
                                                    onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/iec' . '/' . ($applications->get_file_details->iec_file ?? '')) }}')">
                                                    <span class="text-warning badge bg-dark p-1">View file</span>
                                                </a>
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
                                <div id="js_demo_accordion-3c" class="collapse show" data-parent="#js_demo_accordion-3">
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

                        <!-- Start Condition for Travel and Stall Details Row -->
                        @switch($applications->scheme_id)
                            @case(1)
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
                                        <div id="js_demo_accordion-3d" class="collapse show" data-parent="#js_demo_accordion-3">
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


                                                    @if ($applications->get_event_details->event_type == 3)
                                                        <div class="col-md-4 mb-3 other_event_details_div">
                                                            <label class="form-label h6">Other events details <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="other_event_details"
                                                                id="other_event_details" class="form-control"
                                                                value="{{ $applications->get_event_details->other_event_type ?? '' }}"
                                                                placeholder="Enter other event details..." readonly>
                                                        </div>
                                                    @endif

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
                                                    data-target="#js_demo_accordion-3e" aria-expanded="true">
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
                                            <div id="js_demo_accordion-3e" class="collapse show"
                                                data-parent="#js_demo_accordion-3">
                                                <div class="card-body">
                                                    {{-- <div class="row col-md-12">
                                                        <div class="col-md-4 mb-1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1"
                                                                    id="travel_details" name="travel_details">
                                                                <label class="form-check-label h6" for="travel_details">
                                                                    Travel Details
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                    {{-- Travel details div --}}
                                                    @foreach ($applications->get_travel_details as $key => $item)
                                                        <div class="row col-md-12 travel_details_div mt-3 mb-3">
                                                            <div class="col-md-4 mb-1">
                                                                <label class="form-label h6">(a). Travel Destination Type <span
                                                                        class="text-danger">*</span></label>
                                                                <br />
                                                                @php
                                                                    $destination_type = ['', 'Within India', 'Outside India'];
                                                                @endphp
                                                                <input type="text" name="travel_destination_type"
                                                                    id="travel_destination_type" class="form-control"
                                                                    value="{{ $item->destination_type ? $destination_type[$item->destination_type] : '' }}"
                                                                    readonly />
                                                            </div>

                                                            {{-- {{ dd($applications->toArray()) }}   --}}
                                                            @if ($item->destination_type == 2)
                                                                @if ($item->file_visa)
                                                                    <div class="col-md-4 mb-1 upload_visa_div">
                                                                        <label class="form-label h6">(b). Upload Visa Invitation
                                                                            Letter
                                                                            <span class="text-danger">*</span></label>
                                                                        <a href="javascript:void(0);"
                                                                            onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/visa_image' . '/' . ($item->file_visa ?? '')) }}')">
                                                                            <span class="text-warning badge bg-dark p-1">View
                                                                                file</span>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endif

                                                            <div class="col-md-4 mb-1">
                                                                <label class="form-label h6">(c). Name of the Traveller <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="traveller_name" id="traveller_name"
                                                                    class="form-control"
                                                                    value="{{ $item->traveller_name ?? '' }}" reaonly />
                                                            </div>
                                                            <div class="col-md-4 mb-1">
                                                                <label class="form-label h6">(d). Designation <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="traveller_designation"
                                                                    id="traveller_designation" class="form-control"
                                                                    value="{{ $item->designation ?? '' }}" readonly />
                                                            </div>

                                                            <div class="col-md-4 mb-1">
                                                                <label class="form-label h6">(e). Mode of Travel <span
                                                                        class="text-danger">*</span></label>
                                                                @php
                                                                    $mode_of_travel = ['', 'Flight', 'Train'];
                                                                @endphp
                                                                <input type="text" name="mode_of_travel" id="mode_of_travel"
                                                                    class="form-control"
                                                                    value="{{ $item->mode_of_travel ? $mode_of_travel[$item->mode_of_travel] : '' }}"
                                                                    readonly />
                                                            </div>

                                                            <div class="col-md-4 mb-1">
                                                                <label class="form-label h6">(f). Class of Travel <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="class_of_tarvel" id="class_of_tarvel"
                                                                    class="form-control"
                                                                    value="{{ $item->class_of_travel ?? '' }}" readonly />
                                                            </div>

                                                            <div class="col-md-4 mb-1">
                                                                <label class="form-label h6">(g). Upload ticket <span
                                                                        class="text-danger">*</span></label>
                                                                <a href="javascript:void(0);"
                                                                    onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/ticket' . '/' . ($applications->get_file_details->file_ticket ?? '')) }}')">
                                                                    <span class="text-warning badge bg-dark p-1">View file</span>
                                                                </a>
                                                            </div>

                                                            @if ($item->mode_of_travel == 1)
                                                                @if ($applications->get_file_details->file_boarding_pass)
                                                                    <div class="col-md-4 mb-1 boarding_pass_div">
                                                                        <label class="form-label h6">(h). Upload Boarding Pass
                                                                            <span class="text-danger">*</span></label>
                                                                        <a href="javascript:void(0);"
                                                                            onclick="view_file('{{ asset('public/storage/images/exporters/applications/' . $applications->app_no . '/boarding_pass' . '/' . ($applications->get_file_details->file_boarding_pass ?? '')) }}')">
                                                                            <span class="text-warning badge bg-dark p-1">View
                                                                                file</span>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endif

                                                            <div class="col-md-4 mb-3">
                                                                <label class="form-label h6">(i). Total expense made for travel
                                                                    (₹)
                                                                    <span class="text-danger">*</span><br /></label>

                                                                <input type="text" name="total_travel_expense"
                                                                    id="total_travel_expense" class="form-control"
                                                                    value="{{ '₹' . IND_money_format($item->total_expense) ?? '' }}"
                                                                    readonly />
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label class="form-label h6">(j). Incentive claimed towards travel
                                                                    (₹)<span class="text-danger">*</span></label>
                                                                <input type="text" name="travel_incentive"
                                                                    id="travel_incentive" class="form-control"
                                                                    value="{{ '₹' . IND_money_format($item->incentive_claimed) ?? '' }}"
                                                                    readonly />
                                                            </div>
                                                        </div>
                                                        <hr />
                                                    @endforeach

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
                                                    data-target="#js_demo_accordion-3e1" aria-expanded="true">
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
                                            <div id="js_demo_accordion-3e1" class="collapse show"
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
                                                    </div> --}}
                                                        {{-- <div class="col-md-4 mb-1">
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
                                                                value="{{ $applications->get_event_details->details ?? '' }}"
                                                                {{-- value="{{ $applications->get_stall_details->get_event_details->details ?? '' }}" --}} readonly>
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
                                                                value="{{ '₹' . IND_money_format($applications->get_stall_details->total_cost) ?? '' }}"
                                                                readonly />
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label h6">(e). Incentive claimed towards Stall
                                                                registration (₹) <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="₹" name="stall_incentive" id="stall_incentive"
                                                                value="{{ '₹' . IND_money_format($applications->get_stall_details->claimed_cost) ?? '' }}"
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
                                {{-- {{ dd($applications->toArray()) }} --}}

                                @if (in_array($applications->status, [3, 5, 7, 9]))
                                    <h4>Complaince Details</h4>

                                    <div class="row mb-3">
                                        <div class="col-md-9">
                                            Exporters Remarks : <span
                                                class="text-danger font-weight-bold">{{ $applications->get_application_progress_master_details[0]->remarks ?? '' }}</span>
                                        </div>
                                        <div class="col-md-3 justify-content-end">
                                            Application status : <span
                                                class="text-danger font-weight-bold">{{ exporter_status_array($applications->status) }}</span>
                                        </div>
                                    </div>

                                    <form
                                        action="{{ route('exporter.application.details.complaince.submit', $applications->id) }}"
                                        class="form-group mb-3 complaince_form_body formSave" id="status_approval_form"
                                        name="status_approval_form" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="row col-md-12">
                                                <div class="form-group col-md-12">
                                                    <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control"
                                                        placeholder="Enter your remarks..." required>{{ $complaince[0]->exporters_remarks ?? '' }}</textarea>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div class="form-check">
                                                        <input type='checkbox' class="form-check-input" value='1'
                                                            id='chkjs' name='chkjs' />
                                                        <label class="form-check-label h6" for="upload_file_check">
                                                            Do you want to upload your files
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- Add more section again for temporary logic starts-->
                                                <div class="add_div_div col-md-12 d-none">
                                                    <div class="form-group col-md-12 add_div" id="add_div0">
                                                        <div class="row">
                                                            <!-- form sections -->
                                                            <div class="form-group col-md-4">
                                                                <select name="complaince[0][section_name]" id="section_name0"
                                                                    class="form-control">
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
                                                            <div class="form-group col-md-4">
                                                                <input type="text" name="complaince[0][file_name]"
                                                                    id="file_name0" class="form-control"
                                                                    placeholder="Enter the file type" value="" />
                                                            </div>
                                                            <!-- file -->
                                                            <div class="form-group col-md-3">
                                                                <input type="file" name="complaince[0][comp_doc]"
                                                                    id="comp_doc0" class="form-control">
                                                            </div>

                                                            <!-- Button -->
                                                            <div class="form-group col-md-1 text-right">
                                                                <button type="button" id="add-more" name="add-more"
                                                                    onclick="addmore()" class="btn btn-primary">+</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Add more section again for temporary logic ends-->

                                                {{-- <pre>{{ print_r($complaince->toArray()) }}</pre> --}}
                                                {{-- add  more section starts --}}
                                                {{-- @foreach ($complaince as $key => $value)
                                                    <input type="hidden" name="complaince[{{ $key }}][id]"
                                                        value="{{ $value->id }}">
                                                    <input type="hidden" name="complaince[{{ $key }}][section_type]"
                                                        value="{{ $value->section_type }}">
                                                    <div class="form-group col-md-12 add_div" id="add_div{{ $key }}">
                                                        <div class="row">
                                                            <!-- form sections -->
                                                            <div class="form-group col-md-4">
                                                                <select name="complaince[{{ $key }}][section_name]"
                                                                    id="section_name{{ $key }}" class="form-control"
                                                                    disabled>
                                                                    <option value="">--- Select a section ---
                                                                    </option>
                                                                    <option value="1"
                                                                        {{ $value->section_type == 1 ? 'selected' : '' }}>Exporter
                                                                        Details
                                                                    </option>
                                                                    <option value="2"
                                                                        {{ $value->section_type == 2 ? 'selected' : '' }}>
                                                                        Bank Details</option>
                                                                    <!-- <option value="3">Event Details</option> -->
                                                                    <option value="4"
                                                                        {{ $value->section_type == 4 ? 'selected' : '' }}>
                                                                        Travel Details</option>
                                                                    <option value="5"
                                                                        {{ $value->section_type == 5 ? 'selected' : '' }}>
                                                                        Stall Details</option>
                                                                    <option value="6"
                                                                        {{ $value->section_type == 6 ? 'selected' : '' }}>
                                                                        Additional Details
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <!-- text -->
                                                            <div class="form-group col-md-4">
                                                                <input type="text"
                                                                    name="complaince[{{ $key }}][file_name]"
                                                                    id="file_name{{ $key }}" class="form-control"
                                                                    placeholder="Enter the file type"
                                                                    value="{{ $value->description ?? '' }}" readonly />
                                                            </div>
                                                            <!-- file -->
                                                            <div class="form-group col-md-4">
                                                                @if ($value->file_name)
                                                                    <a href="javascript:void(0);"
                                                                        onclick="view_file('{{ asset('public/images/exporters/applications/' . $applications->app_no . '/complaince' . $applications->id . '/' . ($value->file_name ?? '')) }}')">
                                                                        <span class="text-warning badge bg-dark p-1">View
                                                                            file</span>
                                                                    </a>
                                                                @else
                                                                    <input type="file"
                                                                        name="complaince[{{ $key }}][comp_doc]"
                                                                        id="comp_doc{{ $key }}" class="form-control"
                                                                        required>
                                                                @endif
                                                            </div>

                                                            <!-- Button -->
                                                            <!--<div class="form-group col-md-1 text-right">
                                                                        <button type="button" id="add-more" name="add-more"
                                                                            onclick="addmore()" class="btn btn-primary">+</button>
                                                                    </div> -->
                                                        </div>
                                                    </div>
                                                @endforeach --}}
                                                {{-- Add more section ends --}}

                                                {{-- {{ $complaince->isEmpty().'asa' }} --}}
                                                {{-- @if ($complaince->isEmpty()) --}}
                                                <div class="form-group col-md-12">
                                                    <button class="btn btn-primary" type="submit">Resubmit Application</button>
                                                </div>
                                                {{-- @endif --}}

                                            </div>
                                        </div>
                                    </form>
                                @endif
                                <!-- Complaince Form  -->

                                @if ($applications->appeal_facility == 1)
                                    <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                                    data-target="#js_demo_accordion-3g" aria-expanded="true">
                                                    <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                                    Appeal Form
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
                                            <div id="js_demo_accordion-3g" class="collapse show"
                                                data-parent="#js_demo_accordion-3">
                                                <div class="card-body">
                                                    <div class="row">
                                                        @if ($applications->appeal_facility == 1)
                                                            <form
                                                                action="{{ route('exporter.application.appeal.submit', $applications->id) }}"
                                                                method="post" name="exporter_appeal_form"
                                                                id="exporter_appeal_form" class="form-group col-md-12 formSave">
                                                                @csrf
                                                                <div class="col-md-12">
                                                                    <div class="col-md-12 m-3">
                                                                        <span>Sanctioned amount :
                                                                            <b>{{ '₹ ' . IND_money_format($applications->get_application_progress_master_details[0]->incentive_amount) ?? '' }}</b></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <textarea name="exporter_appeal_remarks" id="exporter_appeal_remarks" cols="30" rows="5"
                                                                        class="form-control" placeholder="Enter a valid reason for the approval process."></textarea>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    {{-- <input type="submit" value="Submit"
                                                                        class="btn btn-primary mt-3"> --}}
                                                                    <button class="btn btn-primary mt-3"
                                                                        type="submit">Submit</button>
                                                                </div>
                                                            </form>
                                                        @else
                                                            <div class="col-md-12">
                                                                <span>Appeal remarks :
                                                                    <b>{{ $applications->get_applied_details->description ?? '' }}</b></span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @break

                            @default
                                <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                                data-target="#js_demo_accordion-3f" aria-expanded="true">
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
                                        <div id="js_demo_accordion-3f" class="collapse show" data-parent="#js_demo_accordion-3">
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
                                                        <h6>(d). Cost of Certification (Rs) (₹) : <span
                                                                class="text-danger">*</span></h6>
                                                        <input type="text" name="" id="" class="form-control"
                                                            value="{{ '₹ ' . IND_money_format($applications->certi_cost) ?? '' }}"
                                                            readonly>
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

                                <!-- Complaince Form started -->
                                @if (in_array($applications->status, [3, 5, 7, 9]))
                                    <h4>Complaince Details</h4>

                                    <div class="row mb-3">
                                        <div class="col-md-9">
                                            Exporters Remarks : <span
                                                class="text-danger font-weight-bold">{{ $applications->get_application_progress_master_details[0]->remarks ?? '' }}</span>
                                        </div>
                                        <div class="col-md-3 justify-content-end">
                                            Application status : <span
                                                class="text-danger font-weight-bold">{{ exporter_status_array($applications->status) }}</span>
                                        </div>
                                    </div>

                                    <form
                                        action="{{ route('exporter.application.details.complaince.submit', $applications->id) }}"
                                        class="form-group mb-3 complaince_form_body formSave" id="status_approval_form"
                                        name="status_approval_form" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="row col-md-12">
                                                <div class="form-group col-md-12">
                                                    <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control"
                                                        placeholder="Enter your remarks..." required>{{ $complaince[0]->exporters_remarks ?? '' }}</textarea>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div class="form-check">
                                                        <input type='checkbox' class="form-check-input" value='1'
                                                            id='chkjs' name='chkjs' />
                                                        <label class="form-check-label h6" for="upload_file_check">
                                                            Do you want to upload your files
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- Add more section again for temporary logic starts-->
                                                <div class="add_div_div col-md-12 d-none">
                                                    <div class="form-group col-md-12 add_div" id="add_div0">
                                                        <div class="row">
                                                            <!-- form sections -->
                                                            <div class="form-group col-md-4">
                                                                <select name="complaince[0][section_name]" id="section_name0"
                                                                    class="form-control">
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
                                                            <div class="form-group col-md-4">
                                                                <input type="text" name="complaince[0][file_name]"
                                                                    id="file_name0" class="form-control"
                                                                    placeholder="Enter the file type" value="" />
                                                            </div>
                                                            <!-- file -->
                                                            <div class="form-group col-md-3">
                                                                <input type="file" name="complaince[0][comp_doc]"
                                                                    id="comp_doc0" class="form-control">
                                                            </div>

                                                            <!-- Button -->
                                                            <div class="form-group col-md-1 text-right">
                                                                <button type="button" id="add-more" name="add-more"
                                                                    onclick="addmore()" class="btn btn-primary">+</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Add more section again for temporary logic ends-->

                                                {{-- <pre>{{ print_r($complaince->toArray()) }}</pre> --}}
                                                {{-- add  more section starts --}}
                                                {{-- @foreach ($complaince as $key => $value)
                                                    <input type="hidden" name="complaince[{{ $key }}][id]"
                                                        value="{{ $value->id }}">
                                                    <input type="hidden" name="complaince[{{ $key }}][section_type]"
                                                        value="{{ $value->section_type }}">
                                                    <div class="form-group col-md-12 add_div" id="add_div{{ $key }}">
                                                        <div class="row">
                                                            <!-- form sections -->
                                                            <div class="form-group col-md-4">
                                                                <select name="complaince[{{ $key }}][section_name]"
                                                                    id="section_name{{ $key }}" class="form-control"
                                                                    disabled>
                                                                    <option value="">--- Select a section ---
                                                                    </option>
                                                                    <option value="1"
                                                                        {{ $value->section_type == 1 ? 'selected' : '' }}>Exporter
                                                                        Details
                                                                    </option>
                                                                    <option value="2"
                                                                        {{ $value->section_type == 2 ? 'selected' : '' }}>
                                                                        Bank Details</option>
                                                                    <!-- <option value="3">Event Details</option> -->
                                                                    <option value="4"
                                                                        {{ $value->section_type == 4 ? 'selected' : '' }}>
                                                                        Travel Details</option>
                                                                    <option value="5"
                                                                        {{ $value->section_type == 5 ? 'selected' : '' }}>
                                                                        Stall Details</option>
                                                                    <option value="6"
                                                                        {{ $value->section_type == 6 ? 'selected' : '' }}>
                                                                        Additional Details
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <!-- text -->
                                                            <div class="form-group col-md-4">
                                                                <input type="text"
                                                                    name="complaince[{{ $key }}][file_name]"
                                                                    id="file_name{{ $key }}" class="form-control"
                                                                    placeholder="Enter the file type"
                                                                    value="{{ $value->description ?? '' }}" readonly />
                                                            </div>
                                                            <!-- file -->
                                                            <div class="form-group col-md-4">
                                                                @if ($value->file_name)
                                                                    <a href="javascript:void(0);"
                                                                        onclick="view_file('{{ asset('public/images/exporters/applications/' . $applications->app_no . '/complaince' . $applications->id . '/' . ($value->file_name ?? '')) }}')">
                                                                        <span class="text-warning badge bg-dark p-1">View
                                                                            file</span>
                                                                    </a>
                                                                @else
                                                                    <input type="file"
                                                                        name="complaince[{{ $key }}][comp_doc]"
                                                                        id="comp_doc{{ $key }}" class="form-control"
                                                                        required>
                                                                @endif
                                                            </div>

                                                            <!-- Button -->
                                                            <!--<div class="form-group col-md-1 text-right">
                                                                        <button type="button" id="add-more" name="add-more"
                                                                            onclick="addmore()" class="btn btn-primary">+</button>
                                                                    </div> -->
                                                        </div>
                                                    </div>
                                                @endforeach --}}
                                                {{-- Add more section ends --}}

                                                {{-- {{ $complaince->isEmpty().'asa' }} --}}
                                                {{-- @if ($complaince->isEmpty()) --}}
                                                <div class="form-group col-md-12">
                                                    {{-- <input type="submit" class="btn btn-primary text-uppercase"
                                                        value="Resubmit Application"> --}}
                                                    <button type="submit" class="btn btn-primary text-uppercase">Resubmit
                                                        Application</button>
                                                </div>
                                                {{-- @endif --}}
                                            </div>
                                        </div>
                                    </form>
                                @endif
                                <!-- Complaince Form ended -->

                                <!-- Appeal Form ended -->
                                @if ($applications->appeal_facility == 1)
                                    <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                                    data-target="#js_demo_accordion-3g" aria-expanded="true">
                                                    <i class="fal fa-file-medical-alt width-2 fs-xl"></i>
                                                    Appeal Form
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
                                            <div id="js_demo_accordion-3g" class="collapse show"
                                                data-parent="#js_demo_accordion-3">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12 m-3">
                                                            <span>Sanctioned amount :
                                                                <b>{{ '₹ ' . IND_money_format($applications->get_application_progress_master_details[0]->incentive_amount) ?? '' }}</b></span>
                                                        </div>
                                                        @if ($applications->appeal_facility == 1)
                                                            <form
                                                                action="{{ route('exporter.application.appeal.submit', $applications->id) }}"
                                                                method="post" name="exporter_appeal_form"
                                                                id="exporter_appeal_form" class="form-group col-md-12 formSave">
                                                                @csrf
                                                                <div class="col-md-12">
                                                                    <textarea name="exporter_appeal_remarks" id="exporter_appeal_remarks" cols="30" rows="5"
                                                                        class="form-control" placeholder="Enter a valid reason for the approval process."></textarea>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-primary mt-3"
                                                                        type="submit">Submit</button>
                                                                    {{-- <input type="submit" value="Submit"
                                                                        class="btn btn-primary mt-3"> --}}
                                                                </div>
                                                            </form>
                                                        @else
                                                            {{ $applications->get_applied_details }}
                                                            @if ($applications->get_applied_details)
                                                                <div class="col-md-12">
                                                                    <span>Appeal remarks :
                                                                        <b>{{ $applications->get_applied_details->description ?? '' }}</b></span>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!-- Appeal Form ended -->
                        @endswitch
                        <!-- End Condition for Travel and Stall Details Row -->

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

            $('#chkjs').change(function() {
                if (this.checked) {
                    $(".add_div_div").removeClass('d-none');
                } else {
                    $(".add_div_div").addClass('d-none');
                }
            });

            $('textarea').keypress(function(e) {
                var tval = $('textarea').val(),
                    tlength = tval.length,
                    set = 500,
                    remain = parseInt(set - tlength);
                $('p').text(remain);
                if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
                    $('textarea').val((tval).substring(0, tlength - 1))
                }
            })

        });

        function checkDetails(ele) {
            console.log('Value: ' + ele.value + ' ID: ' + ele.id);
        }
    </script>
    <script>
        function addmore() {
            var lastId = $(".add_div").last().attr("id");
            var res = lastId.split("add_div");
            var counter = parseInt(res[1]) + 1;
            var cols = "";
            var newCols = $('<div class="form-group col-md-12 add_div" id="add_div' + counter + '">');
            cols += '<div class="row">';

            cols +=
                `<div class="form-group col-md-4">
                <select name="complaince[${counter}][section_name]" id="section_name${counter}"
                    class="form-control">
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
                '<div class="form-group col-md-4"><input type="text" name="complaince[' + counter +
                '][file_name]" id="file_name' + counter +
                '" class="form-control" placeholder="Enter the file type" value="" /></div>';
            cols += '<div class="form-group col-md-3"><input type="file" name="complaince[' + counter +
                '][comp_doc]" id="comp_doc' + counter + '" class="form-control"></div>';
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
@endsection
