<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'image',
    ];
    public function products()
    {
        return $this->belongsToMany('App\Company','id','name');
    }
}
