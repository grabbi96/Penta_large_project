@extends('layouts.admin_app')
@section('content')
    <!--main-container-part-->
    <div id="content" class="myDivToPrint">

        <div class="product-content-area">



            <h1></h1>
            <h2>Blood Information</h2>

            <div class="mb-4 mt-4">

            </div>


            @php

                @endphp
            <div class="mb-4">

            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Division</th>
                    <th scope="col">District</th>
                    <th scope="col">Upazila</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($blood_users as $bu)

                        <tr>
                            <td>{{$bu->name}}</td>
                            <td>{{$bu->mobile}}</td>
                            <td>{{$bu->blood_group}}</td>
                            <td>{{$bu->division}}</td>
                            <td>{{$bu->district}}</td>
                            <td>{{$bu->upazila}}</td>
                        </tr>


                        @endforeach

                </tbody>
            </table>

            <div>
            </div>
            <div class="btn-area">


            </div>
        </div>
    </div>

    <!--end-main-container-part-->
    <!-- JQuery -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@endsection

