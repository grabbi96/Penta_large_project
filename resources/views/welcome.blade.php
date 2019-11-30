@extends('layouts.app')

@section('content')


    @include('layouts.frontlayout.Header')




    <section class="banner-section">

        <div class="container">
            <div class="row">

                <div class="col-lg-5 banner-content">
                    @if (session('pro_member_message'))
                        <div class="alert alert-success">
                            {{ session('pro_member_message') }}
                        </div>
                    @endif
                    <h6>2019</h6>
                    <h4>Penta Marketing</h4>
                    <p>Eikon is made of certified wood and a lampshade that is attachedIt is a long established fact that a reader will be distracted by the readable content .</p>
                    <a class="btn btn-bg-color" href="#">Shop Now</a>
                </div>
            </div>

        </div>
    </section>


    <section class="news-section section-padding">
        <div class="container">

            <div class="section-header">
                <h2>Penta Marketing - News</h2>

            </div>

            <div class="section-wrapper">

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti esse est eum maxime perferendis quod recusandae sit. Aliquam consectetur cum cumque dolore eligendi eum hic in laudantium nobis provident.</p>
            </div>
        </div>

    </section>



    <section class="information-section section-padding">
        <div class="container">

            <div class="section-header">
                <h2>Penta Marketing - Information</h2>

            </div>
            <div class="section-wrapper">

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti esse est eum maxime perferendis quod recusandae sit. Aliquam consectetur cum cumque dolore eligendi eum hic in laudantium nobis provident.</p>
            </div>
        </div>

    </section>


    <section class="information-section section-padding">
        <div class="container">

            <div class="section-header">
                <h2>Penta Marketing - Product</h2>
                <p>New product giving away event is ready.
                </p>

            </div>
            <div class="section-wrapper">

                <div class="product-area">

                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-3">
                            <div class="product">
                                <article>
{{--                                    //asset('images/frontend_image/product/item.jpg')--}}
                                    <img class="img-responsive" src="{{url('/uploads/images/'.$product->thumbnail_path)}}" alt="">
                                    <span class="sale-tag">-{{$product->discount_percentage}}%</span>

                                    <!-- Content -->
                                    <a href="#" class="tittle">{{ $product->title  }}</a>
                                    <!-- Reviews -->
                                    <p class="rev">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="margin-left-10">Point {{$product->point}}</span>
                                    </p>

                                    <div class="price">{{$product->discount_price}}tk <span> {{$product->price}}tk</span></div>
                                    <div class="buy-area">
                                        <a href="#" class="btn btn-bg-color">Add To Cart</a>
                                        <a href="{{route('product.show', $product->id)}}" class="btn btn-success">View Details</a>
                                    </div>

                                </article>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>






@endsection
