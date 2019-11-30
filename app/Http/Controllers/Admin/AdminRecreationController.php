<?php

namespace App\Http\Controllers\Admin;

use App\Division;
use App\Recreation;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminRecreationController extends Controller
{
    public function index(){
        $data = [];
        $data['recreations'] = Recreation::all();
        $data['divisions'] = Division::all();

        return view('admin.services.recreation', $data);
    }

    public function recreation_create(Request $request){

        Recreation::create([
            'name' => $request->input('name'),
            'percentage' => $request->input('percentage'),
            'division' => $request->input('division'),
            'district' => $request->input('district'),
            'address_info' => $request->input('address_details'),

        ]);
        return response()->json(['message' => "created successfully"]);
    }
}
