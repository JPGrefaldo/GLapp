@extends('layouts.master')

@section('title', 'Contract')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Define Contract</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>Define Contract</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action">
                <button type="button" id="reload" class="btn btn-primary">Save as Ongoing Contract</button>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated define-contract">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Define Contract <small>page</small></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-muted">Full Name:</span>
                                                <label class="form-control">{!! $data->client->fname !!} {!! $data->client->mname !!} {!! $data->client->lname !!}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-muted">Client's ID:</span>
                                                <label class="form-control">{!! $client_id !!}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="textarea-group">
                                        <span class="textarea-group-addon bg-muted">Complete Billing Address:</span>
                                        <textarea name="" id="" class="form-control resize-vertical"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="textarea-group">
                                        <span class="textarea-group-addon bg-muted">Complete Office Address:</span>
                                        <textarea name="" id="" class="form-control resize-vertical"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-muted">Type of Contract:</span>
                                        <div class="input-group-btn input-group-select">
                                            <select name="" class="form-control">
                                                <option value="">Select Retainer</option>
                                                <option value="special">Special</option>
                                                <option value="general">General</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group m-b date">
                                        <span class="input-group-addon bg-muted">Contract Date:</span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-calendar"></i></span></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group m-b date">
                                                <span class="input-group-addon bg-muted">Start Date:</span>
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-calendar"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group m-b date">
                                                <span class="input-group-addon bg-muted">End Date:</span>
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-calendar"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-muted">Contract Status:</span>
                                        <div class="input-group-btn input-group-select">
                                            <select name="" class="form-control">
                                                <option value="">Select Status</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon bg-muted">Total Amount Cost:</span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="textarea-group">
                                        <span class="textarea-group-addon bg-muted">Other Condition:</span>
                                        <textarea name="" id="" class="form-control resize-vertical"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="panel panel-default table-box">
                                    <div class="panel-heading">
                                        <label>Fees List</label>
                                    </div>
                                    <div class="table-box">
                                        <table id="fee-list-table" class="table table-stripped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="panel panel-default table-box">
                                    <div class="panel-heading">
                                        <label>Fees Detail</label>
                                    </div>
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
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default table-box">
                                    <div class="panel-heading">
                                        <label>Case Management</label>
                                        <div class="btn-group pull-right">
                                            <button type="button" id="counsel-btn-create" class="btn-success btn btn-xs"><i class="fa fa-plus"></i> Add</button>
                                        </div>
                                    </div>
                                    <div class="table-box">
                                        <table id="case-table" class="table table-stripped dt-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Docket No.</th>
                                                <th>Description</th>
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
    </div>

    <div class="modal inmodal fade" id="modal" data-id="0" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Additional Fees</h4>
                </div>
                <div class="modal-body">
                    <div class="fee-name text-center"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon bg-muted">Charge Type:</span>
                                    <div class="input-group-btn input-group-select">
                                        <select name="charge_type" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Standard">Standard</option>
                                            <option value="Special">Special</option>
                                            <option value="Installment">Installment</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Free Pages:</span>
                                    <input type="text" name="free_page" value="0" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">First 5 Pages:</span>
                                    <input type="text" name="charge_doc" value="0.00" class="form-control numonly">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Rate No. 1:</span>
                                    <input type="text" name="rate_1" value="0.00" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Rate No. 2:</span>
                                    <input type="text" name="rate_2" value="0.00" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Fixed Amount</span>
                                    <input type="text" name="rate" value="0.00" class="form-control numonly">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Consumable | Min</span>
                                    <input type="text" name="consumable_time" value="0" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Excess Rate</span>
                                    <input type="text" name="excess_rate" value="0.00" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Fixed Amount</span>
                                    <input type="text" name="amount" value="0.00" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">W/ CAP or Ceiling</span>
                                    <input type="text" name="cap_value" value="0.00" class="form-control numonly">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-store-fee">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal fade" id="case-modal" data-id="0" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Case Management & Def.</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="textarea-group">
                                    <span class="textarea-group-addon bg-muted">Case Title:</span>
                                    <textarea name="title" id="" class="form-control resize-vertical"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="textarea-group">
                                    <span class="textarea-group-addon bg-muted">Venue:</span>
                                    <textarea name="venue" id="" class="form-control resize-vertical"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Case No:</span>
                                    <input type="text" name="number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon bg-muted">Case Classification:</span>
                                    <div class="input-group-btn input-group-select">
                                        <select name="class" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="Administrative">Administrative</option>
                                            <option value="Criminal">Criminal</option>
                                            <option value="Civil">Civil</option>
                                            <option value="Collection Retainer">Collection Retainer</option>
                                            <option value="General Retainer">General Retainer</option>
                                            <option value="Labor">Labor</option>
                                            <option value="Special Project">Special Project</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group m-b date">
                                    <span class="input-group-addon bg-muted">Case Date:</span>
                                    <input type="text" name="date" class="form-control">
                                    <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-calendar"></i></span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon bg-muted">Case Status:</span>
                                    <div class="input-group-btn input-group-select">
                                        <select name="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="Open">Open</option>
                                            <option value="Close">Close</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Lead Counsel:</span>
                                    <div class="input-group-btn input-group-select">
                                        <select name="lead-counsel" class="form-control counsel-select"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon bg-muted">Co-Counsel:</span>
                                    <div class="input-group-btn input-group-select">
                                        <select name="select-counsel" class="form-control counsel-select"></select>
                                    </div>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary" id="add-co-counsel-btn">Add</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default table-box">
                                <div class="panel-heading">
                                    <label>Co-Counsel List</label>
                                </div>
                                <table id="co-counsel-table" class="table table-stripped">
                                    <thead>
                                    <tr>
                                        <th>Counsel Code.</th>
                                        <th>Name of Counsel</th>
                                        <th>Lawyer Forte</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-store-case">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('styles')
{{--    {!! Html::style('css/dataTables.min.css') !!}--}}
    {!! Html::style('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css') !!}
    {!! Html::style('css/plugins/datapicker/datepicker3.css') !!}
