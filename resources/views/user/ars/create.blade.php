@extends('layouts.master')

@section('title', 'ars|Create')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create ars</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="{!! route('ars.index') !!}">ars List</a>
                </li>
                <li class="active">
                    <strong>Create ars</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><small>Info</small></h5>
                    </div>
                    <div class="ibox-content">
                        {{Form::open(array('route'=>array('ars.store')))}}
                        <div class="row">
                            <div class="col-sm-5 col-sm-push-7">
                                {{-- <div class="form-group">
                                    <div class="photo_holder">
                                        <img alt="image" class="img-responsive" src="/img/placeholder.jpg">
                                    </div>
                                    <div id="validation-errors"></div>
                                    {!! Form::hidden('image',null,array('id'=>'image_path','class'=>'required')) !!}
                                    <div class="progress upload-progress" style="display: none;">
                                        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only"><span class="percentage"></span> Complete</span>
                                        </div>
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" id="photo_file_trigger">Select Image</button>
                                </div> --}}
                            </div>
                            <div class="col-sm-7 col-sm-pull-5">
                                <div class="form-group">
                                    <label>Case Project Name</label>
                                    {{Form::text('case-project-name',null, array('class'=>'form-control'))}}
                                    @if($errors->has('case-project-name'))
                                        <span class="text-danger">{{$errors->first('case-project-name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Docket #/Venue</label>
                                    {{Form::text('docket-venue',null, array('class'=>'form-control'))}}
                                    @if($errors->has('docket-venue'))
                                        <span class="text-danger">{{$errors->first('docket-venue')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Reporter</label>
                                    {{Form::text('reporter',null, array('class'=>'form-control'))}}
                                    @if($errors->has('reporter'))
                                        <span class="text-danger">{{$errors->first('reporter')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    {{Form::text('description',null, array('class'=>'form-control'))}}
                                    @if($errors->has('description'))
                                        <span class="text-danger">{{$errors->first('description')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Gr Title</label>
                                    {{Form::text('gr-title',null, array('class'=>'form-control'))}}
                                    @if($errors->has('gr-title'))
                                        <span class="text-danger">{{$errors->first('gr-title')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Client</label>
                                    {{Form::text('client',null, array('class'=>'form-control'))}}
                                    @if($errors->has('client'))
                                        <span class="text-danger">{{$errors->first('client')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    {{Form::text('date',null, array('class'=>'form-control'))}}
                                    @if($errors->has('date'))
                                        <span class="text-danger">{{$errors->first('date')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Time Start</label>
                                    {{Form::text('time-start',null, array('class'=>'form-control'))}}
                                    @if($errors->has('time-start'))
                                        <span class="text-danger">{{$errors->first('time-start')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Time Finnish</label>
                                    {{Form::text('time-finnish',null, array('class'=>'form-control'))}}
                                    @if($errors->has('time-finnish'))
                                        <span class="text-danger">{{$errors->first('time-finnish')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Duration</label>
                                    {{Form::text('duration',null, array('class'=>'form-control'))}}
                                    @if($errors->has('duration'))
                                        <span class="text-danger">{{$errors->first('duration')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Sr #</label>
                                    {{Form::text('sr-no',null, array('class'=>'form-control'))}}
                                    @if($errors->has('sr-no'))
                                        <span class="text-danger">{{$errors->first('sr-no')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Billing Instruction</label>
                                    {{Form::text('billing-instruction',null, array('class'=>'form-control'))}}
                                    @if($errors->has('billing-instruction'))
                                        <span class="text-danger">{{$errors->first('billing-instruction')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Billing Entry</label>
                                    {{Form::text('billing-entry',null, array('class'=>'form-control'))}}
                                    @if($errors->has('billing-entry'))
                                        <span class="text-danger">{{$errors->first('billing-entry')}}</span>
                                    @endif
                                </div>
                                {{-- <div class="form-group">
                                    <label>Ars Date</label>
                                    {{Form::textarea('address',null, array('class'=>'form-control resize-vertical'))}}
                                    @if($errors->has('address'))
                                        <span class="text-danger">{{$errors->first('address')}}</span>
                                    @endif
                                </div> --}}
                                {{Form::submit('Create', array('class'=>'btn btn-success'))}}
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Photo Uploader Form --}}
    {{-- {!! Form::open(array('route'=>'upload-image','files'=>'true','id'=>'image_uploader','class'=>'sr-only')) !!}
    {!! Form::file('photo',array('id'=>'photo_file_input')) !!}
    {!! Form::close() !!} --}}

@endsection


@section('styles')
    {{--{!! Html::style('') !!}--}}
@endsection

@section('scripts')
    {!! Html::script('js/jquery.form.min.js') !!}
    {!! Html::script('js/image-uploader.js') !!}
    <script>
        $(document).ready(function(){
            if($('#image_path').val().length != 0){
                $('.photo_holder').empty().append('<img src="/temp/image/'+ $('#image_path').val() +'" alt="Image" class="img-responsive">');
            }
        });
    </script>
@endsection