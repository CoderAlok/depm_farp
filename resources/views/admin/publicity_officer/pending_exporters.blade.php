@extends('admin.layouts.app')

@section('content')
    <!-- BEGIN Page Content -->
    <!-- the #js-page-content id is needed for some plugins to initialize -->
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i>
                Exporters Pending Applications
                <sup class="badge badge-primary fw-500"></sup>
            </h1>
            <div class="subheader-block">
                Register to create your account
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Application Details</h2>
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
                            {{-- <h1>All the pending application will be Listed here</h1> --}}
                            <table class="table ">
                                <thead>
                                    <th>SlNo</th>
                                    <th>Type</th>
                                    {{-- <th>Category</th> --}}
                                    <th>Name</th>
                                    <th>Cheif Executive</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Username</th>

                                    <th>Address</th>
                                    
                                    <th>Bank name</th>
                                    <th>IFSC</th>

                                    <th>IEC</th>
                                    <th>RCMC</th>
                                    <th>EPC</th>
                                    <th>URN</th>
                                    <th>HSN</th>

                                </thead>

                                <tbody>
                                    @php
                                        $type = ['', '', '', '', '', '', 'Merchant', 'Manufacturer'];
                                    @endphp
                                    @foreach ($exporters as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $type[$item->role_id] }}</td>
                                            {{-- <td>{{ $type[$item->role_id] }}</td> --}}
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->chief_ex_name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->username }}</td>

                                            <td>{{ $item->get_address_details->address }}<br/>{{ $item->get_address_details->post }}<br/>{{ $item->get_address_details->city }}<br/>{{ $item->get_address_details->district }}<br/>{{ $item->get_address_details->pincode }}</td>

                                            <td>{{ $item->get_bank_details->name }}</td>
                                            <td>{{ $item->get_bank_details->ifsc }}</td>
                                            
                                            <td>{{ $item->get_other_code_details->iec }}</td>
                                            <td>{{ $item->get_other_code_details->rcmc }}</td>
                                            <td>{{ $item->get_other_code_details->epc }}</td>
                                            <td>{{ $item->get_other_code_details->urn }}</td>
                                            <td>{{ $item->get_other_code_details->hsm }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- this overlay is activated only when mobile menu is triggered -->
@endsection
