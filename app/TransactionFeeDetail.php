<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionFeeDetail extends Model
{
    public function fee()
    {
        return $this->belongsTo('App\Fee','fee_id','id');
    }

    public function cases()
    {
        return $this->belongsTo('App\CaseManagement','case_id','id');
    }
}
