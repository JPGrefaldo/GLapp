@extends('layouts.master')

@section('title', 'Client')

@section('styles')
{!! Html::script('css/plugins/toastr/toastr.min.css') !!}
<style>
    .nopads{
        padding:0;
    }
    .rmlt{
        padding-left:0;
    }
    .rmrt{
        padding-right:0;
    }
    .rmbt{
        padding-bottom:0;
    }
    .rmtp{
        padding-top:0;
    }
    .rmgin{
        margin:0;
    }
    .fixwidth {
        width: 19%;
    }
</style>
@endsection

@section('content')
 <!-- Top bar/BreadCrumbs -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Client's Info</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/"><strong>Clients</strong></a>
            </li>
        </ol>
    </div>
</div>
 <!-- Top end -->


 <!-- Main Content  -->
<div class="wrapper wrapper-content animated fadeInRight">
<div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h2><i class="fa fa-user"></i> Clients</h2>
                            <div class="input-group">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                                </span>
                                <input type="text" placeholder="Search client " class="input form-control">
                                <span class="input-group-btn">
                                        <button class="btn btn-primary " type="button"><i class="fa fa-user-o"></i>&nbsp;Add</button>
                                </span>
                            </div>
                            <div class="clients-list">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="full-height-scroll">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <tbody>
                                                @foreach($client as $var)
                                                <tr>
                                                    <td class="client-avatar"><img alt="image" src="img/a{{ $var['imgNo'] }}.jpg"> </td>
                                                    <td><a data-toggle="tab" href="#contact-1" class="client-link">{{ $var['name'] }}</a></td>
                                                    <td> {{ $var['company'] }}</td>
                                                    <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                    <td> {{ $var['email'] }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-circle btn-xm" type="button">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-circle btn-xm" type="button">
                                                                <i class="fa fa-times"></i>
                                                        </button>
                                                    </td 
                                                </tr>
                                                @endforeach
                                                </tbody>
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
 <!-- Main Content End -->
@endsection


@section('styles')

@endsection

@section('scripts')
{!! Html::script('js/google.js') !!}
<script>
    
</script>
@endsection