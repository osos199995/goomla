<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'image',
        'package_id',
   ];


    public function package()
    {
        return $this->belongsTo('App\Package');
    }
}
