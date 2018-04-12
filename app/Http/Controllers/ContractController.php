<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contract;
use App\Fee;
use App\Transaction;
use App\TransactionDetail;
use App\TransactionFeeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.contract.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fees = Fee::get();
        return view('user.contract.create', compact('fees'));
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
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }

    public function createClientContract($id)
    {
        $data = Transaction::where('user_id', Auth::user()->id)
            ->where('client_id', $id)
            ->where('status','pending')
            ->with('client')
            ->first();
        if(!$data){
            $data = new Transaction();
            $data->user_id = Auth::user()->id;
            $data->client_id = $id;
            $data->save();
            $data = Transaction::with('client')->find($data->id);
        }

//        transaction coount
//        $count = Transaction::where('status','!=','pending')->count();
//        $count += 1;
//        $count = str_pad($count, 5, 0, STR_PAD_LEFT);

//        client id
        $client_id = str_pad($id, 5, 0, STR_PAD_LEFT);

        $fees = Fee::get();
        return view('user.contract.create', compact('data','fees','client_id'));
    }

    public function transactionFeeDetailStore(Request $request)
    {
        $data = new TransactionFeeDetail();
        $data->transaction_id = $request->input('transaction_id');
        $data->fee_id = $request->input('fee_id');
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
            return response()->json($data);
        }
    }

    public function transactionFeeDetailGet(Request $request)
    {
        $data = TransactionFeeDetail::where('transaction_id', $request->input('id'))
            ->with('fee')
            ->get();
        return response()->json($data);
    }

    public function transactionFeeDetailRemove(Request $request)
    {
        TransactionFeeDetail::find($request->input('id'))->delete();
    }





}
