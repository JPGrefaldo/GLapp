@extends('layouts.master')

@section('title', 'Service Report')

@section('styles')
{!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
<style>
.ibox-content .row div {
        -webkit-transition: width 0.3s ease;
        -moz-transition: width 0.3s ease;
        -o-transition: width 0.3s ease;
        transition: width 0.3s ease;
    }
</style>
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
</div>

<div id="root" class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox float-e-argins">
        <div class="ibox-content">
            <div class="row">
                <div class="bg-primary h-300 col-lg-10">
                </div>
                <div class="bg-warning h-300 col-lg-1">
                </div>
                <div class="bg-info h-300 col-lg-1">
                </div>
            </div>
            <div class="row invisible">
                <div class="col-sm-4 col">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cases
                        </div>
                        <div class="panel-body">
                            <table id="case" class="table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Docket No.</th>
                                        <th>Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fee Details
                        </div>
                        <div class="panel-body">
                            <table id="fee" class="table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Charge Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chargeable Expense
                            <a href="#" class="btn btn-primary btn-xs pull-right">Add</a>
                        </div>
                        <div class="panel-body">
                            <table id="chargeable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Charge Type</th>
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
{!! Html::script('js/reportScript.js') !!}
@endsection
