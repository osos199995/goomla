<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'user_id', 'comment', 'type',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
