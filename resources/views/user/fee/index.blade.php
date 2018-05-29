@extends('layouts.master')

@section('title', 'Fee')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Fee list</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>Fee list</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action">
                <button type="submit" data-type="create" class="action btn btn-primary">Create Fee</button>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Fee List</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="fee-table">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Description</th>
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

    <div class="modal inmodal fade" id="modal" data-id="0" data-action="add" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Fee Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group m-b">
                            <span class="input-group-addon bg-muted">Name:</span>
                            <input type="text" name="name" class="form-control required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="textarea-group">
                            <span class="textarea-group-addon bg-muted">Description:</span>
                            <textarea name="description" id="" class="form-control resize-vertical required"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" data-type="save" class="action btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('styles')
    {!! Html::style('css/dataTables.min.css') !!}
    {!! Html::style('css/plugins/toastr/toastr.min.css') !!}
@endsection

@section('scripts')
    {!! Html::script('js/dataTables.min.js') !!}
    {!! Html::script('js/plugins/toastr/toastr.min.js') !!}
    <script>
        $(document).ready(function(){
            var modal = $('#modal');
            var table = $('#fee-table').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                ajax: '{!! route('fee-list') !!}',
                columnDefs: [
                    { className: "text-right", "targets": [ 3 ] }
                ],
                columns: [
                    { data: 'code', name: 'code' },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'action', name: 'action' }
                ]
            });

            $(document).on('click','.action',function(){
                var type = $(this).data('type');
                var id = $(this).data('id');
                switch (type) {
                    case 'edit':
                        $.get('{!! route('fee-get') !!}',{
                            id: id
                        },function(data){
                            if(data.length != 0) {
                                modal.data('id',data.id);
                                modal.data('action','edit');
                                modal.find('input[name="name"]').val(data.display_name);
                                modal.find('textarea[name="description"]').val(data.description);
                                modal.modal({backdrop: 'static', keyboard: false});
                            }
                        });
                        break;
                    case 'delete':
                        $.get('{!! route('fee-delete') !!}',{
                            id: id,
                            action: type
                        });
                        table.ajax.reload();
                        toastr.success('Successful!','Fee deleted successfully!');
                        break;
                    case 'create':
                        modal.modal({backdrop: 'static', keyboard: false});
                        break;
                    default:
                        $.post('{!! route('fee-store') !!}',{
                            _token: '{!! csrf_token() !!}',
                            id: modal.data('id'),
                            action: modal.data('action'),
                            name: modal.find('input[name="name"]').val(),
                            description: modal.find('textarea[name="description"]').val()
                        },function(data){
                            if(data == 'add'){
                                toastr.success('Successful!','Fee added successfully!');
                            }
                            if(data == 'edit'){
                                toastr.success('Successful!','Fee updated successfully!');
                            }
                            table.ajax.reload();
                            modal.modal('toggle');
                        });
                }
            });

            modal.on('hidden.bs.modal', function () {
                $(this).data('id',0);
                $(this).data('action','add');
                $(this).find('textarea').val('');
                $(this).find('input').val('');
            });

        });
    </script>
@endsection