<?php

namespace App\Http\Controllers;

use ApplicationEvents;
use ApplicationFiles;
use ApplicationProgressMaster;
use Applications;
use ApplicationStalls;
use ApplicationTravels;
use App\Mail\SendMail;
use App\Repositories\CustomRepository;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;

class ApplicationController extends Controller
{

    private $app;

    public function __construct(CustomRepository $app)
    {
        $this->app = $app;
    }

    public function submitApplication(Request $request)
    {
        try {
            $valid_rule  = [];
            $valid_error = [];
            // dd($request->all());
            switch ($request->scheme_id) {
                // Validation for scheme 1
                case 1:
                    if ($request->travel_details == 1 && $request->stall_details == 1) {
                        // Both Travel & Stall detail ACTIVE
                        $valid_rule = [
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
                            'event_detail'                => '',
                            'event_name'                  => 'required',
                            'event_type'                  => 'required',
                            'participation_type'          => 'required',
                            'event_city'                  => 'required',
                            'event_country'               => 'required',
                            'file_iec'                    => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_bank_cheque'            => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Travel
                            'travel_destination_type'     => 'required',
                            'traveller_name'              => 'required',
                            'traveller_designation'       => 'required',
                            'mode_of_travel'              => '',
                            'class_of_tarvel'             => 'required',
                            'total_travel_expense'        => 'required',
                            'travel_incentive'            => 'required',
                            'file_visa_invitation_letter' => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_ticket'                 => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_boarding_pass'          => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Stall
                            'stall_event_name'            => 'required',
                            'total_stall_reg_cost'        => 'required',
                            'stall_incentive'             => 'required',
                            'file_stall_allot_letter'     => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_stall_pay_recpt'        => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Additional
                            'meeting_detail'              => 'required',
                            'participation_det'           => 'required',
                            'file_tour_dairy'             => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        ];
                        $valid_error = [
                            'exporter_id.required'                 => 'Please, enter the exporter_id',
                            'scheme_id.required'                   => 'Please, enter the scheme_id',
                            'iec.required'                         => 'Please, enter the iec',
                            'exporting_organization.required'      => 'Please, enter the exporting_organization',
                            'dir_ceo.required'                     => 'Please, enter the dir_ceo',
                            'exptr_email.required'                 => 'Please, enter the exptr_email',
                            'exptr_phone.required'                 => 'Please, enter the exptr_phone',
                            'bank_name.required'                   => 'Please, enter the bank_name',
                            'bank_ac.required'                     => 'Please, enter the bank_ac',
                            'bank_ifsc.required'                   => 'Please, enter the bank_ifsc',
                            'event_detail'                         => '',
                            'event_name.required'                  => 'Please, enter the event_name',
                            'event_type.required'                  => 'Please, enter the event_type',
                            'participation_type.required'          => 'Please, enter the participation_type',
                            'event_city.required'                  => 'Please, enter the event_city',
                            'event_country.required'               => 'Please, enter the event_country',
                            'file_iec.required'                    => 'Please, fill the required file iec',
                            'file_bank_cheque.required'            => 'Please, fill the required file bank cheque',

                            // Travel
                            'travel_destination_type.required'     => 'Please, enter the travel_destination_type',
                            'traveller_name.required'              => 'Please, enter the traveller_name',
                            'traveller_designation.required'       => 'Please, enter the traveller_designation',
                            'mode_of_travel.required'              => 'Please, enter the mode_of_travel',
                            'class_of_tarvel.required'             => 'Please, enter the class_of_tarvel',
                            'total_travel_expense.required'        => 'Please, enter the total_travel_expense',
                            'travel_incentive.required'            => 'Please, enter the travel_incentive',
                            'file_visa_invitation_letter.required' => 'Please, enter the file_visa_invitation_letter',
                            'file_ticket.required'                 => 'Please, enter the file_ticket',
                            'file_boarding_pass.required'          => 'Please, enter the file_boarding_pass',

                            // Stall
                            'stall_event_name.required'            => 'Please, enter the stall_event_name',
                            'total_stall_reg_cost.required'        => 'Please, enter the total_stall_reg_cost',
                            'stall_incentive.required'             => 'Please, enter the stall_incentive',
                            'file_stall_allot_letter.required'     => 'Please, enter the file_stall_allot_letter',
                            'file_stall_pay_recpt.required'        => 'Please, enter the file_stall_pay_recpt',

                            // Additional
                            'meeting_detail.required'              => 'Please, enter the meeting_detail',
                            'participation_det.required'           => 'Please, enter the participation_det',
                            'file_tour_dairy.required'             => 'Please, enter the file_tour_dairy',
                        ];
                    } elseif ($request->stall_details == 1) {
                        // Stall detail ACTIVE
                        $valid_rule = [
                            'exporter_id'             => 'required',
                            'scheme_id'               => 'required',
                            'iec'                     => 'required',
                            'exporting_organization'  => 'required',
                            'dir_ceo'                 => 'required',
                            'exptr_email'             => 'required',
                            'exptr_phone'             => 'required',
                            'bank_name'               => 'required',
                            'bank_ac'                 => 'required',
                            'bank_ifsc'               => 'required',
                            'event_detail'            => '',
                            'event_name'              => 'required',
                            'event_type'              => 'required',
                            'participation_type'      => 'required',
                            'event_city'              => 'required',
                            'event_country'           => 'required',
                            'file_iec'                => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_bank_cheque'        => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Travel
                            // 'travel_destination_type'     => 'required',
                            // 'traveller_name'              => 'required',
                            // 'traveller_designation'       => 'required',
                            // 'mode_of_travel'              => 'required',
                            // 'class_of_tarvel'             => 'required',
                            // 'total_travel_expense'        => 'required',
                            // 'travel_incentive'            => 'required',
                            // 'file_visa_invitation_letter' => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            // 'file_ticket'                 => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            // 'file_boarding_pass'          => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Stall
                            'stall_event_name'        => 'required',
                            'total_stall_reg_cost'    => 'required',
                            'stall_incentive'         => 'required',
                            'file_stall_allot_letter' => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_stall_pay_recpt'    => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Additional
                            'meeting_detail'          => 'required',
                            'participation_det'       => 'required',
                            'file_tour_dairy'         => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        ];
                        $valid_error = [
                            'exporter_id.required'             => 'Please, enter the exporter_id',
                            'scheme_id.required'               => 'Please, enter the scheme_id',
                            'iec.required'                     => 'Please, enter the iec',
                            'exporting_organization.required'  => 'Please, enter the exporting_organization',
                            'dir_ceo.required'                 => 'Please, enter the dir_ceo',
                            'exptr_email.required'             => 'Please, enter the exptr_email',
                            'exptr_phone.required'             => 'Please, enter the exptr_phone',
                            'bank_name.required'               => 'Please, enter the bank_name',
                            'bank_ac.required'                 => 'Please, enter the bank_ac',
                            'bank_ifsc.required'               => 'Please, enter the bank_ifsc',
                            'event_detail'                     => '',
                            'event_name.required'              => 'Please, enter the event_name',
                            'event_type.required'              => 'Please, enter the event_type',
                            'participation_type.required'      => 'Please, enter the participation_type',
                            'event_city.required'              => 'Please, enter the event_city',
                            'event_country.required'           => 'Please, enter the event_country',
                            'file_iec.required'                => 'Please, fill the required file iec',
                            'file_bank_cheque.required'        => 'Please, fill the required file bank cheque',

                            // Travel
                            // 'travel_destination_type.required'     => 'Please, enter the travel_destination_type',
                            // 'traveller_name.required'              => 'Please, enter the traveller_name',
                            // 'traveller_designation.required'       => 'Please, enter the traveller_designation',
                            // 'mode_of_travel.required'              => 'Please, enter the mode_of_travel',
                            // 'class_of_tarvel.required'             => 'Please, enter the class_of_tarvel',
                            // 'total_travel_expense.required'        => 'Please, enter the total_travel_expense',
                            // 'travel_incentive.required'            => 'Please, enter the travel_incentive',
                            // 'file_visa_invitation_letter.required' => 'Please, enter the file_visa_invitation_letter',
                            // 'file_ticket.required'                 => 'Please, enter the file_ticket',
                            // 'file_boarding_pass.required'          => 'Please, enter the file_boarding_pass',

                            // Stall
                            'stall_event_name.required'        => 'Please, enter the stall_event_name',
                            'total_stall_reg_cost.required'    => 'Please, enter the total_stall_reg_cost',
                            'stall_incentive.required'         => 'Please, enter the stall_incentive',
                            'file_stall_allot_letter.required' => 'Please, enter the file_stall_allot_letter',
                            'file_stall_pay_recpt.required'    => 'Please, enter the file_stall_pay_recpt',

                            // Additional
                            'meeting_detail.required'          => 'Please, enter the meeting_detail',
                            'participation_det.required'       => 'Please, enter the participation_det',
                            'file_tour_dairy.required'         => 'Please, enter the file_tour_dairy',
                        ];
                    } else if ($request->travel_details == 1) {
                        // Travel Details Active
                        $valid_rule = [
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
                            'event_detail'                => '',
                            'event_name'                  => 'required',
                            'event_type'                  => 'required',
                            'participation_type'          => 'required',
                            'event_city'                  => 'required',
                            'event_country'               => 'required',
                            'file_iec'                    => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_bank_cheque'            => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Travel
                            'travel_destination_type'     => 'required',
                            'traveller_name'              => 'required',
                            'traveller_designation'       => 'required',
                            'mode_of_travel'              => 'required',
                            'class_of_tarvel'             => 'required',
                            'total_travel_expense'        => 'required',
                            'travel_incentive'            => 'required',
                            'file_visa_invitation_letter' => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_ticket'                 => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_boarding_pass'          => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Stall
                            // 'stall_event_name'            => 'required',
                            // 'total_stall_reg_cost'        => 'required',
                            // 'stall_incentive'             => 'required',
                            // 'file_stall_allot_letter'     => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            // 'file_stall_pay_recpt'        => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Additional
                            'meeting_detail'              => 'required',
                            'participation_det'           => 'required',
                            'file_tour_dairy'             => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        ];
                        $valid_error = [
                            'exporter_id.required'                 => 'Please, enter the exporter_id',
                            'scheme_id.required'                   => 'Please, enter the scheme_id',
                            'iec.required'                         => 'Please, enter the iec',
                            'exporting_organization.required'      => 'Please, enter the exporting_organization',
                            'dir_ceo.required'                     => 'Please, enter the dir_ceo',
                            'exptr_email.required'                 => 'Please, enter the exptr_email',
                            'exptr_phone.required'                 => 'Please, enter the exptr_phone',
                            'bank_name.required'                   => 'Please, enter the bank_name',
                            'bank_ac.required'                     => 'Please, enter the bank_ac',
                            'bank_ifsc.required'                   => 'Please, enter the bank_ifsc',
                            'event_detail'                         => '',
                            'event_name.required'                  => 'Please, enter the event_name',
                            'event_type.required'                  => 'Please, enter the event_type',
                            'participation_type.required'          => 'Please, enter the participation_type',
                            'event_city.required'                  => 'Please, enter the event_city',
                            'event_country.required'               => 'Please, enter the event_country',
                            'file_iec.required'                    => 'Please, fill the required file iec',
                            'file_bank_cheque.required'            => 'Please, fill the required file bank cheque',

                            // Travel
                            'travel_destination_type.required'     => 'Please, enter the travel_destination_type',
                            'traveller_name.required'              => 'Please, enter the traveller_name',
                            'traveller_designation.required'       => 'Please, enter the traveller_designation',
                            'mode_of_travel.required'              => 'Please, enter the mode_of_travel',
                            'class_of_tarvel.required'             => 'Please, enter the class_of_tarvel',
                            'total_travel_expense.required'        => 'Please, enter the total_travel_expense',
                            'travel_incentive.required'            => 'Please, enter the travel_incentive',
                            'file_visa_invitation_letter.required' => 'Please, enter the file_visa_invitation_letter',
                            'file_ticket.required'                 => 'Please, enter the file_ticket',
                            'file_boarding_pass.required'          => 'Please, enter the file_boarding_pass',

                            // Stall
                            // 'stall_event_name.required'            => 'Please, enter the stall_event_name',
                            // 'total_stall_reg_cost.required'        => 'Please, enter the total_stall_reg_cost',
                            // 'stall_incentive.required'             => 'Please, enter the stall_incentive',
                            // 'file_stall_allot_letter.required'     => 'Please, enter the file_stall_allot_letter',
                            // 'file_stall_pay_recpt.required'        => 'Please, enter the file_stall_pay_recpt',

                            // Additional
                            'meeting_detail.required'              => 'Please, enter the meeting_detail',
                            'participation_det.required'           => 'Please, enter the participation_det',
                            'file_tour_dairy.required'             => 'Please, enter the file_tour_dairy',
                        ];
                    } else {
                        // Both Travel & Stall Details are not selected
                        $valid_rule = [
                            'exporter_id'            => 'required',
                            'scheme_id'              => 'required',
                            'iec'                    => 'required',
                            'exporting_organization' => 'required',
                            'dir_ceo'                => 'required',
                            'exptr_email'            => 'required',
                            'exptr_phone'            => 'required',
                            'bank_name'              => 'required',
                            'bank_ac'                => 'required',
                            'bank_ifsc'              => 'required',
                            'event_detail'           => '',
                            'event_name'             => 'required',
                            'event_type'             => 'required',
                            'participation_type'     => 'required',
                            'event_city'             => 'required',
                            'event_country'          => 'required',
                            'file_iec'               => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_bank_cheque'       => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // // Travel
                            // 'travel_destination_type'     => 'required',
                            // 'traveller_name'              => 'required',
                            // 'traveller_designation'       => 'required',
                            // 'mode_of_travel'              => 'required',
                            // 'class_of_tarvel'             => 'required',
                            // 'total_travel_expense'        => 'required',
                            // 'travel_incentive'            => 'required',
                            // 'file_visa_invitation_letter' => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            // 'file_ticket'                 => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            // 'file_boarding_pass'          => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // // Stall
                            // 'stall_event_name'        => 'required',
                            // 'total_stall_reg_cost'    => 'required',
                            // 'stall_incentive'         => 'required',
                            // 'file_stall_allot_letter' => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            // 'file_stall_pay_recpt'    => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Additional
                            'meeting_detail'         => 'required',
                            'participation_det'      => 'required',
                            'file_tour_dairy'        => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        ];
                        $valid_error = [
                            'exporter_id.required'            => 'Please, enter the exporter_id',
                            'scheme_id.required'              => 'Please, enter the scheme_id',
                            'iec.required'                    => 'Please, enter the iec',
                            'exporting_organization.required' => 'Please, enter the exporting_organization',
                            'dir_ceo.required'                => 'Please, enter the dir_ceo',
                            'exptr_email.required'            => 'Please, enter the exptr_email',
                            'exptr_phone.required'            => 'Please, enter the exptr_phone',
                            'bank_name.required'              => 'Please, enter the bank_name',
                            'bank_ac.required'                => 'Please, enter the bank_ac',
                            'bank_ifsc.required'              => 'Please, enter the bank_ifsc',
                            'event_detail'                    => '',
                            'event_name.required'             => 'Please, enter the event_name',
                            'event_type.required'             => 'Please, enter the event_type',
                            'participation_type.required'     => 'Please, enter the participation_type',
                            'event_city.required'             => 'Please, enter the event_city',
                            'event_country.required'          => 'Please, enter the event_country',
                            'file_iec.required'               => 'Please, fill the required file iec',
                            'file_bank_cheque.required'       => 'Please, fill the required file bank cheque',

                            // // Travel
                            // 'travel_destination_type.required'     => 'Please, enter the travel_destination_type',
                            // 'traveller_name.required'              => 'Please, enter the traveller_name',
                            // 'traveller_designation.required'       => 'Please, enter the traveller_designation',
                            // 'mode_of_travel.required'              => 'Please, enter the mode_of_travel',
                            // 'class_of_tarvel.required'             => 'Please, enter the class_of_tarvel',
                            // 'total_travel_expense.required'        => 'Please, enter the total_travel_expense',
                            // 'travel_incentive.required'            => 'Please, enter the travel_incentive',
                            // 'file_visa_invitation_letter.required' => 'Please, enter the file_visa_invitation_letter',
                            // 'file_ticket.required'                 => 'Please, enter the file_ticket',
                            // 'file_boarding_pass.required'          => 'Please, enter the file_boarding_pass',

                            // // Stall
                            // 'stall_event_name.required'        => 'Please, enter the stall_event_name',
                            // 'total_stall_reg_cost.required'    => 'Please, enter the total_stall_reg_cost',
                            // 'stall_incentive.required'         => 'Please, enter the stall_incentive',
                            // 'file_stall_allot_letter.required' => 'Please, enter the file_stall_allot_letter',
                            // 'file_stall_pay_recpt.required'    => 'Please, enter the file_stall_pay_recpt',

                            // Additional
                            'meeting_detail.required'         => 'Please, enter the meeting_detail',
                            'participation_det.required'      => 'Please, enter the participation_det',
                            'file_tour_dairy.required'        => 'Please, enter the file_tour_dairy',
                        ];
                    }
                    $validator = Validator::make($request->all(), $valid_rule, $valid_error);
                    break;

                // Validation for Scheme(2-7)
                default:
                    $validator = Validator::make($request->all(),
                        [
                            'exporter_id'          => 'required',
                            'iec'                  => 'required',
                            'exptr_name'           => 'required',
                            'dir_ceo'              => 'required',
                            'exptr_email'          => 'required',
                            'exptr_phone'          => 'required',
                            'bank_name'            => 'required',
                            'bank_ac'              => 'required',
                            'bank_ifsc'            => 'required',
                            'type_of_certificate'  => 'required',
                            'certificate_name'     => 'required',
                            'certificate_iss_auth' => 'required',
                            'certificate_cost'     => 'required',
                            'terms'                => '',
                            'file_iec'             => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_bank_cheque'     => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_payment_reciept' => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        ],
                        [
                            'exporter_id.required'          => 'Please, fill the exporter_id',
                            'iec.required'                  => 'Please, fill the iec',
                            'exptr_name.required'           => 'Please, fill the exptr_name',
                            'dir_ceo.required'              => 'Please, fill the dir_ceo',
                            'exptr_email.required'          => 'Please, fill the exptr_email',
                            'exptr_phone.required'          => 'Please, fill the exptr_phone',
                            'bank_name.required'            => 'Please, fill the bank_name',
                            'bank_ac.required'              => 'Please, fill the bank_ac',
                            'bank_ifsc.required'            => 'Please, fill the bank_ifsc',
                            'type_of_certificate.required'  => 'Please, fill the type_of_certificate',
                            'certificate_name.required'     => 'Please, fill the certificate_name',
                            'certificate_iss_auth.required' => 'Please, fill the certificate_iss_auth',
                            'certificate_cost.required'     => 'Please, fill the certificate_cost',
                            'terms.required'                => 'Please, check the terms',
                            'file_iec.required'             => 'Please, fill the file_iec',
                            'file_iec.max'                  => 'File must be less then 4MB',
                            'file_bank_cheque.required'     => 'Please, fill the file_bank_cheque',
                            'file_payment_reciept.required' => 'Please, fill the file_payment_reciept',
                        ],
                    );
                    break;
            }

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                // dd($request->all());

                $user_id        = Auth::guard('exporter')->user()->id;
                $application_no = $this->app->generateExpSchAppCode();

                if ($request->scheme_id != 1) {
                    //    dd([$request->all(), '!1']);
                    // Payment reciept upload
                    $payment_reciept_image     = $request->file_payment_reciept;
                    $payment_reciept_file_name = 'PAYREC' . substr(sha1($payment_reciept_image . uniqid('', true)), 20, 5) . date('my') . $payment_reciept_image->getClientOriginalName();
                    $payment_reciept_image->storeAs('public/images/exporters/applications/' . $application_no['applicaton_no'] . '/' . 'certificate_payment_reciept/', $payment_reciept_file_name);

                    $appl_data = [
                        'app_no'                     => $application_no['applicaton_no'],
                        'app_count_no'               => $application_no['app_count_no'],
                        'scheme_id'                  => $request->scheme_id,
                        'exporter_id'                => $request->exporter_id,
                        'certi_type'                 => $request->type_of_certificate,
                        'certi_name'                 => $request->certificate_name,
                        'certi_iss_auth'             => $request->certificate_iss_auth,
                        'certi_cost'                 => $request->certificate_cost,
                        'certi_payment_reciept_file' => $payment_reciept_file_name ?? '',
                        'status'                     => 1,
                        'created_by'                 => $user_id,
                        'created_at'                 => Carbon::now(),
                    ];
                } else {
                    // dd([$request->all(), '1']);
                    $appl_data = [
                        'app_no'                => $application_no['applicaton_no'],
                        'app_count_no'          => $application_no['app_count_no'],
                        'scheme_id'             => $request->scheme_id,
                        'exporter_id'           => $request->exporter_id,
                        'meeting_details'       => $request->meeting_detail ?? '',
                        'participation_details' => $request->participation_det ?? '',
                        'status'                => 1,
                        'created_by'            => $user_id,
                        'created_at'            => Carbon::now(),
                    ];
                }

                $appl_id = Applications::insertGetId($appl_data);
                // dd([$appl_id, $appl_data, $request->all()]);

                if ($appl_id) {
                    // IEC certificate upload
                    $iec_image     = $request->file_iec;
                    $iec_file_name = 'IEC_' . substr(sha1($iec_image . uniqid('', true)), 20, 5) . date('my') . $iec_image->getClientOriginalName();
                    $iec_image->storeAs('public/images/exporters/applications/' . $application_no['applicaton_no'] . '/' . 'iec/', $iec_file_name);

                    // Bank cheque upload
                    $bank_cheque_image     = $request->file_bank_cheque;
                    $bank_cheque_file_name = 'BANK_CHEQUE_' . substr(sha1($bank_cheque_image . uniqid('', true)), 20, 5) . date('my') . $bank_cheque_image->getClientOriginalName();
                    $bank_cheque_image->storeAs('public/images/exporters/applications/' . $application_no['applicaton_no'] . '/' . 'bank/', $bank_cheque_file_name);

                    if ($request->scheme_id == 1) {
                        // Tour Dairy upload
                        $tour_dairy_image     = $request->file_tour_dairy;
                        $tour_dairy_file_name = 'TOUR_DAIRY_' . substr(sha1($tour_dairy_image . uniqid('', true)), 20, 5) . date('my') . $tour_dairy_image->getClientOriginalName();
                        $tour_dairy_image->storeAs('public/images/exporters/applications/' . $application_no['applicaton_no'] . '/' . 'tour_dairy/', $tour_dairy_file_name);

                        // Event details will be added
                        $event_data = [
                            'appl_id'            => $appl_id,
                            'details'            => $request->event_detail ?? '',
                            'event_type'         => $request->event_type,
                            'other_event_type'   => $request->other_event_details,
                            'participation_type' => $request->participation_type,
                            'city'               => $request->event_city,
                            'country_id'         => $request->event_country,
                            'status'             => 1,
                            'created_by'         => $user_id,
                            'created_at'         => Carbon::now(),
                        ];
                        $event_id = ApplicationEvents::insert($event_data);
                    }

                    if ($request->travel_details == 1) {
                        // Visa upload
                        $visa_image     = $request->file_visa_invitation_letter;
                        $visa_file_name = 'VISA_' . substr(sha1($visa_image . uniqid('', true)), 20, 5) . date('my') . $visa_image->getClientOriginalName();
                        $visa_image->storeAs('public/images/exporters/applications/' . $application_no['applicaton_no'] . '/' . 'visa_image/', $visa_file_name);

                        // Ticket upload
                        $ticket_image     = $request->file_ticket;
                        $ticket_file_name = 'TICKET_' . substr(sha1($ticket_image . uniqid('', true)), 20, 5) . date('my') . $ticket_image->getClientOriginalName();
                        $ticket_image->storeAs('public/images/exporters/applications/' . $application_no['applicaton_no'] . '/' . 'ticket/', $ticket_file_name);

                        // Boarding pass upload
                        $boarding_pass_image     = $request->file_boarding_pass;
                        $boarding_pass_file_name = 'BOARDING_PASS_' . substr(sha1($boarding_pass_image . uniqid('', true)), 20, 5) . date('my') . $boarding_pass_image->getClientOriginalName();
                        $boarding_pass_image->storeAs('public/images/exporters/applications/' . $application_no['applicaton_no'] . '/' . 'boarding_pass/', $boarding_pass_file_name);

                        // Travel details
                        $travel_data = [
                            'appl_id'            => $appl_id,
                            'destination_type'   => $request->travel_destination_type ?? '',
                            'traveller_name'     => $request->traveller_name ?? '',
                            'designation'        => $request->traveller_designation ?? '',
                            'mode_of_travel'     => $request->mode_of_travel ?? '',
                            'class_of_travel'    => $request->class_of_tarvel ?? '',
                            'total_expense'      => $request->total_travel_expense ?? '',
                            'incentive_claimed'  => $request->travel_incentive ?? '',
                            'file_visa'          => $visa_file_name ?? '',
                            'file_ticket'        => $ticket_file_name ?? '',
                            'file_boarding_pass' => $boarding_pass_file_name ?? '',
                            'status'             => 1,
                            'created_by'         => $user_id,
                            'created_at'         => Carbon::now(),
                        ];
                        $travel_id = ApplicationTravels::insert($travel_data);
                    }

                    if ($request->stall_details == 1) {
                        // Stall allotment upload
                        $stall_allotment_image     = $request->file_stall_allot_letter;
                        $stall_allotment_file_name = 'STALL_ALLOTMENT_' . substr(sha1($stall_allotment_image . uniqid('', true)), 20, 5) . date('my') . $stall_allotment_image->getClientOriginalName();
                        $stall_allotment_image->storeAs('public/images/exporters/applications/' . $application_no['applicaton_no'] . '/' . 'stall_allotment/', $stall_allotment_file_name);

                        // Stall registration payment reciept upload
                        $stall_pay_reciept_image     = $request->file_stall_pay_recpt;
                        $stall_pay_reciept_file_name = 'STALL_PAY_RECIEPT_' . substr(sha1($stall_pay_reciept_image . uniqid('', true)), 20, 5) . date('my') . $stall_pay_reciept_image->getClientOriginalName();
                        $stall_pay_reciept_image->storeAs('public/images/exporters/applications/' . $application_no['applicaton_no'] . '/' . 'stall_pay_reciept/', $stall_pay_reciept_file_name);

                        // Stall details will be added
                        $stall_data = [
                            'appl_id'              => $appl_id,
                            'event_id'             => $event_id ?? '',
                            'total_cost'           => $request->total_stall_reg_cost ?? '',
                            'claimed_cost'         => $request->stall_incentive ?? '',
                            'stall_allot_letter'   => $stall_allotment_file_name ?? '',
                            'stall_reg_pay_recipt' => $stall_pay_reciept_file_name ?? '',
                            'created_by'           => $user_id,
                            'created_at'           => Carbon::now(),
                        ];
                        $stall_id = ApplicationStalls::insert($stall_data);
                    }

                    $files_data = [
                        'appl_id'                    => $appl_id,
                        'iec_file'                   => $iec_file_name ?? '',
                        'cancelled_cheque_file'      => $bank_cheque_file_name ?? '',
                        'file_visa'                  => $visa_file_name ?? '',
                        'file_ticket'                => $ticket_file_name ?? '',
                        'file_boarding_pass'         => $boarding_pass_file_name ?? '',
                        'stall_allot_letter'         => $stall_allotment_file_name ?? '',
                        'stall_reg_pay_recipt'       => $stall_pay_reciept_file_name ?? '',
                        'certi_payment_reciept_file' => $payment_reciept_file_name ?? '',
                        'tour_dairy'                 => $tour_dairy_file_name ?? '',
                        'status'                     => 1,
                        'created_by'                 => $user_id,
                        'created_at'                 => Carbon::now(),
                    ];
                    $file_id = ApplicationFiles::insert($files_data);

                    $data['data'] = [
                        'appl_id'   => $appl_id ?? '',
                        'event_id'  => $event_id ?? '',
                        'travel_id' => $travel_id ?? '',
                        'stall_id'  => $stall_id ?? '',
                        'file_id'   => $file_id ?? '',
                    ];
                    $data['message'] = 'Application submission successful.';
                    $request->session()->flash('message', $data['message']);
                    // return redirect()->back()->with($data);
                    return redirect()->route('exporter.application.list')->with($data);
                } else {
                    $data['data']    = [];
                    $data['message'] = 'Applictaion submission failed.';
                    // return redirect()->back()->with($data);
                    return redirect()->route('exporter.application.list')->with($data);
                }
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);

            // return redirect()->route('exporter.application.list')->with($data);
        }
    }

    public function pending_exporters_application(Request $request)
    {
        $data['page_title']   = 'Pending exporters applications';
        $data['applications'] = Applications::with(['get_scheme_details', 'get_exporter_details', 'get_travel_details', 'get_stall_details'])->get()->map(function ($r) {
            return [
                // 'r'          => $r,
                'id'          => $r->id ?? '',
                'app_no'      => $r->app_no ?? '',
                'scheme'      => $r->get_scheme_details->short_name ?? '',
                'name'        => $r->get_exporter_details->name ?? '',
                'contact_no'  => $r->get_exporter_details->phone ?? '',
                'claimed_amt' => ($r->get_travel_details->total_expense ?? 0) + ($r->get_stall_details->total_cost ?? 0),
                'status'      => $r->status,
            ];
        }); //->toArray();
        $data['pending'] = Applications::where('status', 1)->count();
        // dd($data);
        return view('admin.publicity_officer.pending_schemes_application')->with($data);
    }

    /**
     * Method pending_exporters_application_details ------ FOR ADMINS -------
     * Application details page for all the users
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function pending_exporters_application_details(Request $request, $id = null)
    {
        $data['page_title'] = 'Pending exporters application details';
        $applications       = Applications::where('id', $id)->with([
            'get_exporter_details',
            'get_scheme_details',
            'get_event_details',
            'get_travel_details',
            'get_stall_details.get_event_details',
            'get_file_details',
            'get_address_details',
            'get_other_code_details',
            'get_bank_details',
            'get_application_status_details',
            'get_application_progress_master_details.get_user_details.get_role_details',
        ])->first(); //->toArray();
        $data['applications']      = $applications; //->toArray();
        $data['total_expenditure'] = (int) ($applications->get_travel_details->total_expense ?? 0) + ($applications->get_stall_details->total_cost ?? 0);
        $data['incentive_amount']  = (int) ($applications->get_travel_details->incentive_claimed ?? 0) + ($applications->get_stall_details->claimed_cost ?? 0);
        // dd(['Admin', $data]);
        return view('admin.publicity_officer.pending_schemes_application_details')->with($data);
    }

    /**
     * Method exporters_application_status_details ------ FOR EXPORTERS -------
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function exporters_application_status_details(Request $request, $id = null)
    {
        $user                 = Auth::guard('exporter')->user();
        $data['data']         = $user;
        $data['page_title']   = 'Pending exporters application details';
        $data['applications'] = Applications::where('id', $id)->with([
            'get_exporter_details',
            'get_scheme_details',
            'get_event_details',
            'get_travel_details',
            'get_stall_details.get_event_details',
            'get_file_details',
            'get_address_details',
            'get_other_code_details',
            'get_bank_details',
        ])->first();
        // dd(['Exporteres .. ', $data['applications']->toArray()]);
        return view('application_status_details')->with($data);
    }

    /**
     * Method exporters_application_status_details_update by SO
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function exporters_application_status_details_update(Request $request, $id = null)
    {
        try {
            // dd([$request->all()]);
            $user          = Auth::user();
            $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'updated_by' => $user->id]);
            if ($update_status) {

                if (ApplicationProgressMaster::where(['appl_id' => $id, 'created_by' => $user->id])->first()) {
                    $update_data = [
                        'total_expense'    => $request->total_expenses,
                        'incentive_amount' => $request->incentive_amount,
                        'remarks'          => $request->remarks,
                        'updated_by'       => $user->id,
                    ];
                    $status          = ApplicationProgressMaster::where('appl_id', $id)->update($update_data);
                    $data['message'] = 'Application status updated successfully..';
                    Session::flash('message', $data['message']);
                } else {
                    $insert_data = [
                        'appl_id'          => $id,
                        'total_expense'    => $request->total_expenses,
                        'incentive_amount' => $request->incentive_amount,
                        'remarks'          => $request->remarks,
                        'created_by'       => $user->id,
                        'updated_by'       => $user->id,
                        'created_at'       => Carbon::now(),
                    ];
                    $status          = ApplicationProgressMaster::insert($insert_data);
                    $data['message'] = 'Application status updated successfully.';
                    Session::flash('message', $data['message']);
                }

            } else {
                $data['message'] = 'Failed to update the status from SO.';
                Session::flash('message', $data['message']);
            }
            // return redirect()->back()->with($data);
            return redirect()->route('admin.publicity.officer.pending.exporters.applications')->with($data);

        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
            // return redirect()->back()->with($data);
        }
    }

    /**
     * Method exporters_application_dir_depm_update UPDATE BY Director DEPM
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function exporters_application_dir_depm_update(Request $request, $id = null)
    {
        // dd([$request->all(), $id]);
        try {
            $user = Auth::user();
            // dd();
            $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'updated_by' => $user->id]);
            if ($update_status) {

                if ($request->status == 5) {
                    // Mail for those who will be rejected
                    $data = [
                        'mail_id'   => $user->email,
                        'mail_type' => 6,
                        'mail_data' => [
                            'app_no'    => Applications::select('app_no')->where('id', $id)->first()->app_no,
                            'remarks'   => $request->remarks,
                            'user_role' => \Spatie\Permission\Models\Role::select('name')->where('id', $user->role_id)->first()->name,
                        ],
                    ];

                    $to      = $user->email;
                    $subject = 'Exporters application rejection.';
                    Mail::to($to)->send(new SendMail($data));
                }

                // Then update other associated tables
                if (ApplicationProgressMaster::where(['appl_id' => $id, 'created_by' => $user->id])->first()) {
                    $update_data = [
                        'total_expense'    => $request->total_expenses,
                        'incentive_amount' => $request->incentive_amount,
                        'remarks'          => $request->remarks,
                        'updated_by'       => $user->id,
                    ];
                    $status          = ApplicationProgressMaster::where('appl_id', $id)->update($update_data);
                    $data['message'] = 'Application status updated successfully..';
                    Session::flash('message', $data['message']);
                } else {
                    $insert_data = [
                        'appl_id'          => $id,
                        'total_expense'    => $request->total_expenses,
                        'incentive_amount' => $request->incentive_amount,
                        'remarks'          => $request->remarks,
                        'created_by'       => $user->id,
                        'updated_by'       => $user->id,
                        'created_at'       => Carbon::now(),
                    ];
                    $status          = ApplicationProgressMaster::insert($insert_data);
                    $data['message'] = 'Application status updated successfully.';
                    Session::flash('message', $data['message']);
                }

            } else {
                $data['message'] = 'Failed to update the status from SO.';
                Session::flash('message', $data['message']);
            }
            // return redirect()->back()->with($data);
            return redirect()->route('admin.publicity.officer.pending.exporters.applications')->with($data);

        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
            // return redirect()->back()->with($data);
        }
    }

    /**
     * Method exporters_application_spl_sectry_update UPDATE BY Addl Spl Secretory
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function exporters_application_spl_sectry_update(Request $request, $id = null)
    {
        try {
            $user          = Auth::user();
            $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'updated_by' => $user->id]);
            if ($update_status) {

                if ($request->status == 7) {
                    // Mail for those who will be rejected
                    $data = [
                        'mail_id'   => $user->email,
                        'mail_type' => 6,
                        'mail_data' => [
                            'app_no'    => Applications::select('app_no')->where('id', $id)->first()->app_no,
                            'remarks'   => $request->remarks,
                            'user_role' => \Spatie\Permission\Models\Role::select('name')->where('id', $user->role_id)->first()->name,
                        ],
                    ];

                    $to      = $user->email;
                    $subject = 'Exporters application rejection.';
                    Mail::to($to)->send(new SendMail($data));
                }

                // Then update other associated tables
                if (ApplicationProgressMaster::where(['appl_id' => $id, 'created_by' => $user->id])->first()) {
                    $update_data = [
                        'total_expense'    => $request->total_expenses,
                        'incentive_amount' => $request->incentive_amount,
                        'remarks'          => $request->remarks,
                        'updated_by'       => $user->id,
                    ];

                    $status          = ApplicationProgressMaster::where('appl_id', $id)->update($update_data);
                    $data['message'] = 'Application status updated successfully..';
                    Session::flash('message', $data['message']);
                } else {
                    $insert_data = [
                        'appl_id'          => $id,
                        'total_expense'    => $request->total_expenses,
                        'incentive_amount' => $request->incentive_amount,
                        'remarks'          => $request->remarks,
                        'created_by'       => $user->id,
                        'updated_by'       => $user->id,
                        'created_at'       => Carbon::now(),
                    ];
                    $status          = ApplicationProgressMaster::insert($insert_data);
                    $data['message'] = 'Application status updated successfully.';
                    Session::flash('message', $data['message']);
                }

            } else {
                $data['message'] = 'Failed to update the status from SO.';
                Session::flash('message', $data['message']);
            }
            // return redirect()->back()->with($data);
            return redirect()->route('admin.publicity.officer.pending.exporters.applications')->with($data);

        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
            // return redirect()->back()->with($data);
        }
    }

    /**
     * Method exporters_application_dept_sectry_update UPDATE BY Department Secretory
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function exporters_application_dept_sectry_update(Request $request, $id = null)
    {
        try {
            $user          = Auth::user();
            $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'updated_by' => $user->id]);
            if ($update_status) {

                if ($request->status == 9) {
                    // Mail for those who will be rejected
                    $data = [
                        'mail_id'   => $user->email,
                        'mail_type' => 6,
                        'mail_data' => [
                            'app_no'    => Applications::select('app_no')->where('id', $id)->first()->app_no,
                            'remarks'   => $request->remarks,
                            'user_role' => \Spatie\Permission\Models\Role::select('name')->where('id', $user->role_id)->first()->name,
                        ],
                    ];
        
                    $to      = $user->email;
                    $subject = 'Exporters application rejection.';
                    Mail::to($to)->send(new SendMail($data));
                }

                // Then update other associated tables
                if (ApplicationProgressMaster::where(['appl_id' => $id, 'created_by' => $user->id])->first()) {
                    $update_data = [
                        'total_expense'    => $request->total_expenses,
                        'incentive_amount' => $request->incentive_amount,
                        'remarks'          => $request->remarks,
                        'updated_by'       => $user->id,
                    ];

                    $status          = ApplicationProgressMaster::where('appl_id', $id)->update($update_data);
                    $data['message'] = 'Application status updated successfully..';
                    Session::flash('message', $data['message']);
                } else {
                    $insert_data = [
                        'appl_id'          => $id,
                        'total_expense'    => $request->total_expenses,
                        'incentive_amount' => $request->incentive_amount,
                        'remarks'          => $request->remarks,
                        'created_by'       => $user->id,
                        'updated_by'       => $user->id,
                        'created_at'       => Carbon::now(),
                    ];
                    $status          = ApplicationProgressMaster::insert($insert_data);
                    $data['message'] = 'Application status updated successfully.';
                    Session::flash('message', $data['message']);
                }

            } else {
                $data['message'] = 'Failed to update the status from SO.';
                Session::flash('message', $data['message']);
            }
            // return redirect()->back()->with($data);
            return redirect()->route('admin.publicity.officer.pending.exporters.applications')->with($data);

        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
            // return redirect()->back()->with($data);
        }
    }

    /**
     * Method exporters_application_dept_sectry_update UPDATE BY DDO
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function exporters_application_ddo_update(Request $request, $id = null)
    {
        try {
            dd(['DDO', $request->all(), $id, $request->status]);

            $update_status = Applications::where('id', $id)->update(['status' => $request->status]);
            if ($update_status) {
                $data['message'] = 'Status updated successfully.';
            } else {
                $data['message'] = 'Failed to update the status from SO.';
            }
            return redirect()->back()->with($data);

        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
            // return redirect()->back()->with($data);
        }
    }

    /**
     * Method expireApplication
     *
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function expireApplication(Request $request, $id = null)
    {
        try {

            // Just check ,the created_at date with The current date . If its greater then 60days just update the status
            $days              = 2;
            $checkAppliactions = Applications::select('id', 'created_at')->get()->map(function ($r) use ($days) {
                // $createdAt = $r->created_at;
                // $futureDate = $this->app->AddDateWithDays($r->created_at, $days)->format('d-m-Y H:i:s a');

                // $result = [];
                // $date1  = Carbon::createFromFormat('Y-m-d H:i:s', $r->created_at);
                // $date2  = Carbon::createFromFormat('Y-m-d H:i:s', $this->app->AddDateWithDays($r->created_at, $days));
                // if ($date1->eq($date2)) {
                //     array_push($result, $r->id);
                //     // change the status
                //     // array_push($result, Applications::where('id', $r->id)->update('status', 12), $r->toArray());
                // } else {
                //     array_push($result, $r->created_at);
                // }

                // return $result;

                return [
                    $date1 = Carbon::createFromFormat('Y-m-d', $r->created_at),
                    $date2 = Carbon::createFromFormat('Y-m-d', $this->app->AddDateWithDays($r->created_at, $days)),
                    $date1->eq($date2),
                    $date2->eq(Carbon::now()),
                    Carbon::parse($r->created_at)->format('d-m-Y h:i:s a'),
                    $this->app->AddDateWithDays($r->created_at, $days)->format('d-m-Y h:i:s a'),
                ];
            });
            dd($checkAppliactions);
            // Get All the application and check their date and expire within given days

            $data['data']    = $this->app->AddDateWithDays('21-07-2023', 1)->format('h.i.s a'); //Applications::select('id', 'created_at')->get();
            $data['message'] = 'All the application loaded';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

}

// 1    => 8
// 3    => 8
// 4    => 8
// 5    => 8
// 6    => 2
// 7    => 1
// 8    => 2
// 9    => 1
// 10    => 1
// 11    => 1
