<?php

namespace App\Http\Controllers;

use ApplicationEvents;
use ApplicationFiles;
use Applications;
use ApplicationStalls;
use ApplicationTravels;
use App\Repositories\CustomRepository;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

            if ($request->scheme_id != 1) {
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
                        'terms'                => 'required',
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
                        'terms.required'                => 'Please, fill the terms',
                        'file_iec.required'             => 'Please, fill the file_iec',
                        'file_iec.max'                  => 'File must be less then 4MB',
                        'file_bank_cheque.required'     => 'Please, fill the file_bank_cheque',
                        'file_payment_reciept.required' => 'Please, fill the file_payment_reciept',
                    ],
                );
            } else {
                $validator = Validator::make($request->all(),
                    [
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
                        // 'travel_destination_type'     => 'required',
                        // 'traveller_name'              => 'required',
                        // 'traveller_designation'       => 'required',
                        // 'mode_of_travel'              => 'required',
                        // 'class_of_tarvel'             => 'required',
                        // 'total_travel_expense'        => 'required',
                        // 'travel_incentive'            => 'required',
                        // 'stall_event_name'            => 'required',
                        // 'total_stall_reg_cost'        => 'required',
                        // 'stall_incentive'             => 'required',
                        'meeting_detail'         => 'required',
                        'participation_det'      => 'required',
                        'terms'                  => '',
                        'file_iec'               => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        'file_bank_cheque'       => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        // 'file_visa_invitation_letter' => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        // 'file_ticket'                 => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        // 'file_boarding_pass'          => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        // 'file_stall_allot_letter'     => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        // 'file_stall_pay_recpt'        => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
                        'file_tour_dairy'        => 'required|file|max:4096|mimes:jpeg,jpg,png,pdf',
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
                        'file_ticket'                 => 'Please, fill the file_ticket',
                        'file_boarding_pass'          => 'Please, fill the file_boarding_pass',
                        'file_stall_allot_letter'     => 'Please, fill the file_stall_allot_letter',
                        'file_stall_pay_recpt'        => 'Please, fill the file_stall_pay_recpt',
                        'file_tour_dairy'             => 'Please, fill the file_tour_dairy',
                    ]
                );
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
                    $payment_reciept_image->storeAs('public/images/exporters/applications/' . $application_no['applicaton_no'], $payment_reciept_file_name);

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
                    return redirect()->back()->with($data);
                } else {
                    $data['data']    = [];
                    $data['message'] = 'Applictaion submission failed.';
                    return redirect()->back()->with($data);
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
                // 'all'         => $r->toArray(),
                'id'          => $r->id ?? '',
                'app_no'      => $r->app_no ?? '',
                'scheme'      => $r->get_scheme_details->short_name ?? '',
                'name'        => $r->get_exporter_details->name ?? '',
                'contact_no'  => $r->get_exporter_details->phone ?? '',
                'claimed_amt' => $r->app_no,

            ];
        });
        // dd($data['applications']);
        return view('admin.publicity_officer.pending_schemes_application')->with($data);
    }

    public function pending_exporters_application_details(Request $request, $id = null)
    {
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
        // dd($data['applications']->toArray());
        return view('admin.publicity_officer.pending_schemes_application_details')->with($data);
    }

    public function exporters_application_status_details(Request $request, $id = null)
    {
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
        // dd($data['applications']->toArray());
        return view('application_status_details')->with($data);
    }
    
    /**
     * Method exporters_application_status_details_update
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @return void
     */
    public function exporters_application_status_details_update(Request $request, $id = null)
    {
        dd([$request->all(), $id]);
    }

}
