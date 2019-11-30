<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class RootController extends Controller
{
    //



    public function root(){
        $data =[];
        $data['user'] =  User::where('pid', session()->get('user'))->first();
        $data['products'] = Product::all();
        return view('welcome', $data);
    }
    public function show($id){
        $data = [];
        $data['user'] =  User::where('pid', session()->get('user'))->first();
        $data['product'] = Product::find($id);
        return view('frontend.product.product', $data);
    }
}
