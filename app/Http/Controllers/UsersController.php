<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    /**
     * Method users
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function users(Request $request)
    {
        $data['page_title'] = 'Admin Panel | Users';
        $data['users']      = User::where('type', 2)->with('get_role_details:id,name')->get();
        $data['roles']      = Role::where('id', '!=', 1)->get()->pluck('name', 'id');
        // dd($data);
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
            'role_id'    => 'required',
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
            'username'   => 'required',
            'password'   => 'required',
            'phone'      => 'required',
        ], [
            'role_id.required'    => 'Please enter the role_id',
            'first_name.required' => 'Please enter the first_name',
            'last_name.required'  => 'Please enter the last_name',
            'email.required'      => 'Please enter the email',
            'username.required'   => 'Please enter the username',
            'password.required'   => 'Please enter the password',
            'phone.required'      => 'Please enter the phone',
        ]);

        try {
            $insert_data = [
                'role_id'    => $request->role_id,
                'type'       => 2,
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'username'   => strtolower($request->first_name . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT)),
                'password'   => Hash::make($request->password),
                'phone'      => $request->phone,
            ];
            $user = User::insert($insert_data);

            $data['data']    = $user;
            $data['message'] = 'User created successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method show_user
     * Shows all the user details for edit
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     * @author AlokDas
     * @return void
     */
    public function show_user(Request $request)
    {
        try {
            $data['data']    = User::where('id', $request->id)->first();
            $data['message'] = 'User loaded successfully.';
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
    public function edit_users(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'edit_role_id'    => 'required',
            'edit_first_name' => 'required',
            'edit_last_name'  => 'required',
            'edit_email'      => 'required',
            'edit_username'   => 'required',
            // 'edit_password'   => 'required',
            'edit_phone'      => 'required',
        ], [
            'edit_role_id.required'    => 'Please enter the role_id',
            'edit_first_name.required' => 'Please enter the first_name',
            'edit_last_name.required'  => 'Please enter the last_name',
            'edit_email.required'      => 'Please enter the email',
            'edit_username.required'   => 'Please enter the username',
            // 'edit_password.required'   => 'Please enter the password',
            'edit_phone.required'      => 'Please enter the phone',
        ]);

        try {
            $update_data = [
                'role_id'    => $request->edit_role_id,
                'type'       => 2,
                'first_name' => $request->edit_first_name,
                'last_name'  => $request->edit_last_name,
                'email'      => $request->edit_email,
                'username'   => strtolower($request->edit_first_name . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT)),
                // 'password'   => Hash::make($request->edit_password),
                'phone'      => $request->edit_phone,
            ];
            $user = User::where('id', $request->edit_user_id)->update($update_data);

            $data['data']    = $user;
            $data['message'] = 'User updated successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }
}
