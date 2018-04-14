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

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Client Info:</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped table-hover" id="DataTablesClient" >
                            <thead>
                            <tr role="row">
                                <th>Name</th>
                                <th>Docket No.</th> 
                                <th>Case Title</th>
                                <th>Contract No.</th>
                                <th>Venue</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Counsel</h5>
                    </div>
                    <div class="ibox-content">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




@section('scripts')
{{-- {!! Html::script('js/plugins/dataTables/datatables.min.js') !!} --}}

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script crossorigin src="https://unpkg.com/babel-standalone@6.26.0/babel.min.js"></script>
<script>
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Full name:</td>'+
                '<td>'+d.name+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extension number:</td>'+
                '<td>'+d.extn+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
            '</tr>'+
        '</table>';
    }
    
    $(document).ready(function() {
        var table = $('#DataTablesClient').DataTable( {
        } );
        
        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
    
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    } );
</script>    
@endsection
