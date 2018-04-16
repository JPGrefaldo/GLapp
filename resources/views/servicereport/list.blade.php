@extends('layouts.master')

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
        <div class="row">
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                </div>
            </div> 
        </div>
    </div>

@endsection

@section('scripts')

@endsection
