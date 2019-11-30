<?php

namespace App\Http\Controllers;

use App\Models\Prouser;
use App\Prouser_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class PromemberLoginController extends Controller
{
    //

    public function showprologin(){
        return view('promember.login');
    }
    public function login(Request $request){
        $pid = $request->input('pid');
        $password = $request->input('password');
        $prouser = Prouser::where('pid', $pid)->first();

        if(empty($prouser->pid)){
            return redirect()->back()->withErrors('crediential dose not match');
        }

        if($password !== $prouser->password){
            return redirect()->back()->withErrors('crediential dose not match');
        }
        $request->session()->put('prouser', $prouser->pid);

        // user manager officer
        $prouser_placements_user = Prouser::where('placement_pid', $pid)->get();
        $count = count($prouser_placements_user);
        if ($count === 10){
             $prouser->rank = "M. O";
                 $prouser->rank_point = 10;
            $prouser->save();
        }

        //        user m s
        $prouser_placements_user_mo = Prouser::where('placement_pid', $pid)->where('rank', 'M. O')->get();
        $count_mo_user = count($prouser_placements_user_mo);
        if($count_mo_user >= 5){
            $prouser->rank = "M. S";
            $prouser->rank_point = 15;
            $prouser->save();
        }

        //        user A M
        $prouser_placements_user_ms = Prouser::where('placement_pid', $pid)->where('rank', 'M. S')->get();
        $count_ms_user = count($prouser_placements_user_ms);
        if($count_ms_user >= 5){
            $prouser->rank = "A. M";
            $prouser->rank_point = 20;
            $prouser->save();
        }

//        user Z M
        $prouser_placements_user_am = Prouser::where('placement_pid', $pid)->where('rank', 'A. M')->get();
        $count_am_user = count($prouser_placements_user_am);
        if($count_am_user >= 5){
            $prouser->rank = "Z. M";
            $prouser->rank_point = 25;
            $prouser->save();
        }

//        user R M
        $prouser_placements_user_zm = Prouser::where('placement_pid', $pid)->where('rank', 'Z. M')->get();
        $count_zm_user = count($prouser_placements_user_zm);
        if($count_zm_user >= 5){
            $prouser->rank = "R. M";
            $prouser->rank_point = 30;
            $prouser->save();
        }

        $prouser_placements_user_rm = Prouser::where('placement_pid', $pid)->where('rank', 'R. M')->get();
        $count_rm_user = count($prouser_placements_user_rm);
//        echo "ram = ".$count_rm_user;
        if($count_rm_user >= 5){
            $prouser->rank = "D. S. M";
            $prouser->rank_point = 35;
            $prouser->save();
        }

        $prouser_placements_user_dsm = Prouser::where('placement_pid', $pid)->where('rank', 'D. S. M')->get();
        $count_dsm_user = count($prouser_placements_user_dsm);
//        echo "dsm = ".$count_dsm_user;
        if($count_dsm_user >= 5){
            $prouser->rank = "S. M";
            $prouser->rank_point = 40;
            $prouser->save();
        }

        $prouser_placements_user_sm = Prouser::where('placement_pid', $pid)->where('rank', 'S. M')->get();
        $count_sm_user = count($prouser_placements_user_sm);
//        echo "dsm = ".$count_sm_user;
        if($count_sm_user >= 5){
            $prouser->rank = "EX - D";
            $prouser->rank_point = 50;
            $prouser->save();
        }
//        return;
//       dd($request->session()->get('prouser'));
        return redirect('/promember/home');

    }

    public function promember_home(){
        if(empty(session()->get('prouser'))){
          return  redirect(route('promember.login'));
        }
        $data = [];
        $pid = session()->get('prouser');
        $prouser_info = Prouser::where('pid', $pid)->first();
        $prouser_placement_users = Prouser::where('placement_pid', $prouser_info->pid)->get();
        $prouser_details = Prouser_details::where('user_pid', $pid)->first();
//        return $prouser_placement_users;
        $data['user_info'] = $prouser_info;
        $data['prouser_placement'] = $prouser_placement_users;
        $data['prouser_details'] = $prouser_details;
        return view('promember.home', $data);
//        dd(session()->get('prouser'));
    }

    public function logout(){
        session()->forget('prouser');
        return redirect(route('promember.login'));
    }


}
