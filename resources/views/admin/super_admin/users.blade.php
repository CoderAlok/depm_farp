@extends('admin.layouts.app')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Users
                {{-- <sup class="badge badge-primary fw-500" data-toggle="modal" data-target="#exampleModal"> Add user </sup> --}}
            </h1>
            {{-- <div class="subheader-block">All the departmental users are listed here</div> --}}
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    {{-- <div class="panel-hdr">
                        <h2>User Details</h2>
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
                        <div class="panel-container show">
                            <div class="panel-content">

                                <!-- datatable controls start -->
                                <div class="panel-hdr d-none">
                                    <h2>
                                        Example <span class="fw-300"><i>Table</i></span>
                                    </h2>
                                    <div class="panel-toolbar">
                                        <button class="btn btn-primary btn-sm" data-toggle="dropdown">Table Style</button>
                                        <div
                                            class="dropdown-menu dropdown-menu-animated dropdown-menu-right position-absolute pos-top">
                                            <button class="dropdown-item active" data-action="toggle"
                                                data-class="table-bordered" data-target="#dt-basic-example"> Bordered Table
                                            </button>
                                            <button class="dropdown-item" data-action="toggle" data-class="table-sm"
                                                data-target="#dt-basic-example"> Smaller Table </button>
                                            <button class="dropdown-item" data-action="toggle" data-class="table-dark"
                                                data-target="#dt-basic-example"> Table Dark </button>
                                            <button class="dropdown-item active" data-action="toggle"
                                                data-class="table-hover" data-target="#dt-basic-example"> Table Hover
                                            </button>
                                            <button class="dropdown-item active" data-action="toggle"
                                                data-class="table-stripe" data-target="#dt-basic-example"> Table Stripped
                                            </button>
                                            <div class="dropdown-divider m-0"></div>
                                            <div class="dropdown-multilevel dropdown-multilevel-left">
                                                <div class="dropdown-item">
                                                    tbody color
                                                </div>
                                                <div class="dropdown-menu no-transition-delay">
                                                    <div class="js-tbody-colors dropdown-multilevel dropdown-multilevel-left d-flex flex-wrap"
                                                        style="width: 15.9rem; padding: 0.5rem">
                                                        <a href="javascript:void(0);" data-bg="bg-primary-100"
                                                            class="btn d-inline-block bg-primary-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-200"
                                                            class="btn d-inline-block bg-primary-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-300"
                                                            class="btn d-inline-block bg-primary-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-400"
                                                            class="btn d-inline-block bg-primary-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-500"
                                                            class="btn d-inline-block bg-primary-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-600"
                                                            class="btn d-inline-block bg-primary-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-700"
                                                            class="btn d-inline-block bg-primary-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-800"
                                                            class="btn d-inline-block bg-primary-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-900"
                                                            class="btn d-inline-block bg-primary-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-100"
                                                            class="btn d-inline-block bg-success-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-200"
                                                            class="btn d-inline-block bg-success-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-300"
                                                            class="btn d-inline-block bg-success-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-400"
                                                            class="btn d-inline-block bg-success-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-500"
                                                            class="btn d-inline-block bg-success-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-600"
                                                            class="btn d-inline-block bg-success-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-700"
                                                            class="btn d-inline-block bg-success-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-800"
                                                            class="btn d-inline-block bg-success-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-900"
                                                            class="btn d-inline-block bg-success-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-100"
                                                            class="btn d-inline-block bg-info-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-200"
                                                            class="btn d-inline-block bg-info-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-300"
                                                            class="btn d-inline-block bg-info-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-400"
                                                            class="btn d-inline-block bg-info-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-500"
                                                            class="btn d-inline-block bg-info-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-600"
                                                            class="btn d-inline-block bg-info-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-700"
                                                            class="btn d-inline-block bg-info-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-800"
                                                            class="btn d-inline-block bg-info-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-900"
                                                            class="btn d-inline-block bg-info-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-100"
                                                            class="btn d-inline-block bg-danger-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-200"
                                                            class="btn d-inline-block bg-danger-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-300"
                                                            class="btn d-inline-block bg-danger-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-400"
                                                            class="btn d-inline-block bg-danger-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-500"
                                                            class="btn d-inline-block bg-danger-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-600"
                                                            class="btn d-inline-block bg-danger-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-700"
                                                            class="btn d-inline-block bg-danger-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-800"
                                                            class="btn d-inline-block bg-danger-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-900"
                                                            class="btn d-inline-block bg-danger-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-100"
                                                            class="btn d-inline-block bg-warning-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-200"
                                                            class="btn d-inline-block bg-warning-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-300"
                                                            class="btn d-inline-block bg-warning-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-400"
                                                            class="btn d-inline-block bg-warning-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-500"
                                                            class="btn d-inline-block bg-warning-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-600"
                                                            class="btn d-inline-block bg-warning-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-700"
                                                            class="btn d-inline-block bg-warning-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-800"
                                                            class="btn d-inline-block bg-warning-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-900"
                                                            class="btn d-inline-block bg-warning-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-100"
                                                            class="btn d-inline-block bg-fusion-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-200"
                                                            class="btn d-inline-block bg-fusion-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-300"
                                                            class="btn d-inline-block bg-fusion-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-400"
                                                            class="btn d-inline-block bg-fusion-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-500"
                                                            class="btn d-inline-block bg-fusion-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-600"
                                                            class="btn d-inline-block bg-fusion-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-700"
                                                            class="btn d-inline-block bg-fusion-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-800"
                                                            class="btn d-inline-block bg-fusion-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-900"
                                                            class="btn d-inline-block bg-fusion-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg=""
                                                            class="btn d-inline-block bg-white border width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-multilevel dropdown-multilevel-left">
                                                <div class="dropdown-item">
                                                    thead color
                                                </div>
                                                <div class="dropdown-menu no-transition-delay">
                                                    <div class="js-thead-colors dropdown-multilevel dropdown-multilevel-left d-flex flex-wrap"
                                                        style="width: 15.9rem; padding: 0.5rem">
                                                        <a href="javascript:void(0);" data-bg="bg-primary-100"
                                                            class="btn d-inline-block bg-primary-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-200"
                                                            class="btn d-inline-block bg-primary-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-300"
                                                            class="btn d-inline-block bg-primary-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-400"
                                                            class="btn d-inline-block bg-primary-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-500"
                                                            class="btn d-inline-block bg-primary-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-600"
                                                            class="btn d-inline-block bg-primary-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-700"
                                                            class="btn d-inline-block bg-primary-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-800"
                                                            class="btn d-inline-block bg-primary-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-primary-900"
                                                            class="btn d-inline-block bg-primary-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-100"
                                                            class="btn d-inline-block bg-success-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-200"
                                                            class="btn d-inline-block bg-success-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-300"
                                                            class="btn d-inline-block bg-success-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-400"
                                                            class="btn d-inline-block bg-success-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-500"
                                                            class="btn d-inline-block bg-success-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-600"
                                                            class="btn d-inline-block bg-success-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-700"
                                                            class="btn d-inline-block bg-success-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-800"
                                                            class="btn d-inline-block bg-success-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-success-900"
                                                            class="btn d-inline-block bg-success-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-100"
                                                            class="btn d-inline-block bg-info-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-200"
                                                            class="btn d-inline-block bg-info-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-300"
                                                            class="btn d-inline-block bg-info-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-400"
                                                            class="btn d-inline-block bg-info-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-500"
                                                            class="btn d-inline-block bg-info-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-600"
                                                            class="btn d-inline-block bg-info-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-700"
                                                            class="btn d-inline-block bg-info-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-800"
                                                            class="btn d-inline-block bg-info-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-info-900"
                                                            class="btn d-inline-block bg-info-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-100"
                                                            class="btn d-inline-block bg-danger-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-200"
                                                            class="btn d-inline-block bg-danger-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-300"
                                                            class="btn d-inline-block bg-danger-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-400"
                                                            class="btn d-inline-block bg-danger-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-500"
                                                            class="btn d-inline-block bg-danger-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-600"
                                                            class="btn d-inline-block bg-danger-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-700"
                                                            class="btn d-inline-block bg-danger-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-800"
                                                            class="btn d-inline-block bg-danger-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-danger-900"
                                                            class="btn d-inline-block bg-danger-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-100"
                                                            class="btn d-inline-block bg-warning-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-200"
                                                            class="btn d-inline-block bg-warning-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-300"
                                                            class="btn d-inline-block bg-warning-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-400"
                                                            class="btn d-inline-block bg-warning-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-500"
                                                            class="btn d-inline-block bg-warning-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-600"
                                                            class="btn d-inline-block bg-warning-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-700"
                                                            class="btn d-inline-block bg-warning-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-800"
                                                            class="btn d-inline-block bg-warning-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-warning-900"
                                                            class="btn d-inline-block bg-warning-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-100"
                                                            class="btn d-inline-block bg-fusion-100 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-200"
                                                            class="btn d-inline-block bg-fusion-200 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-300"
                                                            class="btn d-inline-block bg-fusion-300 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-400"
                                                            class="btn d-inline-block bg-fusion-400 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-500"
                                                            class="btn d-inline-block bg-fusion-500 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-600"
                                                            class="btn d-inline-block bg-fusion-600 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-700"
                                                            class="btn d-inline-block bg-fusion-700 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-800"
                                                            class="btn d-inline-block bg-fusion-800 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg="bg-fusion-900"
                                                            class="btn d-inline-block bg-fusion-900 width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                        <a href="javascript:void(0);" data-bg=""
                                                            class="btn d-inline-block bg-white border width-2 height-2 p-0 rounded-0"
                                                            style="margin:1px"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- datatable start -->
                                <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                    <thead>
                                        <th>ID</th>
                                        <th>Role</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $value->get_role_details->name ?? '' }}</td>
                                                <td>{{ $value->username ?? '' }}</td>
                                                <td>{{ $value->first_name . ' ' . $value->last_name }}</td>
                                                <td>{{ $value->email ?? '' }}</td>
                                                <td>{{ $value->phone ?? '' }}</td>
                                                <td>
                                                    {{-- <button type="button" class="ml-3 badge badge-primary" data-toggle="modal"
                                        data-target="#edit_user_modal">
                                        Edit
                                    </button> --}}
                                                    <a class="btn btn-warning text-dark btn-sm edit-user"
                                                        data-toggle="modal" data-target="#edit_user_modal"
                                                        data-id="{{ $value->id }}">edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- <tfoot>
                                        <th>ID</th>
                                        <th>Role</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tfoot> --}}
                                </table>
                                <!-- datatable end -->
                            </div>
                        </div>
                        <!-- Main content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" name="user_add_modal_form" id="user_add_modal_form" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select name="role_id" id="role_id" class="form-control" required>
                                <option value="">Select one</option>
                                @foreach ($roles as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value=""
                                placeholder="Your first name" required />
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value=""
                                placeholder="Your last name" required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value=""
                                placeholder="Your email address" required />
                        </div>
                        {{-- <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value=""
                                placeholder="Your user name" />
                        </div> --}}
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" value=""
                                placeholder="**********" required />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control" value=""
                                placeholder="Your phone number" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" name="user_edit_modal_form" id="user_edit_modal_form" method="post">
                    {{-- @csrf --}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_role_id">Role</label>
                            <input type="hidden" name="edit_user_id" id="edit_user_id" value="" />
                            <select name="edit_role_id" id="edit_role_id" class="form-control" required>
                                <option value="">Select one</option>
                                @foreach ($roles as $key => $item)
                                    <option value="{{ $key }}">
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_first_name">First Name</label>
                            <input type="text" name="edit_first_name" id="edit_first_name" class="form-control"
                                value="" placeholder="Your first name" required />
                        </div>
                        <div class="form-group">
                            <label for="edit_last_name">Last Name</label>
                            <input type="text" name="edit_last_name" id="edit_last_name" class="form-control"
                                value="" placeholder="Your last name" required />
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="email" name="edit_email" id="edit_email" class="form-control" value=""
                                placeholder="Your email address" readonly />
                        </div>
                        <div class="form-group">
                            <label for="edit_username">Username</label>
                            <input type="text" name="edit_username" id="edit_username" class="form-control"
                                value="" placeholder="Your user name" />
                        </div>
                        {{-- <div class="form-group">
                            <label for="edit_password">Password</label>
                            <input type="password" name="edit_password" id="edit_password" class="form-control"
                                value="" placeholder="**********" />
                        </div> --}}
                        <div class="form-group">
                            <label for="edit_phone">Phone</label>
                            <input type="tel" name="edit_phone" id="edit_phone" class="form-control" value=""
                                placeholder="Your phone number" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @routes
    <script>
        $(document).ready((e) => {

            // Add models
            $('#user_add_modal_form').on('submit', (e) => {
                $.ajax({
                    type: "post",
                    url: route('admin.users.add'),
                    data: $('#user_add_modal_form').serialize(),
                    dataType: "json",
                    success: function(data) {
                        iziToast.success({
                            title: 'Success',
                            message: data.message,
                            position: 'topRight',
                        });
                        window.location.reload();
                    },
                });
            })

            // Edit model called
            $("body").on("click", ".edit-user", function(e) {
                e.preventDefault();
                var id = $(this).attr("data-id");

                console.log('ID : ' + id);
                $.ajax({
                    type: 'post',
                    url: route('admin.users.show'),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        console.log(data);
                        // console.log(data.data.status);
                        $('#edit_user_id').val(data.data.id);
                        $('#edit_role_id').val(data.data.role_id);
                        $('#edit_first_name').val(data.data.first_name);
                        $('#edit_last_name').val(data.data.last_name);
                        $('#edit_email').val(data.data.email);
                        $('#edit_username').val(data.data.username);
                        // $('#edit_password').val(data.data.password);
                        $('#edit_phone').val(data.data.phone);
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });

            // Edit modal update
            $('#user_edit_modal_form').on('submit', (e) => {
                $.ajax({
                    type: "post",
                    url: route('admin.users.edit'),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: $('#user_edit_modal_form').serialize(),
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        iziToast.success({
                            title: 'Success',
                            message: data.message,
                            position: 'topRight',
                        });
                        window.location.reload();
                    },
                });
            })
        });
    </script>
@endsection
