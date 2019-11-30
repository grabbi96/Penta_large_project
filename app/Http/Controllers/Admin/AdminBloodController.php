<?php

namespace App\Http\Controllers\Admin;

use App\Prouser_details;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBloodController extends Controller
{
    //


    public function index(){
        $blood_user = Prouser_details::whereIn('blood_group', ['B+', 'A+', 'A-', 'B-', 'O+', 'O-', 'AB+', 'AB-'])->get();

        $data = [];

        $data['blood_users'] = $blood_user;


        return view('admin.blood.blood', $data);
    }
}
