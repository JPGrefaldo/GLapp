@extends('layouts.master')

@section('title', 'Service Report')

@section('styles')
{!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
<style>
    .panel-heading:hover {
        cursor: pointer;
    }
    .panel-heading:active {
        background-color: #eaeaea;
        box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
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
        <div class="row">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                   Service Reports
                                </h5>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <table id="serviceReport" class="table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Docket Number</th>
                                                <th>Description</th>
                                                <th>Client Name</th>
                                                <th>Contract Number</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                
                                    <h4 class="panel-title">
                                            Case
                                    </h4>
                                
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table id="case" class="table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Docket Number</th>
                                                <th>Description</th>
                                                <th>Client Name</th>
                                                <th>Contract Number</th>
                                                <th>Status</th>
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
    </div>

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#serviceReport').DataTable({
        autoWidth: false,
    });
    $('#case').DataTable({
        lengthChange: false,
        searching: false,
    });
    $('#data_1').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
} );
</script>
@endsection
