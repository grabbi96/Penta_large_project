<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prouser;
use App\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminWithdrawMoney extends Controller
{
    //

    public function index($id){
        $user = Prouser::find($id);
        $data = [];

        if ($user->total_balance <= 200){
            return redirect()->back()->withErrors("Your Balance below 200");
        }
        $data['balance'] = $user->total_balance;
        $data['id'] = $user->id;
        return view('admin.users.prouser_withdraw', $data);
    }

    public function confirm(Request $request, $id){

        $amount = $request->input('amount');
        if(empty($amount)){
            return redirect()->back()->withErrors("Enter Amount");
        }
        $pid = session()->get('prouser');
        $user = Prouser::find($id);

        if($user->total_balance <= $amount){
            return redirect()->back()->withErrors("Surfficent balance");
        }
        $user->withdraw_amount = $amount;
        $user->save();
        return redirect(route('admin.pro_user.withdraw_final', $id));
    }

    public function final_confirm($id){
        $user = Prouser::find($id);
        $service_charge = 13.5;
        $data = [];
        $data['balance'] = $user->total_balance;
        $data['id'] = $user->id;
        $data['withdraw_amount'] = $user->withdraw_amount;
        $data['service_charge'] =  ($user->withdraw_amount / 100) * $service_charge;
        $data['confirm_balance'] = $user->withdraw_amount - $data['service_charge'];
        return view('admin.users.prouser_withdraw_final', $data);

    }

    public function final_confirm_action($id){
        $user = Prouser::find($id);

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
            'user_pid' =>$user->pid,
            'sell' => $sell_cost,
            'reference' => $ref_cost,
            'profit_club' => $pro_cost,
            'amount' => $user->withdraw_amount,
            'service_charge' => $service_charge,
            'confirm_amount' => $confirm_balance,
        ]);

        session()->flash('type', 'success');

        session()->flash('message', 'Your Withdraw money successfully complete');

        return redirect(route('admin.pro_user.show', $id));
    }

    public function get_total_balance($pid){
        $update_balance_user = Prouser::where('pid', $pid)->first();

        $update_balance_user->total_balance = $update_balance_user->sell_balance + $update_balance_user->reference_balance + $update_balance_user->profit_club_balance;
        $update_balance_user->save();

    }
}
