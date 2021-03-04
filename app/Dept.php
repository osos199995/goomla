<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    protected $fillable = [
        'user_id', 'order_id', 'total' ,'paid' ,'date' ,'discount',
    ];
    
}
