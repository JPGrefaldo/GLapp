<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceReport extends Model
{
    public function transactionDetails()
    {
        return $this->belongsTo(TransactionFeeDetail::class,'trans_id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'trans_id');
    }
    public function case()
    {

    }
    public function client()
    {
        return $this->transaction->client;
    }
}
   
