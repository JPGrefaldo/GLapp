<?php

namespace App\Http\Controllers;

use App\CaseManagement;
use App\Counsel;
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
            $data = CaseManagement::find($data->id);
        }
        $data2 = Counsel::get();
        return response()->json(array($data, $data2));
    }

}
