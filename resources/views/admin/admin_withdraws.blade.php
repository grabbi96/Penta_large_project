@extends('layouts.admin_app')
@section('content')
    <!--main-container-part-->
    <div id="content">

        <div class="product-content-area">


            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th >Withdraw Id
                    </th>
                    <th >Pid User
                    </th>
                    <th class="th-sm">Sell
                    </th>
                    <th class="th-sm">Reference
                    </th>
                    <th class="th-sm">Profit
                    </th>
                    <th class="th-sm">Amount
                    </th>
                    <th class="th-sm">Service Charge
                    </th>
                    <th class="th-sm">Confirm Balance
                    </th>

                    <th class="th-sm">Time Date
                    </th>

                </tr>
                </thead>
                <tbody>

                @foreach($withdraws as $withdraw)

                    <tr>
                        <td>
                            {{$withdraw->id}}
                        </td>
                        <td>
                            {{$withdraw->user_pid}}
                        </td>

                        <td>
                            {{$withdraw->sell}}
                        </td>
                        <td>
                            {{$withdraw->reference}}
                        </td>
                        <td>
                            {{$withdraw->profit_club}}
                        </td>
                        <td>
                            {{$withdraw->amount}}
                        </td>
                        <td>
                            {{$withdraw->service_charge}}
                        </td>
                        <td>
                            {{$withdraw->confirm_amount}}
                        </td>
                        <td>
                            {{ $withdraw->created_at->format('Y-m-d')}}
                        </td>

                    </tr>

                    @endforeach



                </tbody>

            </table>
        </div>
    </div>

    <!--end-main-container-part-->
@endsection
