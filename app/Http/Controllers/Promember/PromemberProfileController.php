<?php

namespace App\Http\Controllers\Promember;

use App\BloodGroup;
use App\District;
use App\Division;
use App\Income;
use App\Models\Prouser;
use App\Prouser_details;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromemberProfileController extends Controller
{
    //

    public function profile_edit(){
        if(empty(session()->get('prouser'))){
            return  redirect(route('promember.login'));
        }
        $data = [];
        $pid = session()->get('prouser');


        $prouser_info = Prouser::where('pid', $pid)->first();
        $prouser_details = Prouser_details::where('user_pid', $pid)->first();
        $divitions = Division::all();
        $blood = BloodGroup::all();
        $data['user_info'] = $prouser_info;
        $data['prouser_details'] = $prouser_details;
        $data['divitions'] = $divitions;
        $data['blood'] = $blood;

//        echo $pid;
        return view('promember.profile_update', $data);
    }

    public function profile_update(Request $request){
        if(empty(session()->get('prouser'))){
            return  redirect(route('promember.login'));
        }
        $pid = session()->get('prouser');


        $prouser_details = Prouser_details::where('user_pid', $pid)->first();
        if($request->hasFile('photo')){
            if(!empty($prouser_details->thumb_nail)){

                unlink(public_path().'/uploads/images/'. $prouser_details->thumb_nail);
            }
            $photo = $request->file('photo');
            $file_name = uniqid('photo_user_', true).str_random(10).'.'.$photo->getClientOriginalExtension();
            if ($photo->isValid()){
                $photo->storeAs('images', $file_name);
            }
            $prouser_details->update([
                'thumb_nail' => $file_name,
            ]);
        }

        $prouser_details->update([
            'mobile_personal' => $request->input('mobile_personal'),
            'mobile_ref'  => $request->input('mobile_ref'),
            'gender'  => $request->input('gender'),
            'blood_group'  => $request->input('blood_group'),
            'nid'  => $request->input('nid'),
            'address'  => $request->input('address'),
            'religion'  => $request->input('religion'),
            'date_of_birth'  => $request->input('date_of_birth'),
            'father_name'  => $request->input('father_name'),
            'mother_name'  => $request->input('mother_name'),
            'nominee_mame'  => $request->input('nominee_mame'),
            'nominee_relation'  => $request->input('nominee_relation'),
            'bank_name'  => $request->input('bank_name'),
            'bank_account'  => $request->input('bank_account'),
            'email'  => $request->input('email'),
            'division'  => $request->input('division'),
            'district'  => $request->input('district'),
            'upazila'  => $request->input('upazila'),
        ]);
        return redirect(route('promember.home'));

    }

    public function divition(Request $request){
//        return "dfgdsfgdfgfdg";
        $divition = Division::where('name', $request->input('divition'))->first();
        if(empty($divition->id)){
            return response()->json(['error' => 'Drsitrict Not found']);
        }
        return response()->json(['districts' => $divition->districts]);
    }
    public function district(Request $request){
        $district = District::where('name', $request->input('district'))->first();
        if(empty($district->id)){
            return response()->json(['error' => 'Drsitrict Not found']);
        }
        return response()->json(['upazilas' => $district->upazilas]);
    }

    public  function profile_incomes(){
        if(empty(session()->get('prouser'))){
            return  redirect(route('promember.login'));
        }
        $id = session()->get('prouser');
        $costs_sells = Income::where('income_pid', $id)->where('type', 'sell')->get();
        $costs_ex_sells = Income::where('income_pid', $id)->where('type', 'ex_sell')->get();
        $costs_reference= Income::where('income_pid', $id)->where('type', 'reference')->get();
        $costs_profit_group = Income::where('income_pid', $id)->where('type', 'profit')->get();

        $data = [];
        $data['costs_sells'] = $costs_sells;
        $data['costs_ex_sells'] = $costs_ex_sells;
        $data['costs_reference'] = $costs_reference;
        $data['costs_profit_group'] = $costs_profit_group;


        return view('promember.income_history', $data);
    }
}
