@extends('layouts.app')

@section('content')


    @include('layouts.frontlayout.Header')
    <!--Main layout-->
    <main class="mt-5 pt-4">
        <div class="container dark-grey-text mt-5">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/14.jpg" class="img-fluid" alt="">

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Content-->
                    <div class="p-4">

                        <div class="mb-3">
                            <a href="">
                                <span class="badge purple mr-1">Category 2</span>
                            </a>
                            <a href="">
                                <span class="badge blue mr-1">New</span>
                            </a>
                            <a href="">
                                <span class="badge red mr-1">Bestseller</span>
                            </a>
                        </div>



                        <p class="lead font-weight-bold">{{$product->title}}</p>

                        <p class="lead">
              <span class="mr-1">
                <del>{{$product->price}}Tk</del>
              </span>
                            <span>{{$product->discount_price}}Tk</span>
                        </p>
                        <p class="red-text">Point : {{$product->point}}</p>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor suscipit libero eos atque quia ipsa
                            sint voluptatibus!
                            Beatae sit assumenda asperiores iure at maxime atque repellendus maiores quia sapiente.</p>

                        <form  method="POST" action="{{route('product.add_to_cart')}}"   class="d-flex justify-content-left">
                        @csrf
                            <!-- Default input -->
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="number" value="1" name="qty" aria-label="Search" class="form-control" style="width: 100px">
                            <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart
                                <i class="fas fa-shopping-cart ml-1"></i>
                            </button>

                        </form>

                    </div>
                    <!--Content-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <hr>

            <!--Grid row-->
            <div class="row d-flex justify-content-center wow fadeIn">

                <!--Grid column-->
                <div class="col-md-6 text-center">

                    <h4 class="my-4 h4">Additional information</h4>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit
                        voluptates,
                        quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4">

                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/11.jpg" class="img-fluid" alt="">

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid" alt="">

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid" alt="">

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
    </main>
    <!--Main layout-->








@endsection
