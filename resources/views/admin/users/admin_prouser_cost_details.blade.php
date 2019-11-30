@extends('layouts.admin_app')
@section('content')
    <!--main-container-part-->
    <div id="content">

        <div class="product-content-area">



<h2>Cost History</h2>

            <div class="cost-item">
                <h4>Reference cost history</h4>

                <table class="table-bordered table">
                    <thead>
                    <tr>
                        <th>
                            Earner Pid
                        </th>
                        <th>Earner Rank</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costs_reference as $cs)
                        <tr>
                            <td>{{$cs->income_pid}}</td>
                            <td>{{$cs->income_pid_rank}}</td>
                            <td>{{$cs->income_amount}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="cost-item">
                <h4>Sell cost history</h4>

                <table class="table-bordered table">
                    <thead>
                    <tr>
                        <th>
                            Earner Pid
                        </th>
                        <th>Earner Rank</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costs_sells as $cs)
                    <tr>
                        <td>{{$cs->income_pid}}</td>
                        <td>{{$cs->income_pid_rank}}</td>
                        <td>{{$cs->income_amount}}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="cost-item">
                <h4>Extra Sell amount</h4>

                <table class="table-bordered table">
                    <thead>
                    <tr>
                        <th>
                            Earner Pid
                        </th>
                        <th>Earner Rank</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costs_ex_sells as $cs)
                        <tr>
                            <td>{{$cs->income_pid}}</td>
                            <td>{{$cs->income_pid_rank}}</td>
                            <td>{{$cs->income_amount}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cost-item">
                <h4>Profit Group cost</h4>

                <table class="table-bordered table">
                    <thead>
                    <tr>
                        <th>
                            Earner Pid
                        </th>
                        <th>Earner Rank</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costs_profit_group as $cs)
                        <tr>
                            <td>{{$cs->income_pid}}</td>
                            <td>{{$cs->income_pid_rank}}</td>
                            <td>{{$cs->income_amount}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!--end-main-container-part-->
@endsection
