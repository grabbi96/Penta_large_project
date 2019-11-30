@extends('layouts.app')

@section('content')


    @include('layouts.frontlayout.Header')
    <!--Main layout-->
    <main class="mt-5 pt-4">
        @php
        $contents = Cart::content();

        @endphp




        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable table</h3>
            <div class="card-body">
                <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                                                                                         aria-hidden="true"></i></a></span>
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <tr>
                            <th class="text-center">Image</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Point</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Action</th>
                        </tr>

                        @foreach($contents as $content)
                        <tr>
                            <td class="pt-3-half" contenteditable="true"><img src="{{url('/uploads/images/'.$content->options->image)}}" alt=""> </td>
                            <td class="pt-3-half" contenteditable="true">{{$content->name}}</td>
                            <td class="pt-3-half" contenteditable="true">{{$content->price}}</td>
                            <td class="pt-3-half" contenteditable="true">{{$content->options->point}}</td>
                            <td class="pt-3-half" contenteditable="true">{{$content->qty}}</td>
                            <td class="pt-3-half">
                                {{$content->total}}
                            </td>
                            <td>
                                <a class="table-remove"><a href="{{route('product.delete_cart', $content->rowId)}}" class="btn btn-danger btn-rounded btn-sm my-0">Remove</a></a>
                            </td>
                        </tr>
                            @endforeach


                    </table>

                    <p>Total : {{Cart::subtotal()}}</p>
                    <a class="table-remove"><a href="{{route('product.checkout')}}" class="btn btn-success btn-rounded my-0">Checkout</a></a>
                </div>
            </div>
        </div>
    </main>
    <!--Main layout-->








@endsection
