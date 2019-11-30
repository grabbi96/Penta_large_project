




{{--@endsection--}}
@extends('layouts.pro_app')

@section('content')


    @include('layouts.frontlayout.Pro_Header')




    <div class="container bootstrap snippet section-padding">
        <div class="row">
            <div class="col-sm-10"><h1>User name</h1></div>

        </div>

            <form class="form" action="{{route("promember.profile_update")}}" method="post" id="registrationForm" enctype="multipart/form-data">
                <div class="row">
            <div class="col-sm-3"><!--left col-->


                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block file-upload" name="photo">
                </div></hr><br>


            </div><!--/col-3-->
            <div class="col-sm-9">


                        <hr>

                            @csrf
                            @method('PUT')
{{--                            <div class="form-group">--}}

{{--                                <div class="col-xs-6">--}}
{{--                                    <label for="first_name"><h4>Name</h4></label>--}}
{{--                                    <input type="text" class="form-control" name="name" value="{{$user_info->name}}" id="first_name"  title="enter your first name if any.">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Father Name</h4></label>
                                    <input type="text" class="form-control" name="father_name" value="{{$prouser_details->father_name}}" id="first_name"  title="enter your first name if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Mother Name</h4></label>
                                    <input type="text" class="form-control" name="mother_name" value="{{$prouser_details->mother_name}}" id="first_name"  title="enter your first name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Nominee Name</h4></label>
                                    <input type="text" class="form-control" name="nominee_mame" value="{{$prouser_details->nominee_mame}}" id="first_name"  title="enter your first name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Nominee Relation</h4></label>
                                    <input type="text" class="form-control" name="nominee_relation" value="{{$prouser_details->nominee_relation}}" id="first_name" title="enter your first name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Religion</h4></label>
                                    <input type="text" class="form-control" name="religion" id="first_name" value="{{$prouser_details->religion}}"  title="enter your first name if any.">
                                </div>
                            </div>


                <div class="form-group">

                    <div class="col-xs-6">
                        <label for="first_name"><h4>Blood Group</h4></label>
                        <select class="browser-default custom-select" name="blood_group" id="blood_group">
                            @if (!$prouser_details->blood_group)
                                <option selected>Open this select menu</option>
                            @endif


                            @foreach($blood as $b)
                                <option
                                    value="{{ $b->blood_group}}"
                                    @if ($prouser_details->blood_group == $b->blood_group)
                                    selected="selected"
                                    @endif
                                >{{$b->blood_group}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-xs-6">
                        <label for="first_name"><h4>Division</h4></label>
                        <select class="browser-default custom-select" name="division" id="division">
                            @if (!$prouser_details->division)
                                <option selected>Open this select menu</option>
                            @endif


                            @foreach($divitions as $divition)
                            <option  
                                value="{{ $divition->name}}"
                                @if ($prouser_details->division == $divition->name)
                                selected="selected"
                                @endif
                            >{{$divition->name}} </option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-xs-6">
                        <label for="first_name"><h4>District</h4></label>
                        <select class="browser-default custom-select" name="district" id="district">
                        </select>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-xs-6">
                        <label for="first_name"><h4>Upazila</h4></label>
                        <select class="browser-default custom-select" name="upazila" id="upazila">
                        </select>
                    </div>
                </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Email</h4></label>
                                    <input type="text" class="form-control" name="email" id="first_name" value="{{$prouser_details->email}}"  title="enter your first name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Mobile Personal</h4></label>
                                    <input type="text" class="form-control" name="mobile_personal" id="first_name" value="{{$prouser_details->mobile_personal}}"  title="enter your first name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Mobile Reference</h4></label>
                                    <input type="text" class="form-control" name="mobile_ref" id="first_name"  value="{{$prouser_details->mobile_ref}}"  title="enter your first name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Gender</h4></label>
                                    <input type="text" class="form-control" name="gender" value="{{$prouser_details->gender}}" id="first_name"  title="enter your first name if any.">
                                </div>
                            </div>

{{--                            <div class="form-group">--}}

{{--                                <div class="col-xs-6">--}}
{{--                                    <label for="first_name"><h4>Blood Group</h4></label>--}}
{{--                                    <input type="text" class="form-control" name="blood_group"  value="{{$prouser_details->blood_group}}" id="first_name"  title="enter your first name if any.">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Nid</h4></label>
                                    <input type="text" class="form-control" name="nid" id="first_name" value="{{$prouser_details->nid}}"  title="enter your first name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Date Of Birth</h4></label>
                                    <input type="text" class="form-control" name="date_of_birth" id="first_name" value="{{$prouser_details->date_of_birth}}"  title="enter your first name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Bank Name</h4></label>
                                    <input type="text" class="form-control" name="bank_name" id="first_name" value="{{$prouser_details->bank_name}}"  title="enter your first name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Bank Account</h4></label>
                                    <input type="text" class="form-control" name="bank_account" id="first_name" value="{{$prouser_details->bank_account}}"  title="enter your first name if any.">
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                </div>
                            </div>


                </div><!--/tab-pane-->
                </div><!--/tab-content-->
            </form>


        </div><!--/col-9-->

    </div><!--/row-->




@endsection
<script type="text/javascript" src="{{asset('js/backend_js/jquery.min.js')}}"></script>
@if ($prouser_details->division)
    <script>

        jQuery(document).ready(function () {



            var value = '<?php echo $prouser_details->division; ?>';
            var district;

            district = '<?php echo$prouser_details->district; ?>';

            console.log(district)
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                }
            });

            jQuery.ajax({
                url: "{{route('promember.divition')}}",
                method:'post',
                data:{
                    divition: value
                },
                success:function (result) {

                    // console.log(result)
                    if(result.error){
                        console.log(result.error)
                    }else {
                        // jQuery('#error-area h2').html("");
                    }
                    //
                    let results =   result.districts.map(u => {
                        return '<option value="'+u.name+'">'+u.name+'</option>'
                    });
                    //
                    jQuery('#district').html(results);

                    console.log(results)
                }

            })
        })
    </script>
@endif

@if ($prouser_details->district)
    <script>

        jQuery(document).ready(function () {



            var value = '<?php echo $prouser_details->district; ?>';


            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{route('promember.district')}}",
                method:'post',
                data:{
                    district: value
                },
                success:function (result) {

                    // console.log(result)
                    if(result.error){
                        console.log(result.error)
                    }else {
                        // jQuery('#error-area h2').html("");
                    }
                    //
                    let results =   result.upazilas.map(u => {
                        return '<option value="'+u.name+'">'+u.name+'</option>'

                    });
                    //
                    jQuery('#upazila').html(results);

                    console.log(results)
                }

            })
        })
    </script>
