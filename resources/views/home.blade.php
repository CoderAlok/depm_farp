@extends('layouts.app')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> {{ $page_title ?? '' }}
                <sup class="badge badge-primary fw-500">*</sup>
            </h1>
            <div class="subheader-block">All the exporter details will be listed here.</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Welcome, {{ $data->name ?? '' }}</h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
                        </div>
                    </div>

                    <!-- Main content starts here -->

                    <div class="container-fluid">
                        <!-- Main content starts here -->
                        <div class="col p-4">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">

                                        <!-- Project Card Example -->
                                        <div class="card shadow">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 fw-bold text-primary">Re-imbursements</h6>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="small fw-bold">Exporter <span class="float-right">20%</span>
                                                </h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <h4 class="small fw-bold">Organic <span class="float-right">40%</span>
                                                </h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <h4 class="small fw-bold">Merchant <span class="float-right">60%</span>
                                                </h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 60%"
                                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <h4 class="small fw-bold">Manufacturer <span class="float-right">80%</span>
                                                </h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <h4 class="small fw-bold">Producer <span
                                                        class="float-right">Complete!</span></h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="card shadow">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 fw-bold text-primary">Re-imbursements</h6>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="myChart" style="width: 800px; height: 480px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /END w-100 -->
                        </div>
                        <!-- Main content ends here -->
                    </div>



                    <div class="container-fluid">
                        <div class="mb-4 row">
                            <div class="col-md-4">
                                <h6>1. Type of Exporter</h6>
                                @php
                                    $role = explode(' ', $data->get_role_details->name);
                                @endphp
                                <b>{{ $role[0] . ', ' . ($role[1] ?? '') }}</b>
                            </div>
                            <div class="col-md-4">
                                <h6>2. Choose Category</h6>
                                <b>{{ $data->get_category_details->name }}</b>
                            </div>
                            <div class="col-md-4">
                                <h6>3. Name of Exporter</h6>
                                <b>{{ $data->name }}</b>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6>4. Name of the chief executive</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Name : </label>
                                    <b>{{ $data->chief_ex_name }}</b>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Mobile : </label>
                                    <b>{{ $data->phone }}</b>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">E-Mail : </label>
                                    {{ $data->email }}
                                </div>
                            </div>
                        </div>


                        <div class="mb-4">
                            <h6>5. Registered Office Address</h6>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label">At : </label>
                                    <b>{{ $data->get_address_details->address }}</b>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Post : </label>
                                    {{ $data->get_address_details->post }}
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">City : </label>
                                    {{ $data->get_address_details->city }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">District : </label>
                                    {{ $data->get_address_details->district }}
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">PIN : </label>
                                    <b>{{ $data->get_address_details->pincode }}</b>
                                </div>
                                <div class="col-md-4">
                                    &nbsp;
                                </div>
                            </div>
                        </div>


                        <div class="mb-4">
                            <h6>6. Name Of the Bank</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <b>{{ $data->get_bank_details->name }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6>7. Bank Account Details </h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Account No. : </label>
                                    <b>{{ $data->get_bank_details->account_no }}</b>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">IFSC Code : </label>
                                    <b>{{ $data->get_bank_details->ifsc }}</b>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Consult Cheque : </label>
                                    {{-- <img src="{{ asset('public/storage/images/exporters/' . $data->get_bank_details->cheque_img) }}"
                                        alt="Cheque image" width="15%"> --}}
                                    <a href="javascript:void(0);"
                                        onclick="view_file('{{ asset('public/storage/images/exporters/' . $data->get_bank_details->cheque_img) }}')">
                                        <span class="text-warning badge bg-dark p-1">View file</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <h6>8. IEC (Import Export Code) : </h6>
                                    <b>{{ $data->get_other_code_details->iec }}</b>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <h6>9. RCMC NO. : </h6>
                                    <b>{{ $data->get_other_code_details->rcmc }}</b>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <h6>10. Name of the EPC : </h6>
                                    <b>{{ $data->get_other_code_details->epc }}</b>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <h6>11. Udayam Registration No. : </h6>
                                    <b>{{ $data->get_other_code_details->urn }}</b>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>12. HSM Code : </h6>
                                    <b>{{ $data->get_other_code_details->hsm }}</b>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn bg-clr-1 text-white fw-bold w-100">Submit</button>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Main content ends here -->
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="view_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close text-red" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row center" id="content">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if (Session::has('message'))
        <script>
            iziToast.success({
                title: 'Success',
                message: "{{ Session::get('message') }}",
                position: 'topRight'
            });
        </script>
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        new Chart(document.getElementById("myChart"), {
            type: 'doughnut',
            data: {
                labels: ["MSME", "Trading", "Manufacturing", "Pharma", "Cotton"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: [2478, 5267, 734, 784, 433]
                }]
            },
            options: {
                title: {
                    display: false,
                    text: 'Predicted world population (millions) in 2050'
                }
            }
        });
    </script>


    <style>
        .app-list-cards a {
            text-decoration: none;
        }
    </style>
@endsection
