<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Product;
//use Gloudemans\Shoppingcart\Cart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
class CartController extends Controller
{
    //


    public function add_to_cart(Request $request){
        $qty = $request->input('qty');
        $product_id = $request->input('product_id');

        $product = Product::find($product_id);


        $data = [];
        $data['qty'] = $qty;
        $data['id'] = $product->id;
        $data['name'] = $product->title;
        $data['price'] = $product->discount_price;
        $data['options']['image'] = $product->thumbnail_path;
        $data['options']['point'] = $product->point;
        $data['options']['price'] = $product->price;

        Cart::add($data);


        return Redirect::to('/show_cart');
    }


    public function show() {
        $data = [];
        $data['user'] =  User::where('pid', session()->get('user'))->first();
        return view('frontend.addtocart.add_to_cart', $data);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId, 0);
        return Redirect::to('/show_cart');
    }



}
