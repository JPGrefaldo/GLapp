@extends('layouts.master')

@section('title', 'User page')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Activity report sheet</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>List</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action">
                <a href="{!! route('ars.create') !!}" class="btn btn-primary"><i class="fa fa-plus"></i> New Ars.</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="users-table">
                                        <thead>
                                        <tr>
                                            <th>Case / Project Name</th>
                                            <th>Docket #/venue</th>
                                            <th>Reporter</th>
                                            <th>GR Title</th>
                                            <th>Client</th>
                                            <th>Ars Time</th>
                                            <th>Time Finnish</th>
                                            <th>Duration</th>
                                            <th>Sr. #</th>
                                            <th>Billing Instruction</th>
                                            <th>Billing Entry</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
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


@section('styles')
    {!! Html::style('css/dataTables.min.css') !!}
@endsection

@section('scripts')
    {!! Html::script('js/dataTables.min.js') !!}
    <script>
        $(document).ready(function(){
            var table = $('#users-table').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                ajax: '{!! route('ars-list') !!}',
                columnDefs: [
                    { className: "text-right", "targets": [ 3 ] }
                ],
                columns: [
                    { data: 'case_project_name', name: 'case_project_name' },
                    { data: 'docket_no_venue', name: 'docket_no_venue' },
                    { data: 'reporter', name: 'reporter' },
                    { data: 'gr_title', name: 'gr_title' },
                    { data: 'client', name: 'client' },
                    { data: 'time_start', name: 'time_start' },
                    { data: 'time_finnish', name: 'time_finnish' },
                    { data: 'duration', name: 'duration' },
                    { data: 'sr_no', name: 'sr_no' },
                    { data: 'billing_instruction', name: 'billing_instruction' },
                    { data: 'billing_entry', name: 'billing_entry' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    </script>
@endsection