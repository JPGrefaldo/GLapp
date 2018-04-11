@extends('layouts.master')

@section('title', 'Client')

@section('styles')
{!! Html::style('css/plugins/toastr/toastr.min.css') !!}
{!! Html::style('css/plugins/bootstrap-toggle-master/bootstrap-toggle.min.css') !!}
{!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
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


 <!-- Main Content  -->
<div class="wrapper wrapper-content">

    @include('client.list')

    @include('client.modal')



</div>
 <!-- Main Content End -->
@endsection

@section('scripts')


{!! Html::script('js/plugins/dataTables/datatables.min.js') !!}
<script>

var data;

$.ajax({
    url: `${location.pathname}/list`,
    success: function(result){
        popData(result);
        data = result;
    }
});

function popData(data){

    $('.table-striped').dataTable( {
        "autoWidth": false,//Disable autowidth for responsive table
        "dom": '<"html5buttons"B>lTfgitp',
            "buttons": [
                        {"extend": 'copy'},
                        {"extend": 'csv'},
                        {"extend": 'excel', title: 'ExampleFile'},
                        {"extend": 'pdf', title: 'ExampleFile'},

                        {"extend": 'print',
                        customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                        }
                    ],
        "data": data,
        "columnDefs": [{
            
            "targets": 0,
            "data": null,
            "render": function (row) {
                return row.fname + " " + row.lname;} },{

            "targets": 1,
            "data": "plaintiff"},{

            "targets": 2,
            "data": null,
            "render":function(row){
                return `${row.email}`
            }},{

            "targets": 3,
            "data": null,
            "className": "text-right",
            "render": function (row) {
                return  `<div class="btn-group">
                            <a class="btn-success btn btn-xs" href="contract/create?id=${row.id}">Contract</a>
                            <button class="btn-primary btn btn-xs" id="${row.id}" data-toggle="modal" data-target="#myModal5" onclick="getData(this.id)">
                            View</button>
                            <button class="btn-danger btn btn-xs" id=${row.id}>Delete</button>
                        </div>`;}}
            
        ]
    } );

}


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

function clearInputs(){
for (i=1; i < 3; i++){
    for (var component in componentForm){
        document.getElementsByClassName(`${component}_acInput${i}`)[0].value = "";
        document.getElementsByClassName('autocomplete')[i-1].value = "";
    }
}}

function getData(id){
    clearInputs();
    for (component of data){

        let found; // Toggle if match found
        let address; 

        for(row in component){          
            if (component.id == id){ found = 1;
                address = {...component.address[0]};      
            inputText = document.querySelectorAll(`[name=${row}]`)[0];
            if (inputText){
                inputText.value = component[row];
            }}
        }

        if (found) {fillAddress(address);break;} // prevent d' loop on going if the match is found early & call the function
    }}

function fillAddress(address){
    
    for(item in address){
        inputText = document.getElementsByClassName(`${item}_acInput${address.address + 1}`)[0];
        if(inputText){
            inputText.value = address[item];
            console.log(inputText);
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