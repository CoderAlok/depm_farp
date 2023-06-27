<?php

namespace App\Http\Controllers;

use Auth;
use Exporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TblExportersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exporters_register');
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
            'role_id'  => 'required',
            'name'     => 'required',
            'email'    => 'required',
            'username' => 'required',
            'password' => 'required',
            'phone'    => 'required',
            'gender'   => 'required',
            'address'  => 'required',
        ], [
            'role_id.required'  => 'Please enter the role_id',
            'name.required'     => 'Please enter the name',
            'email.required'    => 'Please enter the email',
            'username.required' => 'Please enter the username',
            'password.required' => 'Please enter the password',
            'phone.required'    => 'Please enter the phone',
            'gender.required'   => 'Please enter the gender',
            'address.required'  => 'Please enter the address',
        ]);

        try {
            $insert_data = [
                'role_id'  => $request->role_id,
                'name'     => $request->name,
                'email'    => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'phone'    => $request->phone,
                'gender'   => $request->gender,
                'address'  => $request->address,
            ];

            $exporter = Exporter::insert($insert_data);
            if ($exporter) {
                return redirect()->route('welcome');
            } else {
                return redirect()->route('exporter.register');
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
    public function show(Exporter $tbl_exporters)
    {
        try {
            $data['data']    = [];
            $data['message'] = '';
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
     * @param  \App\Models\tbl_exporters  $tbl_exporters
     * @return \Illuminate\Http\Response
     */
    public function edit(Exporter $tbl_exporters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_exporters  $tbl_exporters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exporter $tbl_exporters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_exporters  $tbl_exporters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exporter $tbl_exporters)
    {
        try {
            $data['data']    = [];
            $data['message'] = '';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method checkUserName
     * Checks the unique username for the exporters
     * @return void
     */
    public function checkUserName(Request $request)
    {
        try {
            $data['data']    = [];
            $data['message'] = '';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    /**
     * Method login
     * Exporters login will be made here
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function login(Request $request)
    {
        // $credentials = ['email' => $request->email, 'password' => $request->password];
        // // $credentials = ['username' => $request->username, 'password' => $request->password];
        // dd(Auth::guard('exporter')->login($credentials));

        try {
            $validator = Validator::make($request->all(), [
                'type.required'     => 'Please enter the role_id',
                'email.required'    => 'Please enter the email',
                'password.required' => 'Please enter the password',
            ]);

            if ($validator->passes()) {
                $check_data = [
                    'role_id'  => $request->type,
                    'email'    => $request->email,
                    'password' => $request->password,
                ];

                $exporterData = Exporter::where('email', $request->email);
                if ($exporterData->exists()) {
                    $exporterData = $exporterData->first();
                    if (Hash::check($request->password, $exporterData->password)) {
                        // set data in both Auth and session
                        // Auth::login($exporterData);
                        session()->put('exporter', $exporterData);

                        $data['page_title'] = 'Exporter | Home';
                        return redirect()->route('exporter.home');
                    } else {
                        return redirect()->route('welcome');
                    }
                } else {
                    return redirect()->route('welcome');
                }
            } else {
                $data['data']    = [];
                $data['message'] = $validator->errors();
                // return response($data, 403);

                return redirect()->route('welcome')->with($data);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    public function applicationRegister(Request $request){
        return view('application');
    }
}
