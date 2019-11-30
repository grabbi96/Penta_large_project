<?php

namespace App\Http\Controllers\Admin;

use App\Division;
use App\Hospital;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminRestaurantController extends Controller
{
    //

    public function index(){
        $data = [];
        $data['restaurants'] = Restaurant::all();
        $data['divisions'] = Division::all();

        return view('admin.services.restaurant', $data);
    }

    public function restaurant_create(Request $request){

        Restaurant::create([
            'name' => $request->input('name'),
            'percentage' => $request->input('percentage'),
            'division' => $request->input('division'),
            'district' => $request->input('district'),
            'address_info' => $request->input('address_details'),

        ]);
        return response()->json(['message' => "created successfully"]);
    }
}
