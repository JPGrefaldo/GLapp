<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Transaction;
use App\TransactionFeeDetail;
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

    public function feeList(Request $request)
    {
        $used = TransactionFeeDetail::where('transaction_id', $request->input('id'))
            ->pluck('fee_id')
            ->toArray();

        $list = Fee::whereNotIn('id',$used)->get();

        $data = DataTables::of($list)
            ->addColumn('code', function ($list) {
                $info = $list->code;
                return $info;
            })
            ->addColumn('desc', function ($list) {
                $info = $list->display_name;
                return $info;
            })
            ->addColumn('action', function ($list) {
                $menu = [];
              $menu[] = '<button data-id="'.$list->id.'" data-type="list" data-name="'.$list->display_name.'" type="button" class="table-action-btn btn-white btn btn-xs"><i class="fa fa-plus text-success"></i> add</button>';
                return '<div class="btn-group text-right">'.implode($menu).'</div>';
            })
            ->make(true);
        return $data;
    }

    public function tranFeeList(Request $request)
    {
        $list = TransactionFeeDetail::where('transaction_id', $request->input('id'))
            ->with('fee')
            ->get();

        $data = DataTables::of($list)
            ->addColumn('code', function ($list) {
                $info = $list->fee->code;
                return $info;
            })
            ->addColumn('desc', function ($list) {
                $info = $list->fee->display_name;
                return $info;
            })
            ->addColumn('charge_type', function ($list) {
                $info = $list->charge_type;
                return $info;
            })
            ->addColumn('free_page', function ($list) {
                $info = $list->free_page;
                return $info;
            })
            ->addColumn('charge_doc', function ($list) {
                $info = number_format($list->charge_doc, 2, '.', ',');
                return $info;
            })
            ->addColumn('rate_1', function ($list) {
                $info = number_format($list->rate_1, 2, '.', ',');
                return $info;
            })
            ->addColumn('rate_2', function ($list) {
                $info = number_format($list->rate_2, 2, '.', ',');
                return $info;
            })
            ->addColumn('rate', function ($list) {
                $info = number_format($list->rate, 2, '.', ',');
                return $info;
            })
            ->addColumn('consumable_time', function ($list) {
                $info = $list->consumable_time;
                return $info;
            })
            ->addColumn('excess_rate', function ($list) {
                $info = number_format($list->excess_rate, 2, '.', ',');
                return $info;
            })
            ->addColumn('amount', function ($list) {
                $info = number_format($list->amount, 2, '.', ',');
                return $info;
            })
            ->addColumn('cap_value', function ($list) {
                $info = number_format($list->cap_value, 2, '.', ',');
                return $info;
            })
//            ->addColumn('cap', function ($list) {
//                $info = $list->cap === 0 ? 'N' : 'Y';
//                return $info;
//            })
            ->addColumn('action', function ($list) {
                $info = '<span class="span-btn fee-action-btn" data-id="'.$list->id.'" data-action="add"><i class="fa fa-times text-danger"></i></span>';
                return $info;
            })
            ->addColumn('action', function ($list) {
                $menu = [];
                $menu[] = '<button data-id="'.$list->id.'" data-action="add" type="button" class="fee-action-btn btn-white btn btn-xs"><i class="fa fa-times text-danger"></i> del</button>';
                return '<div class="btn-group text-right">'.implode($menu).'</div>';
            })
            ->make(true);
        return $data;
    }

    public function tranCaseList(Request $request)
    {
        $list = Fee::get();

        $data = DataTables::of($list)
            ->addColumn('docket', function ($list) {
                $info = $list->code;
                return $info;
            })
            ->addColumn('desc', function ($list) {
                $info = $list->display_name;
                return $info;
            })
            ->addColumn('action', function ($list) {
                $menu = [];
//              $menu[] = '<button data-id="'.$list->id.'" type="button" class="btn-white btn btn-xs"><i class="fa fa-check text-success"></i> Edit</button>';
                $menu[] = '<a href="'. route('user.edit',array('user'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-pencil text-success"></i> edit</a>';
                return '<div class="btn-group text-right">'.implode($menu).'</div>';
            })
            ->make(true);
        return $data;
    }

    public function tranCaseStore()
    {

    }

    public function tranFeeStore(Request $request)
    {
        $data = new TransactionFeeDetail();
        $data->transaction_id = $request->input('transaction_id');
        $data->fee_id = $request->input('fee_id');
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
            return response()->json($data);
        }
    }

    public function tranFeeAction(Request $request)
    {
        TransactionFeeDetail::find($request->input('id'))->delete();
    }

}
