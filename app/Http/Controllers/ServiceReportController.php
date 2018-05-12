<?php

namespace App\Http\Controllers;

use App\Chargeable;
use App\TransactionFeeDetail;
use App\CaseManagement;
use App\ServiceReport;
use Illuminate\Http\Request;

class ServiceReportController extends Controller
{
    public function index(Request $request)
    {   
        switch ($request['request']){
            case 'case':
                return ['data' => CaseManagement::all()];
                break;
            case 'fee':
                return ['data' => CaseManagement::findOrFail($request['id'])->fees];
                break;
            case 'chargeable':
                return ['data' => TransactionFeeDetail::findOrFail($request['id'])->chargeables];
                break;
            default:
                return view('servicereport.index');
        }
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
    public function store(Chargeable $chargeable, Request $request)
    {
       $chargeable->name = $request->name;
       $chargeable->description = $request->description;
       $chargeable->amount = $request->amount;
       $chargeable->transaction_fee_detail_id = $request->transaction_fee_detail_id;
       $chargeable->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceReport  $serviceReport
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceReport $serviceReport,Request $request)
    {
        return view('servicereport.list', $this->store($serviceReport->transaction, new request(['request' => 'published'])));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceReport  $serviceReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceReport $serviceReport)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceReport  $serviceReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceReport $serviceReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceReport  $serviceReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceReport $serviceReport)
    {
        //
    }
    private function getCase($id)
    {
        try{
            return CaseManagement::findOrFail($id)->fees;
        }catch(Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => $e->getMessage()];
        }
    }
}
