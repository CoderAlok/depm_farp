<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Method login
     * Overridded the default login method
     * @param Request $request [explicite description]
     * @auther AlokDas
     * @return void
     */
    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Please enter the username',
            'password.required' => 'Please enter the password',
        ]);

        try {
            $user = User::where('username', $request->username); //->where('type', $request->type);
            if ($user->exists()) {
                $user = $user->first();
                // dd($user);
                if (Hash::check($request->password, $user->password)) {
                    // set data in both Auth and session
                    Auth::login($user);
                    session()->put('user', $user);

                    if ($request->type == 1) {
                        $data['page_title'] = 'Exporter | Home';
                        return redirect()->route('home')->with($data);
                    } else {
                        $data['page_title'] = 'Admin | Home';
                        return redirect()->route('admin.home');
                    }
                } else {
                    return redirect()->route('welcome');
                }
            } else {
                return redirect()->route('welcome');
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }
}
