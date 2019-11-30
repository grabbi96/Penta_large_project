@extends('layouts.admin_app')
@section('content')
    <!--main-container-part-->
    <div id="content" class="myDivToPrint">

        <div class="product-content-area">



            <h1></h1>
            <h2>Hotel Information</h2>

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

            <div>
            </div>
            <div class="btn-area">


            </div>
            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Add Hotel</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <form action="" id="add_hospital">
                                <div class="form-group">
                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Hotel Name</label>
                                    <input type="text"  class="form-control" id="name">

                                </div>

                                <div class="form-group">
                                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Percentage</label>
                                    <input type="text" id="percentage" class="form-control">
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name">Division</label>
                                        <select class="browser-default custom-select" name="division" id="division">
                                            @foreach($divisions as $divition)
                                                <option
                                                    value="{{ $divition->name}}"
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
                                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Address Details</label>
                                    <input type="text" id="address_details" class="form-control">
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-default" type="submit">Add</button>
                                </div>
                            </form>












                        </div>

                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Add Hotel</a>
            </div>
        </div>
    </div>

    <!--end-main-container-part-->
    <!-- JQuery -->
    {{--    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}


@endsection

@section('js')
    <script>

        jQuery(document).ready(function () {
            $("#division").change(function (e) {
                e.preventDefault();
                console.log(jQuery("#division").val());
                const value = jQuery("#division").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{route('promember.divition')}}",
                    method: 'post',
                    data: {
                        divition: value
                    },
                    success: function (result) {

                        // console.log(result)
                        if (result.error) {
                            console.log(result.error)
                        } else {
                            // jQuery('#error-area h2').html("");
                        }
                        //
                        let results = result.districts.map(u => {
                            return '<option value="' + u.name + '">' + u.name + '</option>'

                        });
                        //
                        jQuery('#district').html(results);

                        console.log(result)
                    }

                })
            });

            $("#add_hospital").submit(function (e) {
                e.preventDefault()
                const value = jQuery("#name").val();
                const value1 = jQuery("#percentage").val();
                const value2 = jQuery("#division").val();
                const value3 = jQuery("#district").val();
                const value4 = jQuery("#address_details").val();
                if(!value1 || !value || !value2 || !value3 || !value4  ){
                    return;
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    url: "{{route('admin.hotel_create')}}",
                    method: 'post',
                    data: {
                        name: value,
                        percentage:value1,
                        division:value2,
                        district:value3,
                        address_details:value4,
                    },
                    success: function (result) {

                        // console.log(result)
                        if (result.error) {
                            console.log(result.error)
                        } else {
                            // jQuery('#error-area h2').html("");
                        }
                        window.load();
                        console.log(result)
                    }

                })
            })



        })
    </script>
@endsection

