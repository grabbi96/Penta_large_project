@extends('layouts.admin_app')
@section('content')
<!--main-container-part-->
<div id="content">

    <section class="add-product-section text-center pt-5">
        <h2>Create Product Form </h2>

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
            <form action="{{route('admin.update', $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-lg-12">
                        <div class="md-form md-outline">
                            <input type="text" id="form1" class="form-control" name="title" value="{{$product->title}}">
                            <label for="form1">Product Title</label>
                        </div>
                    </div>
                </div>



                <div class="row">

                    <div class="col-lg-6">
                        <div class="md-form md-outline">
                            <input type="text" id="form2" class="form-control" name="price" value="{{$product->price}}">
                            <label for="form2">Price</label>
                        </div>
                    </div>

                    <div class="col-lg-6">

                        <div class="md-form md-outline">
                            <input type="text" id="form3" class="form-control" name="discount_price" value="{{$product->discount_price}}">
                            <label for="form3">Price discount</label>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6">

                        <div class="md-form md-outline">
                            <input type="text" id="form3" class="form-control" name="point" value="{{$product->point}}">
                            <label for="form3">Point</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-default-wrapper">

                            <span class="input-group-text mb-3" id="input2">Upload</span>

                            <input type="file" id="file-with-multi-file" name="photo" value="{{$product->thumbnail_path}}" class="input-default-js" data-multiple-target="{target} files selected"
                                   multiple>

                            <label class="label-for-default-js rounded-right mb-3" for="file-with-multi-file"><span class="span-choose-file">Choose
      file</span>

                                <div class="float-right span-browse">Browse</div>

                            </label>

                        </div>

                    </div>
                </div>







                <button type="submit" class="btn btn-primary">Update Product</button>





            </form>

        </div>

    </section>
</div>
    
    <!--end-main-container-part-->
    @endsection
