@extends('layouts.admin_app')
@section('content')
    <!--main-container-part-->
    <div id="content" class="myDivToPrint">

        <div class="product-content-area">
            
            @if ($order->payment_status === "Paid")
                <h2 class="text-center">Paid</h2>
            @endif
            
            <h1></h1>
            <h2>Order details</h2>

            <div class="mb-4 mt-4">
                <h5>User Information</h5>

                <p>Name: {{$order->customer->name}}</p>
                <p>Number: {{$order->customer->mobile_number}}</p>
                <p>Email: {{$order->customer->email}}</p>
                <p>Pid: {{$order->customer->pid}}</p>
                <p>Shop Point: {{$order->customer->shop_point}}</p>
            </div>


            @php

            @endphp
            <div class="mb-4">
                <h5>Shipping Information</h5>
                <ul class="list-group">
                    <li class="list-group-item">Order Id: {{$order->id}} </li>
                    <li class="list-group-item">Customer Name: {{$order->customer_name}}</li>
                    <li class="list-group-item">Customer Phone Number: {{$order->customer_phone_number}}</li>
                    <li class="list-group-item">Address: {{$order->address}} </li>
                    <li class="list-group-item">City: {{$order->city}} </li>
                    <li class="list-group-item">Postal Code: {{$order->postal_code}} </li>
                </ul>
            </div>

            <h5>Products Information</h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Product Title</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount Price</th>
                    <th scope="col">Total Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                <tr>

                    <td>{{$product->product->title}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        {{$product->price}}
                    </td>
                    <td>
                        {{$product->discount_price}}
                    </td>
                    <td>
                        {{$product->discount_price * $product->quantity}}
                    </td>
                </tr>
                    @endforeach

                <tr>
                    <td colspan="2">Total Price {{$order->total_amount}}</td>
                    <td colspan="2">Discount Price {{$order->discount_amount}}</td>
                    <td colspan="2">Total Point {{$order->total_point}}</td>
                </tr>
                </tbody>
            </table>

            <div>
                <a href="" class="btn btn-success" id="print">Print</a>
            </div>
            <div class="btn-area">
                @if ($order->payment_status === "Padding")
                    <a href="{{route('admin.order_confirm', [$order->customer->id, $order->id])}}" class="btn-success btn">Confirm</a>
                @endif

            </div>
        </div>
    </div>

    <!--end-main-container-part-->
    <!-- JQuery -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        jQuery(document).ready(function () {
            $('#print').click(function (e)
            {
                e.preventDefault();
                // var content = document.getElementById("content").innerHTML;
                // var mywindow = window.open('', 'Print', 'height=600,width=800');
                //
                // mywindow.document.write('<html><head><title>Print</title> <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
                // mywindow.document.write('</head><body >');
                // mywindow.document.write(content);
                // mywindow.document.write('</body></html>');
                //
                // mywindow.document.close();
                // mywindow.focus()
                // mywindow.print();
                // mywindow.close();
                // return true;
                window.print()
            })
        })
    </script>

@endsection

