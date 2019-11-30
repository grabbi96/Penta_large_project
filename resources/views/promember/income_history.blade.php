@extends('layouts.pro_app')

@section('content')


    @include('layouts.frontlayout.Pro_Header')


    <section class="section-padding">
        <div class="container">
            <h2>Income History</h2>

            <div class="cost-item">
                <h4>Reference Income history</h4>

                <table class="table-bordered table">
                    <thead>
                    <tr>
                        <th>
                            Pid
                        </th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costs_reference as $cs)
                        <tr>
                            <td>{{$cs->cost_pid}}</td>
                            <td>{{$cs->income_amount}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cost-item">
                <h4>Sell Income history</h4>

                <table class="table-bordered table">
                    <thead>
                    <tr>
                        <th>
                            Pid
                        </th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costs_sells as $cs)
                        <tr>
                            <td>{{$cs->cost_pid}}</td>
                            <td>{{$cs->income_amount}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="cost-item">
                <h4>Extra Sell Income</h4>

                <table class="table-bordered table">
                    <thead>
                    <tr>
                        <th>
                            Pid
                        </th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costs_ex_sells as $cs)
                        <tr>
                            <td>{{$cs->cost_pid}}</td>
                            <td>{{$cs->income_amount}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <div class="cost-item">
                <h4>Profit Club Income</h4>

                <table class="table-bordered table">
                    <thead>
                    <tr>
                        <th>
                            Pid
                        </th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costs_profit_group as $cs)
                        <tr>
                            <td>{{$cs->cost_pid}}</td>
                            <td>{{$cs->income_amount}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>






    </section>




@endsection
