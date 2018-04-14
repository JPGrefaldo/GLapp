<?php

namespace App;

class Address extends Model
{
    public function client(){
        return $this->belongsTo('App\Client','address');
    }

}