@endif

<script>
    jQuery(document).ready(function () {
        $("#division").change(function (e) {
            e.preventDefault();
            console.log(jQuery("#division").val());
            const value = jQuery("#division").val();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{route('promember.divition')}}",
                method:'post',
                data:{
                    divition: value
                },
                success:function (result) {

                    // console.log(result)
                    if(result.error){
                        console.log(result.error)
                    }else {
                        // jQuery('#error-area h2').html("");
                    }
                    //
                    let results =   result.districts.map(u => {
                        return '<option value="'+u.name+'">'+u.name+'</option>'

                    });
                    //
                    jQuery('#district').html(results);

                    console.log(results)
                }

            })
        });



        $("#district").change(function (e) {
            e.preventDefault();
            console.log(jQuery("#district").val());
            const value = jQuery("#district").val();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{route('promember.district')}}",
                method:'post',
                data:{
                    district: value
                },
                success:function (result) {

                    // console.log(result)
                    if(result.error){
                        console.log(result.error)
                    }else {
                        // jQuery('#error-area h2').html("");
                    }
                    //
                    let results =   result.upazilas.map(u => {
                        return '<option value="'+u.name+'">'+u.name+'</option>'

                    });
                    //
                    jQuery('#upazila').html(results);

                    console.log(results)
                }

            })
        })



    })

</script>
