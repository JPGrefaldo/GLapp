<?php

namespace App;

class ServiceReport extends Model
{
    public function transactionDetail()
    {
        return $this->belongsTo(TransactionFeeDetail::class,'transaction_fee_detail_id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function client()
    {
        return $this->belongsTo(TransactionFeeDetail::class,'transaction_fee_detail_id')->with('transaction');
    }
}
   
