<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'country_id',
        'first_name',
        'last_name',
        'birth_date'
    ];

    public function country() {
        
        return $this->belongsTo('App\Country');
    }
    public function bicycles() {

        return $this->hasMany('App\Bicycle');
    }

}
