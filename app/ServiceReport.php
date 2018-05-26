<?php

namespace App;

class ServiceReport extends Model
{
    public function transactionDetail()
    {
        return $this->belongsTo(TransactionFeeDetail::class,'transaction_fee_detail_id');
    }

    public function feeDetail(){
        return $this->belongsTo('App\TransactionFeeDetail','transaction_fee_detail_id','id')
            ->with('fee')
            ->with('cases')
            ->with('chargeables')
            ->with('transaction');
    }

    public function transaction(){

    }
}
   
