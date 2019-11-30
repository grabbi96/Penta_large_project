@extends('layouts.admin_app')
@section('content')
    <div class="container emp-profile z-depth-1 white" style="padding: 100px 50px;">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
{{--                        <div class="file btn btn-lg btn-primary">--}}
{{--                            Change Photo--}}
{{--                            <input type="file" name="file"/>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h3>
                            Kshiti Ghelani
                        </h3>
                        <h2>
                            PID: {{$main->pid}}
                        </h2>
                        <h4 class="proile-rating">RANK : <span>{{$main->rank}}</span></h4>
                        <h5 class="proile-rating">RANK Point: <span>{{$main->rank_point}}</span></h5>
                        <a href="{{route("admin.pro_user.cost", $main->pid)}}" class="btn btn-blue" >Total Cost For account Opening <h3 style="margin: 0;">{{$main->cost}}</h3> </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    @if (!$main->profit_club_member)
                        @if ($main->rank !== "R. C")
                            <a href="{{route('admin.pro_user.add_to_profit', $main->id)}}" onclick="return confirm('Are you sure add to profit club?')" class="btn btn-success">Add to Profit club Member</a>
                        @endif
                            @if ($main->rank === "R. C")
                                <p>You need to be M. O</p>
                                @endif

                    @endif
                        @if ($main->profit_club_member)
                            <p>Member of Profit club</p>
                        @endif


                        <a href="" onclick="return confirm('Are you sure?')" class="btn btn-danger" data-method="DELETE" data-confirm="Are you sure?">Delete</a>


                </div>
                <div class="col-md-8">



                    <h5>Balance Information</h5>
                    <ul class="list-group data-info-list">
                        <li>
                            <p>Sell Income</p>
                            <span>{{$main->sell_balance}}Tk</span>
                        </li>
                        <li>
                            <p>Reference Income</p>
                            <span>{{$main->reference_balance}}Tk</span>
                        </li>
                        <li>
                            <p>Profit club Income</p>
                            <span>{{$main->profit_club_balance}}Tk</span>
                        </li>
                        <li>
                            <p>Total Income</p>
                            <span>{{$main->total_balance}}Tk</span>
                        </li>
                        <li>
                            <p>Extra Sell Income</p>
                            <span>{{$main->extra_sell_balance}}Tk</span>
                        </li>
                    </ul>

                    <ul class="list-group data-info-list">
                        <li>
                            <p>Reference Pid</p>
                            <span>{{$main->refference_pid}}</span>
                        </li>
                        <li>
                            <p>Placement Pid</p>
                            <span>{{$main->placement_pid}}</span>
                        </li>
                    </ul>

                    <h2>Personal Information</h2>

                    <ul class="list-group data-info-list">
                        <li>
                            <p>Mobile Personal</p>
                            <span>{{$details->mobile_personal}}</span>
                        </li>
                        <li>
                            <p>Mobile Reference</p>
                            <span>{{$details->mobile_ref}}</span>
                        </li>
                        <li>
                            <p>Gender</p>
                            <span>{{$details->gender}}</span>
                        </li>
                        <li>
                            <p>Blood Group</p>
                            <span>{{$details->blood_group}}</span>
                        </li>
                        <li>
                            <p>Nid</p>
                            <span>{{$details->nid}}</span>
                        </li>
                        <li>
                            <p>Address</p>
                            <span>{{$details->address}}</span>
                        </li>
                        <li>
                            <p>Religion</p>
                            <span>{{$details->religion}}</span>
                        </li>
                        <li>
                            <p>Date Of Birth</p>
                            <span>{{$details->date_of_birth}}</span>
                        </li>
                        <li>
                            <p>Father Name</p>
                            <span>{{$details->father_name}}</span>
                        </li>
                        <li>
                            <p>Mother Name</p>
                            <span>{{$details->mother_name}}</span>
                        </li>

                        <li>
                            <p>Nominee Name</p>
                            <span>{{$details->nominee_mame}}</span>
                        </li>

                        <li>
                            <p>Nominee Relation</p>
                            <span>{{$details->nominee_relation}}</span>
                        </li>

                        <li>
                            <p>Bank name</p>
                            <span>{{$details->bank_name}}</span>
                        </li>

                        <li>
                            <p>Banl Account</p>
                            <span>{{$details->bank_account}}</span>
                        </li>

                        <li>
                            <p>Email</p>
                            <span>{{$details->email}}</span>
                        </li>


                    </ul>

                </div>
            </div>
        </form>


        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif

        <div class="withdraw_money">
            <a href="{{route('admin.pro_user.withdraw', $main->id )}}" class="btn btn-secondary">Withdraw money</a>
        </div>
    </div>
@endsection
