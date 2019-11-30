<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use http\Env\Request;
use App\Models\Prouser;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

//    use AuthenticatesUsers;
//
//    /**
//     * Where to redirect users after login.
//     *
//     * @var string
//     */
//    protected $redirectTo = '/';
//
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }


    public function showLogin(){
        return  view('auth.login');
    }

    public function login(Request $request){
        $pid = $request->input('pid');
        $password = $request->input('password');
        $user = User::where('pid', $pid)->first();

        if(empty($user->pid)){
            return redirect()->back()->withErrors('crediential dose not match');
        }

        if($password !== $user->password){
            return redirect()->back()->withErrors('crediential dose not match');
        }
        $request->session()->put('user', $user->pid);

        return redirect('/');
    }

    public function logout(){
        session()->forget('user');
        return redirect('/');
    }
}
