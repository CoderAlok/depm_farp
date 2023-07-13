<!DOCTYPE html>
<!--
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.0
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>
        {{ $page_title ?? '' }}
    </title>
    <meta name="description" content="Regsiter">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">

    <!-- ADDITIONAL CSS  -->
    <link rel="stylesheet" href="{{ asset('public/css/exporter-register-style.css') }}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <!-- bootstrap -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .bg-register {
            background-image: url("{{ asset('public/img/inds.jpg') }}");
            background-position: center;
            background-size: cover;
            height: auto;
        }

        a {
            text-decoration: none;
        }
    </style>

</head>

<body>

    <div class="page-wrapper">
        <div class="page-inner">

            <nav class="navbar topbar py-0">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="#">Govt. of Odisha</a>
                        </li>
                    </ul>
                    <ul class="nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa fa-envelope-o"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa fa-bell"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa fa-user-circle-o"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <nav class="navbar main-nav sticky-top navbar-light bg-white">
                <div class="d-flex align-items-center container p-0">
                    <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center">
                        <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                            <img src="{{ asset('public/img/logo.jpg') }}" alt="SmartAdmin WebApp"
                                aria-roledescription="logo" width="60">
                            <div class="mr-1 text-dark">
                                <div class="page-logo-text">Micro, Small & Medium Enterprise Department</div>
                                <div class="page-logo-text-small mr-1">Government of Odisha</div>
                            </div>
                        </a>
                    </div>
                    <a href="#" class="btn btn-sm bg-clr-1 text-white ml-auto d-none">Create Account</a>
                </div>
            </nav>

            {{-- <pre>{{ print_r($errors->toArray()) }}</pre> --}}
            <div class="w-100 bg-register d-flex align-items-center position-relative">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="w-100 bg-white position-relative rounded regFormBox my-5">
                        <h5 class="bg-gradient-1 text-white text-center py-2 mb-2">Registration Form</h5>
                        <form class="p-5 formSave" action="{{ route('exporter.register.create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 row">
                                <div class="col-md-4">
                                    <h6>1. Type of Exporter <span class="text-danger" title="Type of exporters">*</span>
                                    </h6>
                                    <select id="type" name="type"
                                        class="form-select form-control form-control-sm"
                                        aria-label="Default select example">
                                        <option value="">Choose a type</option>
                                        <option value="0">Merchant</option>
                                        <option value="1">Manufacturer</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="invalid feedback text-danger"role="alert">
                                            <strong>{{ $errors->first('type') }}.</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <h6>2. Choose Category <span class="text-danger"
                                            title="Categories of exporting sectors.">*</span></h6>
                                    <select id="category" name="category"
                                        class="form-select form-control form-control-sm"
                                        aria-label="Default select example">
                                        <option value="">Choose a category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="invalid feedback text-danger"role="alert">
                                            <strong>{{ $errors->first('category') }}.</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <h6>3. Name of Exporting Agency <span class="text-danger"
                                            title="Name of the exporting agency who is applying for this reimbursement scheme.">*</span>
                                    </h6>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Exporter Name" name="exporter_name" id="exporter_name">
                                    @if ($errors->has('exporter_name'))
                                        <span class="invalid feedback text-danger"role="alert">
                                            <strong>{{ $errors->first('exporter_name') }}.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6>4. Name of the Chief Executive Officer (CEO)</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Name <span class="text-danger"
                                                title="Name of the cheif executive officer">*</span></label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="CEO Name" name="ceo_name" id="ceo_name">
                                        @if ($errors->has('ceo_name'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('ceo_name') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Mobile <span class="text-danger"
                                                title="Exporters mobile >number">*</span></label>
                                        <input type="number" class="form-control form-control-sm"
                                            placeholder="Mobile number" name="mobile" id="mobile"
                                            onkeypress="return /^[0-9]+$/i.test(event.key)" data-maxlength="10"
                                            oninput="this.value=this.value.slice(0,this.dataset.maxlength)"
                                            title="Phone number with 7-9 and remaing 9 digit with 0-9" />
                                        @if ($errors->has('mobile'))
                                            <span id="validation_status"></span>
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('mobile') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">E-Mail <span class="text-danger"
                                                title="Exporters email address. It can be his personal or shops email address.">*</span></label>
                                        <input type="email" class="form-control form-control-sm"
                                            placeholder="E-Mail" name="email" id="email">
                                        @if ($errors->has('email'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('email') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6>5. Registered Office Address</h6>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">At <span class="text-danger"
                                                title="">*</span></label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="At/Village/Building..." name="address_at" id="address_at">
                                        @if ($errors->has('address_at'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('address_at') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Post <span class="text-danger"
                                                title="Postal Address">*</span></label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Post Office" name="address_post" id="address_post">
                                        @if ($errors->has('address_post'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('address_post') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City <span class="text-danger"
                                                title="City address">*</span></label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="City/Block" name="address_city" id="address_city">
                                        @if ($errors->has('address_city'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('address_city') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">District <span class="text-danger"
                                                title="District">*</span></label>
                                        <select id="address_district" name="address_district"
                                            class="form-select form-control form-control-sm"
                                            aria-label="Default select example">
                                            <option value="">Select a district <span
                                                    class="text-danger">*</span></option>
                                            @foreach ($districts as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('address_district'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('address_district') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">PIN <span class="text-danger"
                                                title="Pincode of that area.">*</span></label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="PIN Code" name="address_pin" id="address_pin"
                                            max="6" min="6">
                                        @if ($errors->has('address_pin'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('address_pin') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 address_2_div d-none">
                                <h6>6. Registered Factory Office Address</h6>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label">At <span class="text-danger"
                                                title="Exporters factory address">*</span></label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="At/Village/Building..." name="address_at2" id="address_at2">
                                        @if ($errors->has('address_at2'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('address_at2') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Post <span class="text-danger"
                                                title="Exporters factory postal Address">*</span></label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Post Office" name="address_post2" id="address_post2">
                                        @if ($errors->has('address_post2'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('address_post2') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City <span class="text-danger"
                                                title="Exporters factory city address">*</span></label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="City/Block" name="address_city2" id="address_city2">
                                        @if ($errors->has('address_city2'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('address_city2') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">District <span class="text-danger"
                                                title="Exporters district">*</span></label>
                                        <select id="address_district2" name="address_district2"
                                            class="form-select form-control form-control-sm"
                                            aria-label="Default select example">
                                            <option value="">Select a district <span
                                                    class="text-danger">*</span></option>
                                            @foreach ($districts as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('address_district2'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('address_district2') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">PIN <span class="text-danger"
                                                title="Exporters pincode">*</span></label>
                                        {{-- <input type="number" class="form-control form-control-sm"
                                            placeholder="Mobile number" name="mobile" id="mobile"
                                            onkeypress="return /^[0-9]+$/i.test(event.key)" data-maxlength="10"
                                            oninput="this.value=this.value.slice(0,this.dataset.maxlength)"
                                            title="Phone number with 7-9 and remaing 9 digit with 0-9" /> --}}
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="PIN Code" name="address_pin2" id="address_pin2"
                                            max="6" min="6">
                                        @if ($errors->has('address_pin2'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('address_pin2') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6>7. Bank Account Details </h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Bank name <span class="text-danger"
                                                title="Name of the bank">*</span></label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Banker Name" name="bank_name" id="bank_name">
                                        @if ($errors->has('bank_name'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('bank_name') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Account No. <span class="text-danger"
                                                title="Bank account number">*</span></label>
                                        <input type="number" class="form-control form-control-sm"
                                            placeholder="Bank account no" name="bank_ac_no" id="bank_ac_no">
                                        @if ($errors->has('bank_ac_no'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('bank_ac_no') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">IFSC Code <span class="text-danger"
                                                title="ifsc code of that bank account">*</span></label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="IFSC Code" name="bank_ifsc_code" id="bank_ifsc_code">
                                        @if ($errors->has('bank_ifsc_code'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('bank_ifsc_code') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Cancelled Cheque <span class="text-danger"
                                                title="Image of the respective cancelled cheque.">*</span></label>
                                        <input class="form-control form-control-sm" name="bank_cheque"
                                            id="bank_cheque" type="file">
                                        @if ($errors->has('bank_cheque'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('bank_cheque') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mb-0">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <h6>8. IEC (Import Export Code) <span class="text-danger"
                                                title="Import Export Code">*</span></h6>
                                        <input type="text" class="form-control form-control-sm" placeholder="IEC"
                                            name="export_iec" id="export_iec">
                                        @if ($errors->has('export_iec'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('export_iec') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <h6>9. RCMC NO.</h6>
                                        <input type="number" class="form-control form-control-sm"
                                            placeholder="RCMC No" name="export_rcmc_no" id="export_epc">
                                        @if ($errors->has('export_rcmc_no'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('export_rcmc_no') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <h6>10. Name of the EPC</h6>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="EPC Name" name="export_epc" id="export_epc">
                                        @if ($errors->has('export_epc'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('export_epc') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <h6>11. Udayam Registration No. <span class="text-danger"
                                                title="Udayam registration no.">*</span></h6>
                                        <input type="tel" class="form-control form-control-sm"
                                            placeholder="Udayam Registration No" name="export_urn" id="export_urn">
                                        @if ($errors->has('export_urn'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('export_urn') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <h6>12. HSN Code</h6>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="HSN Code" name="export_hsm" id="export_hsm">
                                        @if ($errors->has('export_hsm'))
                                            <span class="invalid feedback text-danger"role="alert">
                                                <strong>{{ $errors->first('export_hsm') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <button type="submit"
                                        class="btn bg-clr-1 text-white fw-bold w-100 sbmt">Submit</button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('welcome') }}" class="link">Already an exporter login
                                        here</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- container -->
            </div>

            <div class="footer-copy d-flex justify-content-center align-items-center text-white w-100 fw-300"
                style="font-size: 12px;background-color: black;">
                2023 © OASYS by&nbsp;<a href='https://oasystspl.com/' class='text-white opacity-40 fw-500'
                    title='Oasys' target='_blank'>https://oasystspl.com/</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('public/farp1_assets/js/formplugins/inputmask/inputmask.bundle.js') }}"></script>
    @routes
    <script>
        $(document).ready((e) => {

            $('.formSave').on('submit', function() {
                var html =
                    '<button class="btn btn-info space-button" type="button" disabled><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading...</button>';
                $('button[type="submit"]').after(html);
                $('button[type="submit"]').hide();
            });


            var form_submit_status = 0;
            $(":input").inputmask();

            // File size check
            $('#bank_cheque').bind('change', (e) => {
                var fsize = $('#bank_cheque')[0].size;
                var file = Math.round((fsize / 1024));
                if (file >= 5120) { //5MB
                    iziToast.error({
                        title: 'Error',
                        message: 'File size must be less then 5mb.',
                        position: 'topRight',
                    });
                } else {
                    iziToast.success({
                        title: 'Success',
                        message: 'File size allowed.',
                        position: 'topRight',
                    });
                }
            })


            $('#mobile').on('blur', (e) => {
                let mobile = $('#mobile').val();
                console.log('mobile' + mobile);

                $.ajax({
                    type: 'post',
                    url: route('exporter.check.mobile'),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        "mobile": mobile
                    },
                    success: function(data) {
                        console.log(data);

                        if (data.data == 1) {
                            form_submit_status = 0;
                            iziToast.warning({
                                title: 'Caution',
                                message: data.message,
                                position: 'topRight',
                            });
                        } else {
                            form_submit_status = 1
                        }
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });

            $('#email').on('blur', (e) => {
                let email = $('#email').val();
                console.log('email' + email);

                $.ajax({
                    type: 'post',
                    url: route('exporter.check.email'),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        "email": email
                    },
                    success: function(data) {
                        console.log(data);

                        if (data.data == 1) {
                            form_submit_status = 0;
                            iziToast.warning({
                                title: 'Caution',
                                message: data.message,
                                position: 'topRight',
                            });

                            $('.sbmt').addClass('disabled');
                        } else {
                            form_submit_status = 1
                        }
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });

            $('#export_hsm').on('blur', (e) => {
                console.log(form_submit_status);
                if (form_submit_status) {
                    $('.sbmt').removeClass('disabled');
                }
            });
        });


        // function validatePhone(phone_number) {
        //     var a = document.getElementById(phone_number).value;
        //     var filter = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/;
        //     if (filter.test(a)) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

        $('#type').on('change', (e) => {
            let type = $('select#type option:selected').val();
            if (type == 1) {
                $('.address_2_div').removeClass('d-none');
            } else {
                $('.address_2_div').addClass('d-none');
            }
        })
    </script>
</body>

</html>
