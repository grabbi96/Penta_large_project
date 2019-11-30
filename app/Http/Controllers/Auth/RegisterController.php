<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
//use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
//    /*
//    |--------------------------------------------------------------------------
//    | Register Controller
//    |--------------------------------------------------------------------------
//    |
//    | This controller handles the registration of new users as well as their
//    | validation and creation. By default this controller uses a trait to
//    | provide this functionality without requiring any additional code.
//    |
//    */
//
//    use RegistersUsers;
//
//    /**
//     * Where to redirect users after registration.
//     *
//     * @var string
//     */
//    protected $redirectTo = '/home';
//
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }
    public function showRegister(){
        return view('auth.register');
    }
    public function register(Request $request){
        $this->validation($request);
        $this->create($request);
        return redirect(route('login'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validation($request)
    {
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'mobile_number' => ['required', 'max:255'],
//            'password' => ['required', 'string', 'min:6', 'confirmed'],
//        ]);numeric|phone_number|size:11

        return $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', new PhoneNumber],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);



    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create($data)
    {
//        $randnum = 223344222;
        $user = User::latest('id')->first();
         $user->pid + 1;
        return User::create([
            'name' => $data['name'],
            'mobile_number' => $data['mobile_number'],
            'pid' =>  $user->pid + 1,
            'email' => $data['email'],
            'shop_point' => 0,
            'password' => $data['password'],
        ]);
    }
}
