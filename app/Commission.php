<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Commission extends Model
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
        'reference', 'com_mo', 'com_ms', 'com_am', 'com_zm', 'com_rm', 'com_dsm', 'com_sm', 'com_exd'
    ];
}
