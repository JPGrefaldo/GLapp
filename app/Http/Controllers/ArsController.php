<?php

namespace App\Http\Controllers;

use App\ars;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

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

    public function getList()
    {
        $list = ars::get();

        $data = DataTables::of($list)
            ->addColumn('case_project_name', function ($list) {
                $info = $list->case_project_name;
                return $info;
            })
            ->addColumn('docket_no_venue', function ($list) {
                $info = $list->docket_no_venue;
                return $info;
            })
            ->addColumn('reporter', function ($list) {
                $info = $list->reporter;
                return $info;
            })
            ->addColumn('gr_title', function ($list) {
                $info = $list->gr_title;
                return $info;
            })
            ->addColumn('ars_date', function ($list) {
                $info = $list->ars_date;
                return $info;
            })
            ->addColumn('time_start', function ($list) {
                $info = $list->time_start;
                return $info;
            })
            ->addColumn('time_finnish', function ($list) {
                $info = $list->time_finnish;
                return $info;
            })
            ->addColumn('duration', function ($list) {
                $info = $list->duration;
                return $info;
            })
            ->addColumn('sr_no', function ($list) {
                $info = $list->sr_no;
                return $info;
            })
            ->addColumn('billing_instruction', function ($list) {
                $info = $list->billing_instruction;
                return $info;
            })
            ->addColumn('billing_entry', function ($list) {
                $info = $list->billing_entry;
                return $info;
            })
            ->addColumn('action', function ($list) {
                $menu = [];
//                $menu[] = '<button data-id="'.$list->id.'" type="button" class="btn-white btn btn-xs"><i class="fa fa-check text-success"></i> Edit</button>';
                $menu[] = '<a href="'. route('ars.edit',array('ars'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-pencil text-success"></i> edit</a>';
                $menu[] = '<a href="'. route('ars.show',array('ars'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-search text-success"></i> show</a>';
                return '<div class="btn-group text-right">'.implode($menu).'</div>';
            })
            ->make(true);

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.ars.create');
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
