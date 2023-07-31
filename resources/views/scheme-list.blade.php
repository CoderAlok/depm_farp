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
                    <div class="panel-hdr">
                        <h2></h2>
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

                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Please choose an application type</h1>
                                    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                                </div>

                                <div class="row app-list-cards">
                                    @foreach ($schemes as $key => $item)
                                        <!-- Earnings (Monthly) Card Example -->
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <a href="{{ route($item->route_name ?? '', $item->id) }}">
                                                <div class="card border-left-primary shadow h-100 py-2"
                                                    style="background:{{ $item->color ?? '' }}">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div
                                                                    class="text-xs text-dark fw-bold text-primary text-uppercase mb-1" style="color: #fff !important">
                                                                    {{-- {{ ++$key . '. ' . $item->short_name ?? '' }}</div> --}}
                                                                    {{ $item->short_name ?? '' }}</div>
                                                                {{-- <div class="h5 mb-0 fw-bold text-gray-800">Rs {{ $item->amount ?? '' }}</div> --}}
                                                            </div>
                                                            <div class="col-auto">
                                                                {{-- <i class="{{ $item->logo ?? '' }} fa-2x text-gray-300"></i> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
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
