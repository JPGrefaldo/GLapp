<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function contact(){
        return $this->hasMany('App\ContactInfo','profile_id','id');
    }


}
