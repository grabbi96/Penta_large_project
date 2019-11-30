@extends('layouts.pro_app')

@section('content')


    @include('layouts.frontlayout.Pro_Header')



    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-12">
{{--                action="{{route('promember.register.submit')}}"--}}
                <form class="text-center border border-light p-5"   action="{{route('promember.register.submit')}}" method="POST">
                    @csrf

                    <p class="h4 mb-4">Registration Form</p>

                    <div class="form-row mb-4 text-left">
                        <div class="col-md-6">
                            <!-- First name -->
                            <input type="text" id="point-pid" class="form-control" name="point_pid" value="{{old('point_pid')}}" placeholder="Point PID">
                            <div class="valid-feedback point-pid">

                            </div>
                            <p class="point-pid name"></p>
                            <p class="point-pid mobile"></p>

                        </div>
                        <div class="col-md-6">
                            <!-- First name -->
                            <input type="text" id="pid" class="form-control" name="pid" value="{{old('pid')}}" placeholder="PID">
                            <div class="valid-feedback pid">

                            </div>
                            <p class="pid name"></p>
                            <p class="pid mobile"></p>

                        </div>
                        <div class="col-md-6">
                            <!-- Last name -->
                            <input type="text"  id="reference-pid" class="form-control" name="refference_pid"  value="{{old('refference-pid')}}" placeholder="Refference PID">

                            <div class="valid-feedback reference-pid">

                            </div>
                            <p class="reference-pid name"></p>
                            <p class="reference-pid mobile"></p>
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" id="placement-pid" class="form-control" name="placement_pid"   placeholder="Placement PID">

                            <div class="valid-feedback placement-pid">

                            </div>
                            <p class="placement-pid name"></p>
                            <p class="placement-pid mobile"></p>

                        </div>
                    </div>

                    <!-- E-mail -->
{{--                    <input type="text" id="defaultRegisterPhonePassword" class="form-control mb-4"  value="{{old('Phone number')}}" name="phone_number" placeholder="Phone number">--}}

                    <!-- Password -->
                    <input type="password" id="defaultRegisterFormPassword" class="form-control mb-4" name="password" placeholder="Password" >
                    <input type="password" id="defaultRegisterFormPassword" class="form-control" name="password_confirmation" placeholder="Confirm Password" >



                    
                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block" type="submit">Register</button>

                    <a href="{{route('prouser.balance_close')}}" class="btn btn-blue">balance o</a>

                    <a href="{{route('prouser.clear_history')}}" class="btn btn-blue">Clear History</a>

                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif



                </form>
            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        jQuery(document).ready(function () {
            //point Pid request
            $("#point-pid").blur(function (e) {
                // e.preventDefault();
               $.ajaxSetup({
                   headers:{
                       'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                   }
               });
                jQuery.ajax({
                    url: "{{route('promember.point_user_check')}}",
                    method:'post',
                    data:{
                        user_pid: jQuery('#point-pid').val()
                    },
                    success:function (result) {
                        if(result.error){
                            jQuery('.valid-feedback.point-pid').html(result.error);
                        }else{
                            jQuery('.valid-feedback.point-pid').remove();
                        }

                        jQuery('.point-pid.name').html("Name :"+ result.user.name );
                        jQuery('.point-pid.mobile').html("Mobile :"+ result.user.mobile_number )
                        // console.log(result['error'])
                    }

                })
            });


            // Pid request
            $("#pid").blur(function (e) {
                // e.preventDefault();
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{route('promember.user_check')}}",
                    method:'post',
                    data:{
                        user_pid: jQuery('#pid').val()
                    },
                    success:function (result) {
                        if(result.error){
                            jQuery('.valid-feedback.pid').html(result.error);
                        }else{
                            jQuery('.valid-feedback.pid').remove();
                        }

                        jQuery('.pid.name').html("Name :"+ result.user.name );
                        jQuery('.pid.mobile').html("Mobile :"+ result.user.mobile_number )
                        // console.log(result['error'])
                    }

                })
            });


            // Reference request
            $("#reference-pid").blur(function (e) {
                console.log(2354345);
                // e.preventDefault();
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{route('promember.reference_check')}}",
                    method:'post',
                    data:{
                        user_pid: jQuery('#reference-pid').val()
                    },
                    success:function (result) {
                        console.log(result);
                        if(result.error){
                            jQuery('.valid-feedback.reference-pid').html(result.error);
                        }else{
                            jQuery('.valid-feedback.reference-pid').remove();
                        }

                        jQuery('.reference-pid.name').html("Name :"+ result.user.name );
                        jQuery('.reference-pid.mobile').html("Mobile :"+ result.user.phone_number )
                        // console.log(result['error'])
                    }

                })
            });



            // placement request
            $("#placement-pid").blur(function (e) {
                console.log(2354345);
                // e.preventDefault();
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{route('promember.placement_check')}}",
                    method:'post',
                    data:{
                        user_pid: jQuery('#placement-pid').val()
                    },
                    success:function (result) {
                        console.log(result);
                        if(result.error){
                            jQuery('.valid-feedback.placement-pid').html(result.error);
                        }else{
                            jQuery('.valid-feedback.placement-pid').remove();
                        }

                        jQuery('.placement-pid.name').html("Name :"+ result.user.name );
                        jQuery('.placement-pid.mobile').html("Mobile :"+ result.user.phone_number )
                        // console.log(result['error'])
                    }

                })
            });

        })
    </script>


@endsection
