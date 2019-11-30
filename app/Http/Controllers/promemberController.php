<?php

namespace App\Http\Controllers;

use App\Commission;
use App\Extra_Commission;
use App\Income;
use App\Models\Prouser;
use App\Profit_club_Commissions;
use App\Prouser_details;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PromemberController extends Controller
{
    public function index(){
        return view('promember.promemberindex');
    }


    public function proregister()
    {
        return view('promember.register');
    }
    public function register(Request $request)
    {

        $this->validation($request);

        $pid = $request->input('pid');
        $refference_pid = $request->input('refference_pid');
        $placement_pid = $request->input('placement_pid');
        $point_pid = $request->input('point_pid');
//        $pid = 2123315110;
//        $placement_pid = 2123315856;
//        user pid checking

        $user = User::where('pid', $pid)->first();


        if (empty($user->pid)){
            return redirect()->back()->withErrors('You are not member of penta marketing');
        }

//                user pid checking

        $point_user = User::where('pid', $point_pid)->first();

        if (empty($point_user->pid)){
            return redirect()->back()->withErrors('Point user not fount');
        }

        if ($point_user->shop_point < 100){
            return redirect()->back()->withErrors('Point user don\'t have enouph point');
        }




//        Prouser checking
        $prouser_check = Prouser::where('pid', $pid)->first();

        if (!empty($prouser_check->pid)){
            return redirect()->back()->withErrors('Pid Already taken');
        }


////  Reference pid checking

        $reference_user = Prouser::where('pid', $refference_pid)->first();


        if (empty($reference_user->pid)){
            return redirect()->back()->withErrors('Reference Not Found');
        }

        $placement_user = Prouser::where('pid', $placement_pid )->first();
        if (empty($placement_user->pid)){
            return redirect()->back()->withErrors('Placement Not Found');
        }



        $point_user->shop_point = $point_user->shop_point - 100;
        $point_user->save();
        Prouser_details::create([
            'user_pid' => $pid,
            'name' => $user->name,
            'mobile' => $user->mobile_number,
        ]);

        $commissions = Commission::all();
        $reference_user->reference_balance = $commissions[0]->reference + $reference_user->reference_balance;
        $reference_user->save();
        $this->get_total_balance($reference_user->pid);
        $this->income_record($pid, $reference_user->pid, $reference_user->rank, 'reference', $commissions[0]->reference);




      $sell_total_amount =   $this->commissiondistibution($placement_pid, $pid);

       $profit_amount =  $this->profit_club_distibute($pid);


       $grand_total_cost = $sell_total_amount['total_sell_cost'] + $sell_total_amount['total_ex_sell_cost'] + $profit_amount + $commissions[0]->reference;

        $this->create($request, $user, $grand_total_cost);

        $pro_users_lists = Prouser::all();
        foreach ($pro_users_lists as $pul){
            $this->rankCheck($pul->pid);
        }
        return redirect(route('promember.login'))->with('Status','You are Successfully registered');
    }
    protected function commissiondistibution($placement_pid, $pid){

        $placement_pid1 = Prouser::where('pid', $placement_pid)->first();
        $data = [$placement_pid1];

        $all_prousers = Prouser::all();
        $all_prousers_amount = count($all_prousers);
        for ($x = 0; $x <= $all_prousers_amount; $x++){
            if(!empty($data[$x]->placement_pid)){
                $data[$x+1] = Prouser::where('pid', $data[$x]->placement_pid)->first();
            }

        }

//

        $rank_user = [];
        $rank_point = 0;
        foreach ($data as $key => $d){
            if($rank_point <= $d['rank_point']){
                $rank_user[$key] = $d;
                $rank_point = $d['rank_point'];
            }

        }
//        return  $rank_user;


        $sell_cost = array();
        $ex_sell_cost = array();

        $r_c_users = array();
        $m_o_users = array();
        $m_s_users = array();
        $a_m_users = array();
        $z_m_users = array();
        $r_m_users = array();
        $d_s_m_users = array();
        $s_m_users = array();
        $ex_d_users = array();
        foreach ($rank_user as $ru){
            if($ru->rank === 'R. C'){
                array_push($r_c_users, $ru);
            }
            if($ru->rank === 'M. O'){
                array_push($m_o_users, $ru);
            }
            if($ru->rank === 'M. S'){
                array_push($m_s_users, $ru);
            }
            if($ru->rank === 'A. M'){
                array_push($a_m_users, $ru);
            }

            if($ru->rank === 'Z. M'){
                array_push($z_m_users, $ru);
            }
            if($ru->rank === 'R. M'){
                array_push($r_m_users, $ru);
            }
            if($ru->rank === 'D. S. M'){
                array_push($d_s_m_users, $ru);
            }
            if($ru->rank === 'S. M'){
                array_push($s_m_users, $ru);
            }
            if($ru->rank === 'EX - D'){
                array_push($ex_d_users, $ru);
            }
        }


        $commissions = Commission::all();
        if($commissions){
            $com_mo = $commissions[0]->com_mo;
            $com_ms = $commissions[0]->com_ms;
            $com_am = $commissions[0]->com_am;
            $com_zm = $commissions[0]->com_zm;
            $com_rm = $commissions[0]->com_rm;
            $com_dsm = $commissions[0]->com_dsm;
            $com_sm = $commissions[0]->com_sm;
            $com_exd = $commissions[0]->com_exd;
        }


        $ex_sell_commission = Extra_Commission::all();
        $ex_com_am = $ex_sell_commission[0]->ex_com_am;
        $ex_com_zm = $ex_sell_commission[0]->ex_com_zm;
        $ex_com_rm = $ex_sell_commission[0]->ex_com_rm;
        $ex_com_dsm = $ex_sell_commission[0]->ex_com_dsm;
        $ex_com_sm = $ex_sell_commission[0]->ex_com_sm;
        $ex_com_exd = $ex_sell_commission[0]->ex_com_exd;


        if(count($m_o_users) > 0){
            $percentange = ($com_mo / 100) * 2;
            if (!empty($m_o_users[0])) {
                $m_o_users[0]->sell_balance = $m_o_users[0]->sell_balance + $com_mo;
                array_push($sell_cost, $com_mo);
                $m_o_users[0]->save();
                $this->get_total_balance($m_o_users[0]->pid);

                $this->income_record($pid, $m_o_users[0]->pid, $m_o_users[0]->rank, 'sell', $com_mo);
            }
            if (!empty($m_o_users[1])) {
                $m_o_users[1]->sell_balance = $m_o_users[1]->sell_balance + $percentange;
                array_push($sell_cost, $percentange);
                $m_o_users[1]->save();
                $this->get_total_balance($m_o_users[1]->pid);

                $this->income_record($pid, $m_o_users[1]->pid, $m_o_users[1]->rank, 'sell', $percentange);
            }
        }

        if(count($m_s_users) > 0){
            $percentange = ($com_ms / 100) * 2;
            if (!empty($m_s_users[0])){
                $m_s_users[0]->sell_balance = $m_s_users[0]->sell_balance + $com_ms;
                array_push($sell_cost, $com_ms);
                $m_s_users[0]->save();
                $this->get_total_balance($m_s_users[0]->pid);

                $this->income_record($pid, $m_s_users[0]->pid, $m_s_users[0]->rank, 'sell', $com_ms);
            }
            if (!empty($m_s_users[1])) {
                $m_s_users[1]->sell_balance = $m_s_users[1]->sell_balance + $percentange;
                array_push($sell_cost, $percentange);
                $m_s_users[1]->save();
                $this->get_total_balance($m_s_users[1]->pid);

                $this->income_record($pid, $m_s_users[1]->pid, $m_s_users[1]->rank, 'sell', $percentange);
            }
        }

        if(count($a_m_users) > 0){
            $percentange = ($com_am / 100) * 2;
            if (!empty($a_m_users[0])){
                $a_m_users[0]->sell_balance = $a_m_users[0]->sell_balance + $com_am;
                $a_m_users[0]->extra_sell_balance = $a_m_users[0]->extra_sell_balance + $ex_com_am;
                array_push($sell_cost, $com_am);
                array_push($ex_sell_cost, $ex_com_am);
                $a_m_users[0]->save();
                $this->get_total_balance($a_m_users[0]->pid);

                $this->income_record($pid, $a_m_users[0]->pid, $a_m_users[0]->rank, 'sell', $com_am);
                $this->income_record($pid, $a_m_users[0]->pid, $a_m_users[0]->rank, 'ex_sell', $ex_com_am);
            }
            if (!empty($a_m_users[1])) {
                $a_m_users[1]->sell_balance = $a_m_users[1]->sell_balance + $percentange;
                array_push($sell_cost, $percentange);
                $a_m_users[1]->save();
                $this->get_total_balance($a_m_users[1]->pid);

                $this->income_record($pid, $a_m_users[1]->pid, $a_m_users[1]->rank, 'sell', $percentange);
            }
        }

        if(count($z_m_users) > 0){
            $percentange = ($com_zm / 100) * 2;
            if (!empty($z_m_users[0])){
                $z_m_users[0]->sell_balance = $z_m_users[0]->sell_balance + $com_zm;
                $z_m_users[0]->extra_sell_balance = $z_m_users[0]->extra_sell_balance + $ex_com_zm;
                array_push($sell_cost, $com_zm);
                array_push($ex_sell_cost, $ex_com_zm);
                $z_m_users[0]->save();
                $this->get_total_balance($z_m_users[0]->pid);

                $this->income_record($pid, $z_m_users[0]->pid, $z_m_users[0]->rank, 'sell', $com_zm);
                $this->income_record($pid, $z_m_users[0]->pid, $z_m_users[0]->rank, 'ex_sell', $ex_com_zm);

            }
            if (!empty($z_m_users[1])) {
                $z_m_users[1]->sell_balance = $z_m_users[1]->sell_balance + $percentange;
                array_push($sell_cost, $percentange);
                $z_m_users[1]->save();
                $this->get_total_balance($z_m_users[1]->pid);

                $this->income_record($pid, $z_m_users[1]->pid, $z_m_users[1]->rank, 'sell', $percentange);
            }
        }

        if(count($r_m_users) > 0){
            $percentange = ($com_rm / 100) * 2;
            if (!empty($r_m_users[0])){
                $r_m_users[0]->sell_balance = $r_m_users[0]->sell_balance + $com_rm;
                $r_m_users[0]->extra_sell_balance = $r_m_users[0]->extra_sell_balance + $ex_com_rm;
                array_push($sell_cost, $com_rm);
                array_push($ex_sell_cost, $ex_com_rm);
                $r_m_users[0]->save();
                $this->get_total_balance($r_m_users[0]->pid);

                $this->income_record($pid, $r_m_users[0]->pid, $r_m_users[0]->rank, 'sell', $com_rm);
                $this->income_record($pid, $r_m_users[0]->pid, $r_m_users[0]->rank, 'ex_sell', $ex_com_rm);
            }
            if (!empty($r_m_users[1])) {
                $r_m_users[1]->sell_balance = $r_m_users[1]->sell_balance + $percentange;
                array_push($sell_cost, $percentange);
                $r_m_users[1]->save();
                $this->get_total_balance($r_m_users[1]->pid);

                $this->income_record($pid, $r_m_users[1]->pid, $r_m_users[1]->rank, 'sell', $percentange);
            }
        }


        if(count($d_s_m_users) > 0){
            $percentange = ($com_dsm / 100) * 2;
            if (!empty($d_s_m_users[0])){
                $d_s_m_users[0]->sell_balance = $d_s_m_users[0]->sell_balance + $com_dsm;
                $d_s_m_users[0]->extra_sell_balance = $d_s_m_users[0]->extra_sell_balance + $ex_com_dsm;
                array_push($sell_cost, $com_dsm);
                array_push($ex_sell_cost, $ex_com_dsm);
                $d_s_m_users[0]->save();
                $this->get_total_balance($d_s_m_users[0]->pid);

                $this->income_record($pid, $d_s_m_users[0]->pid, $d_s_m_users[0]->rank, 'sell', $com_dsm);
                $this->income_record($pid, $d_s_m_users[0]->pid, $d_s_m_users[0]->rank, 'ex_sell', $ex_com_dsm);

            }
            if (!empty($d_s_m_users[1])) {
                $d_s_m_users[1]->sell_balance = $d_s_m_users[1]->sell_balance + $percentange;
                array_push($sell_cost, $percentange);
                $d_s_m_users[1]->save();
                $this->get_total_balance($d_s_m_users[1]->pid);

                $this->income_record($pid, $d_s_m_users[1]->pid, $d_s_m_users[1]->rank, 'sell', $percentange);
            }
        }

        if(count($s_m_users) > 0){
            foreach ($s_m_users as $s_m_user){
                $s_m_user->sell_balance = $s_m_user->sell_balance + $com_sm;
                $s_m_user->extra_sell_balance = $s_m_user->extra_sell_balance + $ex_com_sm;
                array_push($sell_cost, $com_sm);
                array_push($ex_sell_cost, $ex_com_sm);
                $s_m_user->save();
                $this->get_total_balance($s_m_user->pid);

                $this->income_record($pid, $s_m_user->pid, $s_m_user->rank, 'sell', $com_sm);
                $this->income_record($pid, $s_m_user->pid, $s_m_user->rank, 'ex_sell', $ex_com_sm);
            }
        }

        if(count($ex_d_users) > 0){
            foreach ($ex_d_users as $ex_d_user){
                $ex_d_user->sell_balance = $ex_d_user->sell_balance + $com_exd;
                $ex_d_user->extra_sell_balance = $ex_d_user->extra_sell_balance + $ex_com_exd;
                array_push($sell_cost, $com_exd);
                array_push($ex_sell_cost, $ex_com_exd);
                $ex_d_user->save();
                $this->get_total_balance($ex_d_user->pid);

                $this->income_record($pid, $ex_d_user->pid, $ex_d_user->rank, 'sell', $com_exd);
                $this->income_record($pid, $ex_d_user->pid, $ex_d_user->rank, 'ex_sell', $ex_com_exd);
            }
        }
        $total_sell_cost = 0;
        $total_ex_sell_cost = 0;
        foreach ($sell_cost as $sc){
            $total_sell_cost += $sc;
        }
        foreach ($ex_sell_cost as $esc){
            $total_ex_sell_cost += $esc;
        }
        $total_cost = [];
        $total_cost['total_sell_cost'] = $total_sell_cost;
        $total_cost['total_ex_sell_cost'] = $total_ex_sell_cost;
        return $total_cost;
    }

    protected function profit_club_distibute($pid){
        $amount = 100;
        $profit_club_commissions = Profit_club_Commissions::all();
        $mo_amount = ($amount / 100) * $profit_club_commissions[0]->pro_mo ;
        $ms_amount = ($amount / 100) * $profit_club_commissions[0]->pro_ms;
        $am_amount = ($amount / 100) * $profit_club_commissions[0]->pro_am;
        $zm_amount = ($amount / 100) * $profit_club_commissions[0]->pro_zm;
        $rm_amount = ($amount / 100) * $profit_club_commissions[0]->pro_rm;
        $dsm_amount = ($amount / 100) * $profit_club_commissions[0]->pro_dsm;
        $sm_amount = ($amount / 100) * $profit_club_commissions[0]->pro_sm;
        $exd_amount = ($amount / 100) * $profit_club_commissions[0]->pro_exd;


        $proft_club_members = Prouser::where('profit_club_member', true)->get();



        $r_c_users = array();
        $m_o_users = array();
        $m_s_users = array();
        $a_m_users = array();
        $z_m_users = array();
        $r_m_users = array();
        $d_s_m_users = array();
        $s_m_users = array();
        $ex_d_users = array();
        foreach ($proft_club_members as $ru){
            if($ru->rank === 'R. C'){
                array_push($r_c_users, $ru);
            }
            if($ru->rank === 'M. O'){
                array_push($m_o_users, $ru);
            }
            if($ru->rank === 'M. S'){
                array_push($m_s_users, $ru);
            }
            if($ru->rank === 'A. M'){
                array_push($a_m_users, $ru);
            }

            if($ru->rank === 'Z. M'){
                array_push($z_m_users, $ru);
            }
            if($ru->rank === 'R. M'){
                array_push($r_m_users, $ru);
            }
            if($ru->rank === 'D. S. M'){
                array_push($d_s_m_users, $ru);
            }
            if($ru->rank === 'S. M'){
                array_push($s_m_users, $ru);
            }
            if($ru->rank === 'EX - D'){
                array_push($ex_d_users, $ru);
            }
        }
        if(count($m_o_users) > 0){
            $mo_user_count = $mo_amount / count($m_o_users);
        }
        if(count($m_s_users) > 0){
            $ms_user_count = $ms_amount / count($m_s_users);
        }
        if(count($a_m_users) > 0){
            $am_user_count = $am_amount / count($a_m_users);
        }
        if(count($z_m_users) > 0){
            $zm_user_count = $zm_amount / count($z_m_users);
        }
        if(count($r_m_users) > 0){
            $rm_user_count = $rm_amount / count($r_m_users);
        }
        if(count($d_s_m_users) > 0){
            $dsm_user_count = $dsm_amount / count($d_s_m_users);
        }
        if(count($s_m_users) > 0){
            $sm_user_count = $sm_amount / count($s_m_users);
        }
        if(count($ex_d_users) > 0){
            $exd_user_count = $exd_amount / count($ex_d_users);
        }





        $profit_cost = array();





        if(count($m_o_users) > 0){
            array_push($profit_cost, $mo_amount);
            $this->income_record($pid, "M. O Group", "Group", 'group_profit', $mo_amount);
            foreach ($m_o_users as $m_o_user){
                $m_o_user->profit_club_balance = $m_o_user->profit_club_balance + $mo_user_count;
                $m_o_user->save();
                $this->get_total_balance($m_o_user->pid);
                $this->income_record($pid, $m_o_user->pid, $m_o_user->rank, 'profit', $mo_user_count);
            }
        }
        if(count($m_s_users) > 0){
            array_push($profit_cost, $ms_amount);
            $this->income_record($pid, "M. S Group", "Group", 'group_profit', $ms_amount);
            foreach ($m_s_users as $m_s_user){
                $m_s_user->profit_club_balance = $m_s_user->profit_club_balance + $ms_user_count;
                $m_s_user->save();
                $this->get_total_balance($m_s_user->pid);
                $this->income_record($pid, $m_s_user->pid, $m_s_user->rank, 'profit', $ms_user_count);
            }
        }

        if(count($a_m_users) > 0){
            array_push($profit_cost, $am_amount);
            $this->income_record($pid, "A. M Group", "Group", 'group_profit', $am_amount);
            foreach ($a_m_users as $a_m_user){
                $a_m_user->profit_club_balance = $a_m_user->profit_club_balance + $am_user_count;
                $a_m_user->save();
                $this->get_total_balance($a_m_user->pid);
                $this->income_record($pid, $a_m_user->pid, $a_m_user->rank, 'profit', $am_user_count);
            }
        }
        if(count($z_m_users) > 0){
            array_push($profit_cost, $zm_amount);
            $this->income_record($pid, "Z. M Group", "Group", 'group_profit', $zm_amount);
            foreach ($z_m_users as $z_m_user){
                $z_m_user->profit_club_balance = $z_m_user->profit_club_balance + $zm_user_count;
                $z_m_user->save();
                $this->get_total_balance($z_m_user->pid);
                $this->income_record($pid, $z_m_user->pid, $z_m_user->rank, 'profit', $zm_user_count);
            }
        }
        if(count($r_m_users) > 0){
            array_push($profit_cost, $rm_amount);
            $this->income_record($pid, "R. M Group", "Group", 'group_profit', $rm_amount);
            foreach ($r_m_users as $r_m_user){
                $r_m_user->profit_club_balance = $r_m_user->profit_club_balance + $rm_user_count;
                $r_m_user->save();
                $this->get_total_balance($r_m_user->pid);
                $this->income_record($pid, $r_m_user->pid, $r_m_user->rank, 'profit', $rm_user_count);
            }
        }
        if(count($d_s_m_users) > 0){
            array_push($profit_cost, $dsm_amount);
            $this->income_record($pid, "D. S. M Group", "Group", 'group_profit', $dsm_amount);
            foreach ($d_s_m_users as $d_s_m_user){
                $d_s_m_user->profit_club_balance = $d_s_m_user->profit_club_balance + $dsm_user_count;
                $d_s_m_user->save();
                $this->get_total_balance($d_s_m_user->pid);
                $this->income_record($pid, $d_s_m_user->pid, $d_s_m_user->rank, 'profit', $dsm_user_count);
            }
        }
        if(count($s_m_users) > 0){
            array_push($profit_cost, $sm_amount);
            $this->income_record($pid, "S. M Group", "Group", 'group_profit', $sm_amount);
            foreach ($s_m_users as $s_m_user){
                $s_m_user->profit_club_balance = $s_m_user->profit_club_balance + $sm_user_count;
                $s_m_user->save();
                $this->get_total_balance($s_m_user->pid);
                $this->income_record($pid, $s_m_user->pid, $s_m_user->rank, 'profit', $sm_user_count);
            }
        }
        if(count($ex_d_users) > 0){
            array_push($profit_cost, $exd_amount);
            $this->income_record($pid, "EX - D", "Group", 'group_profit', $exd_amount);
            foreach ($ex_d_users as $ex_d_user){
                $ex_d_user->profit_club_balance = $ex_d_user->profit_club_balance + $exd_user_count;
                $ex_d_user->save();
                $this->get_total_balance($ex_d_user->pid);
                $this->income_record($pid, $ex_d_user->pid, $ex_d_user->rank, 'profit', $exd_user_count);
            }
        }

        $total_profit_cost = 0;
        foreach ($profit_cost as $pc){
            $total_profit_cost += $pc;
        }

        return $total_profit_cost;


    }
    public function get_total_balance($pid){
        $update_balance_user = Prouser::where('pid', $pid)->first();

        $update_balance_user->total_balance = $update_balance_user->sell_balance + $update_balance_user->reference_balance + $update_balance_user->profit_club_balance;
        $update_balance_user->save();

    }
    public function validation($request)
    {
        return $this->validate($request, [
            'pid' => 'required|max:255',
            'point_pid' => 'required|max:255',
            'refference_pid' => 'required|max:255',
            'placement_pid' => 'required|max:255',
            'password' => 'required|confirmed|max:255',
        ]);
    }
    public function income_record($cost_pid, $income_pid, $income_pid_rank, $type, $income_amount){
        Income::create([
            'cost_pid' => $cost_pid,
            'income_pid' => $income_pid,
            'income_pid_rank' => $income_pid_rank,
            'type' => $type,
            'income_amount' => $income_amount,
        ]);
    }
    protected function create($data, $user, $cost)
    {
        return Prouser::create([
            'pid' => $data['pid'],
            'name' => $user->name,
            'refference_pid' => $data['refference_pid'],
            'placement_pid' => $data['placement_pid'],
            'phone_number' => $user->mobile_number,
            'password' => $data['password'],
            'rank' => 'R. C',
            'sell_balance' => 0,
            'reference_balance' => 0,
            'profit_club_balance' => 0,
            'extra_sell_balance' => 0,
            'total_balance' => 0,
            'rank_point' => 5,
            'profit_club_member' => false,
            'cost' => $cost
        ]);
    }
    protected function rankCheck($pid) {
        $prouser = Prouser::where('pid', $pid)->first();
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
    }

}
