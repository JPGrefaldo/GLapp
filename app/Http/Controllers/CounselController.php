<?php

namespace App\Http\Controllers;

use App\ContactInfo;
use App\Counsel;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CounselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Parameter LogActivity::addToLog('Subject/Description', 'Action[Browse, Read, Edit, Add, Delete]', 'Model Name');
        LogActivity::addToLog(null, 'Browse', 'Counsel');
        return view('user.counsel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.counsel.create');
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
            'first-name' => 'required|max:255',
            'middle-name' => 'required|max:255',
            'last-name' => 'required|max:255',
            'image' => 'required|max:255',
            'address' => 'required|max:255',
            'lawyer-type' => 'required|max:255',
            'lawyer-code' => 'required|max:255',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = new Counsel();
        $data->fname = $request->input('first-name');
        $data->mname = $request->input('middle-name');
        $data->lname = $request->input('last-name');
        $data->image = $request->input('image');
        $data->lawyer_type = $request->input('lawyer-type');
        $data->lawyer_code = $request->input('lawyer-code');
        if($data->save()){
            $contact = new ContactInfo();
            $contact->counsel_id = $data->id;
            $contact->type = 'present_address';
            $contact->description = $request->input('address');;
            $contact->save();

            File::move(public_path().'/temp/image/'.$data->image, public_path().'/uploads/image/'.$data->image);
            $files = File::files(public_path().'/temp/image/');
            File::delete($files);

            //Parameter LogActivity::addToLog('Subject/Description', 'Action[Browse, Read, Edit, Add, Delete]', 'Model Name');
            LogActivity::addToLog($data->fname.' '.$data->lname, 'Add', 'Counsel');

            return redirect()->route('counsel.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counsel  $counsel
     * @return \Illuminate\Http\Response
     */
    public function show(Counsel $counsel)
    {
        $counsel = Counsel::with('address')->find($counsel->id);

        //Parameter LogActivity::addToLog('Subject/Description', 'Action[Browse, Read, Edit, Add, Delete]', 'Model Name');
        LogActivity::addToLog($counsel->fname.' '.$counsel->lname, 'Read', 'Counsel');

        return view('user.counsel.show', compact('counsel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counsel  $counsel
     * @return \Illuminate\Http\Response
     */
    public function edit(Counsel $counsel)
    {
        $counsel = Counsel::with('address')->find($counsel->id);
        return view('user.counsel.edit', compact('counsel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counsel  $counsel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counsel $counsel)
    {
        $rules = array(
            'fname' => 'required|max:255',
            'mname' => 'required|max:255',
            'lname' => 'required|max:255',
            'image' => 'required|max:255',
            'address' => 'required|max:255',
            'lawyer_type' => 'required|max:255',
            'lawyer_code' => 'required|max:255',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $counsel->fname = $request->input('fname');
        $counsel->mname = $request->input('mname');
        $counsel->lname = $request->input('lname');

        if($counsel->image != $request->input('image')){
            File::delete(public_path().'/uploads/image/'.$counsel->image);
            $counsel->image = $request->input('image');
            File::move(public_path().'/temp/image/'.$request->input('image'), public_path().'/uploads/image/'.$request->input('image'));
            $files = File::files(public_path().'/temp/image/');
            File::delete($files);
        }

        $counsel->lawyer_type = $request->input('lawyer_type');
        $counsel->lawyer_code = $request->input('lawyer_code');
        if($counsel->save()){
            ContactInfo::where('counsel_id', $counsel->id)->get()->each(function($row){$row->delete();});
            $contact = new ContactInfo();
            $contact->counsel_id = $counsel->id;
            $contact->type = 'present_address';
            $contact->description = $request->input('address');;
            $contact->save();
            return redirect()->route('counsel.show',array('counsel'=>$counsel->id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counsel  $counsel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counsel $counsel)
    {
        //
    }

    public function getList()
    {
        $list = Counsel::get();

        $data = DataTables::of($list)
            ->addColumn('firstname', function ($list) {
                $info = $list->fname;
                return $info;
            })
            ->addColumn('middlename', function ($list) {
                $info = $list->mname;
                return $info;
            })
            ->addColumn('lastname', function ($list) {
                $info = $list->lname;
                return $info;
            })
            ->addColumn('action', function ($list) {
                $menu = [];
//                $menu[] = '<button data-id="'.$list->id.'" type="button" class="btn-white btn btn-xs"><i class="fa fa-check text-success"></i> Edit</button>';
                $menu[] = '<a href="'. route('counsel.edit',array('counsel'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-pencil text-success"></i> edit</a>';
                $menu[] = '<a href="'. route('counsel.show',array('counsel'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-search text-success"></i> show</a>';
                return '<div class="btn-group text-right">'.implode($menu).'</div>';
            })
            ->make(true);

        return $data;
    }
}
