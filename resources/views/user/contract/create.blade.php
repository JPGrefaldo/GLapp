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
                <li>
                    <a href="{!! route('contract.index') !!}">Contract List</a>
                </li>
                <li class="active">
                    <strong>Define Contract</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action">
                <button type="button" id="save-contract-btn" data-action="{!! ($data->status === 'Ongoing') ? 'edit' : 'add' !!}" class="btn btn-primary">{!! ($data->status === 'Ongoing') ? 'Update Contract' : 'Save Contract' !!}</button>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated define-contract">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {!! ($data->status === 'Ongoing') ? '<h3>Contract Number: <span class="text-success">'.$data->contract->contract_number.'</span></h3>' : '<h5>Create Contract</h5>' !!}
                    </div>
                    <div class="ibox-content">
                        <div class="row" id="contract-info">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon bg-muted">Full Name:</span>
                                        <label class="form-control">{!! $data->client->fname !!} {!! $data->client->mname !!} {!! $data->client->lname !!}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon bg-muted">Client's ID:</span>
                                        <label class="form-control">{!! $client_id !!}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="textarea-group">
                                        <span class="textarea-group-addon bg-muted">Billing Address:</span>
                                        <label class="form-control resize-vertical">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos eveniet exercitationem porro sint voluptatum. Aliquam aliquid beatae, dolore, in iusto modi, nesciunt nihil nisi provident quae quia reiciendis voluptas voluptatem?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon bg-muted">Type of Contract:</span>
                                                <div class="input-group-btn input-group-select">
                                                    {{Form::select('contract_type', array(null => 'Select Retainer','Special' => 'Special','General' => 'General'),($data->status === 'Ongoing') ? $data->contract->contract_type : null,array('class'=>'form-control'))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon bg-muted">Contract Status:</span>
                                                <div class="input-group-btn input-group-select">
                                                    {{Form::select('status', array(null => 'Select Status','Open' => 'Open','Close' => 'Close'),($data->status === 'Ongoing') ? $data->contract->status : null,array('class'=>'form-control'))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group m-b date">
                                                <span class="input-group-addon bg-muted">Contract Date:</span>
                                                <input type="text" name="contract_date" value="{!! ($data->status === 'Ongoing') ? \Carbon\Carbon::parse($data->contract->contract_date)->format('m/d/Y') : '' !!}" class="form-control">
                                                <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-calendar"></i></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group m-b date">
                                                <span class="input-group-addon bg-muted">Start Date:</span>
                                                <input type="text" name="start_date" value="{!! ($data->status === 'Ongoing') ? \Carbon\Carbon::parse($data->contract->start_date)->format('m/d/Y') : '' !!}" class="form-control">
                                                <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-calendar"></i></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group m-b date">
                                                <span class="input-group-addon bg-muted">End Date:</span>
                                                <input type="text" name="end_date" value="{!! ($data->status === 'Ongoing') ? \Carbon\Carbon::parse($data->contract->end_date)->format('m/d/Y') : '' !!}" class="form-control">
                                                <span class="input-group-addon bg-muted"><span class=""><i class="fa fa-calendar"></i></span></span>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="textarea-group">
                                                <span class="textarea-group-addon bg-muted">Other Condition:</span>
                                                <textarea name="other_conditions" id="" class="form-control resize-vertical">{!! ($data->status === 'Ongoing') ? $data->contract->other_conditions : '' !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group m-b total-box">
                                                <span class="input-group-addon bg-muted">Total Amount Cost:</span>
                                                <label class="form-control text-success" id="tran-cost-display">0.00</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default table-box">
                                    <div class="panel-heading">
                                        <label>Case Management</label>
                                        <div class="pull-right">
                                            <div class="btn-group">
                                                <button type="button" id="counsel-btn-create" class="btn-white btn btn-xs"><i class="fa fa-plus"></i> Add</button>
                                                {{--<button class="btn-white btn btn-xs">View</button>--}}
                                                {{--<button class="btn-white btn btn-xs">Edit</button>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-box">
                                        <table id="case-table" class="table table-stripped dt-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>
                                                    {{--<div class="btn-group">--}}
                                                        {{--<input type="radio">--}}
                                                    {{--</div>--}}
                                                </th>
                                                <th>Docket No.</th>
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
                                    <table id="fee-detail-table" class="table table-striped dt-responsive" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Docket</th>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal fade" id="modal" data-id="0" data-action="add" tabindex="-1" role="dialog"  aria-hidden="true">
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
                            <div class="form-group case-list"></div>
                        </div>
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
                                    <input type="text" name="free_page" placeholder="0" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">First 5 Pages:</span>
                                    <input type="text" name="charge_doc" placeholder="0.00" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Rate No. 1:</span>
                                    <input type="text" name="rate_1" placeholder="0.00" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Rate No. 2:</span>
                                    <input type="text" name="rate_2" placeholder="0.00" class="form-control numonly">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Fixed Amount</span>
                                    <input type="text" name="rate" placeholder="0.00" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Consumable | Min</span>
                                    <input type="text" name="consumable_time" placeholder="0" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Excess Rate</span>
                                    <input type="text" name="excess_rate" placeholder="0.00" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Fixed Amount</span>
                                    <input type="text" name="amount" placeholder="0.00" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">W/ CAP or Ceiling</span>
                                    <input type="text" name="cap_value" placeholder="0.00" class="form-control numonly">
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

    <div class="modal inmodal fade" id="case-modal" data-id="0" data-action="add" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Case Management & Def.</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
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
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group m-b">
                                            <span class="input-group-addon bg-muted">Case No:</span>
                                            <input type="text" name="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group m-b">
                                            <span class="input-group-addon bg-muted">Docket No:</span>
                                            <input type="text" name="docket" class="form-control">
                                        </div>
                                    </div>
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
                        <div class="col-md-5">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Lead Counsel:</span>
                                    <div class="input-group-btn input-group-select">
                                        <select name="lead-counsel" class="form-control counsel-select"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                        <div class="col-md-12">
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
    {!! Html::style('css/plugins/iCheck/custom.css') !!}
@endsection

@section('scripts')
{{--    {!! Html::script('js/dataTables.min.js') !!}--}}
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js') !!}
    {!! Html::script('js/plugins/datapicker/bootstrap-datepicker.js') !!}
    {!! Html::script('js/numeral.js') !!}
    {!! Html::script('js/plugins/iCheck/icheck.min.js') !!}
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
                        var cases = [];
                        $('input[class="case-chkbx"]:checked').each(function() {
                            cases.push($(this).val());
                        });
                        d.ids = cases;
                        d.id = tran_id;
                    }
                },
                columnDefs: [
                    { width: '30', 'targets': [ 1 ] },
                    { className: "text-center", "targets": [ 3,9 ] },
                    { className: "text-right", "targets": [ 4,5,6,7,8,10,11 ] }
                ],
                columns: [
                    {data: 'collapse', name: 'collapse'},
                    {data: 'action', name: 'action'},
                    {data: 'docket', name: 'docket'},
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
                    { width: '80', 'targets': [ 0,1 ] },
//                    { targets: 'no-sort', orderable: false },
                    { orderable: false, "targets": 0 }
//                    { className: "text-right", "targets": [ 2 ] }
                ],
                columns: [
                    {data: 'action', name: 'action'},
                    {data: 'docket', name: 'docket'},
                    {data: 'desc', name: 'desc'}
                ]
            });

            $(document).on('change','.case-chkbx',function(){
                var cases = new Array();
                $('input[class="case-chkbx"]:checked').each(function() {
                    cases.push(this.value);
                });
                console.log(cases);
                feeDetailTable.ajax.reload();
            });

            loadFeeTable();
            function loadFeeTable(type){
                if(type == 'fee'){

                    feeListTable.ajax.reload();
                    feeDetailTable.ajax.reload();
                    loadTotalCost();
                }else if(type == 'case'){
                    caseTable.ajax.reload();
                }else{

                    caseTable.ajax.reload();
                    feeListTable.ajax.reload();
                    feeDetailTable.ajax.reload();
                    loadTotalCost();
                }
            }

            loadTotalCost();
            function loadTotalCost(){
                $.get('http://'+ window.location.host +'/tran-cost',{
                    id: tran_id,
                },function(data){
                    $('#tran-cost-display').text(numeral(data).format('0,0.00'));
                });
            }

            // Contract Process
            $(document).on('click','#save-contract-btn',function(){
                var contract = $('#contract-info');
                var action = $(this).data('action');
                $.post('{!! route('contract-store') !!}',{
                    _token: '{!! csrf_token() !!}',
                    id: tran_id,
                    action: action,
                    contract_type: contract.find('select[name="contract_type"]').val(),
                    contract_date: contract.find('input[name="contract_date"]').val(),
                    start_date: contract.find('input[name="start_date"]').val(),
                    end_date: contract.find('input[name="end_date"]').val(),
                    status: contract.find('select[name="status"]').val(),
                    other_conditions: contract.find('textarea[name="other_conditions"]').val(),
                },function(data){
                    if(data.length != 0) {
                        window.location.replace('http://'+window.location.host+'/contract');
                    }
                });
            });

            // Fee Process
            $(document).on('click','.table-action-btn',function(){
                if($('.case-chkbx').length < 1){
                    alert('create Case first');
                }else{
                    var type = $(this).data('type');
                    var title = $(this).data('name');
                    var id = $(this).data('id');
                    $.get('{!! route('get-case') !!}',{
                        id: tran_id
                    },function(data){
                        if(data.length != 0){
                            modal.find('.case-list').empty();
                            for(var a = 0; a < data.length; a++){
                                var checked = ([a] == 0) ? 'checked' : '';
                                modal.find('.case-list').append('<div class="i-checks"><label> <input type="radio" value="'+ data[a].id +'" name="case" '+ checked +' > <i></i> '+ data[a].docket +' - '+ data[a].title +' </label></div>');
                            }
                            modal.find('.fee-name').append('<h1>'+ title +'</h1>');
                            modal.data('id',id);
                            modal.modal({backdrop: 'static', keyboard: false});
                        }
                    });
                }

            });

            $(document).on('click','.fee-action-btn',function(){
                $.get('http://'+ window.location.host +'/tran-fee-action',{
                    id: $(this).data('id'),
                    action: $(this).data('action')
                },function(data){
                    if(data.length != 0) {
                        console.log('return edit');
                        modal.data('id',data.id);
                        modal.data('action','edit');
                        modal.find('select[name="charge_type"]').val(data.charge_type);
                        modal.find('select[name="status"]').val(data.status);
                        modal.find('input[name="free_page"]').val(data.free_page);
                        modal.find('input[name="charge_doc"]').val(data.charge_doc);
                        modal.find('input[name="rate_1"]').val(data.rate_1);
                        modal.find('input[name="rate_2"]').val(data.rate_2);
                        modal.find('input[name="rate"]').val(data.rate);
                        modal.find('input[name="consumable_time"]').val(data.consumable_time);
                        modal.find('input[name="excess_rate"]').val(data.excess_rate);
                        modal.find('input[name="amount"]').val(data.amount);
                        modal.find('input[name="cap_value"]').val(data.cap_value);
                        modal.find('.fee-name').append('<h1>'+ data.fee.display_name +'</h1>');
                        modal.modal({backdrop: 'static', keyboard: false});
                    }else{
                        console.log('return delete');
                        loadFeeTable('fee');
                        loadTotalCost();
                    }
                });
            });

            $(document).on('click','#btn-store-fee',function(){
                storeFeeDetail()
            });

            function storeFeeDetail(){
//                console.log(modal.find('input[name="case"]:checked').val());
                $.post('http://'+ window.location.host +'/tran-fee-store', {
                    _token: '{!! csrf_token() !!}',
                    transaction_id: tran_id,
                    case_id: modal.find('input[name="case"]:checked').val(),
                    fee_id: modal.data('id'),
                    action: modal.data('action'),
                    charge_type: modal.find('select[name="charge_type"]').val(),
                    status: modal.find('select[name="status"]').val(),
                    free_page: parseInt(modal.find('input[name="free_page"]').val()),
                    charge_doc: parseFloat(modal.find('input[name="charge_doc"]').val()),
                    rate_1: parseFloat(modal.find('input[name="rate_1"]').val()),
                    rate_2: parseFloat(modal.find('input[name="rate_2"]').val()),
                    rate: parseFloat(modal.find('input[name="rate"]').val()),
                    consumable_time: parseInt(modal.find('input[name="consumable_time"]').val()),
                    excess_rate: parseFloat(modal.find('input[name="excess_rate"]').val()),
                    amount: parseFloat(modal.find('input[name="amount"]').val()),
                    cap_value: parseFloat(modal.find('input[name="cap_value"]').val())
                },function(data){
                    loadFeeTable('fee');
                    modal.modal('toggle');
                });
            }

            modal.on('hidden.bs.modal', function () {
                $(this).find('.fee-name').empty();
                $(this).data('id',0);
                $(this).data('action','add');
                $(this).find('input').val('');
                $(this).find('select').val('');
            });

            modal.on('show.bs.modal', function () {
                $('.i-checks').iCheck({
                    radioClass: 'iradio_square-green',
                });
            });

            // Case Process
            function loadCounsel(){
                $.get('{!! route('load-counsel') !!}',{
                    id: caseModal.data('id'),
                },function(data){
                    var table = $('#co-counsel-table').find('tbody').empty();
                    if(data.length > 0){
                        for(var a = 0; a < data.length; a++){
                            if(data[a].lead === 1){
                                caseModal.find('select[name="lead-counsel"]').val(data[a].counsel_id);
                                caseModal.find('select[name="select-counsel"]').find('option[value="'+ data[a].counsel_id +'"]').hide();
                            }else{
                                caseModal.find('select[name="lead-counsel"]').find('option[value="'+ data[a].counsel_id +'"]').hide();
                                caseModal.find('select[name="select-counsel"]').find('option[value="'+ data[a].counsel_id +'"]').hide();
                                table.append('' +
                                    '<tr>' +
                                        '<td>'+ data[a].info.lawyer_code +'</td>' +
                                        '<td>'+ data[a].info.fname +' '+ data[a].info.lname +'</td>' +
                                        '<td>'+ data[a].info.lawyer_type +'</td>' +
                                        '<td class="text-right"><button data-id="'+ data[0].id +'" type="button" class="remove-co-counsel-btn btn-white btn btn-xs"><i class="fa fa-times text-danger"></i></button></td>' +
                                    '</tr>' +
                                '');
                            }
                            caseModal.find('select[name="select-counsel"]').val('');
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
                var lead = caseModal.find('select[name="lead-counsel"]').val();
                $.get('http://'+ window.location.host +'/add-co-counsel',{
                    id: select.val(),
                    case_id: caseModal.data('id'),
                    lead: lead
                },function(){
                    loadCounsel();
                });
            });

            $(document).on('click','.case-btn',function(){
                $.get('http://'+ window.location.host +'/action-case',{
                    _token: '{!! csrf_token() !!}',
                    id: $(this).data('id'),
                    action: $(this).data('action')
                },function(data){
                    if(data.length != 0) {
                        console.log('return edit');
                        caseModal.data('id',data[0].id);
                        caseModal.data('action','edit');
                        caseModal.find('textarea[name="title"]').val(data[0].title);
                        caseModal.find('textarea[name="venue"]').val(data[0].venue);
                        caseModal.find('input[name="date"]').val(data[0].date);
                        caseModal.find('input[name="number"]').val(data[0].number);
                        caseModal.find('input[name="docket"]').val(data[0].docket);
                        caseModal.find('select[name="class"]').val(data[0].class);
                        caseModal.find('select[name="status"]').val(data[0].status);
                        var counsel_select = $('.counsel-select');
                        counsel_select.empty().append('<option value="">Select Counsel</option>');
                        for(var a = 0; a < data[1].length; a++){
                            counsel_select.append('<option value="'+ data[1][a].id +'">'+ data[1][a].fname +' '+ data[1][a].lname +'</option>');
                        }
                        loadCounsel();
                        caseModal.modal({backdrop: 'static', keyboard: false});
                    }else{
                        console.log('return delete');
                        loadFeeTable('case');
                    }
                });
            });

            $(document).on('click','#btn-store-case',function(){
                $.post('{!! route('store-case') !!}',{
                    _token: '{!! csrf_token() !!}',
                    title: caseModal.find('textarea[name="title"]').val(),
                    venue: caseModal.find('textarea[name="venue"]').val(),
                    date: caseModal.find('input[name="date"]').val(),
                    number: caseModal.find('input[name="number"]').val(),
                    docket: caseModal.find('input[name="docket"]').val(),
                    case_class: caseModal.find('select[name="class"]').val(),
                    status: caseModal.find('select[name="status"]').val(),
                    lead: caseModal.find('select[name="lead-counsel"]').val(),
                    id: caseModal.data('id'),
                    action: caseModal.data('action')
                },function(){
                    caseModal.modal('toggle');
                    loadFeeTable('case');
                });
            });

            caseModal.on('hidden.bs.modal', function () {
                $(this).data('id',0);
                $(this).data('action','add');
                $(this).find('textarea').val('');
                $(this).find('input').val('');
                $(this).find('select option:first-child').attr("selected", "selected");
                $(this).find('.counsel-select').empty();
            });

        });
    </script>
@endsection