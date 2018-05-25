<?php

namespace App\Http\Controllers;

use App\ContactInfo;
use App\Helpers\LogActivity;
use App\IcoeInfo;
use App\Profile;
use App\SecurityQA;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Parameter LogActivity::addToLog('Subject/Description', 'Action[Browse, Read, Edit, Add, Delete]', 'Model Name');
        LogActivity::addToLog(null, 'Browse', 'User');
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

        $data = new User();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->password = bcrypt($request->input('password'));
        if($data->save()){
            //Parameter LogActivity::addToLog('Subject/Description', 'Action[Browse, Read, Edit, Add, Delete]', 'Model Name');
            LogActivity::addToLog($data->name, 'Add', 'User');
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
        $roles = Role::get();
        return view('admin.user.edit', compact('user','roles'));
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
            //Parameter LogActivity::addToLog('Subject/Description', 'Action[Browse, Read, Edit, Add, Delete]', 'Model Name');
            LogActivity::addToLog($user->name, 'Edit', 'User');
            $user->syncRoles($request->input('role'));
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
            ->addColumn('action', function ($list) {
                $menu = [];
//              $menu[] = '<button data-id="'.$list->id.'" type="button" class="btn-white btn btn-xs"><i class="fa fa-check text-success"></i> Edit</button>';
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
        $profile->image = $request->input('image');
        $profile->dob = Carbon::parse($request->input('dob'));
        if($profile->save()){

            File::move(public_path().'/temp/image/'.$profile->image, public_path().'/uploads/image/'.$profile->image);
            $files = File::files(public_path().'/temp/image/');
            File::delete($files);

            $contacts = array(
                array('permanent_address', $request->input('permanent_address')),
                array('present_address', $request->input('present_address')),
                array($request->input('contact-type'), $request->input('contact-number')),
            );

            foreach ($contacts as $contact){
                $data = new ContactInfo();
                $data->profile_id = $profile->id;
                $data->type = $contact[0];
                $data->description = $contact[1];
                $data->save();
            }

            $icoe_input1 = $request->input('icoe-name');
            $icoe_input2 = $request->input('icoe-relation');
            $icoe_input3 = $request->input('icoe-contact-type');
            $icoe_input4 = $request->input('icoe-contact-number');
            $icoe_input5 = $request->input('icoe-address');
            foreach ($icoe_input1 as $key => $input){
                $icoe = new IcoeInfo();
                $icoe->user_id = $profile->user_id;
                $icoe->name = $input;
                $icoe->relation_type = $icoe_input2[$key];
                if($icoe->save()){

                    $data = new ContactInfo();
                    $data->icoe_id = $icoe->id;
                    $data->type = $icoe_input3[$key];
                    $data->description = $icoe_input4[$key];
                    $data->save();

                    $data = new ContactInfo();
                    $data->icoe_id = $icoe->id;
                    $data->type = 'present_address';
                    $data->description = $icoe_input5[$key];
                    $data->save();
                }
            }

            $question = $request->input('question');
            $answer = $request->input('answer');
            foreach ($question as $key => $input){
                $data = new SecurityQA();
                $data->user_id = $profile->user_id;
                $data->question = $input;
                $data->answer = $answer[$key];
                $data->save();
            }

            //Parameter LogActivity::addToLog('Subject/Description', 'Action[Browse, Read, Edit, Add, Delete]', 'Model Name');
            LogActivity::addToLog($profile->name.' '.$profile->name, 'Add', 'Profile');
        }

//        return view('admin.profile.index');
        return redirect()->route('profile');
    }

    public function userProfileShow ()
    {

        $data = Profile::where('user_id',Auth::user()->id)->first();
        if($data){
            $data = User::with('profile')
                ->with('icoe')
                ->with('sqa')
                ->find(Auth::user()->id);

            //Parameter LogActivity::addToLog('Subject/Description', 'Action[Browse, Read, Edit, Add, Delete]', 'Model Name');
            LogActivity::addToLog($data->profile->name.' '.$data->profile->name, 'Read', 'Profile');

            return view('admin.profile.index', compact('data'));
        }
        return redirect()->route('profile-create');
    }

    public function userProfileEdit ()
    {
        $data = User::with('profile')
            ->with('icoe')
            ->with('sqa')
            ->find(Auth::user()->id);
//        return $data;
        return view('admin.profile.edit', compact('data'));
    }

    public function userProfileUpdate (Request $request)
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $profile->firstname = $request->input('firstname');
        $profile->middlename = $request->input('middlename');
        $profile->lastname = $request->input('lastname');
        $profile->status = $request->input('status');
        $profile->blood_type = $request->input('blood_type');
        if($profile->image != $request->input('image')){
            $files = File::files(public_path().'/uploads/image/');
            File::delete($files);
            $profile->image = $request->input('image');
            File::move(public_path().'/temp/image/'.$profile->image, public_path().'/uploads/image/'.$profile->image);
            $files = File::files(public_path().'/temp/image/');
            File::delete($files);
        }
        $profile->dob = Carbon::parse($request->input('dob'));
        if($profile->save()){

            $contacts = array(
                array('permanent_address', $request->input('permanent_address')),
                array('present_address', $request->input('present_address')),
                array($request->input('contact-type'), $request->input('contact-number')),
            );

            ContactInfo::where('profile_id',$profile->id)->each(function($row){ $row->delete(); });
            foreach ($contacts as $contact){
                $data = new ContactInfo();
                $data->profile_id = $profile->id;
                $data->type = $contact[0];
                $data->description = $contact[1];
                $data->save();
            }

            $icoe_input1 = $request->input('icoe-name');
            $icoe_input2 = $request->input('icoe-relation');
            $icoe_input3 = $request->input('icoe-contact-type');
            $icoe_input4 = $request->input('icoe-contact-number');
            $icoe_input5 = $request->input('icoe-address');

            IcoeInfo::where('user_id',$profile->user_id)->each(function($row){ $row->delete(); });
            foreach ($icoe_input1 as $key => $input){
                $icoe = new IcoeInfo();
                $icoe->user_id = $profile->user_id;
                $icoe->name = $input;
                $icoe->relation_type = $icoe_input2[$key];
                if($icoe->save()){
                    $data = new ContactInfo();
                    $data->icoe_id = $icoe->id;
                    $data->type = $icoe_input3[$key];
                    $data->description = $icoe_input4[$key];
                    $data->save();

                    $data = new ContactInfo();
                    $data->icoe_id = $icoe->id;
                    $data->type = 'present_address';
                    $data->description = $icoe_input5[$key];
                    $data->save();
                }
            }

            $question = $request->input('question');
            $answer = $request->input('answer');
            SecurityQA::where('user_id',$profile->user_id)->each(function($row){ $row->delete(); });
            foreach ($question as $key => $input){
                $data = new SecurityQA();
                $data->user_id = $profile->user_id;
                $data->question = $input;
                $data->answer = $answer[$key];
                $data->save();
            }
            //Parameter LogActivity::addToLog('Subject/Description', 'Action[Browse, Read, Edit, Add, Delete]', 'Model Name');
            LogActivity::addToLog($profile->name.' '.$profile->name, 'Edit', 'Profile');
        }

//        return view('admin.profile.index');
        return redirect()->route('profile');
    }

}
