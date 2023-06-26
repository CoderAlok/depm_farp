<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
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
            $insert_data = [
                'name'       => $request->role_name,
                'guard_name' => 'web',
            ];
            $roles           = Role::insert($insert_data);
            $data['data']    = $roles;
            $data['message'] = 'Roles added successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method users
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function users(Request $request)
    {
        $data['page_title'] = 'Admin Panel | Users';
        $data['users']      = User::where('type', 2)->get();
        return view('admin.super_admin.users')->with($data);
    }

    /**
     * Method users
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function add_users(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
        ], [
            'role_name.required' => 'Please enter the role name',
        ]);

        try {
            $insert_data = [
                'name'       => $request->name,
                'guard_name' => 'web',
            ];
            $users           = User::insert($insert_data);
            $data['data']    = $users;
            $data['message'] = '';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

}
