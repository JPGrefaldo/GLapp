<?php

namespace App\Http\Controllers;

use App\ServiceReport;
use Illuminate\Http\Request;

class ServiceReportController extends Controller
{
    public function index()
    {
        return view('servicereport.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ServiceReport $ServiceReport)
    {
        switch($req){
            case 'case':
                return $ServiceReport->case;
                break;
            case 'noAttachCase':
                return 'No Case';
                break;
            default:
                return abort(404);
        }
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
     * @param  \App\ServiceReport  $serviceReport
     * @return \Illuminate\Http\Response
     */
    public function show($req, ServiceReport $serviceRep)
    {
        switch($req){
            case 'hasCase':
                return ['data'=> $serviceRep->hasCase()];
                break;
            case 'hasNoCase':
                return ['data'=> $serviceRep->hasNoCase()];
                break;
            default:
                return abort(404);
        }
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
}
