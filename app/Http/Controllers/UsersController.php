<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /**
     * Method index
     * This will redirect to login page
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    // public function index(Request $request)
    // {
    //     return view('');
    // }
    /**
     * Method userLogin
     * Login part will be done here
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    // public function userLogin(Request $request)
    // {
    //     $request->validate([
    //         'username'    => 'required',
    //         'password' => 'required',
    //     ], [
    //         'username.required'    => 'Please enter the username',
    //         'password.required' => 'Please enter the password',
    //     ]);

    //     try {
    //         $user = User::where('username', $request->username);//->where('type', $request->type);
    //         if ($user->exists()) {
    //             $user = $user->first();
    //             // dd($user);
    //             if (Hash::check($request->password, $user->password)) {
    //                 // set data in both Auth and session
    //                 Auth::login($user);
    //                 session()->put('user', $user);

    //                 if ($request->type == 1) {
    //                     $data['page_title'] = 'Exporter | Home';
    //                     return redirect()->route('home')->with($data);
    //                 } else {
    //                     $data['page_title'] = 'Admin | Home';
    //                     return redirect()->route('admin.home');
    //                 }
    //             } else {
    //                 return redirect()->route('welcome');
    //             }
    //         } else {
    //             return redirect()->route('welcome');
    //         }
    //     } catch (\Exception $e) {
    //         $data['data']    = [];
    //         $data['message'] = $e->getMessage();
    //         return response($data, 500);
    //     }
    // }
}
