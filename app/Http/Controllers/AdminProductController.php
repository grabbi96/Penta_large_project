<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        echo session()->get('adminuser');
//        return;
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        //
        $data =[];
        $data['products'] = Product::all();
        return view('admin.products', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }

        return view('admin.product_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'point' => 'required',
            'photo' => 'required|image',
        ]);

        $photo = $request->file('photo');
        $file_name = uniqid('photo_', true).str_random(10).'.'.$photo->getClientOriginalExtension();
        if ($photo->isValid()){
            $photo->storeAs('images', $file_name);
        }
        $price = intval($request->input('price'));
        $discount_price = intval($request->input('discount_price'));
        $point = intval($request->input('point'));

        $main = $price - $discount_price;
        $per = $price / 100;

        $discount_percentage = $main / $per;



        Product::create([
            'title' => trim($request->input('title')),
            'price' => trim($price),
            'discount_price' => $discount_price,
            'point' => trim($point),
            'thumbnail_path' => $file_name,
            'quantity' => trim($request->input('quantity')),
            'discount_percentage'  => $discount_percentage,
        ]);

        session()->flash('type', 'success');

        session()->flash('message', 'Product created successful');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $data = [];
        $data['product'] = Product::find($id);
        return view('admin.product_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $data = [];
        $data['product'] = Product::find($id);
        return view('admin.product_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'point' => 'required'
        ]);




        $product = Product::find($id);
        if($request->hasFile('photo')){
            unlink(public_path().'/uploads/images/'. $product->thumbnail_path);
            $photo = $request->file('photo');
            $file_name = uniqid('photo_', true).str_random(10).'.'.$photo->getClientOriginalExtension();
            if ($photo->isValid()){
                $photo->storeAs('images', $file_name);
            }
            $product->update([
                'thumbnail_path' => $file_name,
            ]);
        }
        $product->update([
            'title' => trim($request->input('title')),
            'price' => trim($request->input('price')),
            'discount_price' => trim($request->input('discount_price')),
            'point' => trim($request->input('point')),
        ]);

        return redirect(route('admin.products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $product = Product::find($id);

        if (public_path().'/uploads/images/'. $product->thumbnail_path){
            unlink(public_path().'/uploads/images/'. $product->thumbnail_path);
        }

        $product->delete();

        session()->flash('type', 'success');

        session()->flash('message', 'Delete successful');
        return redirect()->route('admin.products');
    }

    public function quantity_update(Request $request,$id){
        $product = Product::find($id);

        $product->quantity =  $product->quantity + $request->input('quantity');

        $product->save();
        echo $id;
        return redirect()->back();
    }
    protected function loginCheck(){
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
    }


}
