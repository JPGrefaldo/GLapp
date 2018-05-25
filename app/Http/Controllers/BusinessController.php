<?php

namespace App\Http\Controllers;

use App\ClientBusiness;
use App\Client;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return ['data' => Client::findOrFail($request['client'])->business];
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
     * @param  \App\ClientBusiness  $clientBusiness
     * @return \Illuminate\Http\Response
     */
    public function show(ClientBusiness $clientBusiness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientBusiness  $clientBusiness
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientBusiness $clientBusiness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientBusiness  $clientBusiness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientBusiness $clientBusiness)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientBusiness  $clientBusiness
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientBusiness $clientBusiness)
    {
        //
    }
}
