<?php

namespace App\Http\Controllers;

use App\Models\Prouser;
use Illuminate\Http\Request;

class ProfitClubController extends Controller
{
    //

    public function index(){
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $profit_member = Prouser::where('profit_club_member', true)->get();
        $data = [];
        $data['users'] = $profit_member;
        return view('admin.users.profit_club_member', $data);
    }
    public function remove($id){
        // check authentication
        if(empty(session()->get('adminuser'))){
            return  redirect(route('admin.show_login'));
        }
        $profit_member = Prouser::find($id);
        $profit_member->profit_club_member = false;
        $profit_member->save();
        return redirect(route('admin.profit_club'));
    }
}
