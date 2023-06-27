<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        dd($request->all());
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

    // /**
    //  * Method users
    //  * @param Request $request [explicite description]
    //  * @author AlokDas
    //  * @return void
    //  */
    // public function users(Request $request)
    // {
    //     $data['page_title'] = 'Admin Panel | Users';
    //     $data['users']      = User::where('type', 2)->get();
    //     $data['roles']      = Role::where('id', '!=', 1)->get()->pluck('name', 'id');
    //     return view('admin.super_admin.users')->with($data);
    // }

    // /**
    //  * Method users
    //  * @param Request $request [explicite description]
    //  * @author AlokDas
    //  * @return void
    //  */
    // public function add_users(Request $request)
    // {
    //     $request->validate([
    //         'role_id'    => 'required',
    //         'first_name' => 'required',
    //         'last_name'  => 'required',
    //         'email'      => 'required',
    //         'username'   => 'required',
    //         'password'   => 'required',
    //         'phone'      => 'required',
    //     ], [
    //         'role_id.required'    => 'Please enter the role_id',
    //         'first_name.required' => 'Please enter the first_name',
    //         'last_name.required'  => 'Please enter the last_name',
    //         'email.required'      => 'Please enter the email',
    //         'username.required'   => 'Please enter the username',
    //         'password.required'   => 'Please enter the password',
    //         'phone.required'      => 'Please enter the phone',
    //     ]);

    //     try {
    //         $insert_data = [
    //             'role_id'    => $request->role_id,
    //             'type'       => 2,
    //             'first_name' => $request->first_name,
    //             'last_name'  => $request->last_name,
    //             'email'      => $request->email,
    //             'username'   => strtolower($request->first_name . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT)),
    //             'password'   => Hash::make($request->password),
    //             'phone'      => $request->phone,
    //         ];
    //         $user = User::insert($insert_data);

    //         $data['data']    = $user;
    //         $data['message'] = 'User created successfully.';
    //         return response($data, 200);
    //     } catch (\Exception $e) {
    //         $data['data']    = [];
    //         $data['message'] = $e->getMessage();
    //         return response($data, 500);
    //     }
    // }

}
