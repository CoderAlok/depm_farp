<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
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
use Session;

class TblExportersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('m here');
        // try {
        //     $exporters       = Exporter::where('id', $id)->with(['get_category_details', 'get_address_details', 'get_bank_details', 'get_other_code_details'])->first();
        //     $data['data']    = $exporters;
        //     $data['message'] = 'Exporters data loaded successfully jjuk.';
        //     // return response($data, 200);
        //     return view('admin.publicity_officer.pending_exporters_details')->with($data);
        // } catch (\Exception $e) {
        //     $data['data']    = [];
        //     $data['message'] = $e->getMessage();
        //     return response($data, 500);
        // }
    }

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
        // dd($request->all());

        // $request->validate([
        //     "type"             => "required",
        //     "category"         => "required",
        //     "exporter_name"    => "required",
        //     "ceo_name"         => "required",
        //     "mobile"           => "required",
        //     "email"            => "required",

        //     "address_at"       => "required",
        //     "address_post"     => "required",
        //     "address_city"     => "required",
        //     "address_district" => "required",
        //     "address_pin"      => "required",

        //     "bank_name"        => "required",
        //     "bank_ac_no"       => "required",
        //     "bank_ifsc_code"   => "required",

        //     "export_iec"       => "required",
        //     "export_rcmc_no"   => "required",
        //     "export_epc"       => "required",
        //     "export_urn"       => "required",
        //     "export_hsm"       => "required",
        // ], [
        //     "type.required"             => "Please, enter the type",
        //     "category.required"         => "Please, enter the category",
        //     "exporter_name.required"    => "Please, enter the exporter_name",
        //     "ceo_name.required"         => "Please, enter the ceo_name",
        //     "mobile.required"           => "Please, enter the mobile",
        //     "email.required"            => "Please, enter the email",
        //     "address_at.required"       => "Please, enter the address_at",
        //     "address_post.required"     => "Please, enter the address_post",
        //     "address_city.required"     => "Please, enter the address_city",
        //     "address_district.required" => "Please, enter the address_district",
        //     "address_pin.required"      => "Please, enter the address_pin",
        //     "bank_name.required"        => "Please, enter the bank_name",
        //     "bank_ac_no.required"       => "Please, enter the bank_ac_no",
        //     "bank_ifsc_code.required"   => "Please, enter the bank_ifsc_code",
        //     "export_iec.required"       => "Please, enter the export_iec",
        //     "export_rcmc_no.required"   => "Please, enter the export_epc",
        //     "export_epc.required"       => "Please, enter the export_epc",
        //     "export_urn.required"       => "Please, enter the export_urn",
        //     "export_hsm.required"       => "Please, enter the export_hsm",
        // ]);

        $validator = Validator::make($request->all(), [
            "type.required"             => "Please, enter the type",
            "category.required"         => "Please, enter the category",
            "exporter_name.required"    => "Please, enter the exporter_name",
            "ceo_name.required"         => "Please, enter the ceo_name",
            "mobile.required"           => "Please, enter the mobile",
            "email.required"            => "Please, enter the email",
            "address_at.required"       => "Please, enter the address_at",
            "address_post.required"     => "Please, enter the address_post",
            "address_city.required"     => "Please, enter the address_city",
            "address_district.required" => "Please, enter the address_district",
            "address_pin.required"      => "Please, enter the address_pin",
            "bank_name.required"        => "Please, enter the bank_name",
            "bank_ac_no.required"       => "Please, enter the bank_ac_no",
            "bank_ifsc_code.required"   => "Please, enter the bank_ifsc_code",
            "export_iec.required"       => "Please, enter the export_iec",
            "export_rcmc_no.required"   => "Please, enter the export_epc",
            "export_epc.required"       => "Please, enter the export_epc",
            "export_urn.required"       => "Please, enter the export_urn",
            "export_hsm.required"       => "Please, enter the export_hsm",
        ]);

        if ($validator->passes()) {
            try {
                $username = explode(' ', $request->exporter_name);
                $username = strtolower(trim($username[0])) . rand(111111, 999999);
                $data     = [
                    'role_id'             => $request->type,
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
                        'rcmc'        => $request->export_rcmc_no,
                        'epc'         => $request->export_epc,
                        'urn'         => $request->export_urn,
                        'hsm'         => $request->export_hsm,
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

                        $to      = 'alok.das@oasystspl.com';
                        $subject = 'Exporters application registered.';
                        // Send mail
                        Mail::to($to)->send(new SendMail($data));

                        Session::flash('message', 'Exporter registered successfully. Please, wait for our authority to approve your application. You will be notified through mail.');
                        return redirect()->route('welcome');
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
            $data['data']    = [];
            $data['message'] = $validator->errors();
            return response($data, 403);

            // return redirect()->route('welcome')->with($data);
        }

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
            $exporters       = Exporter::where('id', $id)->with(['get_role_details', 'get_category_details', 'get_address_details.get_district_details', 'get_bank_details', 'get_other_code_details', 'get_remarks_details'])->first();
            $data['data']    = $exporters;
            $data['message'] = 'Exporters data loaded successfully jjuk.';
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

                    if ($exporterData->regsitration_status === 0) {
                        Session::flash('message', 'Sorry, you are not eligible yet to login. Let the scrutiny process finish.');
                        return redirect()->route('welcome'); //->with('message', 'Your are scrutiny is still under process.');
                    } else {
                        if (Auth::guard('exporter')->attempt(['email' => $request->email, 'password' => $request->password])) {
                            session()->put('exporter', $exporterData);
                            $data['page_title'] = 'Exporter | Home';

                            return redirect()->route('exporter.home');
                        } else {
                            Session::flash('message', 'Invalid credentials. Enter valid email id & password.');
                            return redirect()->route('welcome');
                        }
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
    public function annexure1(Request $request)
    {
        $data['page_title'] = 'Annexure 1';
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

    public function annexure2(Request $request)
    {
        $data['page_title'] = 'Annexure 2';
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

    public function exporter_reset_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_pass' => 'required|string',
            'new_pass' => 'required|string',
            'con_pass' => 'required|string',
        ]);

        if ($validator->passes()) {
            $user     = Auth::guard('exporter')->user();
            $exporter = Exporter::where('id', $user->id)->first();

            if (Hash::check($request->old_pass, $exporter->password)) {

                $reset = $exporter->where('id', $user->id)->update(['password' => Hash::make($request->new_pass), 'track_status' => 1]);
                if ($reset) {
                    $data['data']    = $exporter;
                    $data['status']  = 'success';
                    $data['message'] = 'Password changed successfully.';
                    // return response($data, 200);
                    // $request->session()->put('sess_data', $data);
                    Session::flash('message', 'Your password has been changed successfully.');
                    // return redirect()->route('welcome')->with($data);
                    return redirect()->route('exporter.home')->with($data);
                } else {
                    $data['data']    = $exporter;
                    $data['status']  = 'danger';
                    $data['message'] = 'Password didn\'t changed.';
                    // return response($data, 500);
                    $request->session()->put('sess_data', $data);
                    return back();
                    // return redirect()->route('exporter.reset.password')->with($data);
                }

            } else {
                $data['data']    = [];
                $data['status']  = 'danger';
                $data['message'] = 'Password didn\'t matched.';
                // return response($data, 500);
                $request->session()->put('sess_data', $data);
                // return redirect()->route('exporter.reset')->with($data);
                return back();
            }
        } else {
            $data['data']    = [];
            $data['message'] = $validator->errors();
            return response($data, 406);
        }
    }

    public function checkMobile(Request $request)
    {
        try {
            $data['data']    = Exporter::where('phone', $request->mobile)->whereIn('regsitration_status', [0, 1])->get()->isNotEmpty() ? 1 : 0;
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
            $data['data']    = Exporter::where('email', $request->email)->whereIn('regsitration_status', [0, 1])->get()->isNotEmpty() ? 1 : 0;
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

    public function otp_view(Request $request)
    {dd('asas');
        $data['page_title'] = 'Exporter|Send OTP';
        return view('send-otp')->with($data);
    }

    public function send_otp(Request $request)
    {
        try {
            $otp_status = Otp::insert(['email' => $request->email, 'otp' => rand(111111, 999999), 'created_at' => Carbon::now()]);

            if ($otp_status) {
                $data = [
                    'mail_id'   => $request->email,
                    'mail_type' => 4,
                ];

                $to      = $request->email;
                $subject = 'Exporters OTP verification.';
                Mail::to($to)->send(new SendMail($data));

                return redirect()->route('exporter.view.verify.otp', $request->email)->with($data);
            } else {
                return back();
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    public function verify_otp_view(Request $request, $email = null)
    {
        $data['page_title'] = 'Exporter|Verify OTP';
        $data['email']      = $email;
        return view('verify-otp')->with($data);
    }

    public function verify_otp(Request $request)
    {
        try {
            $checkOtp = Otp::where('email', $request->email)->latest()->first()->otp;
            if (strcmp($checkOtp, $request->otp) == 0) {
                Session::flash('message', 'Otp verified please, change your password in password reset form.');
                return redirect()->route('welcome')->with($data);
            } else {
                Session::flash('message', 'Otp didn\'t matched. Please, enter the sent otp.');
                return back();
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

}
