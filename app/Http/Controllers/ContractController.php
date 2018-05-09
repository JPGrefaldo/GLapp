<?php

namespace App\Http\Controllers;

use App\CaseManagement;
use App\Client;
use App\Contract;
use App\Counsel;
use App\Fee;
use App\Transaction;
use App\TransactionDetail;
use App\TransactionFeeDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.contract.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        $data = Transaction::with('client')
            ->with('contract')
            ->with('cases')
            ->with('user')
            ->find($contract->transaction_id);
//        return $data;
        $cases = CaseManagement::where('transaction_id', $data->id)
            ->with('counsel_list')
            ->get();
        $counsel = [];
        foreach ($cases as $ca){
            foreach ($ca->counsel_list as $c){
                $counsel[] = $c->counsel_id;
            }
        }
        $ids = array_unique($counsel);
        $counsels = Counsel::whereIn('id',$ids)->get();
//        return $counsels;
        return view('user.contract.show', compact('data','counsels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        $data = Transaction::with('client')
            ->with('contract')
            ->find($contract->transaction_id);

//        $data = collect($data->client->bill)->splice(6,7);

//        return $data;
        $client_id = str_pad($data->client->id, 5, 0, STR_PAD_LEFT);
        return view('user.contract.create', compact('data','client_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }

    public function getList()
    {
        $list = Contract::with('client')->get();

        $data = DataTables::of($list)
            ->addColumn('number', function ($list) {
                $info = $list->contract_number;
                return $info;
            })
            ->addColumn('client', function ($list) {
                $info = $list->client->fname.' '.$list->client->mname.' '.$list->client->lname;
                return $info;
            })
            ->addColumn('date', function ($list) {
                $info = Carbon::parse($list->contract_date)->toFormattedDateString();
                return $info;
            })
            ->addColumn('amount', function ($list) {
                $info = number_format($list->amount_cost, 2, '.', ',');
                return $info;
            })
            ->addColumn('status', function ($list) {
                $info = $list->status;
                return $info;
            })
            ->addColumn('action', function ($list) {
                $menu = [];
                $menu[] = '<a href="'. route('contract.show',array('contract'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-search text-success"></i> show</a>';
                $menu[] = '<a href="'. route('contract.edit',array('contract'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-pencil text-success"></i> edit</a>';
//                $menu[] = '<button data-id="'.$list->id.'" type="button" class="btn-white btn btn-xs"><i class="fa fa-times text-danger"></i> delete</button>';
                return '<div class="btn-group text-right">'.implode($menu).'</div>';
            })
            ->make(true);
        return $data;
    }

    public function createClientContract($id)
    {
        $data = Transaction::where('user_id', Auth::user()->id)
            ->where('client_id', $id)
            ->where('status','pending')
            ->with('client')
            ->first();
        if(!$data){
            $data = new Transaction();
            $data->user_id = Auth::user()->id;
            $data->client_id = $id;
            $data->save();
            $data = Transaction::with('client')->find($data->id);
        }
        $client_id = str_pad($id, 5, 0, STR_PAD_LEFT);
        $data['billing'] = $this->billingAdd($data->client);
        return view('user.contract.create', compact('data','client_id'));
    }

    public function contractStore(Request $request)
    {
        $total = 0;
        $count = Contract::count();
        $tran = Transaction::with('fees')->find($request->input('id'));
        foreach($tran->fees as $fee){
            $total += $fee->charge_doc;
            $total += $fee->rate_1;
            $total += $fee->rate_2;
            $total += $fee->rate;
            $total += $fee->consumable_time;
            $total += $fee->excess_rate;
            $total += $fee->amount;
            $total += $fee->cap_value;
        }

        if($request->input('action') === 'add'){
            $data = new Contract();
            $data->transaction_id = $tran->id;
            $data->client_id = $tran->client_id;
            $data->contract_number = str_pad($count + 1, 6, 0, STR_PAD_LEFT);
        }
        if($request->input('action') === 'edit'){
            $data = Contract::where('transaction_id', $tran->id)->first();
        }

        $data->contract_type = $request->input('contract_type');
        $data->contract_date = Carbon::parse($request->input('contract_date'));
        $data->start_date = Carbon::parse($request->input('start_date'));
        $data->end_date = Carbon::parse($request->input('end_date'));
        $data->status = $request->input('status');
        $data->other_conditions = $request->input('other_conditions');
        $data->amount_cost = $total;
        if($data->save()){
            $tran->status = 'Ongoing';
            $tran->save();
            return response()->json($data);
        }
    }

    public function billingAdd($client){
        return collect($client->business->find($client->billing))->splice(6,7);
    }




}
