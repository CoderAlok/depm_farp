<?php

namespace App\Http\Controllers;

use ApplicationEvents;
use ApplicationFiles;
use ApplicationLog;
use ApplicationProgressMaster;
use Applications;
use ApplicationStalls;
use ApplicationTravels;
use AppliedApplication;
use App\Mail\SendMail;
use App\Repositories\CustomRepository;
use Auth;
use Carbon\Carbon;
use Complaince;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;
use User;

class ApplicationController extends Controller
{

    private $app;

    public function __construct(CustomRepository $app)
    {
        $this->app = $app;
    }

    /**
     * Method submitApplication
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function submitApplication(Request $request)
    {
        try {
            $valid_rule  = [];
            $valid_error = [];
            switch ($request->scheme_id) {
                // Validation for scheme 1
                case 1:
                    if ($request->travel_details == 1 && $request->stall_details == 1) {
                        // Both Travel & Stall detail ACTIVE
                        $valid_rule = [
                            'exporter_id'                          => 'required',
                            'scheme_id'                            => 'required',
                            'iec'                                  => 'required',
                            'exporting_organization'               => 'required',
                            'dir_ceo'                              => 'required',
                            'exptr_email'                          => 'required',
                            'exptr_phone'                          => 'required',
                            'bank_name'                            => 'required',
                            'bank_ac'                              => 'required',
                            'bank_ifsc'                            => 'required',
                            'event_detail'                         => '',
                            'event_name'                           => 'required',
                            'event_type'                           => 'required',
                            'participation_type'                   => 'required',
                            'event_city'                           => 'required',
                            'event_country'                        => 'required',
                            'file_iec'                             => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_bank_cheque'                     => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Travel
                            'travel.*.travel_destination_type'     => 'required',
                            'travel.*.traveller_name'              => 'required',
                            'travel.*.traveller_designation'       => 'required',
                            'travel.*.mode_of_travel'              => '',
                            'travel.*.class_of_tarvel'             => 'required',
                            'travel.*.total_travel_expense'        => 'required',
                            'travel.*.travel_incentive'            => 'required',
                            'travel.*.file_visa_invitation_letter' => 'file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'travel.*.file_ticket'                 => 'file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'travel.*.file_boarding_pass'          => 'file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Stall
                            'stall_event_name'                     => 'required',
                            'total_stall_reg_cost'                 => 'required',
                            'stall_incentive'                      => 'required',
                            'file_stall_allot_letter'              => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_stall_pay_recpt'                 => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Additional
                            'meeting_detail'                       => 'required',
                            'participation_det'                    => 'required',
                            'file_tour_dairy'                      => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        ];
                        $valid_error = [
                            'exporter_id.required'                          => 'Please, enter the exporter_id',
                            'scheme_id.required'                            => 'Please, enter the scheme_id',
                            'iec.required'                                  => 'Please, enter the iec',
                            'exporting_organization.required'               => 'Please, enter the exporting_organization',
                            'dir_ceo.required'                              => 'Please, enter the dir_ceo',
                            'exptr_email.required'                          => 'Please, enter the exptr_email',
                            'exptr_phone.required'                          => 'Please, enter the exptr_phone',
                            'bank_name.required'                            => 'Please, enter the bank_name',
                            'bank_ac.required'                              => 'Please, enter the bank_ac',
                            'bank_ifsc.required'                            => 'Please, enter the bank_ifsc',
                            'event_detail'                                  => '',
                            'event_name.required'                           => 'Please, enter the event_name',
                            'event_type.required'                           => 'Please, enter the event_type',
                            'participation_type.required'                   => 'Please, enter the participation_type',
                            'event_city.required'                           => 'Please, enter the event_city',
                            'event_country.required'                        => 'Please, enter the event_country',
                            'file_iec.required'                             => 'Please, fill the required file iec',
                            'file_bank_cheque.required'                     => 'Please, fill the required file bank cheque',

                            // Travel
                            'travel.*.travel_destination_type.required'     => 'Please, enter the travel_destination_type',
                            'travel.*.traveller_name.required'              => 'Please, enter the traveller_name',
                            'travel.*.traveller_designation.required'       => 'Please, enter the traveller_designation',
                            'travel.*.mode_of_travel.required'              => 'Please, enter the mode_of_travel',
                            'travel.*.class_of_tarvel.required'             => 'Please, enter the class_of_tarvel',
                            'travel.*.total_travel_expense.required'        => 'Please, enter the total_travel_expense',
                            'travel.*.travel_incentive.required'            => 'Please, enter the travel_incentive',
                            'travel.*.file_visa_invitation_letter.required' => 'Please, enter the file_visa_invitation_letter',
                            'travel.*.file_ticket.required'                 => 'Please, enter the file_ticket',
                            'travel.*.file_boarding_pass.required'          => 'Please, enter the file_boarding_pass',

                            // Stall
                            'stall_event_name.required'                     => 'Please, enter the stall_event_name',
                            'total_stall_reg_cost.required'                 => 'Please, enter the total_stall_reg_cost',
                            'stall_incentive.required'                      => 'Please, enter the stall_incentive',
                            'file_stall_allot_letter.required'              => 'Please, enter the file_stall_allot_letter',
                            'file_stall_pay_recpt.required'                 => 'Please, enter the file_stall_pay_recpt',

                            // Additional
                            'meeting_detail.required'                       => 'Please, enter the meeting_detail',
                            'participation_det.required'                    => 'Please, enter the participation_det',
                            'file_tour_dairy.required'                      => 'Please, enter the file_tour_dairy',
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
                            // 'class_of_t-arvel'             => 'required',
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
                            'exporter_id'                          => 'required',
                            'scheme_id'                            => 'required',
                            'iec'                                  => 'required',
                            'exporting_organization'               => 'required',
                            'dir_ceo'                              => 'required',
                            'exptr_email'                          => 'required',
                            'exptr_phone'                          => 'required',
                            'bank_name'                            => 'required',
                            'bank_ac'                              => 'required',
                            'bank_ifsc'                            => 'required',
                            'event_detail'                         => '',
                            'event_name'                           => 'required',
                            'event_type'                           => 'required',
                            'participation_type'                   => 'required',
                            'event_city'                           => 'required',
                            'event_country'                        => 'required',
                            'file_iec'                             => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'file_bank_cheque'                     => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Travel
                            'travel.*.travel_destination_type'     => 'required',
                            'travel.*.traveller_name'              => 'required',
                            'travel.*.traveller_designation'       => 'required',
                            'travel.*.mode_of_travel'              => 'required',
                            'travel.*.class_of_tarvel'             => 'required',
                            'travel.*.total_travel_expense'        => 'required',
                            'travel.*.travel_incentive'            => 'required',
                            'travel.*.file_visa_invitation_letter' => 'file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'travel.*.file_ticket'                 => 'file|max:4096|mimes:jpeg,jpg,png,pdf',
                            'travel.*.file_boarding_pass'          => 'file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Stall
                            // 'stall_event_name'            => 'required',
                            // 'total_stall_reg_cost'        => 'required',
                            // 'stall_incentive'             => 'required',
                            // 'file_stall_allot_letter'     => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                            // 'file_stall_pay_recpt'        => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',

                            // Additional
                            'meeting_detail'                       => 'required',
                            'participation_det'                    => 'required',
                            'file_tour_dairy'                      => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        ];
                        $valid_error = [
                            'exporter_id.required'                          => 'Please, enter the exporter_id',
                            'scheme_id.required'                            => 'Please, enter the scheme_id',
                            'iec.required'                                  => 'Please, enter the iec',
                            'exporting_organization.required'               => 'Please, enter the exporting_organization',
                            'dir_ceo.required'                              => 'Please, enter the dir_ceo',
                            'exptr_email.required'                          => 'Please, enter the exptr_email',
                            'exptr_phone.required'                          => 'Please, enter the exptr_phone',
                            'bank_name.required'                            => 'Please, enter the bank_name',
                            'bank_ac.required'                              => 'Please, enter the bank_ac',
                            'bank_ifsc.required'                            => 'Please, enter the bank_ifsc',
                            'event_detail'                                  => '',
                            'event_name.required'                           => 'Please, enter the event_name',
                            'event_type.required'                           => 'Please, enter the event_type',
                            'participation_type.required'                   => 'Please, enter the participation_type',
                            'event_city.required'                           => 'Please, enter the event_city',
                            'event_country.required'                        => 'Please, enter the event_country',
                            'file_iec.required'                             => 'Please, fill the required file iec',
                            'file_bank_cheque.required'                     => 'Please, fill the required file bank cheque',

                            // Travel
                            'travel.*.travel_destination_type.required'     => 'Please, enter the travel_destination_type',
                            'travel.*.traveller_name.required'              => 'Please, enter the traveller_name',
                            'travel.*.traveller_designation.required'       => 'Please, enter the traveller_designation',
                            'travel.*.mode_of_travel.required'              => 'Please, enter the mode_of_travel',
                            'travel.*.class_of_tarvel.required'             => 'Please, enter the class_of_tarvel',
                            'travel.*.total_travel_expense.required'        => 'Please, enter the total_travel_expense',
                            'travel.*.travel_incentive.required'            => 'Please, enter the travel_incentive',
                            'travel.*.file_visa_invitation_letter.required' => 'Please, enter the file_visa_invitation_letter',
                            'travel.*.file_ticket.required'                 => 'Please, enter the file_ticket',
                            'travel.*.file_boarding_pass.required'          => 'Please, enter the file_boarding_pass',

                            // Stall
                            // 'stall_event_name.required'            => 'Please, enter the stall_event_name',
                            // 'total_stall_reg_cost.required'        => 'Please, enter the total_stall_reg_cost',
                            // 'stall_incentive.required'             => 'Please, enter the stall_incentive',
                            // 'file_stall_allot_letter.required'     => 'Please, enter the file_stall_allot_letter',
                            // 'file_stall_pay_recpt.required'        => 'Please, enter the file_stall_pay_recpt',

                            // Additional
                            'meeting_detail.required'                       => 'Please, enter the meeting_detail',
                            'participation_det.required'                    => 'Please, enter the participation_det',
                            'file_tour_dairy.required'                      => 'Please, enter the file_tour_dairy',
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
                $user_id        = Auth::guard('exporter')->user()->id;
                $application_no = $this->app->generateExpSchAppCode();

                if ($request->scheme_id != 1) {
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

                if ($appl_id) {
                    // IEC certificate upload
                    $iec_file_name = common_file_upload($request->file_iec, ['file_name' => 'IEC_', 'appl_id' => $application_no['applicaton_no'], 'folder_name' => 'iec']);

                    // Bank cheque upload
                    $bank_cheque_file_name = common_file_upload($request->file_bank_cheque, ['file_name' => 'BANK_CHEQUE_', 'appl_id' => $application_no['applicaton_no'], 'folder_name' => 'bank']);

                    if ($request->scheme_id == 1) {
                        // Tour Dairy upload
                        $tour_dairy_file_name = common_file_upload($request->file_tour_dairy, ['file_name' => 'TOUR_DAIRY_', 'appl_id' => $application_no['applicaton_no'], 'folder_name' => 'tour_dairy']);

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
                        // file submittion loop start
                        foreach ($request->travel as $key => $value) {

                            $common_data[$key]['appl_id']            = $appl_id;
                            $common_data[$key]['destination_type']   = $value['travel_destination_type'];
                            $common_data[$key]['traveller_name']     = $value['traveller_name'];
                            $common_data[$key]['travel_from']        = $value['travelled_from'];
                            $common_data[$key]['designation']        = $value['traveller_designation'];
                            $common_data[$key]['mode_of_travel']     = $value['mode_of_travel'];
                            $common_data[$key]['class_of_travel']    = $value['class_of_tarvel'];
                            $common_data[$key]['total_expense']      = $value['total_travel_expense'];
                            $common_data[$key]['incentive_claimed']  = $value['travel_incentive'];
                            $common_data[$key]['file_visa']          = '';
                            $common_data[$key]['file_ticket']        = '';
                            $common_data[$key]['file_boarding_pass'] = '';
                            $common_data[$key]['status']             = 1;
                            $common_data[$key]['created_by']         = $user_id;
                            $common_data[$key]['created_at']         = Carbon::now();

                            if ($value['travel_destination_type'] == 2) {
                                // Visa upload
                                if ($value['file_visa_invitation_letter'] != null) {
                                    $visa_file_name = common_file_upload($value['file_visa_invitation_letter'], ['file_name' => 'VISA_', 'appl_id' => $application_no['applicaton_no'], 'folder_name' => 'visa_image']);
                                } else {
                                    $visa_file_name = '';
                                }

                                $common_data[$key]['file_visa'] = $visa_file_name;
                            }
                            if ($value['mode_of_travel'] == 1) {
                                // $common_data[$key]['class_of_travel'] = $value['class_of_tarvel'];

                                // Ticket upload
                                if ($value['file_ticket']) {
                                    $ticket_file_name = common_file_upload($value['file_ticket'], ['file_name' => 'TICKET_', 'appl_id' => $application_no['applicaton_no'], 'folder_name' => 'ticket']);
                                } else {
                                    $ticket_file_name = '';
                                }
                                $common_data[$key]['file_ticket'] = $ticket_file_name;

                                // Boarding pass upload
                                if ($value['file_boarding_pass']) {
                                    $boarding_pass_file_name = common_file_upload($value['file_boarding_pass'], ['file_name' => 'BOARDING_PASS_', 'appl_id' => $application_no['applicaton_no'], 'folder_name' => 'boarding_pass']);
                                } else {
                                    $boarding_pass_file_name = '';
                                }
                                $common_data[$key]['file_boarding_pass'] = $boarding_pass_file_name;

                            } else {
                                // Ticket upload
                                if ($value['file_ticket']) {
                                    $ticket_file_name = common_file_upload($value['file_ticket'], ['file_name' => 'TICKET_', 'appl_id' => $application_no['applicaton_no'], 'folder_name' => 'ticket']);
                                } else {
                                    $ticket_file_name = '';
                                }
                                $common_data[$key]['file_ticket'] = $ticket_file_name;
                            }
                        }
                        $travel_id = ApplicationTravels::insert($common_data);
                    }

                    if ($request->stall_details == 1) {
                        // Stall allotment upload
                        if ($request->file_stall_allot_letter) {
                            $stall_allotment_file_name = common_file_upload($request->file_stall_allot_letter, ['file_name' => 'STALL_ALLOTMENT_', 'appl_id' => $application_no['applicaton_no'], 'folder_name' => 'stall_allotment']);
                        } else {
                            $stall_allotment_image = $request->file_stall_allot_letter;
                        }

                        // Stall registration payment reciept upload
                        if ($request->file_stall_pay_recpt) {
                            $stall_pay_reciept_file_name = common_file_upload($request->file_stall_pay_recpt, ['file_name' => 'STALL_PAY_RECIEPT_', 'appl_id' => $application_no['applicaton_no'], 'folder_name' => 'stall_pay_reciept']);
                        } else {
                            $stall_pay_reciept_image = $request->file_stall_pay_recpt;
                        }

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

                    $insert_log_data = [
                        'appl_id'        => $appl_id,
                        'from_user_type' => 1,
                        'from_user'      => $user_id,
                        'to_user_type'   => 2,
                        'to_user'        => User::where(['role_id' => 2])->first()->id,
                        'status'         => 1,
                        'remarks'        => '',
                        'updated_date'   => Carbon::now(),
                        'created_at'     => Carbon::now(),
                    ];
                    $log_status = ApplicationLog::insert($insert_log_data);

                    $data['data'] = [
                        'appl_id'  => $appl_id ?? '',
                        'event_id' => $event_id ?? '',
                        'stall_id' => $stall_id ?? '',
                        'file_id'  => $file_id ?? '',
                    ];
                    $data['message'] = 'Application submission successful.';
                    $request->session()->flash('message', $data['message']);
                    return redirect()->route('exporter.application.list')->with($data);
                } else {
                    $data['data']    = [];
                    $data['message'] = 'Applictaion submission failed.';
                    return redirect()->route('exporter.application.list')->with($data);
                }
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method pending_exporters_application
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function sanctioned_exporters_application(Request $request)
    {
        $data['page_title']   = 'Sanctioned exporters applications';
        $data['applications'] = Applications::where('status', 8)->with(['get_scheme_details', 'get_exporter_details', 'get_travel_details', 'get_stall_details'])->latest()->get()->map(function ($r) {
            return [
                // 'r'           => $r->toArray(),
                'id'          => $r->id ?? '',
                'app_no'      => $r->app_no ?? '',
                'scheme'      => $r->get_scheme_details->short_name ?? '',
                'name'        => $r->get_exporter_details->name ?? '',
                'contact_no'  => $r->get_exporter_details->phone ?? '',
                'claimed_amt' => $r->scheme_id == 1 ? ($r->get_travel_details != null ? $r->get_travel_details->map(function ($r1) {return $r1->incentive_claimed;})->sum() : 0) + ($r->get_stall_details->claimed_cost ?? 0) : (int) $r->certi_cost,
                // 'total_amt'   => $r->scheme_id == 1 ? ($r->get_travel_details != null ? $r->get_travel_details->map(function ($r1) {return $r1->total_expense;})->sum() : 0) + ($r->get_stall_details->total_cost ?? 0) : (int) $r->certi_cost,
                'status'      => $r->status,
            ];
        })->toArray();
        $data['pending'] = Applications::where('status', 2)->count();

        // dd($data);
        return view('admin.ddo.pending_schemes_application')->with($data);
    }

    /**
     * Method pending_exporters_application
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function pending_exporters_application(Request $request)
    {
        $data['page_title'] = 'Pending exporters applications';
        // For exporters
        if (Auth::user()->role_id == 7) {

            $data['applications'] = Applications::where('status', 8)->with(['get_scheme_details', 'get_exporter_details', 'get_travel_details', 'get_stall_details'])->latest()->get()->map(function ($r) {
                return [
                    // 'r'           => $r->toArray(),

                    'id'          => $r->id ?? '',
                    'app_no'      => $r->app_no ?? '',
                    'scheme'      => $r->get_scheme_details->short_name ?? '',
                    'name'        => $r->get_exporter_details->name ?? '',
                    'contact_no'  => $r->get_exporter_details->phone ?? '',
                    'claimed_amt' => $r->scheme_id == 1 ? ($r->get_travel_details != null ? $r->get_travel_details->map(function ($r1) {return $r1->incentive_claimed;})->sum() : 0) + ($r->get_stall_details->claimed_cost ?? 0) : (int) $r->certi_cost,
                    'status'      => $r->status,
                ];
            })->toArray();
            $data['pending']        = Applications::where('status', 2)->count();
            $data['ddo_array_flag'] = 7;
            // dd($data);
        } else {
            // For Departmental Users
            $data['applications'] = Applications::with(['get_scheme_details', 'get_exporter_details', 'get_travel_details', 'get_stall_details'])->latest()->get()->map(function ($r) {
                return [
                    // 'r'              => $r->toArray(),

                    'id'          => $r->id ?? '',
                    'app_no'      => $r->app_no ?? '',
                    'scheme'      => $r->get_scheme_details->short_name ?? '',
                    'name'        => $r->get_exporter_details->name ?? '',
                    'contact_no'  => $r->get_exporter_details->phone ?? '',
                    'claimed_amt' => $r->scheme_id == 1 ? ($r->get_travel_details != null ? $r->get_travel_details->map(function ($r1) {return $r1->incentive_claimed;})->sum() : 0) + ($r->get_stall_details->claimed_cost ?? 0) : (int) $r->certi_cost,
                    'status'      => $r->status,
                ];
            })->toArray();
            $data['pending']        = Applications::where('status', 2)->count();
            $data['ddo_array_flag'] = 0;
        }

        // dd($data);
        return view('admin.publicity_officer.pending_schemes_application')->with($data);
    }

    /**
     * Method pending_exporters_application_details ------ FOR ADMINS -------
     * Application details page for all the users
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
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
            'get_complaince_details' => function ($r) {
                $r->where('insert_status', 1);
            },
        ])->first(); //->toArray();
        $data['applications'] = $applications; //->toArray();
        // dd([$data, $data['applications']->get_application_progress_master_details]);
        $data['total_expenditure'] = (int) ($applications->scheme_id == 1 ? ($applications->get_travel_details != null ? ($applications->get_travel_details->map(function ($r) {return $r->total_expense;})->sum() ?? 0) : 0) + ($applications->get_stall_details->total_cost ?? 0) : ($applications->certi_cost ?? 0));
        $data['incentive_amount'] = 0; //(int) ($applications->get_travel_details->incentive_claimed ?? 0) + ($applications->get_stall_details->claimed_cost ?? 0);
        $data['pending']          = Applications::where('status', 1)->count();
        return view('admin.publicity_officer.pending_schemes_application_details')->with($data);
    }

    /**
     * Method exporters_application_status_details ------ FOR EXPORTERS -------
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
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
            'get_application_progress_master_details' => function ($r) {
                $r->latest()->first();
            },
            'get_applied_details',
        ])->first();
        $data['pending']    = Applications::where('status', 1)->count();
        $data['complaince'] = Complaince::where('appl_id', $id)->where('insert_status', 1)->get();
        // dd([$data['applications']->toArray()]);

        return view('application_status_details')->with($data);
    }

    /**
     * Method exporters_application_status_details ------ FOR EXPORTERS -------
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function exporters_application_status_details_complaince_submit(Request $request, $id = null)
    {
        // dd([$request->all(), $id]);

        try {
            $remarks           = $request->remarks;
            $user              = Auth::guard('exporter')->user();
            $app_no            = Applications::where('id', $id)->first()->app_no;
            $exporter_id       = Applications::where('id', $id)->first()->exporter_id;
            $status            = 0;
            $complaince        = new Complaince();
            $occurence_counter = $complaince->where('appl_id', $id)->count(); //->first()->occurence;
            $occurence_counter = $occurence_counter != 0 ? $complaince->where('appl_id', $id)->first()->occurence : 0;
            $occurence_counter = $occurence_counter + 1;

            if ($request->chkjs) {
                foreach ($request->complaince as $key => $value) {
                    $comp_docu = $request->complaince[$key]['comp_doc'];
                    $file_name = 'COMP_' . substr(sha1($comp_docu . uniqid('', true)), 10, 5) . date('my') . $comp_docu->getClientOriginalName();
                    $file_path = 'public/images/exporters/applications/' . $app_no . '/complaince' . $id . '/';
                    $comp_docu->storeAs($file_path, $file_name);

                    // Temporary feature
                    $insert_comp_data = [
                        'occurence'         => $occurence_counter,
                        'appl_id'           => $id,
                        'exporter_id'       => $exporter_id,
                        'user_id'           => $user->id,
                        'section_type'      => $value['section_name'],
                        'description'       => $value['file_name'],
                        'file_name'         => $file_name,
                        'exporters_remarks' => $remarks,
                        'insert_status'     => 1, //0, // -- for now its 1 to keep the track Of latest uploaded files and showing them to the departmental
                        'created_by' => $user->id,
                        'updated_by'        => 0,
                        'created_at'        => Carbon::now(),
                    ];
                    $status = $complaince::insert($insert_comp_data);
                }
            } else {
                $insert_comp_data = [
                    'occurence'         => $occurence_counter,
                    'appl_id'           => $id,
                    'exporter_id'       => $exporter_id,
                    'user_id'           => $user->id,
                    'section_type'      => null,
                    'description'       => null,
                    'file_name'         => null,
                    'exporters_remarks' => $remarks,
                    'insert_status'     => 0,
                    'created_by'        => $user->id,
                    'updated_by'        => 0,
                    'created_at'        => Carbon::now(),
                ];
                $status = $complaince::insert($insert_comp_data);
            }

            if ($status) {
                // Insert into the Application log table
                $insert_data = [
                    'appl_id'          => $id,
                    'total_expense'    => 0,
                    'incentive_amount' => 0,
                    'remarks'          => $request->remarks,
                    'created_by'       => $user->id,
                    'updated_by'       => $user->id,
                    'created_at'       => Carbon::now(),
                ];
                $status = ApplicationProgressMaster::insert($insert_data);

                // Updates the status to 1 again to be scrutinized.
                Applications::where('id', $id)->update(['status' => 1]);

                $data['message'] = 'Application updated successfully.';
                $request->session()->flash('message', $data['message']);
                // return redirect()->back()->with($data);
                return redirect()->route('exporter.rejected.application.list')->with($data);
            } else {
                $data['message'] = 'Failed to updated.';
                $request->session()->flash('message', $data['message']);
                return redirect()->back()->with($data);
                // return redirect()->route('exporter.application.list')->with($data);
            }
        } catch (\Exception $e) {
            $data['data']    = ['error'];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }

        // try {
        //     $remarks    = $request->remarks;
        //     $user       = Auth::guard('exporter')->user();
        //     $app_no     = Applications::where('id', $id)->first()->app_no;
        //     $status     = 0;
        //     $complaince = new Complaince();

        //     foreach ($request->complaince as $key => $value) {
        //         $comp_docu = $request->complaince[$key]['comp_doc'];
        //         $file_name = 'COMP_' . substr(sha1($comp_docu . uniqid('', true)), 10, 5) . date('my') . $comp_docu->getClientOriginalName();
        //         $file_path = 'public/images/exporters/applications/' . $app_no . '/complaince' . $id . '/';
        //         $comp_docu->storeAs($file_path, $file_name);
        //         // $status = $complaince::where(['id' => $value['id']])->update(['file_name' => $file_name, 'exporters_remarks' => $remarks, 'updated_by' => $user->id, 'insert_status' => 0]);
        //     }

        //     if ($status) {
        //         // Insert into the Application log table
        //         $insert_data = [
        //             'appl_id'          => $id,
        //             'total_expense'    => 0,
        //             'incentive_amount' => 0,
        //             'remarks'          => $request->remarks,
        //             'created_by'       => $user->id,
        //             'updated_by'       => $user->id,
        //             'created_at'       => Carbon::now(),
        //         ];
        //         $status = ApplicationProgressMaster::insert($insert_data);

        //         // Updates the status to 1 again to be scrutinized.
        //         Applications::where('id', $id)->update(['status' => 1]);

        //         $data['message'] = 'Application updated successfully.';
        //         $request->session()->flash('message', $data['message']);
        //         // return redirect()->back()->with($data);
        //         return redirect()->route('exporter.rejected.application.list')->with($data);
        //     } else {
        //         $data['message'] = 'Failed to updated.';
        //         $request->session()->flash('message', $data['message']);
        //         return redirect()->back()->with($data);
        //         // return redirect()->route('exporter.application.list')->with($data);
        //     }
        // } catch (\Exception $e) {
        //     $data['data']    = ['error'];
        //     $data['message'] = $e->getMessage();
        //     return response($data, 500);
        // }

    }

    /**
     * Method exporters_application_status_details_update by SO
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function exporters_application_status_details_update(Request $request, $id = null)
    {
        // dd([$request->all()]);
        try {
            $user          = Auth::user();
            $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'updated_by' => $user->id]);
            if ($update_status) {

                // if (ApplicationProgressMaster::where(['appl_id' => $id, 'created_by' => $user->id])->first()) {
                //     $update_data = [
                //         'total_expense'    => $request->total_expenses,
                //         'incentive_amount' => $request->incentive_amount,
                //         'remarks'          => $request->remarks,
                //         'updated_by'       => $user->id,
                //     ];
                //     $status          = ApplicationProgressMaster::where('appl_id', $id)->update($update_data);
                //     $data['message'] = 'Application status updated successfully..';
                //     Session::flash('message', $data['message']);
                // } else {
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
                // }

                // Insert into Application log -- This code is useless just maintaining the application log file
                $insert_log_data = [
                    'appl_id'        => $id,
                    'from_user_type' => 1,
                    'from_user'      => $user->id,
                    'to_user_type'   => 2,
                    'to_user'        => null,
                    'status'         => 1,
                    'remarks'        => $request->remarks,
                    'updated_date'   => Carbon::now(),
                    'created_at'     => Carbon::now(),
                ];
                $log_status = ApplicationLog::insert($insert_log_data);

                // Also, update the complaince table insert_status to zoro of those pericular files
                if ($request->complaince) {
                    foreach ($request->complaince['id'] as $key => $value) {
                        $complaince_status = Complaince::where('id', $value)->update(['insert_status' => 0]);

                        // Also, this files must be replaced with the old once in their respective folder.
                        # TODO CODE ...
                    }
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

        // try {
        //     // dd([$request->all()]);
        //     $user          = Auth::user();
        //     $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'updated_by' => $user->id]);
        //     if ($update_status) {

        //         // if (ApplicationProgressMaster::where(['appl_id' => $id, 'created_by' => $user->id])->first()) {
        //         //     $update_data = [
        //         //         'total_expense'    => $request->total_expenses,
        //         //         'incentive_amount' => $request->incentive_amount,
        //         //         'remarks'          => $request->remarks,
        //         //         'updated_by'       => $user->id,
        //         //     ];
        //         //     $status          = ApplicationProgressMaster::where('appl_id', $id)->update($update_data);
        //         //     $data['message'] = 'Application status updated successfully..';
        //         //     Session::flash('message', $data['message']);
        //         // } else {
        //         $insert_data = [
        //             'appl_id'          => $id,
        //             'total_expense'    => $request->total_expenses,
        //             'incentive_amount' => $request->incentive_amount,
        //             'remarks'          => $request->remarks,
        //             'created_by'       => $user->id,
        //             'updated_by'       => $user->id,
        //             'created_at'       => Carbon::now(),
        //         ];
        //         $status          = ApplicationProgressMaster::insert($insert_data);
        //         $data['message'] = 'Application status updated successfully.';
        //         Session::flash('message', $data['message']);
        //         // }

        //         // Insert into Application log
        //         $insert_log_data = [
        //             'appl_id'        => $id,
        //             'from_user_type' => 1,
        //             'from_user'      => $user->id,
        //             'to_user_type'   => 2,
        //             'to_user'        => null,
        //             'status'         => 1,
        //             'remarks'        => $request->remarks,
        //             'updated_date'   => Carbon::now(),
        //             'created_at'     => Carbon::now(),
        //         ];
        //         $log_status = ApplicationLog::insert($insert_log_data);

        //     } else {
        //         $data['message'] = 'Failed to update the status from SO.';
        //         Session::flash('message', $data['message']);
        //     }
        //     // return redirect()->back()->with($data);
        //     return redirect()->route('admin.publicity.officer.pending.exporters.applications')->with($data);

        // } catch (\Exception $e) {
        //     $data['data']    = [];
        //     $data['message'] = $e->getMessage();
        //     return response($data, 500);
        //     // return redirect()->back()->with($data);
        // }
    }

    /**
     * Method exporters_application_dir_depm_update UPDATE BY Director DEPM
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function exporters_application_dir_depm_update(Request $request, $id = null)
    {
        try {
            // dd([$request->all()]);
            $user              = Auth::user();
            $complaince        = new Complaince();
            $occurence_counter = $complaince->where('appl_id', $id)->count(); //->first()->occurence;
            $occurence_counter = $occurence_counter != 0 ? $complaince->where('appl_id', $id)->first()->occurence : 0;
            $occurence_counter = $occurence_counter + 1;
            // dd($occurence_counter);

            $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'updated_by' => $user->id]);
            if ($update_status) {

                if ($request->status == 5) {
                    // dd($occurence_counter);
                    $insert_data = [];
                    $exporter_id = Applications::where('id', $id)->first()->exporter_id;
                    if ($request->complaince[0]['section_name'] != null) {
                        foreach ($request->complaince as $key => $value) {
                            $insert_data[$key]['appl_id']       = $id;
                            $insert_data[$key]['occurence']     = $occurence_counter; // Occerance is incremented everytime time when a query is raised.
                            $insert_data[$key]['exporter_id']   = $exporter_id;
                            $insert_data[$key]['user_id']       = $user->id;
                            $insert_data[$key]['section_type']  = null; //$value['section_name'];  //-- feature inactive just for now
                            $insert_data[$key]['description']   = null; //$value['file_name'];  // -- feature inactive just for now
                            $insert_data[$key]['insert_status'] = false; //true  // -- feature inactive just for now
                            $insert_data[$key]['created_by']    = $user->id;
                            $insert_data[$key]['created_at']    = Carbon::now();
                        }
                        $comp_status = $complaince->insert($insert_data);
                    } else {
                        $comp_status = 1;
                    }

                    if ($comp_status) {
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
                    } else {
                        $data['message'] = 'Application status updated successfully.';
                        Session::flash('message', $data['message']);
                        return redirect()->back();
                    }

                }

                // Then update other associated tables
                // if (ApplicationProgressMaster::where(['appl_id' => $id, 'created_by' => $user->id])->first()) {
                //     $update_data = [
                //         'total_expense'    => $request->total_expenses,
                //         'incentive_amount' => $request->incentive_amount,
                //         'remarks'          => $request->remarks,
                //         'updated_by'       => $user->id,
                //     ];
                //     $status          = ApplicationProgressMaster::where('appl_id', $id)->update($update_data);
                //     $data['message'] = 'Application status updated successfully..';
                //     Session::flash('message', $data['message']);
                // } else {
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
                // }

            } else {
                $data['message'] = 'Failed to update the status from SO.';
                Session::flash('message', $data['message']);
                return redirect()->back();
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
     * @author AlokDas
     * @return void
     */
    public function exporters_application_spl_sectry_update(Request $request, $id = null)
    {
        // dd([$request->all(), $id]);
        try {
            $user              = Auth::user();
            $complaince        = new Complaince();
            $occurence_counter = $complaince->where('appl_id', $id)->count(); //->first()->occurence;
            $occurence_counter = $occurence_counter != 0 ? $complaince->where('appl_id', $id)->first()->occurence : 0;
            $occurence_counter = $occurence_counter + 1;
            // $occurence_counter = $complaince->where('appl_id', $id)->first()->occurence;
            // $occurence_counter = $occurence_counter + 1;
            // dd($occurence_counter);

            $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'updated_by' => $user->id]);
            if ($update_status) {

                if ($request->status == 7) {
                    $insert_data = [];
                    $exporter_id = Applications::where('id', $id)->first()->exporter_id;

                    if ($request->complaince[0]['section_name'] != null) {
                        foreach ($request->complaince as $key => $value) {
                            $insert_data[$key]['appl_id']       = $id;
                            $insert_data[$key]['occurence']     = $occurence_counter; // Occerance is incremented everytime time when a query is raised.
                            $insert_data[$key]['exporter_id']   = $exporter_id;
                            $insert_data[$key]['user_id']       = $user->id;
                            $insert_data[$key]['section_type']  = $value['section_name'];
                            $insert_data[$key]['description']   = $value['file_name'];
                            $insert_data[$key]['insert_status'] = true;
                            $insert_data[$key]['created_by']    = $user->id;
                            $insert_data[$key]['created_at']    = Carbon::now();
                        }
                        $comp_status = $complaince->insert($insert_data);
                    } else {
                        $comp_status = 1;
                    }

                    if ($comp_status) {
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
                    } else {
                        $data['message'] = 'Application status updated successfully.';
                        Session::flash('message', $data['message']);
                        return redirect()->back();
                    }
                }

                // Then update other associated tables
                // if (ApplicationProgressMaster::where(['appl_id' => $id, 'created_by' => $user->id])->first()) {
                //     $update_data = [
                //         'total_expense'    => $request->total_expenses,
                //         'incentive_amount' => $request->incentive_amount,
                //         'remarks'          => $request->remarks,
                //         'updated_by'       => $user->id,
                //     ];

                //     $status          = ApplicationProgressMaster::where('appl_id', $id)->update($update_data);
                //     $data['message'] = 'Application status updated successfully..';
                //     Session::flash('message', $data['message']);
                // } else {
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
                $data['message'] = 'Application status inserted successfully.';
                Session::flash('message', $data['message']);
                // }

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
     * @author AlokDas
     * @return void
     */
    public function exporters_application_dept_sectry_update(Request $request, $id = null)
    {
        // dd([$request->all(), $id]);
        try {
            $user              = Auth::user();
            $complaince        = new Complaince();
            $occurence_counter = $complaince->where('appl_id', $id)->count(); //->first()->occurence;
            $occurence_counter = $occurence_counter != 0 ? $complaince->where('appl_id', $id)->first()->occurence : 0;
            $occurence_counter = $occurence_counter + 1;
            // $occurence_counter = $complaince->where('appl_id', $id)->first()->occurence;
            // $occurence_counter = $occurence_counter + 1;

            // Appeal facility given towards Approval and Rejection
            // switch ($request->status) {
            //     case 8:
            //         # code...
            //         $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'appeal_facility' => 1, 'updated_by' => $user->id]);
            //         break;

            //     case 9:
            //         # code...
            //         $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'appeal_facility' => 0, 'updated_by' => $user->id]);
            //         break;

            //     default:
            //         # code...
            //         $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'appeal_facility' => 1, 'updated_by' => $user->id]);
            //         break;
            // }

            if ($request->status) {
                $update_status = Applications::where('id', $id)->update(['status' => $request->status, 'appeal_facility' => 1, 'updated_by' => $user->id]);
            }

            if ($update_status) {

                if ($request->status == 9) {
                    $insert_data = [];
                    $exporter_id = Applications::where('id', $id)->first()->exporter_id;

                    // if ($request->complaince[0]['section_name'] != null) {
                    //     foreach ($request->complaince as $key => $value) {
                    //         $insert_data[$key]['appl_id']       = $id;
                    //         $insert_data[$key]['occurence']     = $occurence_counter; // Occerance is incremented everytime time when a query is raised.
                    //         $insert_data[$key]['exporter_id']   = $exporter_id;
                    //         $insert_data[$key]['user_id']       = $user->id;
                    //         $insert_data[$key]['section_type']  = $value['section_name'];
                    //         $insert_data[$key]['description']   = $value['file_name'];
                    //         $insert_data[$key]['created_by']    = $user->id;
                    //         $insert_data[$key]['insert_status'] = true;
                    //         $insert_data[$key]['created_at']    = Carbon::now();
                    //     }
                    //     $comp_status = Complaince::insert($insert_data);
                    // } else {
                    //     $comp_status = 1;
                    // }

                    $comp_status = 1; // Decleared just for now above code is for multiple complaince form which is now disabled.
                    if ($comp_status) {
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
                    } else {
                        $data['message'] = 'Failed to register complaince.';
                        Session::flash('message', $data['message']);
                        return redirect()->back()->with($data);
                    }
                }

                // Then update other associated tables
                // if (ApplicationProgressMaster::where(['appl_id' => $id, 'created_by' => $user->id])->first()) {
                //     $update_data = [
                //         'total_expense'    => $request->total_expenses,
                //         'incentive_amount' => $request->incentive_amount,
                //         'remarks'          => $request->remarks,
                //         'updated_by'       => $user->id,
                //     ];

                //     $status          = ApplicationProgressMaster::where('appl_id', $id)->update($update_data);
                //     $data['message'] = 'Application status updated successfully..';
                //     Session::flash('message', $data['message']);
                // } else {
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
                // }

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
     * @author AlokDas
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
     * @author AlokDas
     * @return void
     */
    public function expireApplication(Request $request, $id = null)
    {
        // dd($id);

        try {
            $chk         = 0;
            $application = new Applications();
            $appl_date   = $application->select('id', 'created_at')->where('id', $id)->first()->created_at;

            $toDate   = Carbon::parse($appl_date);
            $fromDate = Carbon::now();
            $days     = $toDate->diffInDays($fromDate);
            // $d['months'] = $toDate->diffInMonths($fromDate);
            // $d['years']  = $toDate->diffInYears($fromDate);

            if ($days > 60) {
                $chk = $application->where('id', $id)->update(['appeal_facility' => 2]);
            }

            if ($chk) {
                $data['appd']    = date('d-m-Y', strtotime($appl_date));
                $data['data']    = $days;
                $data['message'] = 'Updated successfully.';
                return response($data, 200);
            } else {
                $data['appd']    = date('d-m-Y', strtotime($appl_date));
                $data['data']    = $days;
                $data['message'] = 'Failed to update. As date has not reached.';
                return response($data, 300);
            }

        } catch (\Exception $e) {
            $data['data']    = 'Error';
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    public function exporters_appeal_submit(Request $request, $appl_id)
    {
        try {
            $user        = Auth::guard('exporter')->user();
            $applyStatus = AppliedApplication::firstOrCreate(['appl_id' => $appl_id, 'description' => $request->exporter_appeal_remarks, 'created_by' => $user->id, 'created_at' => Carbon::now()]);

            if ($applyStatus) {
                Applications::where('id', $appl_id)->update(['appeal_facility' => 2]);

                // Mail for those who will be rejected
                $data = [
                    'mail_id'   => $user->email,
                    'mail_type' => 7,
                    'mail_data' => [
                        'app_no'        => Applications::select('app_no')->where('id', $appl_id)->first()->app_no,
                        'exporter_name' => Applications::where('id', $appl_id)->with('get_exporter_details')->first(),
                        'remarks'       => '', //$request->remarks,
                        'user_role' => \Spatie\Permission\Models\Role::select('name')->where('id', $user->role_id)->first()->name,
                    ],
                ];

                $to      = $user->email;
                $subject = 'Exporters appeal application.';
                Mail::to($to)->send(new SendMail($data));

                $request->session()->flash('message', 'Appeal submitted successfully.');
                return redirect()->route('exporter.appeal.application.list');
            } else {
                $request->session()->flash('message', 'Failed to submit.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    public function pending_exporters_applied_application_for_dept_sect(Request $request)
    {
        try {
            $data['page_title'] = 'Appealed Application List';
            $user               = Auth::user();
            $data['data']       = $user;

            $applications = AppliedApplication::where('confirmed', 0)->with([
                'get_application_details' => function ($q) {
                    $q->with([
                        'get_exporter_details',
                        'get_scheme_details',
                        'get_event_details',
                        'get_travel_details',
                        'get_stall_details',
                        'get_file_details',
                        'get_address_details',
                        'get_other_code_details',
                        'get_bank_details',
                        'get_application_status_details',
                        'get_application_progress_master_details',
                        'get_complaince_details',
                        'get_applied_details',
                    ]);
                },
            ])
                ->latest()
                ->get()
                ->map(function ($r) {
                    return [
                        'yy'             => $r->toArray(),

                        'id'             => $r->id,
                        'appl_id'        => $r->get_application_details->id,
                        'app_code'       => $r->get_application_details->app_no ?? '',
                        'scheme'         => $r->get_application_details->get_scheme_details->short_name ?? '',
                        'claimed_amount' => $r->get_application_details->scheme_id == 1 ? (($r->get_application_details->get_travel_details != null ? ($r->get_application_details->get_travel_details->map(function ($r1) {return $r1->incentive_claimed;})->sum() ?? 0) : 0) + ($r->get_application_details->get_stall_details->claimed_cost ?? 0)) : ($r->get_application_details->certi_cost ?? 0),
                        'status'         => $r->get_application_details->get_applied_details->confirmed ?? 0,
                    ];
                });
            $data['applications'] = $applications;
            // dd($data);
            return view('admin.dept_secretory.appealed-application-list')->with($data);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method pending_exporters_applied_application_for_dept_sect_details
     * @param Request $request [explicite description]
     * @return void
     */
    public function pending_exporters_applied_application_for_dept_sect_details(Request $request, $id = null)
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
            'get_complaince_details' => function ($r) {
                $r->where('insert_status', 1);
            },
            'get_applied_details',
        ])->first(); //->toArray();
        $data['applications']      = $applications; //->toArray();
        $data['total_expenditure'] = $applications->get_application_progress_master_details[0]->incentive_amount ?? 0;
        // $data['total_expenditure'] = $applications->scheme_id != 1 ? (int) ($applications->certi_cost ?? 0) : (int) ($applications->get_travel_details->total_expense ?? 0) + ($applications->get_stall_details->total_cost ?? 0);
        $data['incentive_amount'] = $applications->scheme_id != 1 ? (int) ($applications->certi_cost ?? 0) : (int) ($applications->get_travel_details->map(function ($r) {return $r->incentive_claimed;})->sum() ?? 0) + ($applications->get_stall_details->claimed_cost ?? 0);
        // $data['considered_amount'] = ($applications->get_application_progress_master_details[0]->incentive_amount ?? 0);
        $data['pending'] = Applications::where('status', 1)->count();
        // dd(['Admin', $data]);
        return view('admin.dept_secretory.pending_schemes_application_details')->with($data);
    }

    /**
     * Method pending_exporters_applied_application_for_dept_sect_details_update
     * @param Request $reques [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function pending_exporters_applied_application_for_dept_sect_details_update(Request $request, $id = null)
    {
        // dd([$request->all(), $id]);

        $user             = Auth::user();
        $con_amount       = $request->con_amount ?? 0;
        $dif_amount       = $request->dif_amount ?? 0;
        $order_file       = $request->order_file;
        $dept_sec_remarks = $request->dept_sec_remarks ?? '';
        $application_no   = Applications::where('id', $request->appl_id)->first()->app_no;

        try {
            $appliedApplication = new AppliedApplication();
            $confirmed          = $request->confirmed;
            if ($confirmed != null) {

                // Upload the file
                if ($request->order_file) {
                    $order_image     = $request->order_file;
                    $order_file_name = 'ORDER' . substr(sha1($order_image . uniqid('', true)), 20, 5) . date('my') . $order_image->getClientOriginalName();
                    $order_image->storeAs('public/images/exporters/applications/' . $application_no . '/' . 'appealed/', $order_file_name);
                    $status = $appliedApplication->where('id', $id)->update(['order_file_name' => $order_file_name]);
                }

                // Insert amount in application progress master
                $insert_app_prog_mst_data = [
                    'appl_id'          => $request->appl_id,
                    'total_expense'    => $request->rim_amount,
                    'incentive_amount' => $con_amount,
                    'remarks'          => $dept_sec_remarks,
                    'created_by'       => $user->id,
                    'updated_by'       => $user->id,
                    'created_at'       => Carbon::now(),
                ];
                ApplicationProgressMaster::insert($insert_app_prog_mst_data);

                $status = $appliedApplication->where('id', $id)->update(['appealed_amount' => $con_amount, 'confirmed' => $confirmed]);

                if ($confirmed == 1) {
                    Applications::where('id', $request->appl_id)->update(['appeal_facility' => 3, 'status' => 8]);
                } else {
                    Applications::where('id', $request->appl_id)->update(['appeal_facility' => 4]);
                }
            } else {
                $status = $appliedApplication->where('id', $id)->update(['confirmed' => 0]);
            }

            if ($status) {
                $request->session()->flash('message', 'Status updated successfully.');
                return redirect()->route('dept-sectry.pending.applied.application');
            } else {
                $request->session()->flash('message', 'Failed to update status.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method pending_exporters_applied_application_for_dir_depm
     * @param Request $request [explicite description]
     * @return void
     */
    public function pending_exporters_applied_application_for_dir_depm(Request $request)
    {
        try {
            $data['page_title'] = 'Appealed Application List';
            $user               = Auth::user();
            $data['data']       = $user;

            $applications = Applications::where('appeal_facility', 3)->with([
                'get_exporter_details',
                'get_scheme_details',
                'get_event_details',
                'get_travel_details',
                'get_stall_details',
                'get_file_details',
                'get_address_details',
                'get_other_code_details',
                'get_bank_details',
                'get_application_status_details',
                'get_application_progress_master_details',
                'get_complaince_details',
                'get_applied_details',
            ])
                ->latest()
                ->get()
                ->map(function ($r) {
                    return [
                        // 'yy'             => $r->toArray(0),
                        'id'             => $r->id,
                        'appl_id'        => $r->id,
                        'app_code'       => $r->app_no ?? '',
                        'scheme'         => $r->get_scheme_details->short_name ?? '',
                        'claimed_amount' => $r->scheme_id == 1 ? (($r->get_travel_details->total_expense ?? 0) + ($r->get_stall_details->total_cost ?? 0)) : ($r->certi_cost ?? 0),
                        'status'         => $r->get_applied_details->confirmed ?? 0,
                    ];
                });
            // $applications = AppliedApplication::where('confirmed', 0)->with([
            //     'get_application_details' => function ($q) {
            //         $q->with([
            //             'get_exporter_details',
            //             'get_scheme_details',
            //             'get_event_details',
            //             'get_travel_details',
            //             'get_stall_details',
            //             'get_file_details',
            //             'get_address_details',
            //             'get_other_code_details',
            //             'get_bank_details',
            //             'get_application_status_details',
            //             'get_application_progress_master_details',
            //             'get_complaince_details',
            //             'get_applied_details',
            //         ]);
            //     },
            // ])
            //     ->latest()
            //     ->get()
            //     ->map(function ($r) {
            //         return [
            //             // 'yy'             => $r->toArray(0),
            //             'id'             => $r->id,
            //             'appl_id'        => $r->get_application_details->id,
            //             'app_code'       => $r->get_application_details->app_no ?? '',
            //             'scheme'         => $r->get_application_details->get_scheme_details->short_name ?? '',
            //             'claimed_amount' => $r->get_application_details->scheme_id == 1 ? (($r->get_application_details->get_travel_details->total_expense ?? 0) + ($r->get_application_details->get_stall_details->total_cost ?? 0)) : ($r->get_application_details->certi_cost ?? 0),
            //             'status'         => $r->get_application_details->get_applied_details->confirmed ?? 0,
            //         ];
            //     });
            $data['applications'] = $applications;
            // dd($data);
            return view('admin.director_depm.appealed-application-list')->with($data);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method pending_exporters_applied_application_for_dir_depm_details
     * @param Request $request [explicite description]
     * @return void
     */
    public function pending_exporters_applied_application_for_dir_depm_details(Request $request, $id = null)
    {
        // dd([$request->all(), $id]);
        $data['page_title'] = 'Pending exporters applied application details';
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
            'get_complaince_details' => function ($r) {
                $r->where('insert_status', 1);
            },
            'get_applied_details',
        ])->first(); //->toArray();
        $data['applications']      = $applications; //->toArray();
        $data['total_expenditure'] = (int) ($applications->get_travel_details->total_expense ?? 0) + ($applications->get_stall_details->total_cost ?? 0);
        $data['incentive_amount']  = (int) ($applications->get_travel_details->incentive_claimed ?? 0) + ($applications->get_stall_details->claimed_cost ?? 0);
        $data['pending']           = Applications::where('status', 1)->count();
        // dd(['Admin', $data]);
        return view('admin.director_depm.pending_schemes_application_details')->with($data);
    }

    /**
     * Method pending_exporters_applied_application_for_dir_depm_details_update
     * @param Request $reques [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function pending_exporters_applied_application_for_dir_depm_details_update(Request $request, $id = null)
    {
        // dd([$request->all(), $id]);
        try {

            $applications = new Applications();
            $confirmed    = $request->confirmed;
            if ($confirmed != null) {
                $status = $applications->where('id', $id)->update(['status' => $confirmed]);
            } else {
                $status = $applications->where('id', $id)->update(['status' => 0]);
            }

            if ($status) {
                $request->session()->flash('message', 'Status updated successfully.');
                return redirect()->route('dir-depm.pending.applied.application');
            } else {
                $request->session()->flash('message', 'Failed to update status.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

}
