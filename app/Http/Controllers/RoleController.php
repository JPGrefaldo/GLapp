<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index');
    }

    public function getList()
    {
        $list = Role::get();

        $data = DataTables::of($list)
            ->addColumn('name', function ($list) {
                $info = $list->name;
                return $info;
            })
            ->addColumn('action', function ($list) {
                $menu = [];
//                $menu[] = '<button data-id="'.$list->id.'" type="button" class="btn-white btn btn-xs"><i class="fa fa-check text-success"></i> Edit</button>';
                $menu[] = '<a href="'. route('role-show',array('id'=>$list->id)) .'" class="btn-white btn btn-xs"><i class="fa fa-search text-success"></i> view</a>';
                return '<div class="btn-group text-right">'.implode($menu).'</div>';
            })
            ->make(true);

        return $data;
    }

    public function show($id)
    {
        $role = Role::find($id);
        $permissions2 = Permission::select('name')->where('table_name','table_name')->groupBy('table_name');

//        $permissions = Permission::select('name')
//            ->groupBy($permissions2)
//            ->get();
dd($permissions2);
        return $permissions2;

       
        return view('admin.role.show', compact('role','permissions'));
    }

}
