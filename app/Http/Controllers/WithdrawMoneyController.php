<?php

namespace App\Http\Controllers;

use App\Models\Prouser;
use App\Withdraw;
use Illuminate\Http\Request;

class WithdrawMoneyController extends Controller
{
    //
    public function index(){
        if(empty(session()->get('prouser'))){
            return  redirect(route('promember.login'));
        }

        $pid = session()->get('prouser');

        $user = Prouser::where('pid', $pid)->first();
        $data = [];

        if ($user->total_balance <= 200){
            return redirect()->back()->withErrors("Your Balance below 200");
        }
        $data['balance'] = $user->total_balance;
      return view('promember.withdrawForm', $data);
    }

    public function amount_check(Request $request){
        if(empty(session()->get('prouser'))){
            return  redirect(route('promember.login'));
        }
        $amount = $request->input('amount');
        if(empty($amount)){
            return redirect()->back()->withErrors("Enter Amount");
        }
        $pid = session()->get('prouser');
        $user = Prouser::where('pid', $pid)->first();

        if($user->total_balance <= $amount){
            return redirect()->back()->withErrors("Surfficent balance");
        }
        $rand = rand (000000, 666666);
        $user->withdraw_amount = $amount;
        $user->withdraw_token = $rand;
        $user->save();

        return redirect(route('promember.withdraw_confirm_form'));
    }
    public function confirm_form(){
        if(empty(session()->get('prouser'))){
            return  redirect(route('promember.login'));
        }

        $pid = session()->get('prouser');
        $user = Prouser::where('pid', $pid)->first();
        $service_charge = 13.5;
        $data = [];
        $data['balance'] = $user->total_balance;
        $data['withdraw_amount'] = $user->withdraw_amount;
        $data['service_charge'] =  ($user->withdraw_amount / 100) * $service_charge;
        $data['confirm_balance'] = $user->withdraw_amount - $data['service_charge'];
        return view('promember.withdrawConfirmForm', $data);
    }

    public function confirm_withdraw(Request $request){
        if(empty(session()->get('prouser'))){
            return  redirect(route('promember.login'));
        }
        $pid = session()->get('prouser');
        $user = Prouser::where('pid', $pid)->first();
        $token = $request->input('token');
        if ($user->withdraw_token != $token){
            return redirect()->back()->withErrors("Wrong Token");
        }



        $service_charge = 13.5;
        $balance = $user->total_balance;
        $withdraw_amount = $user->withdraw_amount;
        $service_charge =  ($user->withdraw_amount / 100) * $service_charge;
        $confirm_balance = $user->withdraw_amount - $service_charge;


        $sell_cost = 0;
        $ref_cost = 0;
        $pro_cost = 0;
        $sell_balance_cost = $withdraw_amount - $user->sell_balance;
        if($sell_balance_cost < 0){
            $user->sell_balance = $user->sell_balance - $withdraw_amount;
            $sell_cost = $withdraw_amount;
            $withdraw_amount = 0;
            $user->save();
        }
        if($sell_balance_cost > 0){
            $withdraw_amount = $withdraw_amount - $user->sell_balance;
            $sell_cost = $user->sell_balance;
            $user->sell_balance = 0;
            $user->save();
        }

        $ref_balance_cost = $withdraw_amount - $user->reference_balance;

        if($ref_balance_cost < 0){
            $reference_balance = $user->reference_balance - $withdraw_amount;
            $ref_cost = $withdraw_amount;
            $user->reference_balance = $reference_balance;
            $withdraw_amount = 0;
            $user->save();
        }
        if($ref_balance_cost > 0){

            $withdraw_amount = $withdraw_amount - $user->reference_balance;
            $ref_cost = $user->reference_balance;
            $user->reference_balance = 0;
            $user->save();
        }

        $pro_cost = $withdraw_amount;
        $user->profit_club_balance = $user->profit_club_balance - $withdraw_amount;
        $user->save();
//        return $withdraw_amount;
//
//
//
    $this->get_total_balance($user->pid);

        Withdraw::create([
            'user_pid' =>$pid,
            'sell' => $sell_cost,
            'reference' => $ref_cost,
            'profit_club' => $pro_cost,
            'amount' => $user->withdraw_amount,
            'service_charge' => $service_charge,
            'confirm_amount' => $confirm_balance,
        ]);

        session()->flash('type', 'success');

        session()->flash('message', 'Your Withdraw money successfully complete');

        return redirect(route('promember.home'));









    }

    public function get_total_balance($pid){
        $update_balance_user = Prouser::where('pid', $pid)->first();

        $update_balance_user->total_balance = $update_balance_user->sell_balance + $update_balance_user->reference_balance + $update_balance_user->profit_club_balance;
        $update_balance_user->save();

    }
}
