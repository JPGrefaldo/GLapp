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
    </div>

    <div id="root" class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                        <div class="full-height-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Plaintiff</th>
                                            <th>Business Type</th>
                                            <th>Email</th>
                                            <th>Action</th>
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
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
table = $('.table-striped').dataTable( {
    "autoWidth": false,
    "ajax": {
        "url": "client/list",
        "dataSrc": ""
    },"columnDefs": [{
            
            "targets": 0,
            "data": null,
            "render": function (row) {
                return row.fname + " " + row.lname;} },{

            "targets": 1,
            "data": "plaintiff"},{
            
            "targets": 2,
            "data": "business_nature"},{

            "targets": 3,
            "data": null,
            "render":function(row){
                return `${row.email}`
            }},{

            "targets": 4,
            "data": null,
            "className": "text-right",
            "render": function (row) {
                return  `<div class="btn-group">
                            <a class="btn-success btn btn-xs" href="service-report/${row.id}">View</a>
                          </div>`;}}
        ]
    } );
</script>
@endsection
