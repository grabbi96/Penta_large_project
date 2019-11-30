<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profit_club_Commissions extends Model
{
    //

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pro_mo', 'pro_ms', 'pro_am', 'pro_zm', 'pro_rm', 'pro_dsm', 'pro_sm', 'pro_exd'
    ];
}
