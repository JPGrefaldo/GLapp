<?php

namespace App\Http\Controllers;

use App\ContactInfo;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|max:255',
            'repeat-password' => 'required|same:password',
        );
        $messages = [
            'same'    => 'The Repeat Password and Password must match.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        if($user->save()){
            return redirect(route('user.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = array(
            'name' => 'required|max:255',
//            'email' => [
//                'required|email|max:255',
//                Rule::unique('users')->ignore($user),
//            ],
            'email' => Rule::unique('users')->ignore($user->email, 'email'),
            'password' => 'nullable|max:255|min:6',
            'repeat-password' => 'nullable|same:password',
        );
        $messages = [
            'same'    => 'The Repeat Password and Password must match.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->input('password') != null){
            $user->password = bcrypt($request->input('password'));
        }
        if($user->update()){
            return redirect(route('user.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function getList()
    {
        $list = User::get();

        $data = Datatables::of($list)
            ->addColumn('id', function ($list) {
                $info = $list->id;
                return $info;
            })
            ->addColumn('name', function ($list) {
                $info = $list->name;
                return $info;
            })
            ->addColumn('email', function ($list) {
                $info = $list->email;
                return $info;
            })
            ->addColumn('created_at', function ($list) {
                $info = $list->created_at;
                return $info;
            })
            ->addColumn('updated_at', function ($list) {
                $info = $list->updated_at;
                return $info;
            })
            ->addColumn('action', function ($list) {
                $menu = [];
//                $menu[] = '<button data-id="'.$list->id.'" type="button" class="btn-white btn btn-xs"><i class="fa fa-check text-success"></i> Edit</button>';
                $menu[] = '<a href="'. route('user.edit',array('user'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-pencil text-success"></i> edit</a>';
                return '<div class="btn-group text-right">'.implode($menu).'</div>';
            })
            ->make(true);

        return $data;
    }

    public function userProfileCreate ()
    {

        return view('admin.profile.create');
    }

    public function userProfileStore (Request $request)
    {
        $profile = new Profile();
        $profile->user_id = Auth::user()->id;
        $profile->firstname = $request->input('firstname');
        $profile->middlename = $request->input('middlename');
        $profile->lastname = $request->input('lastname');
        $profile->status = $request->input('status');
        $profile->blood_type = $request->input('blood_type');
        $profile->dob = $request->input('dob');
        if($profile->save()){
            $contact = new ContactInfo();
            $contact->profile_id = $profile->id;

        }

        return view('admin.profile.create');
    }

    public function userProfileShow ()
    {
        return view('admin.profile.create');
    }

    public function userProfileEdit ()
    {
        return view('admin.profile.create');
    }

    public function userProfileUpdate (Request $request)
    {
        return view('admin.profile.create');
    }

}
