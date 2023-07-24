<?php

namespace App\Http\Controllers;

use Applications;
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

    // public function test(Request $request)
    // {
    //     return view('registration_success');
    // }

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
        $user               = Auth::guard('exporter')->user();
        $data['data']       = $user;
        $data['schemes']    = Schemes::get();

        $applications = Applications::where('exporter_id', $user->id)->with([
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
        ])->latest()->get();
        $data['applications'] = $applications;
        // dd($data);
        return view('application-list')->with($data);
    }

    /**
     * Method annexure1
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function rejected_application_list(Request $request)
    {
        $data['page_title'] = 'Application List';
        $user               = Auth::guard('exporter')->user();
        $data['data']       = $user;
        $data['schemes']    = Schemes::get();

        $applications = Applications::where('exporter_id', $user->id)->whereIn('status', [3, 5, 7, 9])->with([
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
        ])->latest()->get();
        $data['applications'] = $applications;
        // dd($data);
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
