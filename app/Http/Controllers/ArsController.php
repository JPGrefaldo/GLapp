<?php

namespace App\Http\Controllers;

use App\Ars;
use App\ArsAd;
use Illuminate\Http\Request;
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
        $rules = array(
            'case-project-name' => 'required|max:255',
            'docket-venue' => 'required|max:255',
            'reporter' => 'required|max:255',
            'gr-title' => 'required|max:255',
            'client' => 'required|max:255',
            'date' => 'required|max:255',
            'time-start' => 'required|max:255',
            'time-finnish' => 'required|max:255',
            'duration' => 'required|max:255',
            'sr-no' => 'required|max:255',
            'billing-instruction' => 'required|max:255',
            'billing-entry' => 'required|max:255'

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = new Ars();
        $data->case_project_name = $request->input('case-project-name');
        $data->docket_no_venue = $request->input('docket-venue');
        $data->reporter = $request->input('reporter');
        $data->gr_title = $request->input('gr-title');
        $data->client = $request->input('client');
        $data->ars_date = $request->input('date');
        $data->time_start = $request->input('time-start');
        $data->time_finnish = $request->input('time-finnish');
        $data->duration = $request->input('duration');
        $data->sr_no = $request->input('sr-no');
        $data->billing_instruction = $request->input('billing-instruction');
        $data->billing_entry = $request->input('billing-entry');



        if($data->save()){
            $ars_ads = new ArsAd();
            $ars_ads->ars_id = $data->id;
            $ars_ads->description = $request->input('description');
            $ars_ads->save();



            return redirect()->route('ars.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ars  $ars
     * @return \Illuminate\Http\Response
     */
    public function show(Ars $ar)
    {
//        $ars = Ars::find($ars);

        return $ar;

        return view('user.ars.show', compact('ars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ars  $ars
     * @return \Illuminate\Http\Response
     */
    public function edit(Ars $ars)
    {
        $ars = Ars::with('address')->find($ars->id);
        return view('user.ars.edit', compact('ars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ars  $ars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ars $ars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ars  $ars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ars $ars)
    {
        //
    }

    public function getList()
    {
        $list = Ars::get();

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
                $menu[] = '<a href="'. route('ars.edit',array('ar'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-pencil text-success"></i> edit</a>';
                $menu[] = '<a href="'. route('ars.show',array('ar'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-search text-success"></i> show</a>';
                return '<div class="btn-group text-right">'.implode($menu).'</div>';
            })
            ->make(true);

        return $data;
    }

}
