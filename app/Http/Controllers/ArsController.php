<?php

namespace App\Http\Controllers;

use App\ars;
use Illuminate\Http\Request;

class ArsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.ars.index');
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
     * @param  \App\ars  $ars
     * @return \Illuminate\Http\Response
     */
    public function show(ars $ars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ars  $ars
     * @return \Illuminate\Http\Response
     */
    public function edit(ars $ars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ars  $ars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ars $ars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ars  $ars
     * @return \Illuminate\Http\Response
     */
    public function destroy(ars $ars)
    {
        //
    }
}
