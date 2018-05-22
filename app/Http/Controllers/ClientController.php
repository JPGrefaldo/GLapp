<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientBusiness;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $client)
    {  
        return view('client.index', compact('client'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('client.show');
    }

    public function update(Request $request, Client $client)
    {   
        $this->validate($request,[
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'email' => 'required',
        ]);

        $request['id'] = $request['client_id'];
        $userId = $client->addClient($request->except('_token','client_id'));
        
        $busAddress = $this->getBusHandler();

        if(count($busAddress['data'])){
                foreach ($busAddress['data'] as $item){
                $item->client_id = $userId;
                $item->save();
            }
        }
        return "Success!";
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

    public function getBusHandler($req = ['client_id'=>""]){
        if ($req['client_id']){
            return ['data'=>Client::find($req['client_id'])->business];
        }else{
            return ["data"=>ClientBusiness::where('client_id',null)->get()];
        }
    }
}