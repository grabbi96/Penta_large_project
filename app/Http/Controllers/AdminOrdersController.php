<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class adminOrdersController extends Controller
{
    //

    public  function index(){
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $data = [];
        $data['orders'] = Order::all();
        return view('admin.admin_orders', $data);
    }
    public  function showOrder($id){
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $data = [];
        $data['order'] = Order::findOrFail($id);
        return view('admin.admin_order_details', $data);
    }
    public function orderConfirm($pid, $order){
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
       $user = User::find($pid);
        $old_point = $user->shop_point;
        $orderid = Order::find($order);



//        product reduce
        foreach ($orderid->products as $op){

            $product = Product::find($op->product->id);
            $product->quantity = $product->quantity - $op->quantity;
            $product->save();
        }

        $order_point = $orderid->total_point;

        $user->update([
            'shop_point' => $user->shop_point + $order_point,
        ]);

        $orderid->update([
            'payment_status' => 'Paid'
        ]);
        return redirect()->back();
    }
}
