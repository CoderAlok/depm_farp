<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Exporter;
use ExporterRemark;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use User;

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
     * Method role
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function roles(Request $request)
    {
        $data['page_title'] = 'Admin Panel | Roles';
        $data['roles']      = Role::get();
        return view('admin.super_admin.roles')->with($data);
    }

    /**
     * Method role
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function add_roles(Request $request)
    {

        $request->validate([
            'role_name' => 'required',
        ], [
            'role_name.required' => 'Please enter the role name',
        ]);

        try {
            $role = Role::where('name', $request->role_name);
            if ($role->exists()) {
                $data['data']    = [];
                $data['message'] = 'Role already exists.';
                // return response($data, 200);
                return redirect()->route('admin.roles')->with($data);
            } else {
                $insert_data = [
                    'name'       => $request->role_name,
                    'guard_name' => 'web',
                ];
                $roles           = Role::insert($insert_data);
                $data['data']    = $roles;
                $data['message'] = 'Roles added successfully.';
                // return response($data, 200);
                return redirect()->route('admin.roles')->with($data);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            // return response($data, 500);
            return redirect()->route('admin.roles')->with($data);
        }
    }

    /**
     * Method roles_check
     * Checks an existing roles
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function roles_check(Request $request)
    {
        try {
            $role = Role::where('name', $request->role_name);
            if ($role->exists()) {
                $data['data']    = [];
                $data['message'] = 'Role already exists.';
                return response($data, 200);
            } else {
                $data['data']    = [];
                $data['message'] = '';
                return response($data, 200);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    public function pending_exporters(Request $request)
    {
        $data['exporters'] = Exporter::whereIn('regsitration_status', [0, 1, 2])->with(['get_category_details', 'get_address_details', 'get_bank_details', 'get_other_code_details'])->get();
        // dd($data['exporters']->toArray());
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

                $to      = 'alok.das@oasystspl.com';
                $subject = 'Exporters registration approval mail.';
                // Send mail
                Mail::to($to)->send(new SendMail($data));

                $data['data']    = [];
                $data['message'] = 'Status Updated successfully.';
                // return response($data, 200);
                return redirect()->route('admin.publicity.officer.pending.exporters');
            } else {
                $data['data']    = [];
                $data['message'] = 'Failed to update';
                // return response($data, 200);
                return redirect()->route('exporter.details');
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

}
