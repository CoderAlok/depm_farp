@extends('layouts.app')

@section('content')
    <style>
        .bg-gradient-1 {
            background: #30cfd0;
        }

        .sidebar-bg {
            background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
        }

        .sidebar-menu .nav-link {
            color: #FFF;
        }

        label,
        label.h6,
        input,
        textarea,
        input.form-control {
            font-size: 14px;
        }

        .regFormBox {
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.6);
            border-bottom: 6px solid #1F8A70;
            overflow: hidden;
        }

        .regFormBox .form-control.form-control-sm {
            border: 1px solid #1F8A70;
        }
    </style>
    <main id="js-page-content" role="main" class="page-content">
        {{-- <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> {{ $page_title ?? '' }}
                <sup class="badge badge-primary fw-500">*</sup>
            </h1>
            <div class="subheader-block">All the schemes are listed here</div>
        </div> --}}
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    {{-- <div class="panel-hdr">
                        <h2></h2>
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
                        <!-- Main content starts here -->
                        <div class="col p-4">
                            <div class="w-100">

                                {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Please choose an application type</h1> --}}
                                    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                                {{-- </div> --}}
{{-- 
                                <div class="row app-list-cards">
                                    @foreach ($schemes as $key => $item)
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <a href="{{ route($item->route_name ?? '', $item->id) }}">
                                                <div class="card border-left-primary shadow h-100 py-2"
                                                    style="background:{{ $item->color ?? '' }}">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div
                                                                    class="text-xs text-dark fw-bold text-primary text-uppercase mb-1">
                                                                    {{ $item->short_name ?? '' }}</div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="{{ $item->logo ?? '' }} fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <hr> --}}

                                {{-- All the Applications will be listed --}}
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Select your application for appeal</h1>
                                </div>

                                {{-- {{ dd($applications->toArray()) }} --}}
                                <div>
                                    <table id="dt-basic-example"
                                        class="table table-bordered table-hover table-striped w-100">
                                        <thead>
                                            <th>ID</th>
                                            <th>Application No</th>
                                            <th>Scheme</th>
                                            <th>Claimed Amount</th>
                                            <th>Status</th>
                                            {{-- <th>Action</th> --}}
                                        </thead>
                                        <tbody>
                                            @if (isset($applications))
                                                @php
                                                    $type = ['Merchant', 'Manufacturer'];
                                                    $reg_status = ['Pending', 'Approved', 'Rejected'];
                                                    $reg_status_color = ['warning', 'success', 'danger'];
                                                @endphp
                                                @foreach ($applications as $key => $item)
                                                    <tr>
                                                        <td width="5%">{{ ++$key }}</td>
                                                        <td width="20%">
                                                            {{-- <a href="{{ route('admin.publicity.officer.pending.exporters.applications.details', ['id' => $item['id']]) }}"
                                                                class="" target="_blank">{{ $item['app_no'] ?? '' }}</a> --}}
                                                            <a href="{{ route('exporter.application.details', $item['id']) }}"
                                                                class=""
                                                                target="_blank">{{ $item['app_no'] ?? '' }}</a>
                                                        </td>
                                                        <td width="40%">
                                                            <span>{{ $item['get_scheme_details']['short_name'] ?? '' }}</span>
                                                        </td>
                                                        <td width="10%">
                                                            <span>{{ $item['scheme_id'] == 1 ? '₹ ' . IND_money_format(($item['get_stall_details']['claimed_cost'] ?? 0) + ($item['get_travel_details']['incentive_claimed'] ?? 0)) : '₹ ' . IND_money_format($item['certi_cost']) }}</span>
                                                        </td>

                                                        <td>
                                                            {{-- Change the color --}}
                                                            {{-- {{ $item->get_applied_details->confirmed }} --}}
                                                            @php
                                                                $status_color = ['warning', 'success', 'danger'];
                                                                $status_text = ['Appealed', 'Considered', 'Repeled'];
                                                            @endphp
                                                            <span
                                                                class="badge badge-{{ $status_color[$item->get_applied_details->confirmed ?? 0] }}">
                                                                {{ $status_text[$item->get_applied_details->confirmed ?? 0] }}
                                                            </span>
                                                        </td>

                                                        {{-- <td width="10%"> --}}
                                                        {{-- <a class="edit-user p-3 btn btn-info view_exporter"
                                                                data-toggle="modal" data-target="#viewmodal"
                                                                data-id="{{ $item->id }}">
                                                                <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                                            </a> --}}

                                                        {{-- <a class="edit-user p-3 btn btn-info view_exporter btn-sm"
                                                                href="{{ route('admin.publicity.officer.pending.exporters.applications.details', ['id' => $item['id']]) }}">
                                                                <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                                            </a> --}}
                                                        {{-- </td> --}}
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>
                                                        <p>No Data</p>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                        {{-- <tfoot>
                                            <th>ID</th>
                                            <th>Application No</th>
                                            <th>Exporter name</th>
                                            <th>Scheme</th>
                                            <th>Claimed Amount</th>
                                            <th>Action</th>
                                        </tfoot> --}}
                                    </table>
                                </div>

                                {{-- <div class="row">
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
                                </div> --}}
                            </div><!-- /END w-100 -->
                        </div>
                        <!-- Main content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('public/farp1_assets/js/datagrid/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('public/farp1_assets/js/datagrid/datatables/datatables.export.js') }}"></script>

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
