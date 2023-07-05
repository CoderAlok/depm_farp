@extends('layouts.app')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Annexure 1
                <sup class="badge badge-primary fw-500">*</sup>
            </h1>
            <div class="subheader-block">Application form for annexure 1</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Annexure 1</h2>
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

                        {{-- <pre>{{ print_r(Session::all()) }}</pre> --}}
                        <!-- Main content starts here -->
                        <form method="POST" class="p-4" action="{{ route('exporter.application.annexure1.submit') }}"
                            name="annexure1_form" id="annexure1_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="exporter_id" id="" value="{{ $data->id ?? '' }}" />
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <h6>Choose Form Type:</h6>
                                    <select class="form-select form-control form-control-sm"
                                        aria-label="Default select example" name="form_type" id="form_type">
                                        <option selected>Form Types</option>
                                        <option value="organic">
                                            National Events
                                        </option>
                                        <option value="quality">
                                            International Events
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3"></div>
                                <div class="col-md-4 mb-3"></div>
                            </div>
                            <!-- End Row -->
                            <hr />

                            <h4 class="annex-heading sidebar-bg">
                                Exporter Details
                            </h4>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <h6>1. IEC Number Issued by DGFT:</h6>
                                    <input type="text" class="form-control form-control-sm" placeholder="Enter IEC No."
                                        name="iec" id="iec"
                                        value="{{ $data->get_other_code_details->iec ?? '' }}" />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <h6>
                                        2. Name of the Exporting Orgatization:
                                    </h6>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Exporting Orgatization " name="exporting_organization"
                                        id="exporting_organization" value="{{ $data->name ?? '' }}" />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <h6>
                                        3. Name Of the Proprietor/Director/CEO:
                                    </h6>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Proprietor/Director/CEO" name="dir_ceo" id="dir_ceo"
                                        value="{{ $data->chief_ex_name ?? '' }}" />
                                </div>
                            </div>
                            <!-- End Row -->

                            <div class="row">
                                <h6>4. Exporter's Contact Details :</h6>
                                <div class="row col-md-12">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">(a).Exporter's Email :</label>
                                        <input type="email" class="form-control form-control-sm"
                                            placeholder="Enter Exporter Email id" name="exptr_email" id="exptr_email"
                                            value="{{ $data->email ?? '' }}" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">(b).Contact No. :</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            placeholder="Enter Exporter Contact No." name="exptr_phone" id="exptr_phone"
                                            value="{{ $data->phone ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            <!-- End Row -->

                            <div class="row">
                                <h6>5. Name Of the Bank with details :</h6>
                                <div class="row col-md-12">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">(a). Name Of the Bank</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Bank name"
                                            name="bank_name" id="bank_name"
                                            value="{{ $data->get_bank_details->name ?? '' }}" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">(b). Details A/c No.</label>
                                        <input type="number" class="form-control form-control-sm"
                                            placeholder="Account No." name="bank_ac" id="bank_ac"
                                            value="{{ $data->get_bank_details->account_no ?? '' }}" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">(c). IFSC Code</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            placeholder="IFSC code" name="bank_ifsc" id="bank_ifsc"
                                            value="{{ $data->get_bank_details->ifsc ?? '' }}" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">(d). Udayam Regd No.</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            placeholder="IFSC code" name="exptr_urn" id="exptr_urn"
                                            value="{{ $data->get_other_code_details->urn ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            <!-- /End Row -->
                            <hr />

                            <h4 class="annex-heading sidebar-bg">
                                Event Details
                            </h4>
                            <div class="mb-3 row">
                                <h6>6. Details of Events</h6>
                                <div class="row col-md-12"></div>
                                <div class="col-md-4 mb-3">
                                    <textarea class="form-control form-control-sm" rows="4" placeholder="Certificate Details " name="event_detail"
                                        id=""></textarea>
                                </div>
                                {{-- Tooltip will be here --}}
                                <div class="col-md-8">
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
                            <!-- end row -->

                            <div class="row">
                                <h6>7. Name of the Event</h6>
                                <div class="row col-md-12">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">Name</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Name"
                                            name="event_name" id="event_name" />
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">Type</label>
                                        <br />
                                        {{-- <select class="form-select form-control form-control-sm"
                                            aria-label="Default select example">
                                            <option selected>Form Types</option>
                                            <option value="Exhibition">Exhibition</option>
                                            <option value="Conference">Conference</option>
                                            <option value="Others">Others</option>
                                        </select> --}}

                                        <div class="form-check form-check-inline mr-3">
                                            <input class="form-check-input" type="radio" name="event_type"
                                                id="event_type_1" value="Exhibition">
                                            <label class="form-check-label" for="mode_of_travel1">Exhibition</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-3">
                                            <input class="form-check-input" type="radio" name="event_type"
                                                id="event_type_2" value="Conference">
                                            <label class="form-check-label" for="mode_of_travel2">Conference</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-3">
                                            <input class="form-check-input" type="radio" name="event_type"
                                                id="event_type_3" value="Others">
                                            <label class="form-check-label" for="mode_of_travel2">Others</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <h6>Place</h6>
                                <div class="row col-md-12">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">City</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="City"
                                            name="event_city" id="event_city" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">Country</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Country"
                                            name="event_country" id="event_country" />
                                    </div>
                                </div>
                            </div>
                            <!-- /End Row -->

                            <div class="row">
                                <h6>Type of Participation</h6>
                                <div class="row col-md-12">
                                    <div class="form-check form-check-inline mr-3">
                                        <input class="form-check-input" type="radio" name="participation_type"
                                            id="participation_type1" value="Delegate">
                                        <label class="form-check-label" for="participation_type1">Delegate</label>
                                    </div>
                                    <div class="form-check form-check-inline mr-3">
                                        <input class="form-check-input" type="radio" name="participation_type"
                                            id="participation_type2" value="Exhibit">
                                        <label class="form-check-label" for="participation_type2">Exhibit</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /End Row -->
                            <hr />

                            <h4 class="annex-heading sidebar-bg">
                                Travel Details
                            </h4>
                            <div class="row mb-3">
                                <div class="col-md-12 h6">
                                    8. Travel Details
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-4 mb-1">
                                        <label class="form-label h6">Mode of Travel</label>
                                        <br />
                                        <div class="form-check form-check-inline mr-3">
                                            <input class="form-check-input" type="radio" name="mode_of_travel"
                                                id="mode_of_travel1" value="Flight">
                                            <label class="form-check-label" for="mode_of_travel1">Flight</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-3">
                                            <input class="form-check-input" type="radio" name="mode_of_travel"
                                                id="mode_of_travel2" value="Train">
                                            <label class="form-check-label" for="mode_of_travel2">Train</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">Incentive claimed towrds ticket cost
                                            (Rs)<br /></label>
                                        <input type="number" class="form-control form-control-sm" placeholder="Rs"
                                            name="incentive1" id="incentive1" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">Incentive claimed towards cost of
                                            stall rent (where applicable) (Rs)</label>
                                        <input type="number" class="form-control form-control-sm" placeholder="Rs"
                                            name="incentive2" id="incentive2" />
                                    </div>
                                </div>
                            </div>
                            <hr />

                            <div class="mb-3">
                                <h4 class="annex-heading sidebar-bg">
                                    Required Documents Upload
                                </h4>
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
                                                <input class="form-control form-control-sm" type="file"
                                                    name="file_iec" id="file_iec" />
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">Original ticket and
                                                    boarding passes as
                                                    application to be
                                                    submitted on completion
                                                    of travel</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input class="form-control form-control-sm" type="file"
                                                    name="file_ticket" id="file_ticket" />
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
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">Quotation for the stall
                                                    from the event
                                                    organizer</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input class="form-control form-control-sm" type="file"
                                                    name="quot_file" id="quot_file" />
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">Details of B2B / B2C
                                                    meeting heldDetails of
                                                    the application of event
                                                    such as sale of
                                                    products, business deals
                                                    made etc.</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input class="form-control form-control-sm" type="file"
                                                    name="b2b_detl_file" id="b2b_detl_file" />
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
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr />

                            <div class="row">
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
            console.log('ready');
        });
    </script>
@endsection
