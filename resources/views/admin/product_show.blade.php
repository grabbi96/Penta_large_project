@extends('layouts.admin_app')
@section('content')
    <!--main-container-part-->
    <div id="content">




        <div class="single-product-content-area">

            <img src="{{url('uploads/images/'.$product->thumbnail_path)}}" alt="adsfasdf">

            <h1 class="mt-2"> <strong>Title:  </strong>{{$product->title}}</h1>
            <h5><strong>Price:  </strong> {{$product->price}}</h5>
            <h5><strong>Discount Price:  </strong> {{$product->discount_price}}</h5>
            <h5><strong>Point:  </strong> {{$product->point}}</h5>
            <h5><strong>Quantity:  </strong> {{$product->quantity}}</h5>

            <form action="{{route('admin.quantity', $product->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Add Quantity" name="quantity">
                </div>

                <button class="btn btn-secondary">Add</button>
            </form>
            <a href="{{route('admin.products')}}" class="btn btn-success">Back</a>
        </div>
    </div>

    <!--end-main-container-part-->
@endsection
