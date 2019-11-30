<?php

namespace App\Http\Controllers\Admin;

use App\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminWithdrawController extends Controller
{
    //

    public function index(){

        $data = [];
        $data["withdraws"] = Withdraw::all();
        return view('admin.admin_withdraws', $data);
    }
}
