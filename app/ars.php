<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ars extends Model
{
    public function ads()
    {
        return $this->hasMany('App\ArsAd','ars_id','id');
    }

}
