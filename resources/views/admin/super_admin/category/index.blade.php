@extends('admin.layouts.app')

@section('content')

    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Category
                {{-- <sup class="badge badge-primary fw-500" data-toggle="modal" data-target="#exampleModal">Add Category</sup> --}}
            </h1>
            {{-- <div class="subheader-block">All the categories are listed here</div> --}}
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    {{-- <div class="panel-hdr">
                        <h2>Categories Details</h2>
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
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @if (isset($category))
                                            @php
                                                $status_color = ['danger', 'success'];
                                            @endphp
                                            @foreach ($category as $value)
                                                <tr>
                                                    <td>{{ $value->id ?? '' }}</td>
                                                    <td>{{ $value->name ?? '' }}</td>
                                                    <td>
                                                        <input type="checkbox" data-size="sm"
                                                            {{ $value->status == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                            data-on="Active" data-off="Inactive" data-onstyle="success"
                                                            data-offstyle="danger" name="status-list" id="status-list"
                                                            class="status-list" />
                                                    </td>
                                                    </span>
                                                    <td>
                                                        <a class="btn btn-warning text-dark btn-sm edit-user"
                                                            data-toggle="modal" data-target="#edit_user_modal"
                                                            data-id="{{ $value->id }}">edit</a>
                                                        {{-- <button type="button" id="delete_cat" data-id="{{ $value->id }}"
                                                        class="btn btn-danger btn-lg delete-user delete_cat"><i
                                                            class="glyphicon
                                                        glyphicon-trash"></i>
                                                        Delete</button> --}}
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
                                    {{-- <tfoot>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" name="user_add_modal_form" id="user_add_modal_form" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cat_name">Name</label>
                            <input type="text" name="cat_name" id="cat_name" class="form-control" value=""
                                placeholder="Category name" />
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Select one</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" name="user_edit_modal_form" id="user_edit_modal_form" method="post">
                    {{-- @csrf --}}
                    <div class="modal-body">
                        <input type="hidden" name="edit_cat_id" id="edit_cat_id" value="" />
                        <div class="form-group">
                            <label for="edit_cat_name">Name</label>
                            <input type="text" name="edit_cat_name" id="edit_cat_name" class="form-control"
                                value="" placeholder="Category name" />
                        </div>
                        <div class="form-group">
                            <label for="edit_status">Status</label>
                            <select name="edit_status" id="edit_status" class="form-control" required>
                                <option value="">Select one</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
                    url: route('admin.category.store'),
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

            // Edit model show
            $("body").on("click", ".edit-user", function(e) {
                e.preventDefault();
                var id = $(this).attr("data-id");

                // console.log('ID : ' + id);
                $.ajax({
                    type: 'get',
                    url: route('admin.category.show', id),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        console.log(data)
                        $('#edit_cat_id').val(data.data.id);
                        $('#edit_cat_name').val(data.data.name);
                        $('#edit_status').val(data.data.status);
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
                    url: route('admin.category.edit'),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: $('#user_edit_modal_form').serialize(),
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

            // Delete Category
            $("body").on("click", "#delete_cat", function(e) {
                e.preventDefault();
                var id = $(this).attr("data-id");
                let url = route('admin.category.delete', id);
                Swal.fire({
                    title: "Do you really want to delete?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Confirm"
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: url,
                            method: "GET",
                            success: function(data) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal("Cancelled", "Your data is safe :)", "error");
                    }
                });
            });

            $('.status-list').on('change', (e) => {
                let status = $('select.status-list option:selected').checked;
                if (status == 1) {
                    console.log('yes');
                    // $('#class_of_travel').val('Flight');
                    // $('.boarding_pass_div').removeClass('d-none');
                } else {
                    console.log('No'+status);
                    // $('#class_of_travel').val('2nd AC');
                    // $('.boarding_pass_div').addClass('d-none');
                }
            });
        });
    </script>
@endsection
