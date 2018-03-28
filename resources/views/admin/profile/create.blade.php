@extends('layouts.master')

@section('title', 'Post page')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Create Profile</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>Profile Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Basic form <small>Simple login form example</small></h5>
                    </div>
                    <div class="ibox-content">
                        {{Form::open(array('route'=>array('user.store')))}}
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="m-t-none m-b text-success">Basic Information</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            {{Form::text('firstname',null, array('class'=>'form-control'))}}
                                            @if($errors->has('firstname'))
                                                <span class="text-danger">{{$errors->first('firstname')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            {{Form::text('middlename',null, array('class'=>'form-control'))}}
                                            @if($errors->has('middlename'))
                                                <span class="text-danger">{{$errors->first('middlename')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            {{Form::text('lastname',null, array('class'=>'form-control'))}}
                                            @if($errors->has('lastname'))
                                                <span class="text-danger">{{$errors->first('lastname')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="data_3">
                                            <label>Date of Birth</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="01/13/2000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Marital Status</label>
                                            {{Form::select('status', array(
                                            null => 'Select status',
                                            'married' => 'Married (and not separated)',
                                            'widowed' => 'Widowed (including living common law)',
                                            'separated' => 'Separated (including living common law)',
                                            'divorced' => 'Divorced (including living common law)',
                                            'single' => 'Single (including living common law)'
                                            ),null,array('class'=>'form-control'))}}
                                            @if($errors->has('status'))
                                                <span class="text-danger">{{$errors->first('status')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Blood Type</label>
                                            {{Form::select('blood_type', array(
                                            null => 'Select Blood Type',
                                            'O negative' => 'O negative',
                                            'O positive' => 'O positive',
                                            'A negative' => 'A negative',
                                            'A positive' => 'A positive',
                                            'B negative' => 'B negative',
                                            'B positive' => 'B positive',
                                            'AB negative' => 'AB negative',
                                            'AB positive' => 'AB positive',
                                            ),null,array('class'=>'form-control'))}}
                                            @if($errors->has('blood_type'))
                                                <span class="text-danger">{{$errors->first('blood_type')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <h3 class="m-t-none m-b text-success">Contact Information</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <div class="input-group">
                                                <div class="input-group-btn input-group-select">
                                                    <select name="" class="form-control">
                                                        <option value="">Select type</option>
                                                        <option value="telephone">Telephone</option>
                                                        <option value="fax">Fax</option>
                                                        <option value="mobile">Mobile</option>
                                                    </select>
                                                </div>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Permanent Address</label>
                                            {{Form::textarea('permanent_address',null, array('class'=>'form-control resize-vertical'))}}
                                            @if($errors->has('permanent_address'))
                                                <span class="text-danger">{{$errors->first('permanent_address')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Present Address</label>
                                            {{Form::textarea('present_address',null, array('class'=>'form-control resize-vertical'))}}
                                            @if($errors->has('present_address'))
                                                <span class="text-danger">{{$errors->first('present_address')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <h3 class="m-t-none m-b text-success">In case of Emergency Contact</h3>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    {{Form::text('icoe_name',null, array('class'=>'form-control'))}}
                                    @if($errors->has('icoe_name'))
                                        <span class="text-danger">{{$errors->first('icoe_name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Contact Relation</label>
                                    {{Form::text('icoe_relation',null, array('class'=>'form-control'))}}
                                    @if($errors->has('icoe_relation'))
                                        <span class="text-danger">{{$errors->first('icoe_relation')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <div class="input-group">
                                        <div class="input-group-btn input-group-select">
                                            <select name="" class="form-control">
                                                <option value="">Select type</option>
                                                <option value="telephone">Telephone</option>
                                                <option value="fax">Fax</option>
                                                <option value="mobile">Mobile</option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    {{Form::textarea('icoe_address',null, array('class'=>'form-control resize-vertical'))}}
                                    @if($errors->has('icoe_address'))
                                        <span class="text-danger">{{$errors->first('icoe_address')}}</span>
                                    @endif
                                </div>
                                <div id="icoe-second"></div>

                                <button type="button" class="btn btn-success">Add another</button>
                                <div class="hr-line-dashed"></div>
                                {{Form::submit('Create', array('class'=>'btn btn-success'))}}

                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('styles')
    {!! Html::style('css/plugins/datapicker/datepicker3.css') !!}
@endsection

@section('scripts')
    <!-- Data picker -->
    {!! Html::script('js/plugins/datapicker/bootstrap-datepicker.js') !!}
    <script>
        $(document).ready(function(){
            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
        });
    </script>
@endsection