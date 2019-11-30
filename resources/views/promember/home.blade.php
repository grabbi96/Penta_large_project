




{{--@endsection--}}
@extends('layouts.pro_app')

@section('content')


    @include('layouts.frontlayout.Pro_Header')




            <section class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-header">
                                <div class="profile-thumb">
                                    @if ($prouser_details->thumb_nail)
                                        <img src="{{url('/uploads/images/', $prouser_details->thumb_nail)}}" alt="">
                                    @endif
                                        @if (!$prouser_details->thumb_nail)
                                            <h2>Add your Picture</h2>
                                        @endif
                                </div>
                                <div class="profile-header-content">
                                    <h4>{{$user_info->name}}</h4>
                                    <span>Pid: {{$user_info->pid}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">


                            <div class="profile-sidebar">
                                <ul>
                                    <li><a href="{{route('promember.service')}}"><i class="fas fa-user-circle"></i> Services</a></li>
                                    <li><a href="{{route('promember.income_history')}}"><i class="fas fa-cogs"></i> Income History</a></li>
                                    <li><a href="{{route('promember.withdraw_money')}}"><i class="fas fa-money-bill"></i> Billing</a></li>
                                    <li>  <a href="{{route('promember.logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                </ul>
                            </div>


                            <div class="profile-sidebar">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Sell Income
                                        <span class="badge badge-primary badge-pill">{{$user_info->sell_balance}}Tk</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Reference Income
                                        <span class="badge badge-primary badge-pill">{{$user_info->reference_balance}}Tk</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Profit club Income
                                        <span class="badge badge-primary badge-pill">{{$user_info->profit_club_balance}}Tk</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                      Extra  Sell Income
                                        <span class="badge badge-primary badge-pill">{{$user_info->extra_sell_balance}}Tk</span>
                                    </li>
                                    <li class="list-group-item d-flex green justify-content-between text-white align-items-center">
                                        Total Income
                                        <span class="badge badge-primary badge-pill text-white">{{$user_info->total_balance}}Tk</span>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="col-md-8">
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{$error}}</p>
                                @endforeach
                            @endif
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            <div class="profile-wrapper">
                                <h4>Profile Information</h4>
{{--                                @php--}}
{{--                                echo '<pre>';--}}
{{--                                print_r($prouser_details);--}}
{{--                                echo '</pre>';--}}

{{--                                @endphp--}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>

                                            <li><h4>Rank: <strong>{{$user_info->rank}}</strong></h4></li>
                                            <li>
                                                <p>Father Name:  <span>{{$prouser_details->father_name}}</span></p>
                                            </li>
                                            <li>
                                                <p>Mother Name:  <span>{{$prouser_details->mother_name}}</span></p>
                                            </li>
                                            <li>
                                                <p>nominee Name:  <span>{{$prouser_details->nominee_mame}}</span></p>
                                            </li>
                                            <li>
                                                <p>Nominee Relation:  <span>{{$prouser_details->nominee_relation}}</span></p>
                                            </li>

                                            <li>
                                                <p> religion: <span>{{$prouser_details->religion}}</span></p>
                                            </li>

                                            <li>
                                                <p> Address:  <span>{{$prouser_details->address}}</span></p>
                                            </li>

                                            <li>
                                                <p> E-mail id:  <span>{{$prouser_details->email}}</span></p>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-6">
                                        <ul>

                                            <li><h4>Mobile Personal: <strong>{{$prouser_details->moblie_personal}}</strong></h4></li>
                                            <li>
                                                <p>Mobile Reference:  <span>{{$prouser_details->mobile_ref}}</span></p>
                                            </li>
                                            <li>
                                                <p>Gender:  <span>{{$prouser_details->gender}}</span></p>
                                            </li>
                                            <li>
                                                <p>Blood Group:  <span>{{$prouser_details->blood_group}}</span></p>
                                            </li>
                                            <li>
                                                <p>Nid:  <span>{{$prouser_details->nid}}</span></p>
                                            </li>

                                            <li>
                                                <p> Date Of Birth: <span>{{$prouser_details->date_of_birth}}</span></p>
                                            </li>

                                            <li>
                                                <p> Bank Name: <span>{{$prouser_details->bank_name}}</span></p>
                                            </li>

                                            <li>
                                                <p> Bank Account: <span>{{$prouser_details->bank_account}}</span></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <a href="{{route('promember.profile_edit')}}" class="btn btn-amber">Edit</a>
                            </div>

                        </div>





                    </div>


                </div>


            </section>


            <section class="section-padding">
                <div class="container">
                    <h2>Your Placement Users</h2>


                <div class="placement-users-area">
                    <div class="row">
                        @foreach($prouser_placement as $pp)
                        <div class="col-md-3 mb-4" >
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pid - {{$pp->pid}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Rank - {{$pp->rank}}</h6>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>

                </div>
                </div>
            </section>


            <section class="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="" id="form-submit-area-id">
                                <div class="form-submit-area">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Pid " id="placement_pid">

                                    </div>
                                    <button class="btn btn-success" type="submit" id="submit-btn">Submit</button>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>


                    <div class="row">
                        <div id="error-area">
                            <h2 class="text-danger"></h2>
                        </div>
                    </div>


                <div class="row search-items">

                </div>

                </div>
            </section>






@endsection


<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function () {
        $("#form-submit-area-id").submit(function (e) {
            e.preventDefault();
            const value = jQuery("#placement_pid").val();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{route('promember.placement_users')}}",
                method:'post',
                data:{
                    placement_pid: value
                },
                success:function (result) {

                    console.log(result)
                    if(result.error){
                        jQuery('#error-area h2').html(result.error);
                        jQuery('.row.search-items').html("");
                    }else {
                        jQuery('#error-area h2').html("");
                    }

                     let results =   result.user.map(u => {
                            return '<div class="col-md-3 mb-4" > <div class="card"> <div class="card-body"> <h5 class="card-title">Pid - '+u.pid+'</h5> <h6 class="card-subtitle mb-2 text-muted">Rank - '+u.rank+' </h6> </div> </div> </div>'

                        });

                    jQuery('.row.search-items').html(results);
                    console.log(results)
                }

            })
        })
    })

</script>
