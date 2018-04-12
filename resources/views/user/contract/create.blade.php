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
                <button type="button" class="btn btn-primary">Save as Ongoing Contract</button>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight define-contract">
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
                                    <table class="footable table table-stripped toggle-arrow-tiny">
                                        <thead>
                                        <tr>
                                            <th data-toggle="true">Code</th>
                                            <th data-sortable="false">Description</th>
                                            <th data-hide="all">Specification</th>
                                            <th class="text-right" data-sortable="false"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fees as $fee)
                                        <tr>
                                            <td>{!! $fee->code !!}</td>
                                            <td>{!! $fee->display_name !!}</td>
                                            <td>{!! $fee->description !!}</td>
                                            <td class="text-right"><a href="#" class="fee-btn" data-id="{!! $fee->id !!}" data-name="{!! $fee->display_name !!}"><i class="fa fa-plus text-navy"></i></a></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <ul class="pagination pull-right"></ul>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default table-box">
                                    <div class="panel-heading">
                                        <label>Fees Detail</label>
                                    </div>
                                    <table class="footable table table-stripped" id="table-fee-detail">
                                        <thead>
                                        <tr>
                                            <th data-sortable="false">Code</th>
                                            <th data-sortable="false">Description</th>
                                            <th data-sortable="false">Rate</th>
                                            <th data-sortable="false">Amount</th>
                                            <th data-sortable="false">Cap</th>
                                            <th class="text-right"></th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <ul class="pagination pull-right"></ul>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-default table-box">
                                    <div class="panel-heading">
                                        <label>Case Management</label>
                                    </div>
                                    <table class="footable table table-stripped">
                                        <thead>
                                        <tr>
                                            <th data-sortable="false">Docket No.</th>
                                            <th data-sortable="false">Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <ul class="pagination pull-right"></ul>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
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
                                    <input type="text" name="free_page" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">First 5 Pages:</span>
                                    <input type="text" name="charge_doc" value="0" class="form-control numonly">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Rate No. 1:</span>
                                    <input type="text" name="rate_1" value="0" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Rate No. 2:</span>
                                    <input type="text" name="rate_2" value="0" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Fixed Amount</span>
                                    <input type="text" name="rate" value="0" class="form-control numonly">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Consumable | Min</span>
                                    <input type="text" name="consumable_time" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Excess Rate</span>
                                    <input type="text" name="excess_rate" value="0" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">Fixed Amount</span>
                                    <input type="text" name="amount" value="0" class="form-control numonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-b">
                                    <span class="input-group-addon bg-muted">W/ CAP or Ceiling</span>
                                    <input type="text" name="cap_value" value="0" class="form-control numonly">
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

    <div class="modal inmodal fade" id="modal2" data-id="0" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Case Management & Def.</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

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
    {!! Html::style('css/plugins/footable/footable.core.css') !!}
    {!! Html::style('css/plugins/datapicker/datepicker3.css') !!}
@endsection

@section('scripts')
    {!! Html::script('js/plugins/footable/footable.all.min.js') !!}
    {!! Html::script('js/plugins/datapicker/bootstrap-datepicker.js') !!}
    <script>
        $(document).ready(function(){
            var modal = $('#modal');

            $('.input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('.footable').footable();

            $(document).on('click','.fee-btn',function(){
                modal.find('.fee-name').append('<h1>'+ $(this).data('name') +'</h1>');
                modal.data('id',$(this).data('id'));
                console.log(modal.data('id'));
                modal.modal({backdrop: 'static', keyboard: false});
            });

            modal.on('hidden.bs.modal', function () {
                modal.find('.fee-name').empty();
                modal.data('id',0);
            });

            loadFeeDetail();
            function loadFeeDetail(){
                $.get('http://'+ window.location.host +'/transaction-fee-detail-get', {
                    _token: '{!! csrf_token() !!}',
                    id: '{!! $data->id !!}'
                },function(data){
                    console.log(data);
                    var table = $('#table-fee-detail').find('tbody');
                    table.empty();
                    for(var a = 0; a < data.length; a++){
                        table.append('' +
                            '<tr>' +
                                '<td>'+ data[a].fee.code +'</td>' +
                                '<td>'+ data[a].fee.display_name +'</td>' +
                                '<td>'+ data[a].rate +'</td>' +
                                '<td>'+ data[a].amount +'</td>' +
                                '<td>'+ data[a].amount +'</td>' +
                                '<td class="text-right"><span class="span-btn remove-fee" data-id="'+ data[a].id +'"><i class="fa fa-times text-danger"></i></span></td>' +
                            '</tr>' +
                        '');
                    }
                });
            }

            $(document).on('click','.remove-fee',function(){
                $.get('http://'+ window.location.host +'/transaction-fee-detail-remove',{
                    _token: '{!! csrf_token() !!}',
                    id: $(this).data('id')
                },function(){
                    loadFeeDetail();
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

                $.post('http://'+ window.location.host +'/transaction-fee-detail-store', {
                    _token: '{!! csrf_token() !!}',
                    transaction_id: '{!! $data->id !!}',
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
                    loadFeeDetail();
                    modal.modal('toggle');
                });
            }


        });
    </script>
@endsection