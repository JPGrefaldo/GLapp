@extends('layouts.master')

@section('title', 'Create Billing')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-5">
            <h2>Create Billing</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>Create Billing</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-7">
            <div class="title-action">
                <button type="submit" class="btn btn-primary">Button</button>
            </div>
        </div>
    </div>

    <div class="fh-breadcrumb">

        <div class="fh-column">
            <div class="p-md bg-warning text-center">
                <h3>Service Reports</h3>
            </div>
            <div class="full-height-scroll">
                <ul class="list-group elements-list">
                    @foreach($service_reports as $key => $sr)
                        <li class="list-group-item @if ($key === 0) active @endif">
                            <a data-toggle="tab" href="#tab-{!! $key !!}">
                                <small class="pull-right text-muted"> {!! \Carbon\Carbon::parse($sr->created_at)->diffForHumans() !!}</small>
                                <strong>{!! $sr->feeDetail->transaction->client->fname !!} {!! $sr->feeDetail->transaction->client->lname !!}</strong>
                                <div class="small m-t-md">
                                    <h3 class="text-success">{!! $sr->feeDetail->fee->display_name !!}</h3>
                                    <p class="m-b-none">{!! $sr->feeDetail->cases->title !!}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>

        <div class="full-height">
            <div class="full-height-scroll white-bg border-left">

                <div class="element-detail-box">

                    <div class="tab-content">
                        @foreach($service_reports as $key => $sr)
                        <div id="tab-{!! $key !!}" class="tab-pane @if ($key === 0) active @endif">

                            {{--<div class="pull-right">--}}
                                {{--<div class="tooltip-demo">--}}
                                    {{--<button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="left" title="Plug this message"><i class="fa fa-plug"></i> Plug it</button>--}}
                                    {{--<button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>--}}
                                    {{--<button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important"><i class="fa fa-exclamation"></i> </button>--}}
                                    {{--<button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="small text-muted"><i class="fa fa-clock-o"></i> {!! \Carbon\Carbon::parse($sr->created_at)->toDayDateTimeString() !!}</div>

                            <h1>{!! $sr->feeDetail->fee->display_name !!}</h1>

                        </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection


@section('styles')
    {!! Html::style('css/plugins/codemirror/codemirror.css') !!}
    {!! Html::style('css/plugins/codemirror/ambiance.css') !!}
@endsection

@section('scripts')
    {{--{!! Html::script('') !!}--}}
    <script>
        $(document).ready(function(){
            $('body').addClass('fixed-sidebar no-skin-config full-height-layout');


        });
    </script>
@endsection