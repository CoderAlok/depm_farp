@extends('layouts.app')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Annexure 2
                <sup class="badge badge-primary fw-500">*</sup>
            </h1>
            <div class="subheader-block">Application form for annexure 2</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Annexure 2</h2>
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
                        <form class="p-4" action="javascript:void(0)" id="annexure2_form" name="annexure2_form"
                            enctype="multipart/form-data">
                            {{-- <div class="row">
                                <div class="col-md-4 mb-3">
                                    <h6>Choose Form Type:</h6>
                                    <select class="form-select form-control form-control-sm"
                                        aria-label="Default select example">
                                        <option selected>Form Types</option>
                                        <option value="organic">Organic</option>
                                        <option value="quality">Quality</option>
                                        <option value="testing">Testing</option>
                                        <option value="country-specific">Country Specific</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                </div>
                                <div class="col-md-4 mb-3">
                                </div>
                            </div> <!-- End Row --> --}}

                            {{-- <hr> --}}
                            <h3 class="annex-heading sidebar-bg">Exporter Details</h3>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <h6>1. IEC Number Issued by DGFT</h6>
                                    <input type="text" class="form-control form-control-sm" placeholder="Enter IEC No."
                                        name="" id="" value="{{ $data->get_other_code_details->iec }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <h6>2. Name of Exporter</h6>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Exporting Orgatization " name="" id=""
                                        value="{{ $data->name }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <h6>3. Name Of Proprietor/Director/CEO</h6>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Proprietor/Director/CEO" name="" id=""
                                        value="{{ $data->chief_ex_name }}">
                                </div>
                            </div> <!-- End Row -->


                            <div class="row">
                                <h6>4. Exporter's Contact Details :</h6>
                                <div class="row col-md-12">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">Exporter's Email</label>
                                        <input type="email" class="form-control form-control-sm"
                                            placeholder="Enter Exporter Email id" name="" id=""
                                            value="{{ $data->email }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">Contact No.</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            placeholder="Enter Exporter Contact No." name="" id=""
                                            value="{{ $data->phone }}">
                                    </div>
                                </div>
                            </div> <!-- End Row -->

                            <div class="row">
                                <h6>5. Name Of Banker with details</h6>
                                <div class="row col-md-12">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">Name Of Banker</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="State Bank of India" name="" id=""
                                            value="{{ $data->get_bank_details->name }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">Details A/c No.</label>
                                        <input type="number" class="form-control form-control-sm" placeholder="Account No."
                                            name="" id="" value="{{ $data->get_bank_details->account_no }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">IFSC Code</label>
                                        <input type="tel" class="form-control form-control-sm" placeholder="IFSC code"
                                            name="" id="" value="{{ $data->get_bank_details->ifsc }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">Udayam Regd. No.</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            placeholder="IFSC code" name="" id=""
                                            value="{{ $data->get_other_code_details->urn }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /End Row -->
                            <hr>
                            <h3 class="annex-heading sidebar-bg">Certificate Details</h3>

                            <div class="row">
                                <h6>6. Certificate Details :</h6>
                                <div class="row col-md-12">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label h6">(a). Type of Certificate</label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="type_of_certificate[]" id="organic"
                                                value="Organic">
                                            <label class="form-check-label" for="organic">Organic</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="type_of_certificate[]" id="quality"
                                                value="Quality">
                                            <label class="form-check-label" for="quality">Quality</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="type_of_certificate[]" id="testing"
                                                value="Testing">
                                            <label class="form-check-label" for="testing">Testing</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="type_of_certificate[]" id="country_specific"
                                                value="Country Specific">
                                            <label class="form-check-label" for="country_specific">Country
                                                Specific</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">(b). Name of Certificate. :</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Certificate" name="" id="">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">(c). Certificate Issuing Authority :</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Certificate from" name="" id="">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label h6">(d). Cost of Certificate (Rs) :</label>
                                        <input type="number" class="form-control form-control-sm"
                                            placeholder="Certificate Cost" name="" id="">
                                    </div>
                                </div>
                            </div>
                            <!-- /end row -->

                            <div class="mb-3">
                                <label class="form-label h6">Details of Certification Towards Which The Incentive is
                                    Sought</label>
                                <div class="col-md-4 mb-3">
                                    <input type="text" class="form-control form-control-sm" placeholder=""
                                        name="" id="">
                                </div>
                            </div> <!-- end row -->

                            <hr>
                            <h3 class="annex-heading sidebar-bg">Required Documents Upload</h3>

                            <div class="mb-3">
                                <h6>7. Documents for Verification to be uploaded</h6>
                                <!-- <label class="form-label h6">Documents to be uploaded</label> -->
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">Import Export Code (IEC)
                                                    Certificate</label>
                                            </div>
                                            <div class="col-md-5"><input class="form-control form-control-sm"
                                                    type="file">
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">RCMC</label>
                                            </div>
                                            <div class="col-md-5"><input class="form-control form-control-sm"
                                                    type="file">
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">Copy of Certificate and Proof
                                                    of
                                                    Payment For the certificate</label>
                                            </div>
                                            <div class="col-md-5"><input class="form-control form-control-sm"
                                                    type="file">
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">Copy of Shipping bill/bill of
                                                    export
                                                    lading</label>
                                            </div>
                                            <div class="col-md-5"><input class="form-control form-control-sm"
                                                    type="file">
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">Copy of certificate of origin
                                                    of
                                                    shipment of goods</label>
                                            </div>
                                            <div class="col-md-5"><input class="form-control form-control-sm"
                                                    type="file">
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">Copy of country specific
                                                    Quality
                                                    standard certificate with name of issuing authority</label>
                                            </div>
                                            <div class="col-md-5"><input class="form-control form-control-sm"
                                                    type="file">
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">Copy of name of the
                                                    organization
                                                    provides technology for upgrdation of product</label>
                                            </div>
                                            <div class="col-md-5"><input class="form-control form-control-sm"
                                                    type="file">
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="formFile" class="form-label h6">Proof of payment for the
                                                    certificate</label>
                                            </div>
                                            <div class="col-md-5"><input class="form-control form-control-sm"
                                                    type="file">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- end row -->
                            <div class="row">
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
