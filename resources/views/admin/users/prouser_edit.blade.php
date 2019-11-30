@extends('layouts.admin_app')
@section('content')
<!--main-container-part-->
<div id="content">

    <section class="add-product-section text-left pt-5">
        <h2 class="text-center">User edit form</h2>

        <div class="product-create-form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            <form action="{{route('admin.pro_user.update', $main->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="form1">pid</label>
                            <input type="text" id="form1" class="form-control" name="pid" value="{{$main->pid}}">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="form1">Reference pid</label>
                            <input type="text" id="form1" class="form-control" name="refference_pid" value="{{$main->refference_pid}}">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="form1">Placement pid</label>
                            <input type="text" id="form1" class="form-control" name="placement_pid" value="{{$main->placement_pid}}">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="form1">Mobile Number</label>
                            <input type="text" id="form1" class="form-control" name="phone_number" value="{{$main->phone_number}}">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="form1">Rank</label>
                            <input type="text" id="form1" class="form-control" name="rank" value="{{$main->rank}}">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="form1">Rank Point</label>
                            <input type="text" id="form1" class="form-control" name="rank_point" value="{{$main->rank_point}}">
                        </div>
                    </div>


                </div>










                <button type="submit" class="btn btn-primary">Update Profile</button>





            </form>

        </div>

    </section>
</div>
    
    <!--end-main-container-part-->
    @endsection
