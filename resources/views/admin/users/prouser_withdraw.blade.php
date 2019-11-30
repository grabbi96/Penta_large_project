@extends('layouts.admin_app')
@section('content')
    <div class="container emp-profile z-depth-1 white" style="padding: 100px 50px;">

        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Balance : {{$balance}}</h4>
                        <h4>Balance : {{$id}}</h4>

                    </div>
                    <div class="col-md-12">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @endforeach
                        @endif
                        <form action="{{route('admin.pro_user.withdraw_confirm', $id)}}" method="post">
                            @csrf
                            <div class="form-group">

                                <label for="">Enter your Amount</label>
                                <input type="text" class="form-control" name="amount">
                            </div>

                            <button class="btn btn-success">Continue</button>
                        </form>
                    </div>



                </div>


            </div>


        </section>
    </div>
@endsection