@endsection

@section('scripts')
{{--    {!! Html::script('js/dataTables.min.js') !!}--}}
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js') !!}
    {!! Html::script('js/plugins/datapicker/bootstrap-datepicker.js') !!}
    <script>
        $(document).ready(function(){
            var tran_id = '{!! $data->id !!}';
            var modal = $('#modal');
            var caseModal = $('#case-modal');

            $('.input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var feeListTable = $('#fee-list-table').DataTable( {
                processing: true,
                serverside: true,
                searching: false,
                pageLength: 5,
                ajax: {
                    url: 'http://'+window.location.host+'/fee-list',
                    data: function (d) {
                        d.id = tran_id;
                    }
                },
                columnDefs: [
                    { width: '20px', 'targets': [ 0,1 ] },
//                    { className: "text-right", "targets": [ 2 ] }
                ],
                columns: [
                    {data: 'action', name: 'action'},
                    {data: 'code', name: 'code'},
                    {data: 'desc', name: 'desc'}
                ]
            });

            var feeDetailTable = $('#fee-detail-table').DataTable( {
                processing: true,
                serverside: true,
                searching: false,
                pageLength: 5,
                ajax: {
                    url: 'http://'+window.location.host+'/tran-fee-list',
                    data: function (d) {
                        d.id = tran_id;
                    }
                },
                columnDefs: [
                    { width: '20px', 'targets': 0 },
                    { className: "text-center", "targets": [ 3,9 ] },
                    { className: "text-right", "targets": [ 4,5,6,7,8,10,11 ] }
                ],
                columns: [
                    {data: 'action', name: 'action'},
                    {data: 'code', name: 'code'},
                    {data: 'desc', name: 'desc'},
                    {data: 'charge_type', name: 'charge_type'},
                    {data: 'free_page', name: 'free_page'},
                    {data: 'charge_doc', name: 'charge_doc'},
                    {data: 'rate_1', name: 'rate_1'},
                    {data: 'rate_2', name: 'rate_2'},
                    {data: 'rate', name: 'rate'},
                    {data: 'consumable_time', name: 'consumable_time'},
                    {data: 'excess_rate', name: 'excess_rate'},
                    {data: 'amount', name: 'amount'},
                    {data: 'cap_value', name: 'cap_value'}
                ]
            });

            var caseTable = $('#case-table').DataTable( {
                processing: true,
                serverside: true,
                searching: false,
                pageLength: 5,
                ajax: {
                    url: 'http://'+window.location.host+'/tran-case-list',
                    data: function (d) {
                        d.id = tran_id;
                    }
                },
                columnDefs: [
                    { width: '20px', 'targets': [ 0,1 ] },
//                    { className: "text-right", "targets": [ 2 ] }
                ],
                columns: [
                    {data: 'action', name: 'action'},
                    {data: 'docket', name: 'docket'},
                    {data: 'desc', name: 'desc'}
                ]
            });

            loadFeeTable();
            function loadFeeTable(type){
                if(type == 'fee'){
                    feeListTable.ajax.reload();
                    feeDetailTable.ajax.reload();
                }else if(type == 'case'){
                    caseTable.ajax.reload();
                }else{
                    feeListTable.ajax.reload();
                    feeDetailTable.ajax.reload();
                    caseTable.ajax.reload();
                }
            }

            // Fee Process
            modal.on('hidden.bs.modal', function () {
                modal.find('.fee-name').empty();
                modal.data('id',0);
            });

            $(document).on('click','.table-action-btn',function(){
                var type = $(this).data('type');
                var id = $(this).data('id');
                if(type === 'list'){
                    modal.find('.fee-name').append('<h1>'+ $(this).data('name') +'</h1>');
                    modal.data('id',id);
                    modal.modal({backdrop: 'static', keyboard: false});
                }
            });

            $(document).on('click','.fee-action-btn',function(){
                $.get('http://'+ window.location.host +'/tran-fee-action',{
                    _token: '{!! csrf_token() !!}',
                    id: $(this).data('id'),
                    action: $(this).data('action')
                },function(){
                    loadFeeTable('fee');
                });
            });

            $(document).on('click','#btn-store-fee',function(){
                storeFeeDetail()
            });

            function storeFeeDetail(){
                var charge_type = $('select[name="charge_type"]').val();
                var free_page = parseInt($('input[name="free_page"]').val());
                var charge_doc = parseInt($('input[name="charge_doc"]').val());
                var rate_1 = parseInt($('input[name="rate_1"]').val());
                var rate_2 = parseInt($('input[name="rate_2"]').val());
                var rate = parseInt($('input[name="rate"]').val());
                var consumable_time = parseInt($('input[name="consumable_time"]').val());
                var excess_rate = parseInt($('input[name="excess_rate"]').val());
                var amount = parseInt($('input[name="amount"]').val());
                var cap_value = parseInt($('input[name="cap_value"]').val());

                $.post('http://'+ window.location.host +'/tran-fee-store', {
                    _token: '{!! csrf_token() !!}',
                    transaction_id: tran_id,
                    fee_id: modal.data('id'),
                    charge_type: charge_type,
                    free_page: free_page,
                    charge_doc: charge_doc,
                    rate_1: rate_1,
                    rate_2: rate_2,
                    rate: rate,
                    consumable_time: consumable_time,
                    excess_rate: excess_rate,
                    amount: amount,
                    cap_value: cap_value
                },function(data){
                    loadFeeTable('fee');
                    modal.modal('toggle');
                });
            }

            // Case Process
            function loadCounsel(){
                $.get('{!! route('load-counsel') !!}',{
                    id: caseModal.data('id'),
                },function(data){
                    var table = $('#co-counsel-table').find('tbody').empty();
                    if(data.length > 0){
                        for(var a = 0; a < data.length; a++){
                            table.append('' +
                                '<tr>' +
                                '<td>'+ data[a].info.lawyer_code +'</td>' +
                                '<td>'+ data[a].info.fname +' '+ data[a].info.lname +'</td>' +
                                '<td>'+ data[a].info.lawyer_type +'</td>' +
                                '<td class="text-right"><button data-id="'+ data[0].id +'" type="button" class="remove-co-counsel-btn btn-white btn btn-xs"><i class="fa fa-times text-danger"></i></button></td>' +
                                '</tr>' +
                                '');
                        }
                    }
                });
            }

            $(document).on('click','#btn-add-counsel',function(){
                modal.modal({backdrop: 'static', keyboard: false});
            });

            $(document).on('click','#counsel-btn-create',function(){
                $.get('http://'+ window.location.host +'/create-case',{
                    id: tran_id
                },function(data){
                    caseModal.data('id',data[0].id)
                    var counsel_select = $('.counsel-select');
                    counsel_select.empty().append('<option value="">Select Counsel</option>');
                    for(var a = 0; a < data[1].length; a++){
                        counsel_select.append('<option value="'+ data[1][a].id +'">'+ data[1][a].fname +' '+ data[1][a].lname +'</option>');
                    }
                    loadCounsel();
                    caseModal.modal({backdrop: 'static', keyboard: false});
                });
            });

            $(document).on('click','.remove-co-counsel-btn',function(){
                var item = $(this);
                $.get('http://'+ window.location.host +'/remove-co-counsel',{
                    id: item.data('id')
                },function(){
                    loadCounsel();
                });
            });

            $(document).on('click','#add-co-counsel-btn',function(){
                var select = $(this).closest('.form-group').find('select');
                $.get('http://'+ window.location.host +'/add-co-counsel',{
                    id: select.val(),
                    case_id: caseModal.data('id'),
                },function(){
                    loadCounsel();
                });
            });

            $(document).on('click','#btn-store-case',function(){
                $.post('{!! route('store-case') !!}',{
                    _token: '{!! csrf_token() !!}',
                    title: $('textarea[name="title"]').val(),
                    venue: $('textarea[name="venue"]').val(),
                    date: $('input[name="date"]').val(),
                    number: $('input[name="number"]').val(),
                    case_class: $('select[name="class"]').val(),
                    status: $('select[name="status"]').val(),
                    lead: $('select[name="lead-counsel"]').val()
                },function(){
                    loadFeeTable('case');
                    caseModal.modal('toggle');
                });
            });

        });
    </script>
@endsection