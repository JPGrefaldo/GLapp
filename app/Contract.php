<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function client()
    {
        return $this->hasOne('App\Client','id','client_id');
    }

    public function transaction()
    {
        return $this->hasOne('App\Transaction','id','transaction_id');
    }
}
