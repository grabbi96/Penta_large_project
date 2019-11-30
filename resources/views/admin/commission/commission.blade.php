@extends('layouts.admin_app')
@section('content')
    <!--main-container-part-->
    <div id="content">

        <section class="add-product-section text-center pt-5 section-padding">
            <h2>Update Commissions </h2>

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
                <form action="{{route('admin.commission_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form2">Reference</label>
                                <input type="text" id="form2" class="form-control" name="reference" value="{{$commissions->reference}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form3">M. O</label>
                                <input type="text" id="form3" class="form-control" name="com_mo" value="{{$commissions->com_mo}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form2">M. S</label>
                                <input type="text" id="form2" class="form-control" name="com_ms" value="{{$commissions->com_ms}}">

                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="form3">A. M</label>
                                <input type="text" id="form3" class="form-control" name="com_am" value="{{$commissions->com_am}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form2">Z. M</label>
                                <input type="text" id="form2" class="form-control" name="com_zm" value="{{$commissions->com_zm}}">

                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="form3">R. M</label>
                                <input type="text" id="form3" class="form-control" name="com_rm" value="{{$commissions->com_rm}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form2">D. S. M</label>
                                <input type="text" id="form2" class="form-control" name="com_dsm" value="{{$commissions->com_dsm}}" />

                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="form3">S. M</label>
                                <input type="text" id="form3" class="form-control" name="com_sm" value="{{$commissions->com_sm}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form2">Ex - D</label>
                                <input type="text" id="form2" class="form-control" name="com_exd" value="{{$commissions->com_exd}}" />

                            </div>
                        </div>

                    </div>





                    <button type="submit" class="btn btn-primary">Commissions Update</button>





                </form>
            </div>
            <div class="product-create-form section-padding">
                <h2>Update Extra Commissions </h2>

                @if (session('ex_message'))
                    <div class="alert alert-success">
                        {{ session('ex_message') }}
                    </div>
                @endif
                    <form  action="{{route('admin.ex_commission_update')}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form2">A. M</label>
                                    <input type="text" id="form2" class="form-control" name="ex_com_am" value="{{$ex_commissions->ex_com_am}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form3">Z. M</label>
                                    <input type="text" id="form3" class="form-control" name="ex_com_zm" value="{{$ex_commissions->ex_com_zm}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form2">R. M</label>
                                    <input type="text" id="form2" class="form-control" name="ex_com_rm" value="{{$ex_commissions->ex_com_rm}}">

                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="form3">D. S. M</label>
                                    <input type="text" id="form3" class="form-control" name="ex_com_dsm" value="{{$ex_commissions->ex_com_dsm}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form2">S. M</label>
                                    <input type="text" id="form2" class="form-control" name="ex_com_sm" value="{{$ex_commissions->ex_com_sm}}">

                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="form3">EX - D</label>
                                    <input type="text" id="form3" class="form-control" name="ex_com_exd" value="{{$ex_commissions->ex_com_exd}}">
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Extra Commissions Update</button>
                    </form>

            </div>
            <div class="product-create-form">
                <h2>Profit club Commissions</h2>
                @if (session('profit_message'))
                    <div class="alert alert-success">
                        {{ session('profit_message') }}
                    </div>
                @endif
                <form action="{{route('admin.profit_club_commission_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form3">M. O</label>
                                <input type="text" id="form3" class="form-control" name="pro_mo" value="{{$profit_club_commissions->pro_mo}}">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form2">M. S</label>
                                <input type="text" id="form2" class="form-control" name="pro_ms" value="{{$profit_club_commissions->pro_ms}}">

                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="form3">A. M</label>
                                <input type="text" id="form3" class="form-control" name="pro_am" value="{{$profit_club_commissions->pro_am}}">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form2">Z. M</label>
                                <input type="text" id="form2" class="form-control" name="pro_zm" value="{{$profit_club_commissions->pro_zm}}">

                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="form3">R. M</label>
                                <input type="text" id="form3" class="form-control" name="pro_rm" value="{{$profit_club_commissions->pro_rm}}">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form2">D. S. M</label>
                                <input type="text" id="form2" class="form-control" name="pro_dsm" value="{{$profit_club_commissions->pro_dsm}}" />

                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="form3">S. M</label>
                                <input type="text" id="form3" class="form-control" name="pro_sm" value="{{$profit_club_commissions->pro_sm}}">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form2">Ex - D</label>
                                <input type="text" id="form2" class="form-control" name="pro_exd" value="{{$profit_club_commissions->pro_exd}}" />

                            </div>
                        </div>

                    </div>





                    <button type="submit" class="btn btn-primary">Commissions Update</button>





                </form>
            </div>
        </section>
    </div>

    <!--end-main-container-part-->
@endsection
