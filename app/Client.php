<?php

namespace App;

class Client extends Model
{
    public function business(){
        return $this->hasMany(ClientBusiness::class);
    }
    
    public function addClient($info){
        return $this->updateOrCreate([ 'id' => $info['id'] ],$info);
    }

    public function addBusiness($address){
        return ClientBusiness::updateOrCreate([ 'id' => $address['id'] ],$address);
    }

    public function zapBusiness($id){
        return ClientBusiness::destroy($id);
    }
}


