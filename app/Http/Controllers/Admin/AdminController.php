<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Exporter;
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
        $data['exporters'] = Exporter::where('regsitration_status', 0)->with(['get_category_details', 'get_address_details', 'get_bank_details', 'get_other_code_details'])->get();
        // dd($data['exporters']->toArray());
        return view('admin.publicity_officer.pending_exporters')->with($data);
    }

}
