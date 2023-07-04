<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Schemes;

class SchemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Schemes';
        $data['schemes']    = Schemes::get();
        return view('admin.super_admin.schemes.index')->with($data);
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
            'route_name' => 'required',
            'short_name' => 'required',
            'long_name'  => 'required',
            'logo'       => 'required',
            'amount'     => 'required',
            'status'     => 'required',
        ], [
            'route_name.required' => 'Please enter the route name',
            'short_name.required' => 'Please enter the short name',
            'long_name.required'  => 'Please enter the long name',
            'logo.required'       => 'Please enter the logo',
            'amount.required'     => 'Please enter the amount',
            'status.required'     => 'Please enter the status',
        ]);

        try {
            $insert_data = [
                'route_name' => $request->route_name,
                'short_name' => $request->short_name,
                'long_name'  => $request->long_name,
                'logo'       => $request->logo,
                'amount'     => $request->amount,
                'status'     => $request->status,
            ];
            $user = Schemes::insert($insert_data);

            $data['data']    = $user;
            $data['message'] = 'Scheme created successfully.';
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
            $data['data']    = Schemes::where('id', $id)->first();
            $data['message'] = 'Scheme loaded successfully.';
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
            'edit_id'         => 'required',
            'edit_short_name' => 'required',
            'edit_route_name' => 'required',
            'edit_long_name'  => 'required',
            'edit_logo'       => 'required',
            'edit_amount'     => 'required',
            'edit_status'     => 'required',
        ], [
            'edit_id.required'         => 'Please enter the id',
            'edit_route_name.required' => 'Please enter the short_name',
            'edit_short_name.required' => 'Please enter the short_name',
            'edit_long_name.required'  => 'Please enter the long_name',
            'edit_logo.required'       => 'Please enter the logo',
            'edit_amount.required'     => 'Please enter the amount',
            'edit_status.required'     => 'Please enter the edit_status',
        ]);

        try {
            $update_data = [
                'route_name' => $request->edit_route_name,
                'short_name' => $request->edit_short_name,
                'long_name'  => $request->edit_long_name,
                'logo'       => $request->edit_logo,
                'amount'     => $request->edit_amount,
                'status'     => $request->edit_status,
            ];
            $user = Schemes::where('id', $request->edit_id)->update($update_data);

            $data['data']    = $user;
            $data['message'] = 'User updated successfully.';
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
