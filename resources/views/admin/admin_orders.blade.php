@extends('layouts.admin_app')
@section('content')
    <!--main-container-part-->
    <div id="content">

        <div class="product-content-area">


            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                            <a class="btn btn-success text-white btn-sm" href="{{route('admin.order_details', $order->id)}}">Details</a>
                        </td>
                    </tr>

                    @endforeach



                </tbody>

            </table>
        </div>
    </div>

    <!--end-main-container-part-->
@endsection
