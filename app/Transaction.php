<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function client()
    {
        return $this->hasOne('App\Client','id','client_id');
    }
    public function contract()
    {
        return $this->hasOne('App\Contract','transaction_id','id');
    }

    public function fees()
    {
        return $this->hasMany('App\TransactionFeeDetail','transaction_id','id');
    }
}
