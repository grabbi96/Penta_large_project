@extends('layouts.admin_app')
@section('content')
    <!--main-container-part-->
    <div id="content">

        <div class="product-content-area">




            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th >Id
                    </th>
                    <th >Name
                    </th>
                    <th class="th-sm">Email
                    </th>
                    <th class="th-sm">Mobile Number
                    </th>
                    <th class="th-sm">Pid
                    </th>
                    <th class="th-sm">password
                    </th>
                    <th class="th-sm">Shop Points
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile_number}}</td>
                        <td>{{$user->pid}}</td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->shop_point}}</td>


                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <!--end-main-container-part-->
@endsection
