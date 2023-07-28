<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use User;
use Validator;

class AuthController extends Controller
{

    /**
     * Method register
     * @param Request $request [explicite description]
     * @return void
     */
    public function register(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'username'   => '',
            'phone'      => 'required',
            'password'   => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response($response, 400);
        }

        $input             = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user              = User::create($input);

        $success['token']      = $user->createToken('MyApp')->plainTextToken;
        $success['first_name'] = $user->first_name;
        $success['last_name']  = $user->last_name;

        $response = [
            'success' => true,
            'data'    => $success,
            'message' => 'User register successfully.',
        ];
        return response($response, 200);

    }

    /**
     * Method login
     * @param Request $request [explicite description]
     * @return void
     */
    public function login(Request $request)
    {
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user             = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name']  = $user->name;

            $response = [
                'success' => true,
                'data'    => $success,
                'message' => 'Login successful.',
            ];
            return response($response, 200);
        } else {
            $response = [
                'success' => false,
                'data'    => [],
                'message' => 'Sorry, wrong credentials',
            ];
            return response($response, 500);
        }
    }
}
