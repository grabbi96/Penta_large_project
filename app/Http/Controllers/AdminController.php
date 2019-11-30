<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Models\Prouser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //


    public function index(){
        return view('admin.admin_login');
    }

    public function login(Request $request){
        echo $request->input('email');

        $email = $request->input('email');
        $password = $request->input('password');
        $admin = Admin::where('email', $email)->first();

        if(empty($admin->email)){
            return redirect()->back()->withErrors('crediential dose not match');
        }


        $pp = Hash::check($password, $admin->password);
        if(!$pp){
            return redirect()->back()->withErrors('crediential dose not match');
        }

        $request->session()->put('adminuser', $admin->email);
        return redirect(route('admin.dashboard'));

    }
    public function dashboard(){
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        return view('pentaadmin.dashboard');
    }
    public function logout(){
        session()->forget('adminuser');
        return redirect(route('admin.show_login'));
    }
}
