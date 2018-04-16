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
        $client_id = str_pad($id, 5, 0, STR_PAD_LEFT);
        return view('user.contract.create', compact('data','client_id'));
    }





}
