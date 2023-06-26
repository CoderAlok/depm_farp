@extends('admin.layouts.app')

@section('content')
    <!-- BEGIN Page Content -->
    <!-- the #js-page-content id is needed for some plugins to initialize -->
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i>
                Registration Page
                <sup class="badge badge-primary fw-500">ADDON</sup>
            </h1>
            <div class="subheader-block">
                Register to create your account
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Establishment Details</h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- <div class="panel-tag">Establishment Name</div> -->

                            <form action="" method="post">
                                <div class="w-100 mb-3">
                                    <label class="form-label" for="name-f">ESTABLISHMENT DETAILS
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-success">
                                                <i class="fa fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" aria-label="Establishment Name" class="form-control"
                                            placeholder="Establishment Name" id="" />
                                        <input type="text" aria-label="Establishment ID" class="form-control"
                                            placeholder="Establishment ID" id="" />
                                        <input type="text" aria-label="Establishment GST" class="form-control"
                                            placeholder="Establishment GST" id="" />
                                    </div>
                                </div>

                                <div class="w-100 mb-3">
                                    <label class="form-label" for="name-f">NAME :
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-success">
                                                <i class="ni ni-user fs-xl"></i>
                                            </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                            placeholder="First name" id="name-f" />
                                        <input type="text" aria-label="Middle name" class="form-control"
                                            placeholder="Middle name" id="name-m" />
                                        <input type="text" aria-label="Last name" class="form-control"
                                            placeholder="Last name" id="name-l" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">EMAIL</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-success">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="email" id="" name="" class="form-control"
                                                placeholder="example@company.com" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">DATE OF
                                            INCORPORATION</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-success">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input class="form-control" id="example-date" type="date" name="date"
                                                value="2023-07-23" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">PHONE
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-success">
                                                    <i class="fa fa-mobile"></i>
                                                </span>
                                            </div>
                                            <input type="tel" id="" name="" class="form-control"
                                                placeholder="+91-1234567890" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">FATHER'S
                                            NAME</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-success">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="email" id="" name="" class="form-control"
                                                placeholder="John Doe..." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">MOTHER'S
                                            NAME</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-success">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="email" id="" name="" class="form-control"
                                                placeholder="John Doe..." />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">GENDER</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="customRadio"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label"
                                                            for="customRadio1">Male</label>
                                                    </div>
                                                </div>
                                                <div class="input-group-text">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="customRadio"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label"
                                                            for="customRadio2">Female</label>
                                                    </div>
                                                </div>
                                                <div class="input-group-text">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio3" name="customRadio"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label"
                                                            for="customRadio3">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control"
                                                aria-label="Text input with radio button" id="radio-group-1" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">NATIONALITY</label>
                                        <select id="country" name="country" class="form-control">
                                            <option value="Afghanistan">
                                                Afghanistan
                                            </option>
                                            <option value="Åland Islands">
                                                Åland Islands
                                            </option>
                                            <option value="Albania">
                                                Albania
                                            </option>
                                            <option value="Algeria">
                                                Algeria
                                            </option>
                                            <option value="American Samoa">
                                                American Samoa
                                            </option>
                                            <option value="Andorra">
                                                Andorra
                                            </option>
                                            <option value="Angola">
                                                Angola
                                            </option>
                                            <option value="Iceland">
                                                Iceland
                                            </option>
                                            <option value="India">
                                                India
                                            </option>
                                            <option value="Pakistan">
                                                Pakistan
                                            </option>
                                            <option value="Thailand">
                                                Thailand
                                            </option>
                                            <option value="Ukraine">
                                                Ukraine
                                            </option>
                                            <option value="United Arab Emirates">
                                                United Arab
                                                Emirates
                                            </option>
                                            <option value="United Kingdom">
                                                United Kingdom
                                            </option>
                                            <option value="United States">
                                                United States
                                            </option>
                                            <option value="Venezuela">
                                                Venezuela
                                            </option>
                                            <option value="Yemen">
                                                Yemen
                                            </option>
                                            <option value="Zambia">
                                                Zambia
                                            </option>
                                            <option value="Zimbabwe">
                                                Zimbabwe
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">PASSPORT NO.</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-success">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" id="" name="" class="form-control"
                                                placeholder="XYZ4561M" />
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 mb-1">
                                    <label class="form-label" for="name-f">ESTABLISHMENT ADDRESS
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-success">
                                                <i class="ni ni-map fs-xl"></i>
                                            </span>
                                        </div>
                                        <input type="text" aria-label="First name" class="form-control"
                                            placeholder="Address Line 1" id="name-f" />
                                        <input type="text" aria-label="Middle name" class="form-control"
                                            placeholder="Address Line 2" id="name-m" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">City</label>
                                                </div>
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected="">
                                                        Choose...
                                                    </option>
                                                    <option value="1">
                                                        One
                                                    </option>
                                                    <option value="2">
                                                        Two
                                                    </option>
                                                    <option value="3">
                                                        Three
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text"
                                                        for="inputGroupSelect01">District</label>
                                                </div>
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected="">
                                                        Choose...
                                                    </option>
                                                    <option value="1">
                                                        One
                                                    </option>
                                                    <option value="2">
                                                        Two
                                                    </option>
                                                    <option value="3">
                                                        Three
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">State</label>
                                                </div>
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected="">
                                                        Choose...
                                                    </option>
                                                    <option value="1">
                                                        One
                                                    </option>
                                                    <option value="2">
                                                        Two
                                                    </option>
                                                    <option value="3">
                                                        Three
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text">PIN</label>
                                                </div>
                                                <input type="text" id="" name="" class="form-control"
                                                    placeholder="123456" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 clearfix">
                                    <button type="button"
                                        class="btn btn-md btn-success waves-effect waves-themed float-right">
                                        Register Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- this overlay is activated only when mobile menu is triggered -->
@endsection
