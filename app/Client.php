<?php

namespace App;

class Client extends Model
{
    public function address(){
        return $this->hasMany('App\Address');
    }
    
    public function addClient($info){

        $this->create($info);

    }
}
