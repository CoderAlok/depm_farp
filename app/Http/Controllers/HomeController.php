<?php

namespace App\Http\Controllers;

use Auth;
use Exporter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $exporter     = Auth::guard('exporter')->user();
        $data['data'] = Exporter::where('id', $exporter->id)
            ->with([
                'get_category_details:id,name',
                'get_address_details:exporter_id,address,post,city,district,pincode',
                'get_bank_details:exporter_id,name,account_no,ifsc,cheque_img',
                'get_other_code_details:exporter_id,iec,rcmc,epc,urn,hsm',
            ])
            ->first();

        if ($exporter->track_status) {
            $data['page_title'] = 'Exporter Panel';
            return view('home')->with($data);
        } else {
            $data['page_title'] = 'Exporter|Reset Password';
            return view('reset_password')->with($data);
        }
    }

}
