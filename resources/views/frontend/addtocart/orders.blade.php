@extends('layouts.app')

@section('content')


    @include('layouts.frontlayout.Header')
    <!--Main layout-->
    <main class="mt-5 pt-4">



        <section class="section-padding">
            <div class="container">

                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Orders</h3>
                    <div class="card-body">
                        <div id="table" class="table-editable">
<table class="table table-bordered">

    <thead>
    <tr>
        <th >Order Id
        </th>
        <th >Customer Name
        </th>
        <th class="th-sm">Customer Phone Number
        </th>
        <th class="th-sm">Total Amount
        </th>
        <th class="th-sm">discount amount
        </th>
        <th class="th-sm">Total Point
        </th>
        <th class="th-sm">Payment Status
        </th>
        <th class="th-sm">Action
        </th>

    </tr>
    </thead>
    <tbody>

    @foreach($orders as $order)

        <tr>
            <td>
                {{$order->id}}
            </td>
            <td>
                {{$order->customer_name}}
            </td>

            <td>
                {{$order->customer_phone_number}}
            </td>
            <td>
                {{$order->total_amount}}
            </td>
            <td>
                {{$order->discount_amount}}
            </td>
            <td>
                {{$order->total_point}}
            </td>
            <td>
                {{$order->payment_status}}
            </td>
            <td>
                <a class="btn btn-success text-white btn-sm" href="{{route('product.order_details', $order->id)}}">Details</a>
            </td>
        </tr>

    @endforeach



    </tbody>
</table>
                        </div>
                        </div>
                </div>
            </div>
        </section>


    </main>
    <!--Main layout-->








@endsection
