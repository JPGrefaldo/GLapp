<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function contact(){
        return $this->hasMany(ContactInfo::class);
    }
}
