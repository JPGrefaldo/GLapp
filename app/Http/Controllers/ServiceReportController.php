<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\ServiceReport;
use Illuminate\Http\Request;

class ServiceReportController extends Controller
{
    private $data;
    public function index()
    {
        return view('servicereport.index');
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
    public function store(Transaction $transaction, Request $request)
    {
       switch($request['request']){
            case 'published':
                $this->data = $transaction->published();
                break;
            case 'unpublished':
                $this->data = $transaction->unPublished();
                break;
            default:
                $this->data = ['error' => 'Invalid Request'];
       }
       return ['data'=> $this->data];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceReport  $serviceReport
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceReport $serviceReport,Request $request)
    {
       $this->store($serviceReport->transaction, new request(['request' => 'published']));
       return $this->format();
        return view('servicereport.list');
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
    private function format()
    {   
       $formatted = [];
       $data = $this->data[0];
       $formatted['date'] = date_format($data->report->created_at, 'Ymd'). "-" .$data->report->id;
       $formatted['date']
       return $formatted;
    }
}
