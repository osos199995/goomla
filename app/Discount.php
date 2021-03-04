<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'from_price' , 'to_price' ,'discount',
   ];

   public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
