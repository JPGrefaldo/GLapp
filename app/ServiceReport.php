<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceReport extends Model
{
    public function case(){
        return $this->belongsTo(CaseManagement::class,'case_management_id','id');
    }
    public function hasCase(){
        return $this->get()->case->has('case');
    }
    public function hasNoCase(){
        return $this->doesntHave('case')->get();
    }
}
