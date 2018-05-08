<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceReport extends Model
{
    public function transactionDetail()
    {
        return $this->belongsTo(TransactionFeeDetail::class,'transaction_id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class,'App\Transaction.client_id');
    }
}
   
