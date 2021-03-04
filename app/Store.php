<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Store extends Authenticatable
{
    protected $guard = 'store';
    protected $fillable = [
        'name', 'section', 'address','email','password'
    ];

    public function Section(){
        return $this->belongsTo('App\Areas','section');
    }
}
