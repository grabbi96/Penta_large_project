<!--Main Navigation-->
<header>


    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="w-100">
        <div class="container hhh">
            <a class="navbar-brand text-dark" href="/"><strong><img src="{{asset('images/frontend_image/logo.png')}}" alt=""></strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
{{--                <ul class="navbar-nav ml-auto">--}}
{{--                    <li class="nav-item active">--}}
{{--                        <a class="nav-link" href="#">Register</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Login</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
                <ul class="navbar-nav ">
                    <!-- Authentication Links -->
{{--                    @php--}}
{{--                    echo session('user');--}}
{{--                        @endphp--}}

{{--                   @if (empty(session('user')))--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('promember.login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('promember.register') }}">{{ __('Register') }}</a>
                        </li>
{{--                   @endif--}}

{{--                    @if (!empty(session('user')))--}}
{{--                        <li class="nav-item dropdown auth-nav-item">--}}
{{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                {{ $user->name }} <span class="caret"></span>--}}
{{--                            </a>--}}
{{--                            <p>Shop Point: <strong>{{ $user->shop_point }}</strong> </p>--}}
{{--                            <div >--}}
{{--                                                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                                                   onclick="event.preventDefault();--}}
{{--                                                                                     document.getElementById('logout-form').submit();" style="color: #000;">--}}
{{--                                                                    {{ __('Logout') }}--}}
{{--                                                                </a>--}}

{{--                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                                                    @csrf--}}
{{--                                                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endif--}}



                </ul>
                <a href="/" class="btn btn-bg-color" >Home</a>
            </div>



        </div>
        </div>
{{--        @if (!empty(session('user')))--}}
{{--        <div class="w-100">--}}
{{--            <div class="container">--}}
{{--                <!-- Grid row -->--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6"></div>--}}
{{--                    <!-- Grid column -->--}}
{{--                    <div class="col-md-6">--}}


{{--                        <ul class="nav purple-gradient py-4 mb-4 mb-md-0 font-weight-bold z-depth-1">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link active white-text" href="{{route('product.show_cart')}}">Cart</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link white-text" href="{{route('product.checkout')}}">CheckOut</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link white-text" href="{{route('product.order_list')}}">Orders</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}

{{--                    </div>--}}
{{--                    <!-- Grid column -->--}}



{{--                </div>--}}
{{--                <!-- Grid row -->--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        @endif--}}
    </nav>






</header>
<!--Main Navigation-->
