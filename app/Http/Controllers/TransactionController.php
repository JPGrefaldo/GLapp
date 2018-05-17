<?php

namespace App\Http\Controllers;

use App\CaseManagement;
use App\Contract;
use App\Fee;
use App\Transaction;
use App\TransactionFeeDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function feeList()
    {
        $data = Fee::get();
        return response()->json($data);
    }

    public function caseFeeStore(Request $request)
    {
        $case = 0;
        if($request->input('action') === "add"){
            $data = new TransactionFeeDetail();
            $data->transaction_id = $request->input('transaction_id');
            $data->fee_id = $request->input('fee_id');
            $data->case_id = $request->input('case_id');
            $case = $request->input('case_id');
        }

        if($request->input('action') === "edit"){
            $data = TransactionFeeDetail::find($request->input('case_id'));
            $case = $data->case_id;
        }

        $data->charge_type = $request->input('charge_type');
        $data->free_page = $request->input('free_page');
        $data->charge_doc = $request->input('charge_doc');
        $data->rate_1 = $request->input('rate_1');
        $data->rate_2 = $request->input('rate_2');
        $data->rate = $request->input('rate');
        $data->consumable_time = $request->input('consumable_time');
        $data->excess_rate = $request->input('excess_rate');
        $data->amount = $request->input('amount');
        $data->cap_value = $request->input('cap_value');
        if($data->save()){
            $count = TransactionFeeDetail::where('case_id', $data->case_id)->count();
            $data = TransactionFeeDetail::with('fee')
                ->with('cases')
                ->find($data->id);
            return response()->json(array($data,$count,$case));
        }
    }

    public function tranFeeAction(Request $request)
    {
        $data = TransactionFeeDetail::with('fee')->find($request->input('id'));
        if($request->input('action') == 'delete'){
            $data->delete();
        }
        if($request->input('action') == 'edit'){
            return response()->json($data);
        }
    }













//    public function tranFeeStore(Request $request)
//    {
//        if($request->input('action') === "add"){
//            $data = new TransactionFeeDetail();
//            $data->transaction_id = $request->input('transaction_id');
//            $data->fee_id = $request->input('fee_id');
//            $data->case_id = $request->input('case_id');
//        }
//
//        if($request->input('action') === "edit"){
//            $data = TransactionFeeDetail::find($request->input('fee_id'));
//        }
//
//        $data->charge_type = $request->input('charge_type');
//        $data->free_page = $request->input('free_page');
//        $data->charge_doc = $request->input('charge_doc');
//        $data->rate_1 = $request->input('rate_1');
//        $data->rate_2 = $request->input('rate_2');
//        $data->rate = $request->input('rate');
//        $data->consumable_time = $request->input('consumable_time');
//        $data->excess_rate = $request->input('excess_rate');
//        $data->amount = $request->input('amount');
//        $data->cap_value = $request->input('cap_value');
//        if($data->save()){
//            return response()->json($data);
//        }
//    }
//
//    public function tranCost(Request $request)
//    {
//        $total = 0;
//
//        $datas = TransactionFeeDetail::where('transaction_id', $request->input('id'))->get();
//        foreach($datas as $data){
//            $total += $data->charge_doc;
//            $total += $data->rate_1;
//            $total += $data->rate_2;
//            $total += $data->rate;
//            $total += $data->consumable_time;
//            $total += $data->excess_rate;
//            $total += $data->amount;
//            $total += $data->cap_value;
//        }
//
//        return response()->json($total);
//    }

}
