<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Extra_Commission extends Model
{


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ex_com_am', 'ex_com_zm', 'ex_com_rm', 'ex_com_dsm', 'ex_com_sm', 'ex_com_exd'
    ];
}
