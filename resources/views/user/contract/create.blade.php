@extends('layouts.master')

@section('title', 'Blank|Page')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Blank</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>Blank</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight define-contract">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Define Contract <small>page</small></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon bg-muted">Client's ID:</span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-search"></i></span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon bg-muted">Full Name:</span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Complete Billing Address:</label>
                                    <textarea name="" id="" class="form-control resize-vertical"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Complete Office Address:</label>
                                    <textarea name="" id="" class="form-control resize-vertical"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon bg-muted">Contract No:</span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-search"></i></span></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-muted">Type of Contract:</span>
                                        <div class="input-group-btn input-group-select">
                                            <select name="" class="form-control">
                                                <option value="">Select Retainer</option>
                                                <option value="special">Special</option>
                                                <option value="general">General</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group m-b date">
                                        <span class="input-group-addon bg-muted">Contract Date:</span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-calendar"></i></span></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group m-b date">
                                                <span class="input-group-addon bg-muted">Start Date:</span>
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-calendar"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group m-b date">
                                                <span class="input-group-addon bg-muted">End Date:</span>
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-calendar"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-muted">Contract Status:</span>
                                        <div class="input-group-btn input-group-select">
                                            <select name="" class="form-control">
                                                <option value="">Select Status</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon bg-muted">Total Amount Cost:</span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Other Condition:</label>
                                    <textarea name="" id="" class="form-control resize-vertical"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3>Fees List</h3>
                                    </div>
                                    <ul class="list-a two-col">
                                        <li>
                                            <ul>
                                                <li>Code</li>
                                                <li>Description</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li>01</li>
                                                <li>Acceptance Fee</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li>02</li>
                                                <li>Acceptance Fee/Initial Fee</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3>Fees Detail</h3>
                                    </div>
                                    <ul class="list-a five-col">
                                        <li>
                                            <ul>
                                                <li>Code</li>
                                                <li>Description</li>
                                                <li>Rate</li>
                                                <li>Amount</li>
                                                <li>Cap</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li>01</li>
                                                <li>Acceptance Fee</li>
                                                <li>5,000.00</li>
                                                <li>50,000.00</li>
                                                <li>Y</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3>Case Management</h3>
                                    </div>
                                    <ul class="list-a two-col">
                                        <li>
                                            <ul>
                                                <li>Docket No.</li>
                                                <li>Description</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('styles')
    {{--{!! Html::style('') !!}--}}
    {!! Html::style('css/plugins/datapicker/datepicker3.css') !!}
@endsection

@section('scripts')
    {{--{!! Html::script('') !!}--}}
    {!! Html::script('js/plugins/datapicker/bootstrap-datepicker.js') !!}
    <script>
        $(document).ready(function(){
            $('.input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
        });
    </script>
@endsection