<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
       return $client->with('address')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {

    $clientId = $client->addClient([
        'id'              => $request['id'],
        'fname'           => $request['fname'],
        'lname'           => $request['lname'],
        'mname'           => $request['mname'],
        'business_nature' => $request['business_nature'],
        'plaintiff'       => $request['plaintiff'],
        'email'           => $request['email']]);

    for ($i = 0;$i < 2; $i++){
    $client->addAddress([
        "client_id"                     => $clientId,
        "address"                       => $i,
        "street_number"                 => $request["street_number"][$i],
        "route"                         => $request["route"][$i],
        "neighborhood"                  => $request["neighborhood"][$i],
        "locality"                      => $request["locality"][$i],
        "administrative_area_level_1"   => $request["administrative_area_level_1"][$i],
        "country"                       => $request["country"][$i],
        "postal_code"                   => $request["postal_code"][$i]]);}

        return "Success!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        return Client::destroy($request['id']);
    }
}
