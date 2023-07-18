@extends('admin.layouts.app')

@section('content')
    <style>
        input[type='search'] {
            float: right !important;
        }
    </style>
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Pending applications
                <sup class="badge badge-primary fw-500">*</sup>
            </h1>
            <div class="subheader-block d-none">All the pending applications for approval process.</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Application List</h2>
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
                        {{-- Main content start here --}}
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
                                        <th>Application No</th>
                                        <th>Scheme</th>
                                        <th>Exporter name</th>
                                        <th>Contact No</th>
                                        <th>Claimed Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                                    <td width="10%">
                                                        <a href="{{ route('admin.publicity.officer.pending.exporters.applications.details', ['id' => $item['id']]) }}"
                                                            class="" target="_blank">{{ $item['app_no'] ?? '' }}</a>
                                                    </td>
                                                    <td width="3    0%">
                                                        <span>{{ $item['scheme'] ?? '' }}</span>
                                                    </td>
                                                    <td width="10%">
                                                        <span>{{ $item['name'] ?? '' }}</span>
                                                    </td>
                                                    <td width="10%">
                                                        <span>{{ $item['contact_no'] ?? '' }}</span>
                                                    </td>
                                                    <td width="10%">
                                                        <span>{{ $item['claimed_amt'] ?? '' }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-warning text-dark">
                                                            Pending
                                                        </span>
                                                    </td>

                                                    <td width="10%">
                                                        {{-- <a class="edit-user p-3 btn btn-info view_exporter"
                                                            data-toggle="modal" data-target="#viewmodal"
                                                            data-id="{{ $item->id }}">
                                                            <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                                        </a> --}}

                                                        <a class="edit-user p-3 btn btn-info view_exporter btn-sm"
                                                            href="{{ route('admin.publicity.officer.pending.exporters.applications.details', ['id' => $item['id']]) }}">
                                                            <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                                        </a>
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
                                        <th>Application No</th>
                                        <th>Exporter name</th>
                                        <th>Scheme</th>
                                        <th>Claimed Amount</th>
                                        <th>Action</th>
                                    </tfoot> --}}
                                </table>
                                <!-- datatable end -->
                            </div>
                        </div>
                        {{-- Main content end here --}}
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Modal -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('public/farp1_assets/js/datagrid/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('public/farp1_assets/js/datagrid/datatables/datatables.export.js') }}"></script>
    @routes
    <script>
        $(document).ready((e) => {
            // Edit model show
            $("body").on("click", ".edit-user", function(e) {
                // e.preventDefault();
                var id = $(this).attr("data-id");

                // console.log('ID : ' + id);
                $.ajax({
                    type: 'get',
                    url: route('exporter.details', id),
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });
        });
    </script>
@endsection
