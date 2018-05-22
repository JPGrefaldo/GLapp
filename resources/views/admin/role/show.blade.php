@extends('layouts.master')

@section('title', 'Post page')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Show Role</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/role">Role</a>
                </li>
                <li class="active">
                    <strong>Show Role</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4"></div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Role Name: <strong class="text-success">{!! ucfirst($role->name) !!}</strong></h5>
                    </div>
                    {{ Form::open(array('route' => array('role-update', $role->id))) }}
                    <div class="ibox-content">
                        <div class="row">
                            @foreach($permissions as $permission)
                            <div class="col-sm-3">
                                <dl class="permission-box">
                                @php $datas = \Spatie\Permission\Models\Permission::where('table_name',$permission->table_name)->get(); @endphp
                                    <dt>
                                        <div class="i-checks">
                                            <input type="checkbox" value="" class="check-all">
                                            {!! ucfirst($permission->table_name) !!}
                                        </div>
                                    </dt>
                                    @foreach($datas as $data)
                                    <dd>
                                        <div class="i-checks">
                                            <input type="checkbox" name="permission[]" class="permission" value="{!! $data->name !!}" @if(in_array($data->id, $default)) checked @endif >
                                            {!! ucfirst($data->name) !!}
                                        </div>
                                    </dd>
                                    @endforeach
                                </dl>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection


@section('styles')
    {!! Html::style('css/plugins/iCheck/custom.css') !!}
@endsection

@section('scripts')
    {!! Html::script('js/plugins/iCheck/icheck.min.js') !!}
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green'
            });

            checkAll();
            function checkAll(){
                $('.permission-box').each(function(){
                    var checkbox = $(this).find('.permission').length;
                    var checked = $(this).find('.permission:checked').length;
                    if(checkbox === checked){
                        $(this).find('.check-all').iCheck('check');
                    }else{
                        $(this).find('.check-all').iCheck('uncheck');
                    }
                });
            }

            $('.check-all').on('ifClicked', function(){
                var box = $(this).closest('.permission-box').find('.permission');
                if($(this).is(':checked')){
                    box.iCheck('uncheck');
                }else{
                    box.iCheck('check');
                }
            });

            $('.permission').on('ifToggled', function(){
                var checkbox = $(this).closest('.permission-box').find('.permission').length;
                var checked = $(this).closest('.permission-box').find('.permission:checked').length;
                if(checkbox === checked){
                    $(this).closest('.permission-box').find('.check-all').iCheck('check');
                }else{
                    $(this).closest('.permission-box').find('.check-all').iCheck('uncheck');
                }
            });

        });
    </script>
@endsection