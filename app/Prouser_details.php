<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prouser_details extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'user_pid', 'mobile', 'mobile_personal', 'mobile_ref', 'gender', 'blood_group', 'nid', 'address', 'division', 'district', 'upazila', 'religion', 'date_of_birth', 'father_name', 'mother_name', 'nominee_mame', 'nominee_relation', 'bank_name', 'bank_account', 'email', 'thumb_nail'
    ];
}
