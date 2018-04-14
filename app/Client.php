<?php

namespace App;

class Client extends Model
{
    public function address(){
        return $this->hasMany(Address::class);
    }
    
    public function addClient($info){

        return $this->updateOrCreate([ 'id' => $info['id'] ],$info)->id;
       
    }

    public function addAddress($address){

        Address::updateOrCreate([
                'client_id'=>$address['client_id'],
                'address'=>$address['address']],$address);
    }
}

