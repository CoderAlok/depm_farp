@extends('admin.layouts.app')
<style>

.bg-primary-300{

height: 140px !important;

}

small {
font-weight: 500 !important;color:white !important;
}
</style>

@section('content')
    <main id="js-page-content" role="main" class="page-content">

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">


                    <div class="container-fluid">
                        <!-- Main content starts here -->

                        <main id="js-page-content" role="main" class="page-content">
                            <ol class="breadcrumb page-breadcrumb">

                                <li class="position-absolute pos-top pos-right d-none d-sm-block"><span
                                        class="js-get-date"></span></li>
                            </ol>
                            <div class="subheader">
                                <h1 class="subheader-title">
                                    <i class='subheader-icon fal fa-chart-area'></i> Dashboard
                                </h1>
                            </div>
                            <div class="row">
                            <div class="col-sm-6 col-xl-6">

<div class="row">
<div class="col-sm-6 col-xl-6">
                                            <div style="background:#8e3011;"
                                                class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                                                <div class="">
                                                    <h3 class="display-4 d-block l-h-n m-0 fw-500">

                                                        {{ $tot_application_count }}
                                                        <small
                                                            class="m-0 l-h-n text-white">Total Exporters</small>
                                                    </h3>
                                                </div>
                                                <i class="fal fa-user position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1"
                                                    style="font-size:6rem"></i>
                                            </div>

                             </div>
                             <!-- {{ print_r($application_counts[4])}} -->
                                @foreach ($schemes as $key => $item)

                                        <div class="col-sm-6 col-xl-6">
                                            <div style="background:{{ $item->color ?? '' }}"
                                                class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                                                <div class="">
                                                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                                        {{ $application_counts[$item->id]}}
                                                        <small
                                                            class="m-0 l-h-n text-white">{{ $item->short_name ?? '' }}</small>
                                                    </h3>
                                                </div>
                                                <i class="fal fa-user position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1"
                                                    style="font-size:6rem"></i>
                                            </div>
                                        </div>


                                    @endforeach
</div>


                                </div>

                                <div class="col-lg-6 mb-6">

                                                <!-- Project Card Example -->
                                                <div class="card shadow">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 fw-bold text-primary">Departmental Progress</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="small fw-bold">Scretiny Officer DEPM <span
                                                                class="float-right">{{$application_count_details[2]['count']}}/{{$tot_application_count}}</span>
                                                        </h4>
                                                        <div class="progress mb-4">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width:{{($application_count_details[2]['count']/$tot_application_count)*100}}%" aria-valuenow="{{($application_count_details[2]['count']/$tot_application_count)*100}}" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                        <h4 class="small fw-bold">Director DEPM <span
                                                                class="float-right">{{$application_count_details[3]['count']}}/{{$tot_application_count}}</span>
                                                        </h4>
                                                        <div class="progress mb-4">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width:{{($application_count_details[3]['count']/$tot_application_count)*100}}%" aria-valuenow="{{($application_count_details[3]['count']/$tot_application_count)*100}}" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                        <h4 class="small fw-bold">Additional Secretary <span
                                                                class="float-right">{{$application_count_details[4]['count']}}/{{$tot_application_count}}</span>
                                                        </h4>
                                                        <div class="progress mb-4">
                                                            <div class="progress-bar" role="progressbar" style="width:{{($application_count_details[4]['count']/$tot_application_count)*100}}%"
                                                                aria-valuenow="{{($application_count_details[4]['count']/$tot_application_count)*100}}" aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <h4 class="small fw-bold">Department Secretary <span
                                                                class="float-right">{{$application_count_details[5]['count']}}/{{$tot_application_count}}</span>
                                                        </h4>
                                                        <div class="progress mb-4">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width:{{($application_count_details[5]['count']/$tot_application_count)*100}}%" aria-valuenow="{{($application_count_details[5]['count']/$tot_application_count)*100}}" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                        <h4 class="small fw-bold">DDO <span
                                                                class="float-right">{{$application_count_details[7]['count']}}/{{$tot_application_count}}</span></h4>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width:{{($application_count_details[7]['count']/$tot_application_count)*100}}%" aria-valuenow="{{($application_count_details[7]['count']/$tot_application_count)*100}}" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div  class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 fw-bold text-primary">Categories Wise Exporters</h6>
    </div>
    <div class="card-body">
        <canvas id="myChart"
            style="width: 800px; height: 400px;"></canvas>
    </div>
</div>

                                            </div>


                                    </div>
                                </div>




