@extends('admin.layouts.app')

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
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> {{ $page_title ?? '' }}
                <sup class="badge badge-primary fw-500">*</sup>
            </h1>
            <div class="subheader-block">All the schemes are listed here</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
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
                    </div>

                    <div class="container-fluid">
                        <!-- Main content starts here -->
                        <div class="col p-4">
                            <div class="w-100">
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
                                                            <a href="{{ route('dept-sectry.pending.applied.application.details', $item['appl_id']) }}"
                                                                class=""
                                                                target="_blank">{{ $item['app_code'] ?? '' }}</a>
                                                        </td>
                                                        <td width="40%">
                                                            <span>{{ $item['scheme'] ?? '' }}</span>
                                                        </td>
                                                        <td width="10%">
                                                            <span>{{ $item['claimed_amount'] ?? '' }}</span>
                                                        </td>

                                                        <td>
                                                            {{-- Change the color --}}
                                                            @php
                                                                $status_color = ['warning', 'success', 'danger'];
                                                                $status_text = ['Pending', 'Approved', 'Rejected'];
                                                            @endphp
                                                            <span
                                                                class="badge badge-{{ $status_color[$item['status'] ?? 0] }}">
                                                                {{ $status_text[$item['status'] ?? 0] }}
                                                            </span>
                                                        </td>
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
                                    </table>
                                </div>
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
