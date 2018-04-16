<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseCounsel extends Model
{
    public function counsel()
    {
        $this->belongsTo('App\Counsel','counsel_id','id');
    }
}
