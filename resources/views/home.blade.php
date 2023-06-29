@extends('layouts.app')

@section('content')
    <!-- BEGIN Page Content -->
    <div class="col p-4 offset-md-3 offset-sm-4 offset-xl-2 offset-1">
        <div class="w-100">
            <div class="w-100 bg-white position-relative rounded regFormBox my-3">
                <h3 class="bg-green text-white text-center py-2 mb-2">
                    Dashboard
                </h3>
                <h5>Welcome, {{ $data->name ?? '' }}</h5>
            </div>
            {{-- <pre>{{ print_r($data->toArray()) }}</pre> --}}

            <table class="table table-responsive">
                <tr>
                    <td>Name </td>
                    <td>{{ $data->name }}</td>
                </tr>
                {{-- <tr>
                    <td>Role </td><td>{{ $data->name }}</td>
                </tr> --}}
                <tr>
                    <td>Category </td>
                    <td>{{ $data->get_category_details->name }}</td>
                </tr>
                <tr>
                    <td>Cheif executive name </td>
                    <td>{{ $data->chief_ex_name }}</td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <td>Username </td>
                    <td>{{ $data->username }}</td>
                </tr>
                <tr>
                    <td>Phone </td>
                    <td>{{ $data->phone }}</td>
                </tr>
                <tr>
                    <td>Address </td>
                    <td>
                        {{ $data->get_address_details->address }},
                        {{ $data->get_address_details->post }},
                        {{ $data->get_address_details->city }},
                        {{ $data->get_address_details->district }},
                        {{ $data->get_address_details->pincode }},
                    </td>
                </tr>
                <tr>
                    <td>Bank Name </td>
                    <td>
                        {{ $data->get_bank_details->name }}

                    </td>
                </tr>
                <tr>
                    <td>Account no. </td>
                    <td>
                        {{ $data->get_bank_details->account_no }}
                    </td>
                </tr>
                <tr>
                    <td>IFSC Code. </td>
                    <td>
                        {{ $data->get_bank_details->ifsc }}
                    </td>
                </tr>
                <tr>
                    <td>Cheque image. </td>
                    <td>
                        <img src="{{ asset('public/storage/images/exporters/' . $data->get_bank_details->cheque_img) }}"
                            alt="Cheque image" width="15%">

                    </td>
                </tr>
                <tr>
                    <td>IEC </td>
                    <td>
                        {{ $data->get_other_code_details->iec }}
                    </td>
                </tr>
                <tr>
                    <td>RCMC </td>
                    <td>
                        {{ $data->get_other_code_details->rcmc }}
                    </td>
                </tr>
                <tr>
                    <td>EPC </td>
                    <td>
                        {{ $data->get_other_code_details->epc }}
                    </td>
                </tr>
                <tr>
                    <td>URN </td>
                    <td>
                        {{ $data->get_other_code_details->urn }}
                    </td>
                </tr>
                <tr>
                    <td>HSN </td>
                    <td>
                        {{ $data->get_other_code_details->hsm }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
