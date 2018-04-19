@extends('layouts.master')

@section('title', 'Service Report')

@section('styles')
    {!! Html::style('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css') !!}
    {!! Html::style('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') !!}
    {!! Html::style('css/plugins/daterangepicker/daterangepicker-bs3.css') !!}
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
            <div class="col-md-12">
                <div class="panel panel-default table-box">
                   
                    <div class="panel-heading">
                            <label>Client's Info</label>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-6">
                            <div class="input-group m-b">
                                <span class="input-group-addon bg-muted">Name:</span>
                                <input name="name" type="text" class=" form-control">
                            </div>
                            <div class="input-group m-b">
                                <span class="input-group-addon bg-muted">Case Title:</span>
                                <input name="name" type="text" class=" form-control">
                            </div>
                            <div class="input-group m-b">
                                <span class="input-group-addon bg-muted">Venue:</span>
                                <input name="name" type="text" class=" form-control">
                            </div>
                            <div class="input-group m-b">
                                <span class="input-group-addon bg-muted">Contract:</span>
                                <input name="name" type="text" class=" form-control">
                                <span class="input-group-addon bg-muted">Docket No.:</span>
                                <input name="name" type="text" class=" form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group m-b">
                                <span class="input-group-addon bg-muted">Date Rendered:</span>
                                <input name="name" type="text" class=" form-control">
                            </div>
                            <div class="input-group m-b">
                                <span class="input-group-addon bg-muted">Contract Type:</span>
                                <input name="name" type="text" class=" form-control">
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Counsel
                                </div>
                                <div class="panel-body">
                                        <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Expertise</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Samantha</td>
                                                    <td>Criminal</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
            <div class="panel panel-default table-box">
            <div class="panel-heading">
                    <label>Fees Detail</label>
            </div>
            <div class="panel-body">
                <table id="fee-detail-table" class="table table-striped dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Charge Type</th>
                            <th>Free Pages</th>
                            <th>First 5 Pages</th>
                            <th>Rate No. 1</th>
                            <th>Rate No. 2</th>
                            <th>Fixed Amount</th>
                            <th>Consumable | Min</th>
                            <th>Excess Rate</th>
                            <th>Fixed Amount</th>
                            <th>W/ CAP or Ceiling</th>
                        </tr>
                    </thead>
                </table>
            </div>
        <div class="panel-footer p-xxs">
            <div class="input-sm input-group col-md-6">
                <span class="input-group-addon bg-muted">Service Spec:</span>
                <input type="text" class=" form-control">
            </div>
        </div>
        </div>
        </div>
                    <div class="col-md-6">
                        <div class="panel panel-default table-box">
                            <div class="panel-heading">
                                    <label>Chargeable Expense</label>
                            </div>
                            <div class="panel-body">
                                <table id="chargeable-expense" class="table table-striped dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Charge Type</th>
                                            <th>Free Pages</th>
                                            <th>First 5 Pages</th>
                                            <th>Rate No. 1</th>
                                            <th>Rate No. 2</th>
                                            <th>Fixed Amount</th>
                                            <th>Consumable | Min</th>
                                            <th>Excess Rate</th>
                                            <th>Fixed Amount</th>
                                            <th>W/ CAP or Ceiling</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="panel-footer p-xxs">
                                    <div class="input-sm input-group col-md-6 col-xs-offset-6">
                                        <span class="input-group-addon bg-muted">Total Expense</span>
                                        <input type="text" class=" form-control">
                                    </div>
                                </div>
                        </div>
                    </div>
   

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Billing Information
                    </div>
                    <div class="panel-body">
                        <div class="input-group m-b">
                            <span class="input-group-addon bg-muted">First Charge</span>
                            <input type="text" class=" form-control">
                        </div>
                        <div class="input-group m-b">
                            <span class="input-group-addon bg-muted">Free Page/Time</span>
                            <input type="text" class=" form-control">
                        </div>
                        <div class="input-group m-b">
                            <span class="input-group-addon bg-muted">Rate</span>
                            <input type="text" class=" form-control">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon bg-muted">No. Pages/Hr Consumed</span>
                            <input type="text" class=" form-control">
                        </div>
                        <div class="col-lg-12">
                        <div class="checkbox checkbox-circle pull-right m-b">
                            <input id="checkbox7" type="checkbox">
                            <label for="checkbox7">
                                Rate/Min
                            </label>
                        </div>
                        </div>
                        <div class="input-group m-b">
                            <span class="input-group-addon bg-muted">Total Expenses</span>
                            <input type="text" class=" form-control">
                        </div>
                        <div class="input-group m-b">
                            <span class="input-group-addon bg-muted">Total Expenses</span>
                            <input type="text" class=" form-control">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon bg-muted">Total Expenses</span>
                            <input type="text" class=" form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="textarea-group m-b">
                    <span class="textarea-group-addon bg-muted">Details</span>
                    <textarea name="" id="" class="form-control resize-vertical"></textarea>
                </div>
                <div class="input-group m-b">
                    <span class="input-group-addon bg-muted">Activity Repot No.</span>
                    <input type="text" class=" form-control">
                </div>
                <div class="textarea-group m-b">
                    <span class="textarea-group-addon bg-muted">Explanation</span>
                    <textarea name="" id="" class="form-control resize-vertical"></textarea>
                </div>
                <div class="m-b">
                    <div class="input-group m-b date">
                        <span class="input-group-addon bg-muted">Action to take</span>
                        <input type="text" class=" form-control">

                        <span class="input-group-addon bg-muted date"><i class="fa fa-calendar"></i></span>
                        <input type="date" class="form-control ">
                    </div>
                </div>
                <div class="input-group m-b">
                    <span class="input-group-addon bg-muted">Activity Repot No.</span>
                    <input type="text" class=" form-control">
                    <span class="input-group-addon bg-muted">Stop</span>
                </div>
                <div class="input-group date">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i> Start
                    </span>
                    <input type="text" class="form-control" value="03/04/2014">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i> End
                    </span>
                    <input type="text" class="form-control" value="03/04/2014">
                </div>
                
             </div>
        </div>
    </div>
    </div>
    </div>

@endsection

@section('scripts')
{!! Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
{!! Html::script('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js') !!}
{!! Html::script('https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js') !!}
{!! Html::script('https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js') !!}
{!! Html::script('js/plugins/datapicker/bootstrap-datepicker.js') !!}

<script>
$(document).ready(function() {
    $('#fee-detail-table').DataTable({
        lengthChange: false,
        searching: false,
    });
    $('#chargeable-expense').DataTable({
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
