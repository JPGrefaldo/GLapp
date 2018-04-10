@extends('layouts.master')

@section('title', 'Client')

@section('styles')
{!! Html::style('css/plugins/toastr/toastr.min.css') !!}
{!! Html::style('css/plugins/bootstrap-toggle-master/bootstrap-toggle.min.css') !!}
{!! Html::style('css/dataTables.min.css') !!}
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
    tr:hover {
        cursor: pointer;
    }
    tr:active {
        background-color: #eaeaea;
        box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
    }
    .pac-container {
        z-index: 10000 !important;
    }
}
</style>

@endsection

@section('content')

@include('layouts.breadcrumb')


 <!-- Main Content  -->
<div class="wrapper wrapper-content animated fadeInUp">

    @include('client.list')

    @include('client.modal')

</div>

 <!-- Main Content End -->
@endsection

@section('scripts')

{!! Html::script('js/plugins/bootstrap-toggle-master/bootstrap-toggle.min.js') !!}
{!! Html::script('js/dataTables.min.js') !!}
<script>

$(document).ready(function() {
    $('#example').DataTable( {
        ajax: '../ajax/data/arrays.txt'
    } );
} );


var data = {!! $data !!};

function pasteAll(){
    for (component in componentForm){
        paste(component);
    }
}

function paste(elem){
	if(typeof elem === 'object'){
		for(item of elem){

		getElem(`${item}_acInput2`).value = getElem(`${item}_acInput1`).value}
    }else{
        getElem(`${elem}_acInput2`).value = getElem(`${elem}_acInput1`).value
    } 
}

function delClient(elem){
    
    tr = elem.parentElement.parentElement
    tr.addEventListener('click',function(event){ event.stopImmediatePropagation();
        event.stopPropagation();
        event.cancelBubble = true;
        event.preventDefault();
});

	tr.remove();

}

function getData(elem){
	dataId = elem.getAttribute("id");
    for(component in data[dataId]){
        document.querySelectorAll(`[name=${component}]`)
        inputText = document.querySelectorAll(`[name=${component}]`)[0];
        if (inputText){
            inputText.value = data[dataId][component];
        }
        
    }


    }


function getElem(elem){
    return document.getElementsByClassName(elem)[0];
}

</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVS0CN-Ez85eOLGEh7d113v9LE9ZzDses&libraries=places&callback=initAutocomplete"
async defer></script>
{!! Html::script('js/google.js') !!}
@endsection