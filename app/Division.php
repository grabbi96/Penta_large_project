<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Division extends Model
{
    //

    //
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'bn_name',
    ];


    public function districts(){
        return $this->hasMany('App\District');
    }
}
