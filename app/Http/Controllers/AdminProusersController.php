<?php

namespace App\Http\Controllers;

use App\Income;
use App\Models\Prouser;
use App\Prouser_details;
use App\User;
use Illuminate\Http\Request;

class AdminProusersController extends Controller
{
    //

    public function index(){
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $data =[];
        $data['prousers'] = Prouser::all();
        return view('admin.users.admin_prouser', $data);
    }

    public function show($id){
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $pro_user = Prouser::find($id);
        $details = Prouser_details::where('user_pid', $pro_user->pid)->first();
        $data = [];
        $data['main'] =  $pro_user;
        $data['details'] =$details;

//        echo $pro_user;
    return view('admin.users.prouser_details', $data);

    }

    public function add_to_profit($id){
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $pro_user = Prouser::find($id);
        $pro_user->profit_club_member = true;
        $pro_user->save();
    return redirect()->back();
    }
    public function edit($id){
        $pro_user = Prouser::find($id);
        $data = [];
        $data['main'] =  $pro_user;
//        return $data;
      return  view('admin.users.prouser_edit', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'pid' => 'required',
            'refference_pid' => 'required',
            'placement_pid' => 'required',
            'rank' => 'required',
            'rank_point' => 'required',
        ]);
        $pro_user = Prouser::find($id);
        $pro_user->update([
            'pid' => trim($request->input('pid')),
            'refference_pid' => trim($request->input('refference_pid')),
            'placement_pid' => trim($request->input('placement_pid')),
            'rank' => trim($request->input('rank')),
            'rank_point' => trim($request->input('rank_point')),
        ]);

        return redirect()->back();
    }

    public function cost_amount($id){
        $costs_sells = Income::where('cost_pid', $id)->where('type', 'sell')->get();
        $costs_ex_sells = Income::where('cost_pid', $id)->where('type', 'ex_sell')->get();
        $costs_reference= Income::where('cost_pid', $id)->where('type', 'reference')->get();
        $costs_profit_group = Income::where('cost_pid', $id)->where('type', 'group_profit')->get();

        $data = [];
        $data['costs_sells'] = $costs_sells;
        $data['costs_ex_sells'] = $costs_ex_sells;
        $data['costs_reference'] = $costs_reference;
        $data['costs_profit_group'] = $costs_profit_group;
        return view('admin.users.admin_prouser_cost_details', $data);
    }
}
