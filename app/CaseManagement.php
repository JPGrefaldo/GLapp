<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseManagement extends Model
{
    public function lead_counsel(){
        return $this->hasOne('App\Counsel','counsel_id','id');
    }

    public function counsel_list(){
        return $this->hasMany('App\CaseCounsel','counsel_id','id')->with('counsel');
    }
}
