<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class District extends Model
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
        'division_id', 'name', 'bn_name', 'lat', 'lon', 'website'
    ];

    public function upazilas(){
        return $this->hasMany('App\Upazila');
    }
}