</div>
                            </div>
                        </main>
                        <!-- Main content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        new Chart(document.getElementById("myChart"), {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($piecart_data['all_names']) !!},
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: {!! json_encode($piecart_data['all_count']) !!}
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
    <script type="text/javascript">
        /* Activate smart panels */
        $('#js-page-content').smartPanel();
    </script>
    <!-- The order of scripts is irrelevant. Please check out the plugin pages for more details about these plugins below: -->
    <script src="{{ asset('public/farp1_assets/js/statistics/peity/peity.bundle.js') }}"></script>
    <script src="{{ asset('public/farp1_assets/js/statistics/flot/flot.bundle.js') }}"></script>
    <script src="{{ asset('public/farp1_assets/js/statistics/easypiechart/easypiechart.bundle.js') }}"></script>
    <script>
        /* defined datas */
        var dataTargetProfit = [
            [1354586000000, 153],
            [1364587000000, 658],
            [1374588000000, 198],
            [1384589000000, 663],
            [1394590000000, 801],
            [1404591000000, 1080],
            [1414592000000, 353],
            [1424593000000, 749],
            [1434594000000, 523],
            [1444595000000, 258],
            [1454596000000, 688],
            [1464597000000, 364]
        ]
        var dataProfit = [
            [1354586000000, 53],
            [1364587000000, 65],
            [1374588000000, 98],
            [1384589000000, 83],
            [1394590000000, 980],
            [1404591000000, 808],
            [1414592000000, 720],
            [1424593000000, 674],
            [1434594000000, 23],
            [1444595000000, 79],
            [1454596000000, 88],
            [1464597000000, 36]
        ]
        var dataSignups = [
            [1354586000000, 647],
            [1364587000000, 435],
            [1374588000000, 784],
            [1384589000000, 346],
            [1394590000000, 487],
            [1404591000000, 463],
            [1414592000000, 479],
            [1424593000000, 236],
            [1434594000000, 843],
            [1444595000000, 657],
            [1454596000000, 241],
            [1464597000000, 341]
        ]
        var dataSet1 = [
            [0, 10],
            [100, 8],
            [200, 7],
            [300, 5],
            [400, 4],
            [500, 6],
            [600, 3],
            [700, 2]
        ];
        var dataSet2 = [
            [0, 9],
            [100, 6],
            [200, 5],
            [300, 3],
            [400, 3],
            [500, 5],
            [600, 2],
            [700, 1]
        ];

        $(document).ready(function() {

            /* init datatables */
            $('#dt-basic-example').dataTable({
                responsive: true,
                dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [{
                        extend: 'colvis',
                        text: 'Column Visibility',
                        titleAttr: 'Col visibility',
                        className: 'btn-outline-default'
                    },
                    {
                        extend: 'csvHtml5',
                        text: 'CSV',
                        titleAttr: 'Generate CSV',
                        className: 'btn-outline-default'
                    },
                    {
                        extend: 'copyHtml5',
                        text: 'Copy',
                        titleAttr: 'Copy to clipboard',
                        className: 'btn-outline-default'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fal fa-print"></i>',
                        titleAttr: 'Print Table',
                        className: 'btn-outline-default'
                    }

                ],
                columnDefs: [{
                        targets: -1,
                        title: '',
                        orderable: false,
                        render: function(data, type, full, meta) {

                            /*
                                                            -- ES6
                                                            -- convert using https://babeljs.io online transpiler
                                                            return `
                        <a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>
                            <i class="fal fa-times"></i>
                        </a>
                        <div class='dropdown d-inline-block dropleft '>
                            <a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>
                                <i class="fal fa-ellipsis-v"></i>
                            </a>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item' href='javascript:void(0);'>Change Status</a>
                                <a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>
                            </div>
                        </div>`;

                                                            ES5 example below:

                                                            */
                            return "\n\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>\n\t\t\t\t\t\t\t<i class=\"fal fa-times\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<div class='dropdown d-inline-block dropleft'>\n\t\t\t\t\t\t\t<a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>\n\t\t\t\t\t\t\t\t<i class=\"fal fa-ellipsis-v\"></i>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t<div class='dropdown-menu'>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Change Status</a>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>";
                        },
                    },

                ]

            });


            /* flot toggle example */
            var flot_toggle = function() {

                var data = [{
                        label: "Target Profit",
                        data: dataTargetProfit,
                        color: myapp_get_color.info_400,
                        bars: {
                            show: true,
                            align: "center",
                            barWidth: 30 * 30 * 60 * 1000 * 80,
                            lineWidth: 0,
                            /*fillColor: {
                                colors: [myapp_get_color.primary_500, myapp_get_color.primary_900]
                            },*/
                            fillColor: {
                                colors: [{
                                        opacity: 0.9
                                    },
                                    {
                                        opacity: 0.1
                                    }
                                ]
                            }
                        },
                        highlightColor: 'rgba(255,255,255,0.3)',
                        shadowSize: 0
                    },
                    {
                        label: "Actual Profit",
                        data: dataProfit,
                        color: myapp_get_color.warning_500,
                        lines: {
                            show: true,
                            lineWidth: 2
                        },
                        shadowSize: 0,
                        points: {
                            show: true
                        }
                    },
                    {
                        label: "User Signups",
                        data: dataSignups,
                        color: myapp_get_color.success_500,
                        lines: {
                            show: true,
                            lineWidth: 2
                        },
                        shadowSize: 0,
                        points: {
                            show: true
                        }
                    }
                ]

                var options = {
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: '#f2f2f2',
                        borderWidth: 1,
                        borderColor: '#f2f2f2'
                    },
                    tooltip: true,
                    tooltipOpts: {
                        cssClass: 'tooltip-inner',
                        defaultTheme: false
                    },
                    xaxis: {
                        mode: "time"
                    },
                    yaxes: {
                        tickFormatter: function(val, axis) {
                            return "$" + val;
                        },
                        max: 1200
                    }

                };

                var plot2 = null;

                function plotNow() {
                    var d = [];
                    $("#js-checkbox-toggles").find(':checkbox').each(function() {
                        if ($(this).is(':checked')) {
                            d.push(data[$(this).attr("name").substr(4, 1)]);
                        }
                    });
                    if (d.length > 0) {
                        if (plot2) {
                            plot2.setData(d);
                            plot2.draw();
                        } else {
                            plot2 = $.plot($("#flot-toggles"), d, options);
                        }
                    }

                };

                $("#js-checkbox-toggles").find(':checkbox').on('change', function() {
                    plotNow();
                });
                plotNow()
            }
            flot_toggle();
            /* flot toggle example -- end*/

            /* flot area */
            var flotArea = $.plot($('#flot-area'), [{
                    data: dataSet1,
                    label: 'New Customer',
                    color: myapp_get_color.success_200
                },
                {
                    data: dataSet2,
                    label: 'Returning Customer',
                    color: myapp_get_color.info_200
                }
            ], {
                series: {
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                    opacity: 0
                                },
                                {
                                    opacity: 0.5
                                }
                            ]
                        }
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    noColumns: 1,
                    position: 'nw'
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    borderColor: '#ddd',
                    tickColor: '#ddd',
                    aboveData: true,
                    borderWidth: 0,
                    labelMargin: 5,
                    backgroundColor: 'transparent'
                },
                yaxis: {
                    tickLength: 1,
                    min: 0,
                    max: 15,
                    color: '#eee',
                    font: {
                        size: 0,
                        color: '#999'
                    }
                },
                xaxis: {
                    tickLength: 1,
                    color: '#eee',
                    font: {
                        size: 10,
                        color: '#999'
                    }
                }

            });
            /* flot area -- end */

            var flotVisit = $.plot('#flotVisit', [{
                    data: [
                        [3, 0],
                        [4, 1],
                        [5, 3],
                        [6, 3],
                        [7, 10],
                        [8, 11],
                        [9, 12],
                        [10, 9],
                        [11, 12],
                        [12, 8],
                        [13, 5]
                    ],
                    color: myapp_get_color.success_200
                },
                {
                    data: [
                        [1, 0],
                        [2, 0],
                        [3, 1],
                        [4, 2],
                        [5, 2],
                        [6, 5],
                        [7, 8],
                        [8, 12],
                        [9, 9],
                        [10, 11],
                        [11, 5]
                    ],
                    color: myapp_get_color.info_200
                }
            ], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                    opacity: 0
                                },
                                {
                                    opacity: 0.12
                                }
                            ]
                        }
                    }
                },
                grid: {
                    borderWidth: 0
                },
                yaxis: {
                    min: 0,
                    max: 15,
                    tickColor: '#ddd',
                    ticks: [
                        [0, ''],
                        [5, '100K'],
                        [10, '200K'],
                        [15, '300K']
                    ],
                    font: {
                        color: '#444',
                        size: 10
                    }
                },
                xaxis: {

                    tickColor: '#eee',
                    ticks: [
                        [2, '2am'],
                        [3, '3am'],
                        [4, '4am'],
                        [5, '5am'],
                        [6, '6am'],
                        [7, '7am'],
                        [8, '8am'],
                        [9, '9am'],
                        [10, '1pm'],
                        [11, '2pm'],
                        [12, '3pm'],
                        [13, '4pm']
                    ],
                    font: {
                        color: '#999',
                        size: 9
                    }
                }
            });


        });
    </script>
@endsection
