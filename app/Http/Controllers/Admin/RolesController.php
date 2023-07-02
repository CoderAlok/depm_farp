<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Roles';
        $data['roles']      = Role::whereNotIn('id', [1])->get();
        return view('admin.super_admin.roles.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Please enter the name',
        ]);

        try {
            $insert_data = [
                'name'       => $request->name,
                'guard_name' => 'web',
            ];
            $user = Role::insert($insert_data);

            $data['data']    = $user;
            $data['message'] = 'Role created successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data['data']    = Role::where('id', $id)->first();
            $data['message'] = 'Role loaded successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->validate([
            'edit_id'   => 'required',
            'edit_name' => 'required',
        ], [
            'edit_id.required'   => 'Please enter the id',
            'edit_name.required' => 'Please enter the name',
        ]);

        try {
            $update_data = [
                'name' => $request->edit_name,
            ];
            $user = Role::where('id', $request->edit_id)->update($update_data);

            $data['data']    = $user;
            $data['message'] = 'Role updated successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
