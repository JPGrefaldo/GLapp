<?php

namespace App;

class Business extends Model
{
    public function client(){
        return $this->belongsTo('App\Client','business');
    }
}
