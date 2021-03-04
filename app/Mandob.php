<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mandob extends Model
{
    protected $fillable = [
        'name', 'phone', 'address' ,'section',
    ];
    
}
