@extends('layouts.admin_app')
@section('content')
    <!--main-container-part-->
    <div id="content">

        <div class="product-content-area">




            <table id="dtBasicExample" class="table w-auto table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th >Id
                    </th>
                    <th >Name
                    </th>
                    <th >Pid
                    </th>
                    <th >Pass
                    </th>
                    <th class="th-sm">P. Pid
                    </th>
                    <th class="th-sm">Mobile
                    </th>
                    <th >R
                    </th>
                    <th class="i-rank_point">R. P
                    </th>
                    <th>P. M
                    </th>
                    <th class="th-sm">Details
                    </th>
                    <th class="th-sm">Edit
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($prousers as $prouser)
                    <tr>
                        <td class="i-it">{{$prouser->id}}</td>
                        <td class="i-name">{{$prouser->name}}</td>
                        <td class="i-pid">{{$prouser->pid}}</td>
                        <td class="i-password">{{$prouser->password}}</td>
                        {{--                        <td class="i-pid">{{$prouser->refference_pid}}</td>--}}
                        <td class="i-pid">{{$prouser->placement_pid}}</td>
                        <td class="i-pid">{{$prouser->phone_number}}</td>
                        <td style="font-weight: 600;" class="i-rank"><b>{{$prouser->rank}}</b></td>
                        <td style="font-weight: 600;" class="i-rank_point"><b>{{$prouser->rank_point}}</b></td>


                        <td class="i-profit">
                            @if ($prouser->profit_club_member == 1)
                                <strong>Yes</strong>
                            @endif
                            @if ($prouser->profit_club_member == 0)
                                <strong>No</strong>
                            @endif
                        </td>
                        <td><a href="{{route("admin.pro_user.show", $prouser->id)}}" class="btn btn-success text-white btn-sm">Details</a></td>
                        <td><a href="{{route("admin.pro_user.edit", $prouser->id)}}" class="btn btn-success text-white btn-sm">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <!--end-main-container-part-->
@endsection
