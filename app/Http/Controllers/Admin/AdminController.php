<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Auth;
use Carbon\Carbon;
use Exporter;
use ExporterRemark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Schemes;
use Applications;
use Spatie\Permission\Models\Role;
use User;
use ApplicationProgressMaster;

class AdminController extends Controller
{
    /**
     * Method index
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function index(Request $request)
    {
        $data['page_title'] = 'Admin Panel';
        $role_id            = Auth::user()->role_id;
        $data['role']       = Role::where('id', $role_id)->first()->name;
        $data['schemes']    = Schemes::get();
        $data['tot_application_count']    = Applications::get()->count();
        $scheme_application_counts[]=array();
        foreach ($data['schemes'] as $sheme){
            array_push($scheme_application_counts,Applications::where([['scheme_id',$sheme->id],['appeal_facility',0]])->get()->count().
            "/".Applications::where('scheme_id',$sheme->id)->get()->count());
        }
        $data['application_counts'] = array_filter($scheme_application_counts);
        return view('admin.home')->with($data);
    }

    /**
     * Method profile
     * Show the profile details
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function profile(Request $request)
    {
        $data['page_title'] = 'Admin Panel';
        $role_id            = Auth::user()->role_id;
        $data['role']       = Role::where('id', $role_id)->first()->name;
        return view('admin.profile')->with($data);
    }

    /**
     * Method pending_exporters
     * Show all the pending exporter lists
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function pending_exporters(Request $request)
    {
        $data['page_title'] = 'Pending exporters';
        $data['exporters']  = Exporter::whereIn('regsitration_status', [0, 1, 2])->with(['get_category_details', 'get_address_details', 'get_bank_details', 'get_other_code_details'])->latest()->get();
        // saasasa
        return view('admin.publicity_officer.pending_exporters')->with($data);
    }

    public function update_pending_exporters_status(Request $request)
    {
        try {
            $status = Exporter::where('id', $request->exporter_id);

            if ($status->update(['regsitration_status' => $request->approval_status])) {
                $exporterRemarks = ExporterRemark::where('exporter_id', $request->exporter_id);

                if ($exporterRemarks->first() !== null) {
                    $exporterRemarks->update(['type' => 1, 'exporter_id' => $request->exporter_id, 'remarks' => $request->remarks, 'updated_by' => Auth::user()->id]);
                } else {
                    $exporterRemarks->insert(['type' => 1, 'exporter_id' => $request->exporter_id, 'remarks' => $request->remarks, 'created_at' => Carbon::now(), 'created_by' => Auth::user()->id]);
                }

                $data = [
                    'id'        => $request->exporter_id,
                    'mail_type' => 2,
                ];

                $to      = ['alok.das@oasystspl.com', 'anuswya.pradhan@oasystspl.com']; //'jitesh.jena@oasystspl.com'; //'alok.das@oasystspl.com'; // $request->email;
                $subject = 'Exporters registration approval mail.';
                Mail::to($to)->send(new SendMail($data));

                $data['data']    = [];
                $data['status']  = 'success';
                $data['message'] = 'Status Updated successfully.';
                // return response($data, 200);
                return redirect()->route('admin.publicity.officer.pending.exporters');
            } else {
                $data['data']    = [];
                $data['status']  = "danger";
                $data['message'] = 'Failed to update';
                // return response($data, 200);
                return redirect()->route('exporter.details')->with($data);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_exporters  $tbl_exporters
     * @return \Illuminate\Http\Response
     */
    public function showExporter(Request $request, $id = null)
    {
        try {
            $exporters          = Exporter::where('id', $id)->with(['get_role_details', 'get_category_details', 'get_address_details.get_district_details', 'get_bank_details', 'get_other_code_details', 'get_remarks_details'])->first();
            $data['data']       = $exporters;
            $data['message']    = 'Exporters data loaded successfully.';
            $data['page_title'] = 'Pending exporter details';

            // dd($exporters->toArray(0));
            // return response($data, 200);
            return view('admin.publicity_officer.pending_exporters_details')->with($data);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

}
