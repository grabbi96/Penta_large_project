@extends('layouts.pro_app')

@section('content')


    @include('layouts.frontlayout.Pro_Header')


    <section class="section-padding">
        <div class="container text-center">
            <a href="{{route('promember.register')}}" class="btn peach-gradient btn-lg text-white">Registration</a>
            <a href="{{route('promember.login')}}" class="btn purple-gradient btn-lg text-white">Login</a>
        </div>
    </section>






@endsection
