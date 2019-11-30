<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Income extends Model
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
        'cost_pid', 'income_pid', 'income_pid_rank', 'type', 'income_amount'
    ];
}
