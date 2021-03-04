<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'company_id', 'subcategory_id','price', 'price_unit', 'discount',
        'quantity', 'unit_type', 'quantity_unit', 'description', 'image','quantity_status',
        'max_quantity' ,'subunit_type', 'store_id', 'status', 'waiting_status','package_id'
    ];
}
