@extends('layouts.app')

@section('content')


    @include('layouts.frontlayout.Header')
    <!--Main layout-->
    <main class="mt-5 pt-4">



        <section class="section-padding">
            <div class="container">

                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable table</h3>
                    <div class="card-body">
                        <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                                                                                         aria-hidden="true"></i></a></span>
                            <p>Name: {{$user->name}}</p>
                            <p>Mobile: {{ $user->mobile_number }}</p>
{{--                            <p>Shop Point: {{ Auth::user()->shop_point }}</p>--}}
                            <p>Shop Point:  @php
                                    $contents = Cart::content();
                                    $total_point = 0;
                                    foreach ($contents as $content){
                                        $total_point += $content->options->point * $content->qty;
                                    }

                                echo $total_point;
                                @endphp
                            </p>
                            <p>Total price:  @php
                                    $contents = Cart::content();
                                    $total_price = 0;
                                    foreach ($contents as $content){
                                        $total_price += $content->options->price * $content->qty;
                                    }

                                echo $total_price;
                                @endphp
                            </p>
                            <p>discount Price: {{Cart::subtotal()}}</p>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif




                            <form action="{{route('product.order')}}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="md-form md-outline">
                                            <input type="text" id="form2" class="form-control" name="customer_name">
                                            <label for="form2">Customer Name</label>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="md-form md-outline">
                                            <input type="text" id="form3" class="form-control" name="customer_phone_number">
                                            <label for="form3">Customer Phone Number</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="md-form md-outline">
                                            <input type="text" id="form4" class="form-control" name="address">
                                            <label for="form4">Address</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="md-form md-outline">
                                            <input type="text" id="form5" class="form-control" name="city">
                                            <label for="form5">City</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="md-form md-outline">
                                            <input type="text" id="form2" class="form-control" name="postal_code">
                                            <label for="form2">Postal Code</label>
                                        </div>
                                    </div>
                                </div>
                                    <button type="submit" class="btn-success btn">Done</button>

                            </form>






                            {{--                    <table class="table table-bordered table-responsive-md table-striped text-center">--}}
                            {{--                        <tr>--}}
                            {{--                            <th class="text-center">Image</th>--}}
                            {{--                            <th class="text-center">Title</th>--}}
                            {{--                            <th class="text-center">Price</th>--}}
                            {{--                            <th class="text-center">Point</th>--}}
                            {{--                            <th class="text-center">Quantity</th>--}}
                            {{--                            <th class="text-center">Total</th>--}}
                            {{--                            <th class="text-center">Action</th>--}}
                            {{--                        </tr>--}}

                            {{--                        @foreach($contents as $content)--}}
                            {{--                            <tr>--}}
                            {{--                                <td class="pt-3-half" contenteditable="true"><img src="{{url('/uploads/images/'.$content->options->image)}}" alt=""> </td>--}}
                            {{--                                <td class="pt-3-half" contenteditable="true">{{$content->name}}</td>--}}
                            {{--                                <td class="pt-3-half" contenteditable="true">{{$content->price}}</td>--}}
                            {{--                                <td class="pt-3-half" contenteditable="true">{{$content->options->point}}</td>--}}
                            {{--                                <td class="pt-3-half" contenteditable="true">{{$content->qty}}</td>--}}
                            {{--                                <td class="pt-3-half">--}}
                            {{--                                    {{$content->total}}--}}
                            {{--                                </td>--}}
                            {{--                                <td>--}}
                            {{--                                    <a class="table-remove"><a href="{{route('product.delete_cart', $content->rowId)}}" class="btn btn-danger btn-rounded btn-sm my-0">Remove</a></a>--}}
                            {{--                                </td>--}}
                            {{--                            </tr>--}}
                            {{--                        @endforeach--}}


                            {{--                    </table>--}}

                            {{--                    <p>Total : {{Cart::subtotal()}}</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!--Main layout-->








@endsection
