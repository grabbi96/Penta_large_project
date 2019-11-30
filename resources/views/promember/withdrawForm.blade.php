




{{--@endsection--}}
@extends('layouts.pro_app')

@section('content')


    @include('layouts.frontlayout.Pro_Header')




            <section class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Balance : {{$balance}}</h4>

                        </div>
                        <div class="col-md-12">
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{$error}}</p>
                                @endforeach
                            @endif
                            <form action="{{route('promember.withdraw_amount')}}" method="post">
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





@endsection
