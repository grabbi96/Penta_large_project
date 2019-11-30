<?php

namespace App\Http\Controllers;
//
//use Gloudemans\Shoppingcart\Cart;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
class CheckoutController extends Controller
{
    //

    public function show(){
        if(empty(session()->get('user'))){
            return  redirect(route('login'));
        }
        $data = [];
        $data['user'] =  User::where('pid', session()->get('user'))->first();
        return view('frontend.addtocart.checkout', $data);
}

    public function order(Request $request){

        if(empty(session()->get('user'))){
            return  redirect(route('login'));
        }
        $request->validate([
            'customer_name' => 'required',
            'customer_phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);
        $total = Cart::total();

        $contents = Cart::content();


        $total_point = 0;
        foreach ($contents as $content){
            $total_point += $content->options->point * $content->qty;
        }

        $total_price = 0;
        foreach ($contents as $content){
            $total_price += $content->options->price * $content->qty;
        }

        $user =  User::where('pid', session()->get('user'))->first();
//        var_dump($total_price);
//        dd($total);
        $order = Order::create([
            'user_id' => $user->id,
            'customer_name' => $request->input('customer_name'),
            'customer_phone_number' => $request->input('customer_phone_number'),
            'address' => $request->input('address'),
            'city' =>  $request->input('city'),
            'postal_code' =>  $request->input('postal_code'),
            'discount_amount' => $total,
            'total_amount' => $total_price,
            'total_point' => $total_point,
        ]);
//
        $carts = Cart::content();

        foreach ($carts as $cart){

            $order->products()->create([
               'product_id' =>  $cart->id,
                'quantity' => $cart->qty,
                'discount_price' => $cart->price,
                'price' => $cart->options->price,
                'point' => $cart->options->point,
            ]);



        }
        Cart::destroy();

        return redirect('/');


//        $table->increments('id');
//        $table->unsignedInteger('order_id');
//        $table->unsignedInteger('product_id');
//        $table->integer('quantity');
//        $table->decimal('price', 10, 2);
//        $table->foreign('order_id')->refernces('id')->on('orders')->onDelete('cascade');
//        $table->foreign('product_id')->refernces('id')->on('orders')->onDelete('cascade');
    }
    public function order_list(){
        if(empty(session()->get('user'))){
            return  redirect(route('login'));
        }
        $user =  User::where('pid', session()->get('user'))->first();
        $data = [];
        $data['orders'] = Order::where('user_id', $user->id)->get();
        $data['user'] =  User::where('pid', session()->get('user'))->first();

        return view('frontend.addtocart.orders', $data);
    }

    public function order_details($id){
        if(empty(session()->get('user'))){
            return  redirect(route('login'));
        }
        $user =  User::where('pid', session()->get('user'))->first();
        $data = [];
        $data['order'] = Order::findOrFail($id);
        $data['user'] =  User::where('pid', session()->get('user'))->first();
        return view('frontend.addtocart.order_details', $data);
    }

}
