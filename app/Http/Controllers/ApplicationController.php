<?php

namespace App\Http\Controllers;

use ApplicationEvents;
use ApplicationFiles;
use Applications;
use ApplicationStalls;
use ApplicationTravels;
use Carbon\Carbon;

class ApplicationController extends Controller
{
    //

    public function index()
    {
        // Just kept for refference
        Applications::get();
        ApplicationEvents::get();
        ApplicationTravels::get();
        ApplicationStalls::get();
        ApplicationFiles::get();
    }

    public function submitApplication(Request $request)
    {

        try {
            $validator = Validator::make($request->all(),
                [
                    'exporter_id'                 => 'required',
                    'scheme_id'                   => 'required',
                    'iec'                         => 'required',
                    'exporting_organization'      => 'required',
                    'dir_ceo'                     => 'required',
                    'exptr_email'                 => 'required',
                    'exptr_phone'                 => 'required',
                    'bank_name'                   => 'required',
                    'bank_ac'                     => 'required',
                    'bank_ifsc'                   => 'required',
                    'event_detail'                => 'required',
                    'event_name'                  => 'required',
                    'event_type'                  => 'required',
                    'participation_type'          => 'required',
                    'event_city'                  => 'required',
                    'event_country'               => 'required',
                    'travel_destination_type'     => 'required',
                    'traveller_name'              => 'required',
                    'traveller_designation'       => 'required',
                    'mode_of_travel'              => 'required',
                    'class_of_tarvel'             => 'required',
                    'total_travel_expense'        => 'required',
                    'travel_incentive'            => 'required',
                    'stall_event_name'            => 'required',
                    'total_stall_reg_cost'        => 'required',
                    'stall_incentive'             => 'required',
                    'meeting_detail'              => 'required',
                    'participation_det'           => 'required',
                    'terms'                       => '',
                    'file_iec'                    => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                    'file_bank_cheque'            => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                    'file_visa_invitation_letter' => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                    'file_boarding_pass'          => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                    'file_stall_allot_letter'     => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                    'file_stall_pay_recpt'        => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                    'file_tour_dairy'             => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                ],
                [
                    'exporter_id'                 => 'Please, fill the exporter_id',
                    'scheme_id'                   => 'Please, fill the scheme_id',
                    'iec'                         => 'Please, fill the iec',
                    'exporting_organization'      => 'Please, fill the exporting_organization',
                    'dir_ceo'                     => 'Please, fill the dir_ceo',
                    'exptr_email'                 => 'Please, fill the exptr_email',
                    'exptr_phone'                 => 'Please, fill the exptr_phone',
                    'bank_name'                   => 'Please, fill the bank_name',
                    'bank_ac'                     => 'Please, fill the bank_ac',
                    'bank_ifsc'                   => 'Please, fill the bank_ifsc',
                    'event_detail'                => 'Please, fill the event_detail',
                    'event_name'                  => 'Please, fill the event_name',
                    'event_type'                  => 'Please, fill the event_type',
                    'participation_type'          => 'Please, fill the participation_type',
                    'event_city'                  => 'Please, fill the event_city',
                    'event_country'               => 'Please, fill the event_country',
                    'travel_destination_type'     => 'Please, fill the travel_destination_type',
                    'traveller_name'              => 'Please, fill the traveller_name',
                    'traveller_designation'       => 'Please, fill the traveller_designation',
                    'mode_of_travel'              => 'Please, fill the mode_of_travel',
                    'class_of_tarvel'             => 'Please, fill the class_of_tarvel',
                    'total_travel_expense'        => 'Please, fill the total_travel_expense',
                    'travel_incentive'            => 'Please, fill the travel_incentive',
                    'stall_event_name'            => 'Please, fill the stall_event_name',
                    'total_stall_reg_cost'        => 'Please, fill the total_stall_reg_cost',
                    'stall_incentive'             => 'Please, fill the stall_incentive',
                    'meeting_detail'              => 'Please, fill the meeting_detail',
                    'participation_det'           => 'Please, fill the participation_det',
                    'terms'                       => 'Please, fill the terms',
                    'file_iec'                    => 'Please, fill the file_iec',
                    'file_bank_cheque'            => 'Please, fill the file_bank_cheque',
                    'file_visa_invitation_letter' => 'Please, fill the file_visa_invitation_letter',
                    'file_boarding_pass'          => 'Please, fill the file_boarding_pass',
                    'file_stall_allot_letter'     => 'Please, fill the file_stall_allot_letter',
                    'file_stall_pay_recpt'        => 'Please, fill the file_stall_pay_recpt',
                    'file_tour_dairy'             => 'Please, fill the file_tour_dairy',
                ]
            );

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                dd($validator->validated());

                // $user_id = Auth::guard('exporter')->user()->id;
                // $appl_data = [
                //     'scheme_id'                  => $request->scheme_id,
                //     'exporter_id'                => $request->exporter_id,
                //     'meeting_details'            => $request->meeting_detail,
                //     'participation_details'      => $request->participation_det,
                //     'certi_type'                 => '',
                //     'certi_name'                 => '',
                //     'certi_iss_auth'             => '',
                //     'certi_cost'                 => '',
                //     'certi_payment_reciept_file' => '',
                //     'created_by'                 => $id,
                //     'created_at'                 => Carbon::now(),
                // ];
            }

        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return redirect()->route('exporter.application.list')->with($data);
        }
    }

}
