<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Prouser extends Model
{
    //

    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pid', 'refference_pid', 'placement_pid', 'phone_number', 'password', 'rank', 'balance', 'rank_point', 'profit_club_member', 'name', 'cost'
    ];

    public function user_details(){
        return $this->hasOne('App\Prouser_details');
    }
}
