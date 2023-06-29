@extends('layouts.app')

@section('content')
    <!-- BEGIN Page Content -->
    <div class="col p-4 offset-md-3 offset-sm-4 offset-xl-2 offset-1">
        <div class="w-100">
            <div class="w-100 bg-white position-relative rounded regFormBox my-3">
                <h3 class="bg-green text-white text-center py-2 mb-2">Annexure - 2</h3>
                <form class="p-4">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h6>Choose Form Type:</h6>
                            <select class="form-select form-control form-control-sm" aria-label="Default select example">
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
                    </div> <!-- End Row -->

                    <hr>
                    <h3 class="annex-heading sidebar-bg">Exporter Details</h3>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h6>1. IEC Number Issued by DGFT</h6>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter IEC No."
                                name="" id="" value="{{ $data->get_other_code_details->iec }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <h6>2. Name of Exporter</h6>
                            <input type="text" class="form-control form-control-sm" placeholder="Exporting Orgatization "
                                name="" id="" value="{{ $data->name }}">
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
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Exporter's Email</label>
                            <input type="email" class="form-control form-control-sm" placeholder="Enter Exporter Email id"
                                name="" id="" value="{{ $data->email }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Contact No.</label>
                            <input type="tel" class="form-control form-control-sm"
                                placeholder="Enter Exporter Contact No." name="" id=""
                                value="{{ $data->phone }}">
                        </div>
                    </div> <!-- End Row -->



                    <div class="row">
                        <h6>5. Name Of Banker with details</h6>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">Name Of Banker</label>
                            <input type="text" class="form-control form-control-sm" placeholder="State Bank of India"
                                name="" id="" value="{{ $data->get_bank_details->name }}">
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
                            <input type="tel" class="form-control form-control-sm" placeholder="IFSC code"
                                name="" id="" value="{{ $data->get_other_code_details->urn }}">
                        </div>
                    </div>
                    <!-- /End Row -->
                    <hr>
                    <h3 class="annex-heading sidebar-bg">Certificate Details</h3>

                    <div class="row">
                        <h6>6. Certificate Details :</h6>
                        <div class="col-md-12 mb-1">
                            <label class="form-label h6">(a). Type of Certificate</label> <br>
                            <label class="form-check-label">Organic</label> &nbsp; <input class="form-check-input"
                                type="checkbox" value=""> &nbsp; &nbsp; &nbsp;
                            <label class="form-check-label">Quality</label> &nbsp; <input class="form-check-input"
                                type="checkbox" value=""> &nbsp; &nbsp; &nbsp;
                            <label class="form-check-label">Testing</label> &nbsp; <input class="form-check-input"
                                type="checkbox" value=""> &nbsp; &nbsp; &nbsp;
                            <label class="form-check-label">Country Specific</label> &nbsp; <input
                                class="form-check-input" type="checkbox" value=""> &nbsp; &nbsp; &nbsp;
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">(b). Name of Certificate. :</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Certificate"
                                name="" id="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">(c). Certificate Issuing Authority :</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Certificate from"
                                name="" id="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label h6">(d). Cost of Certificate :</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Certificate Cost"
                                name="" id="">
                        </div>
                    </div>
                    <!-- /end row -->

                    <div class="mb-3">
                        <label class="form-label h6">Details of Certification Towards Which The Incentive is Sought</label>
                        <div class="col-md-4 mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="" name=""
                                id="">
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
                                    <div class="col-md-5"><input class="form-control form-control-sm" type="file">
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="formFile" class="form-label h6">RCMC</label>
                                    </div>
                                    <div class="col-md-5"><input class="form-control form-control-sm" type="file">
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="formFile" class="form-label h6">Copy of Certificate and Proof of
                                            Payment For the certificate</label>
                                    </div>
                                    <div class="col-md-5"><input class="form-control form-control-sm" type="file">
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="formFile" class="form-label h6">Copy of Shipping bill/bill of export
                                            lading</label>
                                    </div>
                                    <div class="col-md-5"><input class="form-control form-control-sm" type="file">
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="formFile" class="form-label h6">Copy of certificate of origin of
                                            shipment of goods</label>
                                    </div>
                                    <div class="col-md-5"><input class="form-control form-control-sm" type="file">
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="formFile" class="form-label h6">Copy of country specific Quality
                                            standard certificate with name of issuing authority</label>
                                    </div>
                                    <div class="col-md-5"><input class="form-control form-control-sm" type="file">
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="formFile" class="form-label h6">Copy of name of the organization
                                            provides technology for upgrdation of product</label>
                                    </div>
                                    <div class="col-md-5"><input class="form-control form-control-sm" type="file">
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="formFile" class="form-label h6">Proof of payment for the
                                            certificate</label>
                                    </div>
                                    <div class="col-md-5"><input class="form-control form-control-sm" type="file">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-sm bg-green text-white w-100">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /END ROW -->
    </div>
@endsection
