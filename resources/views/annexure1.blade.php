@extends('admin.layouts.app')

@section('content')
    <!-- BEGIN Page Content -->
    <!-- the #js-page-content id is needed for some plugins to initialize -->
    {{-- <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i>
                Dashboard
                <sup class="badge badge-primary fw-500">+</sup>
            </h1>
            <div class="subheader-block">
                All the application details
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                Welcome, {{ $role ?? '' }}
            </div>
        </div>
    </main> --}}
    <!-- this overlay is activated only when mobile menu is triggered -->

    <div class="col p-4 offset-md-3 offset-sm-4 offset-xl-2 offset-1">
        <div class="w-100">
            <div class="w-100 bg-white position-relative rounded regFormBox my-3">
                <h3 class="bg-green text-white text-center py-2 mb-2">
                    Annexure - 1
                </h3>

                <form class="p-4">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h6>Choose Form Type:</h6>
                            <select class="form-select form-control form-control-sm" aria-label="Default select example">
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
                            <input type="number" class="form-control form-control-sm" placeholder="Enter IEC No."
                                name="" id="" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <h6>
                                2. Name of the Exporting
                                Orgatization:
                            </h6>
                            <input type="text" class="form-control form-control-sm" placeholder="Exporting Orgatization "
                                name="" id="" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <h6>
                                3. Name Of the
                                Proprietor/Director/CEO:
                            </h6>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Enter Proprietor/Director/CEO" name="" id="" />
                        </div>
                    </div>
                    <!-- End Row -->

                    <div class="row">
                        <h6>4. Exporter's Contact Details :</h6>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">(a).Exporter's Email :</label>
                            <input type="email" class="form-control form-control-sm" placeholder="Enter Exporter Email id"
                                name="" id="" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">(b).Contact No. :</label>
                            <input type="tel" class="form-control form-control-sm"
                                placeholder="Enter Exporter Contact No." name="" id="" />
                        </div>
                    </div>
                    <!-- End Row -->

                    <div class="row">
                        <h6>
                            5. Name Of the Banker with details :
                        </h6>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">(a). Name Of the Banker</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Name" name=""
                                id="" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">(b). Details A/c No.</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Account No."
                                name="" id="" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">(c). IFSC Code</label>
                            <input type="tel" class="form-control form-control-sm" placeholder="IFSC code"
                                name="" id="" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">(d). Udayam Regd No.</label>
                            <input type="tel" class="form-control form-control-sm" placeholder="IFSC code"
                                name="" id="" />
                        </div>
                    </div>
                    <!-- /End Row -->
                    <hr />

                    <h4 class="annex-heading sidebar-bg">
                        Event Details
                    </h4>
                    <div class="mb-3 row">
                        <h6>6. Details of Events</h6>
                        <div class="col-md-4 mb-3">
                            <textarea class="form-control form-control-sm" rows="4" placeholder="Certificate Details " name=""
                                id=""></textarea>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-success" role="alert">
                                <i class="fa fa-info-circle"
                                    style="
                                            width: 45px;
                                            height: 45px;
                                            display: block;
                                            float: left;
                                            text-align: center;
                                            line-height: 45px;
                                            background: #fff;
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
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Name</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Name" name=""
                                id="" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Type</label>
                            <select class="form-select form-control form-control-sm" aria-label="Default select example">
                                <option selected>Form Types</option>
                                <option value="organic">
                                    National Events
                                </option>
                                <option value="quality">
                                    International Events
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Exhibition</label>
                            <select class="form-select form-control form-control-sm" aria-label="Default select example">
                                <option selected>Form Types</option>
                                <option value="organic">
                                    National Events
                                </option>
                                <option value="quality">
                                    International Events
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Conference</label>
                            <select class="form-select form-control form-control-sm" aria-label="Default select example">
                                <option selected>Form Types</option>
                                <option value="organic">
                                    National Events
                                </option>
                                <option value="quality">
                                    International Events
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Other</label>
                            <select class="form-select form-control form-control-sm" aria-label="Default select example">
                                <option selected>Form Types</option>
                                <option value="organic">
                                    National Events
                                </option>
                                <option value="quality">
                                    International Events
                                </option>
                            </select>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <h6>Place</h6>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">City</label>
                            <input type="text" class="form-control form-control-sm" placeholder="City" name=""
                                id="" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Country</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Country"
                                name="" id="" />
                        </div>
                    </div>
                    <!-- /End Row -->

                    <div class="row">
                        <h6>Type of Participation</h6>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Delegate</label>
                            <input type="tel" class="form-control form-control-sm" placeholder="Delegate"
                                name="" id="" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Exhibit</label>
                            <input type="tel" class="form-control form-control-sm" placeholder="Exhibit"
                                name="" id="" />
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
                        <div class="col-md-4 mb-1">
                            <label class="form-label h6">Mode of Travel</label>
                            <br />
                            <label class="form-check-label">Flight</label>
                            &nbsp;
                            <input class="form-check-input" type="checkbox" value="" />
                            &nbsp; &nbsp; &nbsp;
                            <label class="form-check-label">Train</label>
                            &nbsp;
                            <input class="form-check-input" type="checkbox" value="" />
                            &nbsp; &nbsp; &nbsp;
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Incentive claimed towrds ticket
                                cost <br />
                                Rs</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Certificate"
                                name="" id="" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Incentive claimed towards cost of
                                stall rent (where applicable)
                                Rs</label>
                            <input type="num" class="form-control form-control-sm" placeholder="Certificate from"
                                name="" id="" />
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
                                        <input class="form-control form-control-sm" type="file" />
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
                                        <input class="form-control form-control-sm" type="file" />
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
                                        <input class="form-control form-control-sm" type="file" />
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
                                        <input class="form-control form-control-sm" type="file" />
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
                                        <input class="form-control form-control-sm" type="file" />
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
                                        <input class="form-control form-control-sm" type="file" />
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
                                        <input class="form-control form-control-sm" type="file" />
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-sm bg-green text-white w-100">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /END ROW -->
    </div>
@endsection
