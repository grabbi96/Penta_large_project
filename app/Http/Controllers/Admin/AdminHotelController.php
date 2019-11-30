<?php

namespace App\Http\Controllers\Admin;

use App\Division;
use App\Hospital;
use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHotelController extends Controller
{
    public function index(){
        $data = [];
        $data['hotels'] = Hotel::all();
        $data['divisions'] = Division::all();

        return view('admin.services.hotel', $data);
    }

    public function hotel_create(Request $request){

        Hotel::create([
            'name' => $request->input('name'),
            'percentage' => $request->input('percentage'),
            'division' => $request->input('division'),
            'district' => $request->input('district'),
            'address_info' => $request->input('address_details'),

        ]);
        return response()->json(['message' => "created successfully"]);
    }
}
