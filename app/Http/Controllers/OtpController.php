<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Repositories\CustomRepository;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Otp;
use Session;
use Exporter;

class OtpController extends Controller
{
    private $app;

    public function __construct(CustomRepository $app)
    {
        $this->app = $app;
    }

    public function otp_view(Request $request)
    {
        $data['page_title'] = 'Exporter|Send OTP';
        return view('send-otp')->with($data);
    }

    public function send_otp(Request $request)
    {
        $email = $request->email;

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

                $request->session()->put('email', $email);

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

    public function verify_otp_view(Request $request, $email = null)
    {
        $data['page_title'] = 'Exporter|Verify OTP';
        $data['email']      = $email;
        return view('verify-otp')->with($data);
    }

    public function send_generated_otp(Request $request)
    {
        $email    = $request->session()->get('email');
        $password = Str::random(8);

        try {
            $checkOtp = Otp::where('email', $email)->latest()->first()->otp;
            if (strcmp($checkOtp, $request->otp) == 0) {
                $checkStatus = Exporter::where('email', $email)->update(['password' => Hash::make($password), 'is_email_verified' => 1]);

                if ($checkStatus) {
                    $data = [
                        'mail_id'   => $email,
                        'mail_type' => 5,
                        'password'  => $password,
                    ];

                    $to      = $email;
                    $subject = 'Exporters generated OTP for reset.';
                    Mail::to($to)->send(new SendMail($data));
                    $request->session()->flush();
                    return redirect()->route('welcome');
                } else {
                    Session::flash('message', 'Track status was not updated.');
                    return redirect()->route('welcome');
                }
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

}
