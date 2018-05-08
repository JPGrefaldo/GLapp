@extends('layouts.master')
{{-- {{dd($data)}} --}}
@section('title', 'Service Report')

@section('styles')
{!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Service Report</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Home</a>
            </li>
            <li class="active">
                <strong>Service Report</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div id="root" class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-b-md">
                        <a href="#" class="btn btn-success btn-xs pull-right">Update</a>
                        <h2>S.R. No.:</h2>
                    </div>
                    <dl class="dl-horizontal">
                        <dt>Contract Status:</dt> <dd><span class="label label-primary">Active</span></dd>
                    </dl>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <dl class="dl-horizontal">
                        <dt>Client Name:</dt> <dd>Alex Smith</dd>
                        <dt>Docket No.:</dt> <dd>162</dd>
                        <dt>Case Title.:</dt> <dd>162</dd>
                        <dt>Lead Counsel:<dt> <dd>Peter Leo M. Ralla</dd>
                        <dt>Venue:</dt> <dd>101</dd>
                    </dl>
                </div>
                <div class="col-lg-5">
                    <dl class="dl-horizontal">
                        <dt>Contract No.:</dt> <dd>132<dd>
                        <dt>Contract Type:</dt> <dd>TYpe</dd>
                        <dt>Date Rendered:</dt> <dd>Monday May 7, 2018</dd>
                    </dl>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Fee's Detail</strong>
                        </div>
                        <div class="panel panel-body">
                            <table id="feeDetail" class="table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Chargeable Expense</strong>
                            <a href="#" class="btn btn-primary btn-xs pull-right">Add</a>
                        </div>
                        <div class="panel-body">
                            <table id="chargeables" class="table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
{!! Html::script('js/plugins/dataTables/datatables.min.js') !!}
{!! Html::script('js/updateReport.js') !!}
@endsection
