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
                <div class="col-lg-12">
                    <div class="m-b-md">
                        <a href="#" class="btn btn-success btn-xs pull-right">Update</a>
                        <h2>S.R. No.: 05072018-01</h2>
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
