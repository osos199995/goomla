<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function companys()
    {
        return $this->belongsToMany('App\Company');
    }
    public function hasCompany($companyId)
    {
        // return $this->companys->pluck('id')->toArray();
        return in_array($companyId, $this->companys->pluck('id')->toArray());
    }
}
