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
                    <th >Pid
                    </th>
                    <th >Name
                    </th>
                    <th class="th-sm">Rank
                    </th>
                    <th >Delete
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->pid}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->rank}}</td>
                        <td><a href="{{route('admin.profit_club.remove', $user->id)}}" onclick="return confirm('Are you sure remove from profit club?')" class="btn btn-danger btn-sm text-white">delete</a></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <!--end-main-container-part-->
@endsection
