@extends('layouts.master')

@section('title', 'Client')

@section('styles')
{!! Html::style('css/plugins/toastr/toastr.min.css') !!}
{!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
{!! Html::style('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') !!}
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
    /* tr:hover {
        cursor: pointer;
    }
    tr:active {
        background-color: #eaeaea;
        box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
    } */
    .pac-container {
        z-index: 10000 !important;
    }
}
</style>

@endsection

@section('content')

@include('layouts.breadcrumb')

<div class="wrapper wrapper-content">

    @include('client.list')

    @include('client.modal')

</div>

@endsection

@section('scripts')
{!! Html::script('js/plugins/dataTables/datatables.min.js') !!}
{!! Html::script('js/script.js') !!}
{!! Html::script('js/google.js') !!}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVS0CN-Ez85eOLGEh7d113v9LE9ZzDses&libraries=places&callback=initAutocomplete"
async defer></script>
@endsection