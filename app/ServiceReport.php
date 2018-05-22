<?php

namespace App;

class ServiceReport extends Model
{
    public function transactionDetail()
    {
        return $this->belongsTo(TransactionFeeDetail::class,'transaction_fee_detail_id');
    }
}
   
