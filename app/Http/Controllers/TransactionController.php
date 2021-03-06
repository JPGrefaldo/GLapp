<?php

namespace App\Http\Controllers;

use App\CaseManagement;
use App\Contract;
use App\Fee;
use App\Transaction;
use App\TransactionFeeDetail;
use App\TrustFund;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
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
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function feeList()
    {
        $data = Fee::get();
        return response()->json($data);
    }

    public function caseFeeStore(Request $request)
    {
        $case = 0;
        if($request->input('action') === "add"){
            $data = new TransactionFeeDetail();
            $data->transaction_id = $request->input('transaction_id');
            $data->fee_id = $request->input('fee_id');
            $data->case_id = $request->input('case_id');
            $case = $request->input('case_id');
        }

        if($request->input('action') === "edit"){
            $data = TransactionFeeDetail::find($request->input('case_id'));
            $case = $data->case_id;
        }

        $data->charge_type = $request->input('charge_type');
        $data->free_page = $request->input('free_page');
        $data->charge_doc = $request->input('charge_doc');
        $data->rate_1 = $request->input('rate_1');
        $data->rate_2 = $request->input('rate_2');
        $data->rate = $request->input('rate');
        $data->consumable_time = $request->input('consumable_time');
        $data->excess_rate = $request->input('excess_rate');
        $data->amount = $request->input('amount');
        $data->cap_value = $request->input('cap_value');
        if($data->save()){
            $count = TransactionFeeDetail::where('case_id', $data->case_id)->count();
            $data = TransactionFeeDetail::with('fee')
                ->with('cases')
                ->find($data->id);
            return response()->json(array($data,$count,$case));
        }
    }

    public function tranFeeAction(Request $request)
    {
        $data = TransactionFeeDetail::with('fee')->find($request->input('id'));
        $case = $data->case_id;
        if($request->input('action') == 'delete'){
            $data->delete();
            return response()->json(array($request->input('action'), $case));
        }
        if($request->input('action') == 'edit'){
            return response()->json(array($request->input('action'), $data));
        }
    }

    public function storeTrustFund(Request $request)
    {
        $data = new TrustFund();
        $data->transaction_id = $request->input('id');
        $data->amount = $request->input('amount');
        $data->description = $request->input('desc');
        $data->save();

        return response()->json($data);
    }

    public function getTrustFund(Request $request)
    {
        $data = TrustFund::where('transaction_id', $request->input('id'))->sum('amount');
        return response()->json($data);
    }

    public function feeIndex()
    {
        return view('user.fee.index');
    }

    public function feeGet(Request $request)
    {
        $data = Fee::find($request->input('id'));

        return response()->json($data);
    }

    public function feeDelete(Request $request)
    {
        $data = Fee::find($request->input('id'));
        $data->delete();
    }

    public function feeStore(Request $request)
    {
        $string = strtolower($request->input('name'));
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

        $count = Fee::count();
        $count += 1;
        $valid = 0;

        if($request->input('action') == 'add'){
            $data = new Fee();
            $data->code = str_pad($count, 3, '0', STR_PAD_LEFT);
        }
        if($request->input('action') == 'edit'){
            $data = Fee::find($request->input('id'));
        }

        $data->name = $string;
        $data->display_name = $request->input('name');
        $data->description =  $request->input('description');
        if($data->save()){
            return response()->json($request->input('action'));
        }
    }

    public function feeGetList()
    {
        $list = Fee::get();

        $data = DataTables::of($list)
            ->addColumn('code', function ($list) {
                $info = $list->code;
                return $info;
            })
            ->addColumn('name', function ($list) {
                $info = $list->display_name;
                return $info;
            })
            ->addColumn('description', function ($list) {
                $info = $list->description;
                return $info;
            })
            ->addColumn('action', function ($list) {
                $menu = [];
                $menu[] = '<button data-id="'.$list->id.'" type="button" data-type="edit" class="action btn-white btn btn-xs"><i class="fa fa-pencil text-success"></i> Edit</button>';
                $menu[] = '<button data-id="'.$list->id.'" type="button" data-type="delete" class="action btn-white btn btn-xs"><i class="fa fa-trash text-danger"></i> Trash</button>';
                return '<div class="btn-group text-right">'.implode($menu).'</div>';
            })
            ->make(true);

        return $data;
    }

}
