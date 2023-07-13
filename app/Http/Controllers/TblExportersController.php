<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Repositories\CustomRepository;
use Auth;
use Carbon\Carbon;
use Category;
use District;
use Exporter;
use ExportersAddress;
use ExportersBankDetails;
use ExportersOtherCodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Otp;
use Schemes;
use Session;

class TblExportersController extends Controller
{
    private $app;

    public function __construct(CustomRepository $app)
    {
        $this->app = $app;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'MSME|registration form';
        $data['categories'] = Category::get();
        $data['districts']  = District::get()->pluck('name', 'id');
        return view('exporters_register')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                "type"             => "required|integer",
                "category"         => "required|integer",
                "exporter_name"    => "required|string",
                "ceo_name"         => "required|string",
                "mobile"           => "required",
                "email"            => "required|email|unique:tbl_exporters",
                "address_at"       => "required|string",
                "address_post"     => "required|string",
                "address_city"     => "required|string",
                "address_district" => "required|numeric",
                "address_pin"      => "required|numeric",
                "bank_name"        => "required|string",
                "bank_ac_no"       => "required|numeric",
                "bank_ifsc_code"   => "required|string",
                "bank_cheque"      => "required|file|max:4096|mimes:jpeg,jpg,png,pdf",
                "export_iec"       => "required|string",
                "export_rcmc_no"   => "",
                "export_epc"       => "",
                "export_urn"       => "required|string",
                "export_hsm"       => "",
            ]
            , [
                "type.required"             => "Please, enter the type",
                "category.required"         => "Please, enter the category",
                "exporter_name.required"    => "Please, enter the exporter_name",
                "ceo_name.required"         => "Please, enter the ceo_name",
                "mobile.required"           => "Please, enter the mobile",
                "mobile.digit"              => "Please, enter the mobile upto 10 digits",
                "email.required"            => "Please, enter the email",
                "address_at.required"       => "Please, enter the address_at",
                "address_post.required"     => "Please, enter the address_post",
                "address_city.required"     => "Please, enter the address_city",
                "address_district.required" => "Please, enter the address_district",
                "address_pin.required"      => "Please, enter the address_pin",
                "bank_name.required"        => "Please, enter the bank_name",
                "bank_ac_no.required"       => "Please, enter the bank_ac_no",
                "bank_ifsc_code.required"   => "Please, enter the bank_ifsc_code",
                "bank_cheque.required"      => "Please, enter a bank cheque image",
                "export_iec.required"       => "Please, enter the export_iec",
                "export_rcmc_no"            => "",
                "export_epc"                => "",
                "export_urn.required"       => "Please, enter the export_urn",
                "export_hsm"                => "",
            ]
        );

        if ($validator->passes()) {
            try {

                $username = explode(' ', $request->exporter_name);
                $username = strtolower(trim($username[0])) . rand(111111, 999999);

                // generated app_no start
                $application_no = $this->app->generateExpApp();

                $data = [
                    'app_no'              => $application_no['applicaton_no'],
                    'app_count_no'        => $application_no['app_count_no'],
                    'type'                => $request->type,
                    'role_id'             => 6,
                    'category_id'         => $request->category,
                    'name'                => $request->exporter_name,
                    'chief_ex_name'       => $request->ceo_name,
                    'email'               => $request->email,
                    'username'            => $username,
                    'password'            => Hash::make('12345678'),
                    'phone'               => $request->mobile,
                    'regsitration_status' => 0,
                    'created_at'          => Carbon::now(),
                    // 'gender'              => $request->gender,
                ];
                // dd($data);

                $exporter_id = Exporter::insertGetId($data);
                // dd($exporter_id);
                if ($exporter_id) {
                    $address_data = [
                        'exporter_id' => $exporter_id,
                        'address'     => $request->address_at,
                        'post'        => $request->address_post,
                        'city'        => $request->address_city,
                        'district'    => $request->address_district,
                        'pincode'     => $request->address_pin,
                        'status'      => 0,
                        'created_by'  => $exporter_id,
                        'created_at'  => Carbon::now(),
                    ];
                    $address_id = ExportersAddress::insert($address_data);
                    // dd($address_id);

                    // Only insert when its a manufacturer
                    if ($request->type == 1) {
                        $address_data2 = [
                            'exporter_id' => $exporter_id,
                            'address'     => $request->address_at2,
                            'post'        => $request->address_post2,
                            'city'        => $request->address_city2,
                            'district'    => $request->address_district2,
                            'pincode'     => $request->address_pin2,
                            'status'      => 0,
                            'created_by'  => $exporter_id,
                            'created_at'  => Carbon::now(),
                        ];
                        $address_id = ExportersAddress::insert($address_data2);
                    }

                    // File uploading
                    $image            = $request->bank_cheque;
                    $cheque_file_name = $image->getClientOriginalName();
                    $image->storeAs('public/images/exporters', $cheque_file_name);

                    $bank_data = [
                        'exporter_id' => $exporter_id,
                        'name'        => $request->bank_name,
                        'account_no'  => $request->bank_ac_no,
                        'ifsc'        => $request->bank_ifsc_code,
                        'cheque_img'  => $cheque_file_name,
                        'created_by'  => $exporter_id,
                        'created_at'  => Carbon::now(),
                    ];
                    $bank_id = ExportersBankDetails::insert($bank_data);
                    // dd($bank_id);

                    $code_data = [
                        'exporter_id' => $exporter_id,
                        'iec'         => $request->export_iec,
                        'rcmc'        => $request->export_rcmc_no ?? '',
                        'epc'         => $request->export_epc ?? '',
                        'urn'         => $request->export_urn,
                        'hsm'         => $request->export_hsm ?? '',
                        'created_by'  => $exporter_id,
                        'created_at'  => Carbon::now(),
                    ];
                    $other_code_id = ExportersOtherCodes::insert($code_data);
                    // dd($other_code_id);

                    $update_data = [
                        'address_id'    => $address_id,
                        'bank_id'       => $bank_id,
                        'other_code_id' => $other_code_id,
                        'created_by'    => $exporter_id,
                    ];
                    $update_exporter = Exporter::where('id', $exporter_id)->update($update_data);
                    // dd($update_exporter);

                    if ($update_exporter) {
                        $data = [
                            'id'        => $exporter_id,
                            'mail_type' => 1,
                        ];

                        $to      = ['alok.das@oasystspl.com', 'anuswya.pradhan@oasystspl.com']; //'jitesh.jena@oasystspl.com'; //'alok.das@oasystspl.com'; // $request->email;
                        $subject = 'Exporters application registered.';
                        // Send mail
                        Mail::to($to)->send(new SendMail($data));

                        // $msg = 'Exporter registered successfully with Ref.No: ' . $application_no['applicaton_no'] . '.Please, check your email for your credentials to log into your account.'
                        Session::flash('message', json_encode(['email' => $request->email, 'appl_id' => $application_no['applicaton_no']]));
                        return view('registration_success');

                        // return redirect()->route('welcome');
                    } else {
                        return redirect()->route('exporter.register');
                    }
                } else {
                    return redirect()->route('exporter.register');
                }

            } catch (\Exception $e) {
                $data['data']    = [];
                $data['message'] = $e->getMessage();
                return response($data, 500);
            }
        } else {
            return redirect()->back()->withErrors($validator)->withInput();

            // $data['data']    = [];
            // $data['message'] = $validator->errors();
            // return response($data, 403);

            // return redirect()->route('welcome')->with($data);
        }

    }

    public function test(Request $request)
    {
        return view('registration_success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_exporters  $tbl_exporters
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id = null)
    {
        try {
            $exporters          = Exporter::where('id', $id)->with(['get_role_details', 'get_category_details', 'get_address_details.get_district_details', 'get_bank_details', 'get_other_code_details', 'get_remarks_details'])->first();
            $data['data']       = $exporters;
            $data['message']    = 'Exporters data loaded successfully.';
            $data['page_title'] = '';

            // return response($data, 200);
            return view('admin.publicity_officer.pending_exporters_details')->with($data);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_exporters  $tbl_exporters
     * @return \Illuminate\Http\Response
     */
    public function edit(Exporter $tbl_exporters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_exporters  $tbl_exporters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exporter $tbl_exporters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_exporters  $tbl_exporters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exporter $tbl_exporters)
    {
        try {
            $data['data']    = [];
            $data['message'] = '';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method checkUserName
     * Checks the unique username for the exporters
     * @return void
     */
    public function checkUserName(Request $request)
    {
        try {
            $data['data']    = [];
            $data['message'] = '';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method login
     * Exporters login will be made here
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'type.required'     => 'Please enter the role_id',
                'email.required'    => 'Please enter the email',
                'password.required' => 'Please enter the password',
            ]);

            if ($validator->passes()) {
                $check_data = [
                    'role_id'  => $request->type,
                    'email'    => $request->email,
                    'password' => $request->password,
                ];

                $exporterData = Exporter::where('email', $request->email);
                if ($exporterData->exists()) {
                    $exporterData = $exporterData->first();

                    if (Auth::guard('exporter')->attempt(['email' => $request->email, 'password' => $request->password])) {
                        session()->put('exporter', $exporterData);
                        $data['page_title'] = 'Exporter | Home';

                        // if ($exporterData->track_status == 1) {
                        return redirect()->route('exporter.home');
                        // } else {
                        //     return redirect()->route('exporter.reset.password.view');
                        // }

                    } else {
                        Session::flash('message', 'Invalid credentials. Enter valid email id & password.');
                        return redirect()->route('welcome');
                    }

                    // if (in_array($exporterData->regsitration_status, [0, 2])) {
                    //     $reg_status_message = ($exporterData->regsitration_status == 0 ? 'Sorry, you are not eligible yet to login. Let the scrutiny process finish.' : 'Sorry, your application has already been rejected you have been notified in your mail.');
                    //     Session::flash('message', $reg_status_message);
                    //     return redirect()->route('welcome'); //->with('message', 'Your are scrutiny is still under process.');
                    // } else {
                    //     if (Auth::guard('exporter')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    //         session()->put('exporter', $exporterData);
                    //         $data['page_title'] = 'Exporter | Home';

                    //         if ($exporterData->track_status == 1) {
                    //             return redirect()->route('exporter.home');
                    //         } else {
                    //             return redirect()->route('exporter.reset.password.view');
                    //         }

                    //     } else {
                    //         Session::flash('message', 'Invalid credentials. Enter valid email id & password.');
                    //         return redirect()->route('welcome');
                    //     }
                    // }

                } else {
                    Session::flash('message', 'Sorry, exporter doesn\'t exists.');
                    return redirect()->route('welcome');
                }
            } else {
                $data['data']    = [];
                $data['message'] = $validator->errors();
                // return response($data, 403);

                return redirect()->route('welcome')->with($data);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method annexure1
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function application_list(Request $request)
    {
        $data['page_title'] = 'Application List';
        $data['data']       = Auth::guard('exporter')->user();
        $data['schemes']    = Schemes::get();
        return view('application-list')->with($data);
    }

    /**
     * Method annexure1
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function annexure1(Request $request, $id = null)
    {
        $data['scheme']     = Schemes::where('id', $id)->first();
        $data['page_title'] = $data['scheme']->short_name; //'Annexure 1';
        $exporter           = Auth::guard('exporter')->user();
        $data['data']       = Exporter::where('id', $exporter->id)
            ->with([
                'get_category_details:id,name',
                'get_address_details:exporter_id,address,post,city,district,pincode',
                'get_bank_details:exporter_id,name,account_no,ifsc,cheque_img',
                'get_other_code_details:exporter_id,iec,rcmc,epc,urn,hsm',
            ])
            ->first();
        // dd($data);
        return view('annexure1')->with($data);
    }

    public function annexure1_submit(Request $request)
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

                // $data['data']    = [];
                // $data['message'] = $validator->errors();
                // return response($data, 406);
            } else {
                dd($validator->validated());
            }

        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return redirect()->route('exporter.application.list')->with($data);
        }
    }

    public function annexure2(Request $request, $id = null)
    {
        $data['id']         = $id;
        $data['certi_type'] = [
            '', '',
            'Registration cum Membership Certificate',
            'Organic Certificate',
            'Quality Certification for Manufacturing Process',
            'Country Specific Quality Certification',
            'Testing Certification',
            ['Improvement of Quality', 'Upgradation of Technology'],
        ];

        $data['scheme']     = Schemes::where('id', $id)->first();
        $data['page_title'] = $data['page_title'] = $data['scheme']->short_name; //'Annexure 2';
        $exporter           = Auth::guard('exporter')->user();
        $data['data']       = Exporter::where('id', $exporter->id)
            ->with([
                'get_category_details:id,name',
                'get_address_details:exporter_id,address,post,city,district,pincode',
                'get_bank_details:exporter_id,name,account_no,ifsc,cheque_img',
                'get_other_code_details:exporter_id,iec,rcmc,epc,urn,hsm',
            ])
            ->first();
        return view('annexure2')->with($data);
    }

    public function annexure2_submit(Request $request)
    {
        try {
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

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();

                // $data['data']    = [];
                // $data['message'] = $validator->errors();
                // return response($data, 406);
            } else {
                dd($validator->validated());
            }

        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return redirect()->route('exporter.application.list')->with($data);
        }
    }

    public function exporter_reset_password_view(Request $request)
    {
        $data['page_title'] = 'Exporter|Reset Password';
        $data['data']       = Auth::guard('exporter')->user();
        return view('reset_password')->with($data);
    }

    public function exporter_reset_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_pass' => 'required|string',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->passes()) {
            $user     = Auth::guard('exporter')->user();
            $exporter = Exporter::where('id', $user->id)->first();

            if (Hash::check($request->old_pass, $exporter->password)) {

                $reset = $exporter->where('id', $user->id)->update(['password' => Hash::make($request->password), 'track_status' => 1]);
                if ($reset) {

                    $data['data']    = $exporter;
                    $data['status']  = 'success';
                    $data['message'] = 'Password changed successfully.';

                    Session::flash('message', 'Your password has been changed successfully.');
                    return redirect()->route('exporter.home')->with($data);
                } else {
                    $data['data']    = $exporter;
                    $data['status']  = 'danger';
                    $data['message'] = 'Password didn\'t changed.';

                    $request->session()->put('sess_data', $data);
                    return back();
                }

            } else {
                $data['data']    = [];
                $data['status']  = 'danger';
                $data['message'] = 'Password didn\'t matched.';
                // return response($data, 500);
                $request->session()->put('sess_data', $data);
                return back()->with($data);
            }
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
            // $data['data']    = [];
            // $data['message'] = $validator->errors();
            // return response($data, 406);
        }
    }

    public function checkMobile(Request $request)
    {
        try {
            $data['data'] = Exporter::where('phone', $request->mobile)
            // ->whereIn('regsitration_status', [0, 1])
                ->get()->isNotEmpty() ? 1 : 0;
            $data['message'] = $data['data'] ? 'Mobile number already exists' : 'N/A';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    public function checkEmail(Request $request)
    {
        try {
            $data['data'] = Exporter::where('email', $request->email)
            // ->whereIn('regsitration_status', [0, 1])
                ->get()->isNotEmpty() ? 1 : 0;
            $data['message'] = $data['data'] ? 'Email already exists' : 'N/A';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    public function profile(Request $request)
    {
        $data['page_title'] = 'Exporter profile';
        $exporter           = Auth::guard('exporter')->user();
        $data['data']       = Exporter::where('id', $exporter->id)
            ->with([
                'get_role_details:id,name',
                'get_category_details:id,name',
                'get_address_details:exporter_id,address,post,city,district,pincode',
                'get_bank_details:exporter_id,name,account_no,ifsc,cheque_img',
                'get_other_code_details:exporter_id,iec,rcmc,epc,urn,hsm',
                'get_remarks_details:exporter_id,type,remarks',
            ])
            ->first();
        return view('profile')->with($data);
    }

    // public function otp_view(Request $request)
    // {
    //     $data['page_title'] = 'Exporter|Send OTP';
    //     return view('send-otp')->with($data);
    // }

    // public function send_otp(Request $request)
    // {
    //     $email = $this->app->decrypt(session()->get('data')['email']);
    //     try {
    //         $data = [
    //             'mail_id'   => $email,
    //             'mail_type' => 4,
    //         ];

    //         $to      = $email;
    //         $subject = 'Exporters OTP verification.';
    //         Mail::to($to)->send(new SendMail($data));

    //         return response()->json(['status' => 1]);
    //     } catch (\Exception $e) {
    //         $data['data']    = [];
    //         $data['message'] = $e->getMessage();
    //         return response($data, 500);
    //     }
    // }

    // public function verify_otp_view(Request $request, $email = null)
    // {
    //     $data['page_title'] = 'Exporter|Verify OTP';
    //     $data['email']      = $email;
    //     return view('verify-otp')->with($data);
    // }

    // public function verify_otp(Request $request)
    // {
    //     if (empty($request->email) || empty($request->password)) {
    //         return redirect()->route('welcome');
    //     } else {
    //         $email    = $this->app->decrypt($request->email);
    //         $password = $this->app->decrypt($request->password);

    //         try {
    //             $checkOtp = Otp::where('email', $email)->latest()->first()->otp;
    //             if (strcmp($checkOtp, $request->otp) == 0) {
    //                 $checkStatus = Exporter::where('email', $email)->update(['is_email_verified' => 1]);

    //                 if ($checkStatus) {
    //                     $request->session()->flush();
    //                     if (Auth::guard('exporter')->attempt(['email' => $email, 'password' => $password])) {
    //                         return redirect()->route('exporter.reset.password.view');
    //                     } else {
    //                         Session::flash('message', 'Invalid username and password.');
    //                         return redirect()->route('welcome');
    //                     }
    //                 } else {
    //                     Session::flash('message', 'Track status was not updated.');
    //                     return redirect()->route('welcome');
    //                 }
    //             } else {
    //                 Session::flash('message', 'Otp didn\'t matched. Please, enter the sent otp.');
    //                 return back();
    //             }
    //         } catch (\Exception $e) {
    //             $data['data']    = [];
    //             $data['message'] = $e->getMessage();
    //             return response($data, 500);
    //         }
    //     }

    // }

    public function send_exporter_otp($email)
    {
        try {
            $otp_status = Otp::insert(['email' => $email, 'otp' => rand(111111, 999999), 'created_at' => Carbon::now()]);

            if ($otp_status) {
                $data = [
                    'mail_id'   => $email,
                    'mail_type' => 4,
                ];

                $to      = $email;
                $subject = 'Exporters OTP verification.';
                Mail::to($to)->send(new SendMail($data));

                return redirect()->route('exporter.view.verify.otp', $email)->with($data);
            } else {
                return back();
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

}
