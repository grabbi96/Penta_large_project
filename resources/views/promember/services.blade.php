@extends('layouts.pro_app')

@section('content')


    @include('layouts.frontlayout.Pro_Header')



    <div class="container section-padding">

        <h2>Services</h2>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Hospitals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Hotels</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Recreations</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-restaurant" role="tab" aria-controls="pills-contact" aria-selected="false">Restaurants</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">division</th>
                        <th scope="col">district</th>
                        <th scope="col">Address Details </th>
                        <th scope="col">percentage</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($hospitals as $hs)

                        <tr>
                            <td>{{$hs->name}}</td>
                            <td>{{$hs->division}}</td>
                            <td>{{$hs->district}}</td>
                            <td>{{$hs->address_info}}</td>
                            <td>{{$hs->percentage}}</td>
                        </tr>


                    @endforeach

                    </tbody>
                </table>



            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">division</th>
                        <th scope="col">district</th>
                        <th scope="col">Address Details </th>
                        <th scope="col">percentage</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($hotels as $hs)

                        <tr>
                            <td>{{$hs->name}}</td>
                            <td>{{$hs->division}}</td>
                            <td>{{$hs->district}}</td>
                            <td>{{$hs->address_info}}</td>
                            <td>{{$hs->percentage}}</td>
                        </tr>


                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">division</th>
                        <th scope="col">district</th>
                        <th scope="col">Address Details </th>
                        <th scope="col">percentage</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($recreations as $hs)

                        <tr>
                            <td>{{$hs->name}}</td>
                            <td>{{$hs->division}}</td>
                            <td>{{$hs->district}}</td>
                            <td>{{$hs->address_info}}</td>
                            <td>{{$hs->percentage}}</td>
                        </tr>


                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-restaurant" role="tabpanel" aria-labelledby="pills-contact-tab">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">division</th>
                        <th scope="col">district</th>
                        <th scope="col">Address Details </th>
                        <th scope="col">percentage</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($restaurants as $hs)

                        <tr>
                            <td>{{$hs->name}}</td>
                            <td>{{$hs->division}}</td>
                            <td>{{$hs->district}}</td>
                            <td>{{$hs->address_info}}</td>
                            <td>{{$hs->percentage}}</td>
                        </tr>


                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
