@extends('layouts.master')

@section('title', 'Contract Show')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Contract Show</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>Contract Show</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            {{--<div class="title-action">--}}
                {{--<button type="submit" class="btn btn-primary">Button</button>--}}
            {{--</div>--}}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="m-b-md">
                                    <a href="{!! route('contract.edit', array('contract'=>$data->contract->id)) !!}" class="btn btn-primary btn-xs pull-right">Edit project</a>
                                    <h2>Contract with {!! $data->client->fname !!} {!! $data->client->lname !!}</h2>
                                </div>
                                <dl class="dl-horizontal">
                                    <dt>Status:</dt> <dd><span class="label label-primary">{!! ucfirst($data->status) !!}</span></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <dl class="dl-horizontal">

                                    <dt>Created by:</dt> <dd>{!! $data->user->name !!}</dd>
                                    <dt>Contract Number:</dt> <dd>  {!! $data->contract->contract_number !!}</dd>
                                    <dt>Client:</dt> <dd><a href="#" class="text-navy"> {!! $data->client->fname !!} {!! $data->client->lname !!}</a> </dd>
                                </dl>
                            </div>
                            <div class="col-lg-7" id="cluster_info">
                                <dl class="dl-horizontal" >

                                    <dt>Last Updated:</dt> <dd> {!! \Carbon\Carbon::parse($data->contract->updated_at)->toDayDateTimeString() !!} </dd>
                                    <dt>Created:</dt> <dd> 	{!! \Carbon\Carbon::parse($data->contract->created_at)->toDayDateTimeString() !!} </dd>
                                    <dt>Counsel:</dt>
                                    <dd class="project-people">
                                        @foreach($counsels as $counsel)
                                        <a href=""><img alt="image" class="img-circle" src="{!! ($counsel->image == null) ? '/img/placeholder.jpg' : '/uploads/image/'.$counsel->image !!}"></a>
                                        @endforeach
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="dl-horizontal">
                                    <dt>Completed:</dt>
                                    <dd>
                                        <div class="progress progress-striped active m-b-sm">
                                            <div style="width: 60%;" class="progress-bar"></div>
                                        </div>
                                        <small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row m-t-sm">
                            <div class="col-lg-12">
                                <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                @for($a = 0; $a < count($data->cases); $a++)
                                                    <li class="{!! ($a === 0) ? 'active' : '' !!}">
                                                        <a href="#{!! $data->cases[$a]->docket !!}" data-toggle="tab"> Case #{!! $a + 1 !!} </a>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <div class="tab-content">
                                            @for($a = 0; $a < count($data->cases); $a++)
                                                <div class="tab-pane {!! ($a === 0) ? 'active' : '' !!}" id="{!! $data->cases[$a]->docket !!}">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <dl class="dl-horizontal">
                                                                <dt>Title:</dt> <dd>{!! $data->cases[$a]->title !!}</dd>
                                                                <dt>Venue:</dt> <dd>{!! $data->cases[$a]->venue !!}</dd>
                                                                <dt>Case Date:</dt> <dd>{!! \Carbon\Carbon::parse($data->cases[$a]->date)->toFormattedDateString() !!}</dd>
                                                                <dt>Case Number:</dt> <dd>{!! $data->cases[$a]->number !!}</dd>
                                                            </dl>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <dl class="dl-horizontal">
                                                                <dt>Docket Number:</dt> <dd>{!! $data->cases[$a]->docket !!}</dd>
                                                                <dt>Case Classification:</dt> <dd>{!! $data->cases[$a]->class !!}</dd>
                                                                <dt>Status:</dt> <dd>{!! $data->cases[$a]->status !!}</dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                    <div class="hr-line-dashed"></div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h2>Fees Detail</h2>
                                                            <div class="table-responsive">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Fee Name</th>
                                                                        <th>Charge Type</th>
                                                                        <th class="text-right">Free Page</th>
                                                                        <th class="text-right">Doc. Charge</th>
                                                                        <th class="text-right">Rate 01</th>
                                                                        <th class="text-right">Rate 02</th>
                                                                        <th class="text-right">Rate</th>
                                                                        <th class="text-right">Cons. Time</th>
                                                                        <th class="text-right">Excess Rate</th>
                                                                        <th class="text-right">Amount</th>
                                                                        <th class="text-right">Cap</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @for($b = 0; $b < count($data->cases[$a]->fees); $b++)
                                                                        <tr>
                                                                            <td>{!! $data->cases[$a]->fees[$b]->fee->display_name !!}</td>
                                                                            <td>{!! $data->cases[$a]->fees[$b]->charge_type !!}</td>
                                                                            <td class="text-right">{!! $data->cases[$a]->fees[$b]->free_page !!}</td>
                                                                            <td class="text-right">{!! number_format($data->cases[$a]->fees[$b]->charge_doc, 2, '.', ',') !!}</td>
                                                                            <td class="text-right">{!! number_format($data->cases[$a]->fees[$b]->rate_1, 2, '.', ',') !!}</td>
                                                                            <td class="text-right">{!! number_format($data->cases[$a]->fees[$b]->rate_2, 2, '.', ',') !!}</td>
                                                                            <td class="text-right">{!! number_format($data->cases[$a]->fees[$b]->rate, 2, '.', ',') !!}</td>
                                                                            <td class="text-right">{!! $data->cases[$a]->fees[$b]->consumable_time !!}</td>
                                                                            <td class="text-right">{!! number_format($data->cases[$a]->fees[$b]->excess_rate, 2, '.', ',') !!}</td>
                                                                            <td class="text-right">{!! number_format($data->cases[$a]->fees[$b]->amount, 2, '.', ',') !!}</td>
                                                                            <td class="text-right">{!! number_format($data->cases[$a]->fees[$b]->cap_value, 2, '.', ',') !!}</td>
                                                                        </tr>
                                                                    @endfor
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="wrapper wrapper-content project-manager">
                <h2>Contract details</h2>
                <dl class="dl-contract">
                    <dt>Contract Type:</dt> <dd>{!! $data->contract->contract_type !!}</dd>
                    <dt>Contract Number:</dt> <dd>{!! $data->contract->contract_number !!}</dd>
                    <dt>Contract Date:</dt> <dd>{!! \Carbon\Carbon::parse($data->contract->contract_date)->toFormattedDateString() !!}</dd>
                    <dt>Start Date:</dt> <dd>{!! \Carbon\Carbon::parse($data->contract->start_date)->toFormattedDateString() !!}</dd>
                    <dt>End Date:</dt> <dd>{!! \Carbon\Carbon::parse($data->contract->end_date)->toFormattedDateString() !!}</dd>
                    <dt>Status:</dt> <dd>{!! $data->contract->status !!}</dd>
                    <dt>Total Amount:</dt> <dd>{!! number_format($data->contract->amount_cost, 2, '.', ',') !!}</dd>
                    <dt>Other Conditions:</dt> <dd><p class="small">{!! $data->contract->other_conditions !!}</p></dd>
                </dl>

            </div>
        </div>
    </div>

@endsection


@section('styles')
    {{--{!! Html::style('') !!}--}}
@endsection

@section('scripts')
    {{--{!! Html::script('') !!}--}}
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection