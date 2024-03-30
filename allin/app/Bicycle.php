<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bicycle extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'person_id',
        'brand',
        'model',
        'color',
        'price',
        'image'

    ];
    public function person(){

        return $this->belongsTo('App\Person');
    }

}
