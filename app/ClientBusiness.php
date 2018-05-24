<?php

namespace App;

class ClientBusiness extends Model
{
    public function client(){
        return $this->belongsTo('App\Client','business');
    }
}
