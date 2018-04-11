<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function address(){
        return $this->hasMany('App\Address');
    }
}
