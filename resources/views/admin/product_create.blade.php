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
            <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="form1">Product Title</label>
                            <input type="text" id="form1" class="form-control" name="title">

                        </div>
                    </div>




                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="form2">Price</label>
                            <input type="text" id="form2" class="form-control" name="price">

                        </div>
                    </div>

                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="form3">Price discount</label>
                            <input type="text" id="form3" class="form-control" name="discount_price">

                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="form3">Point</label>
                            <input type="text" id="form3" class="form-control" name="point">

                        </div>
                    </div>


                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="form3">Quantity</label>
                            <input type="text" id="form3" class="form-control" name="quantity">
                        </div>
                    </div>


                    <div class="col-lg-6 mt-4">
                        <div class="input-default-wrapper">

                            <span class="input-group-text mb-3" id="input2">Upload</span>

                            <input type="file" name="photo" id="file-with-multi-file" class="input-default-js" data-multiple-target="{target} files selected"
                                   multiple>

                            <label class="label-for-default-js rounded-right mb-3" for="file-with-multi-file"><span class="span-choose-file">Choose
      file</span>

                                <div class="float-right span-browse">Browse</div>

                            </label>

                        </div>

                    </div>
                </div>







                <button type="submit" class="btn btn-primary">Add Product</button>





            </form>

        </div>

    </section>
</div>
    
    <!--end-main-container-part-->
    @endsection
