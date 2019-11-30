<?php

namespace App\Http\Controllers\Admin;

use App\Commission;
use App\Extra_Commission;
use App\Http\Controllers\Controller;
use App\Profit_club_Commissions;
use Illuminate\Http\Request;

class AdminCommission extends Controller
{
    //

    public function index(){
        $commissions = Commission::all();
        $ex_commissions = Extra_Commission::all();
        $profit_club_commissions = Profit_club_Commissions::all();
        $data = [];
        $data['commissions'] = $commissions[0];
        $data['ex_commissions'] = $ex_commissions[0];
        $data['profit_club_commissions'] = $profit_club_commissions[0];
        return view('admin.commission.commission', $data);
    }

    public function update(Request $request){
        $request->validate([
            'reference' => 'required',
            'com_mo' => 'required',
            'com_ms' => 'required',
            'com_am' => 'required',
            'com_zm' => 'required',
            'com_rm' => 'required',
            'com_dsm' => 'required',
            'com_sm' => 'required',
            'com_exd' => 'required',
        ]);

        $commissions = Commission::all();
        $commissions[0]->update([
            'reference' => $request->input('reference'),
            'com_mo' => $request->input('com_mo'),
            'com_ms' => $request->input('com_ms'),
            'com_am' => $request->input('com_am'),
            'com_zm' => $request->input('com_zm'),
            'com_rm' => $request->input('com_rm'),
            'com_dsm' => $request->input('com_dsm'),
            'com_sm' => $request->input('com_sm'),
            'com_exd' => $request->input('com_exd'),
        ]);

        session()->flash('type', 'success');

        session()->flash('message', 'Update Successfully');

        return redirect()->back();

    }

    public function ex_update(Request $request){
        $request->validate([
            'ex_com_am' => 'required',
            'ex_com_zm' => 'required',
            'ex_com_rm' => 'required',
            'ex_com_dsm' => 'required',
            'ex_com_sm' => 'required',
            'ex_com_exd' => 'required',
        ]);


        $ex_commissions = Extra_Commission::all();
        $ex_commissions[0]->update([
            'ex_com_am' => $request->input('ex_com_am'),
            'ex_com_zm' => $request->input('ex_com_zm'),
            'ex_com_rm' => $request->input('ex_com_rm'),
            'ex_com_dsm' => $request->input('ex_com_dsm'),
            'ex_com_sm' => $request->input('ex_com_sm'),
            'ex_com_exd' => $request->input('ex_com_exd'),
        ]);

        session()->flash('type', 'success');

        session()->flash('ex_message', 'Update Successfully');

        return redirect()->back();
    }

    public function profit_club_update(Request $request){
        $request->validate([
            'pro_mo' => 'required',
            'pro_ms' => 'required',
            'pro_am' => 'required',
            'pro_zm' => 'required',
            'pro_rm' => 'required',
            'pro_dsm' => 'required',
            'pro_sm' => 'required',
            'pro_exd' => 'required',
        ]);


        $profit_club_commissions = Profit_club_Commissions::all();
        $profit_club_commissions[0]->update([
            'pro_mo' => $request->input('pro_mo'),
            'pro_ms' => $request->input('pro_ms'),
            'pro_am' => $request->input('pro_am'),
            'pro_zm' => $request->input('pro_zm'),
            'pro_rm' => $request->input('pro_rm'),
            'pro_dsm' => $request->input('pro_dsm'),
            'pro_sm' => $request->input('pro_sm'),
            'pro_exd' => $request->input('pro_exd'),
        ]);

        session()->flash('type', 'success');

        session()->flash('profit_message', 'Update Successfully');

        return redirect()->back();
    }
}
