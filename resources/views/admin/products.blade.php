@extends('layouts.admin_app')
@section('content')
<!--main-container-part-->
<div id="content">

    <div class="product-content-area myDivToPrint">




    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th >S.L
            </th>
            <th >Title
            </th>
            <th class="th-sm">Description
            </th>
            <th class="th-sm">Image
            </th>
            <th class="th-sm">Price
            </th>
            <th class="th-sm">Discount Price
            </th>
            <th class="th-sm">Point
            </th>

            <th class="th-sm">Quantity
            </th>
            <th class="th-sm">Details
            </th>
            <th class="th-sm">Edit
            </th>
            <th class="th-sm">Delete
            </th>
        </tr>
        </thead>
        <tbody>


    @php
    $count = 0;
    @endphp

    @foreach($products as $product)
        @php
            $count += 1;
        @endphp
        <tr>
            <td>{{$count}}</td>
            <td>{{$product->title}}</td>
            <td>Discription</td>
            <td><img src="{{url('uploads/images/'.$product->thumbnail_path)}}" alt="adsfasdf"></td>
            <td>{{$product->price}}</td>
            <td>{{$product->discount_price}}</td>
            <td>{{$product->point}}</td>
            <td>{{$product->quantity}}</td>


            <td>
                <form action="{{route('admin.show', $product->id)}}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-info btn-sm">Details</button>
                </form>

            </td>
            <td>
                <form action="{{route('admin.edit', $product->id)}}" method="get">
                    @csrf

                    <button type="submit" class="btn btn-elegant btn-sm">Edit</button>
                </form>

            </td>
            <td>
                <form action="{{route('admin.delete', $product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                </form>

        </tr>
    @endforeach
        </tbody>

    </table>


    </div>

    <div>
        <a href="" class="btn btn-success" id="print">Print</a>
    </div>
</div>
    


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
<!--end-main-container-part-->
@endsection
