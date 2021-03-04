<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'price', 'price_unit','mandob_date','mandob_stage',
         'quantity', 'quantity_unit', 'discount','complete_id','stage_id', 'order_id', 'date','waiting_status',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function mandob()
    {
        return $this->belongsTo('App\Mandob');
    }
}
