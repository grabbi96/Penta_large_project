<?php

namespace App\Http\Controllers;

use App\Income;
use App\Models\Prouser;
use App\User;
use Illuminate\Http\Request;

class ProuserCheckController extends Controller
{
    //

    public function index(Request $request){
      $user =  User::where('pid', $request->input('user_pid'))->first();

        if(empty($user->pid)){
            return response()->json(['error' => 'User Not Fount']);
        }

        return response()->json(['user' => $user]);


    }

    public function point_user(Request $request){
        $user =  User::where('pid', $request->input('user_pid'))->first();

        if(empty($user->pid)){
            return response()->json(['error' => 'User Not Fount']);
        }

        return response()->json(['user' => $user]);


    }

    public function reference_user(Request $request){
        $user =  Prouser::where('pid', $request->input('user_pid'))->first();

        if(empty($user->pid)){
            return response()->json(['error' => 'User Not Fount']);
        }

        return response()->json(['user' => $user]);


    }
    public function placement_user(Request $request){
        $user =  Prouser::where('pid', $request->input('user_pid'))->first();

        if(empty($user->pid)){
            return response()->json(['error' => 'User Not Fount']);
        }

        return response()->json(['user' => $user]);


    }

    public function get_placement_users(Request $request){
        $user =  Prouser::where('placement_pid', $request->input('placement_pid'))->get();
        if(empty($user[0]->pid)){
            return response()->json(['error' => 'User Not Fount']);
        }
        return response()->json(['user' => $user]);
    }

    public function balance_close(){
        $users = Prouser::all();
       foreach ($users as $user){
           $user->sell_balance = 0;
           $user->reference_balance = 0;
           $user->profit_club_balance = 0;
           $user->extra_sell_balance = 0;
           $user->total_balance = 0;
           $user->save();
       }
       return redirect()->back();
    }

    public function clear_history(){
        $incomes = Income::all();

        foreach ($incomes as $in){
            $in->delete();
    }
        return redirect()->back();
    }
}
