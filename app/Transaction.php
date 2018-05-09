<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function client()
    {
        return $this->hasOne('App\Client','id','client_id')->with('bill');
    }

    public function contract()
    {
        return $this->hasOne('App\Contract','transaction_id','id');
    }

    public function fees()
    {
        return $this->hasMany('App\TransactionFeeDetail','transaction_id','id');
    }

    public function cases()
    {
        return $this->hasMany('App\CaseManagement','transaction_id','id')->with('fees')->with('counsel_list');
    }
    public function report()
    {
        return $this->hasOne(ServiceReport::class);
    }
    public function unPublished()
    {
        return $this->where('status','Ongoing')
                    ->doesntHave('report')
                    ->with(['client','cases','contract'])->get();
    }
    public function published()
    {
        return $this->where('status','Ongoing')
                    ->has('report')
                    ->with(['client','cases','contract','report'])->get();
    }
}
