<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;


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
       return $client->get();
    }

    public function update(Request $request, Client $client)
    {
        $request['id'] = $request['client_id'];
        $client->addClient($request->except('_token','client_id'));

         return "success";
    }

    public function destroy(Request $request)
    {
        return Client::destroy($request['client_id']);
    }

    public function busAddress( Client $client,Request $req)
    {   
        switch($req['request']){
            case 'get':
                return $this->getBusHandler($req);
                break;
            case 'post':
                return $client->addBusiness($req->except('_token','request'));
                break;
            case 'destroy':
                return $client->zapBusiness($req['id']);
                break;
            default:
                return ['error' => 'No request supplied!'];
        }
    }

    public function getBusHandler($req){
        if ($req['client_id']){
            return ['data'=>Client::find($req['client_id'])->business];
        }else{
            return ["data"=>""];
        }
    }
}
