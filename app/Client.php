<?php

namespace App;

class Client extends Model
{
    public function business(){
        return $this->hasMany(Business::class);
    }
    
    public function addBusiness($address){
        return Business::create($address);
    }
    
    public function contract(){
        return $this->hasMany(Contract::class);
    }
    public function cases(){
        return $this->hasManyThrough(CaseManagement::class,Transaction::class);
    }

    public function bill()
    {
        return $this->hasOne('App\Business', 'id','billing');
    }

    public function serviceReport(){
        return $this->hasManyThrough(ServiceReport::class,Transaction::class);
    }

}