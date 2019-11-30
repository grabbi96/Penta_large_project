@extends('layouts.pro_app')

@section('content')


    @include('layouts.frontlayout.Pro_Header')


    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-3 col-lg-6">

                    @if (count($errors) > 0)

                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif

{{--                    @if (session('prouser'))--}}
{{--                        <p>{{session('prouser')}}</p>--}}
{{--                    @endif--}}
                        <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('promember.login.submit') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="pid" class="col-md-4 col-form-label text-md-right">Pid </label>

                                    <div class="col-md-6">
                                        <input id="pid" type="text" class="form-control{{ $errors->has('pid') ? ' is-invalid' : '' }}" name="pid" value="{{ old('pid') }}" required autofocus>

                                        @if ($errors->has('pid'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pid') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </section>




@endsection
