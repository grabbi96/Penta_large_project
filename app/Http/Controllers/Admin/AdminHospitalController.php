<?php

namespace App\Http\Controllers\Admin;

use App\Division;
use App\Hospital;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHospitalController extends Controller
{
    //

    public function index(){
        $data = [];
        $data['hospitals'] = Hospital::all();
        $data['divisions'] = Division::all();

        return view('admin.services.hotel', $data);
    }

    public function hospital_create(Request $request){

       Hospital::create([
            'name' => $request->input('name'),
            'percentage' => $request->input('percentage'),
            'division' => $request->input('division'),
            'district' => $request->input('district'),
            'address_info' => $request->input('address_details'),

       ]);
        return response()->json(['message' => "created successfully"]);
    }
}
