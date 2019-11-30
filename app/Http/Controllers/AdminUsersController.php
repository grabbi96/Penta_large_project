<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    //

    public function index(){
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $data =[];
        $data['users'] = User::all();
        return view('admin.users.admin_user', $data);
    }
}
