<?php

namespace App\Http\Controllers;

use App\CaseCounsel;
use App\CaseManagement;
use App\Counsel;
use App\TransactionFeeDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CaseManagementController extends Controller
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
     * @param  \App\CaseManagement  $caseManagement
     * @return \Illuminate\Http\Response
     */
    public function show(CaseManagement $caseManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaseManagement  $caseManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(CaseManagement $caseManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CaseManagement  $caseManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaseManagement $caseManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CaseManagement  $caseManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaseManagement $caseManagement)
    {
        //
    }

    public function createCase(Request $request)
    {
        $data = CaseManagement::where('transaction_id', $request->input('id'))
            ->where('temp',1)
            ->with('counsel_list')
            ->first();
        if(!$data){
            $data = new CaseManagement();
            $data->transaction_id = $request->input('id');
            $data->save();
            $data = CaseManagement::with('counsel_list')->find($data->id);
        }
        $data2 = Counsel::get();
        return response()->json(array($data, $data2));
    }

    public function addCoCounsel(Request $request)
    {
        $data = new CaseCounsel();
        $data->case_id = $request->input('case_id');
        $data->counsel_id = $request->input('id');
        if($data->save()){
            $data2 = CaseCounsel::where('case_id',$data->case_id)
                ->with('info')
                ->get();

            if($request->input('lead') != ''){
                $lead = CaseCounsel::where('case_id',$data->case_id)
                    ->where('lead',1)
                    ->first();
                if($lead){
                    $lead->counsel_id = $request->input('lead');
                }else{
                    $lead = new CaseCounsel();
                    $lead->case_id = $data->case_id;
                    $lead->counsel_id = $request->input('lead');
                    $lead->lead = 1;
                }
                $lead->save();
            }
            return response()->json($data2);
        }
    }

    public function removeCoCounsel(Request $request)
    {
        CaseCounsel::find($request->input('id'))->delete();
    }

    public function loadCounsel(Request $request)
    {
        $data = CaseCounsel::where('case_id',$request->input('id'))->with('info')->get();
        return response()->json($data);
    }

    public function actionCase(Request $request)
    {
        $data = CaseManagement::with('counsel_list')->find($request->input('id'));
        switch ($request->input('action')){
            case 'edit':
                $data2 = Counsel::get();
                return response()->json(array($data, $data2));
                break;
            case 'delete':
                $data->delete();
                break;
        }
    }

    public function storeCase(Request $request)
    {
        $data = CaseManagement::find($request->input('id'));
        $data->title = $request->input('title');
        $data->venue = $request->input('venue');
        $data->date = Carbon::parse($request->input('date'));
        $data->number = $request->input('number');
        $data->docket = $request->input('docket');
        $data->class = $request->input('case_class');
        $data->status = $request->input('status');
        $data->temp = 0;
        if($data->save()){
            if($request->input('lead') != ''){
                $lead = CaseCounsel::where('case_id',$data->id)
                    ->where('lead',1)
                    ->first();
                if($lead){
                    $lead->counsel_id = $request->input('lead');
                }else{
                    $lead = new CaseCounsel();
                    $lead->case_id = $data->id;
                    $lead->counsel_id = $request->input('lead');
                    $lead->lead = 1;
                }
                $lead->save();
            }
            return $data->id;
        }
    }

}
