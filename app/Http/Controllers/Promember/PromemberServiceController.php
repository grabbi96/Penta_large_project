<?php

namespace App\Http\Controllers\Promember;

use App\Hospital;
use App\Hotel;
use App\Recreation;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromemberServiceController extends Controller
{
    //

    public function index(){

        $data = [];
        $data['hospitals'] = Hospital::all();
        $data['hotels'] = Hotel::all();
        $data['recreations'] = Recreation::all();
        $data['restaurants'] = Restaurant::all();
        return view('promember.services', $data);
    }
}
