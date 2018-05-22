<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counsel extends Model
{
    public function address ()
    {
        return $this->hasOne('App\ContactInfo','counsel_id','id');
    }
}
