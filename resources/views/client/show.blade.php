@extends('layouts.master')

@section('title', 'Client')

@section('styles')
@endsection

@section('content')

<div class="wrapper wrapper-content">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-lg-6">
                        <div class="input-group m-b"><span class="input-group-addon bg-muted" >First Name</span>
                            <input name="fname" type="text" class="form-control" required>
                        </div>
                        <div class="input-group m-b"><span class="input-group-addon bg-muted">Middle Name</span>
                            <input name="mname" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group m-b"><span class="input-group-addon bg-muted">Last Name</span>
                            <input name="lname" type="text" class="form-control" required>
                        </div>
                        <div class="input-group m-b">
                            <span class="input-group-addon bg-muted">Email</span>
                            <input name="email" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <table id="business" class="table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Business Name</th>
                                <th>Address <span><button class="btn btn-primary btn-xs" href="#">Add</button></span></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection

@section('scripts')

{!! Html::script('js/plugins/dataTables/datatables.min.js') !!}
{!! Html::script('js/plugins/toastr/toastr.min.js') !!}
{!! Html::script('js/google.js') !!}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVS0CN-Ez85eOLGEh7d113v9LE9ZzDses&libraries=places&callback=initAutocomplete"
async defer></script>
<script>
tblBusiness= $('#business').dataTable({
    "autoWidth": false,
    "paging":false,
    "searching": false,
    "ordering":  true,
    "info": false,

    "columnDefs": [{
        "targets": 0,
        "data": null,
        "render":function(row){
            let name, mark;
            name = row.name;
        
            if( row.name.length > 17) name = `${row.name.substr(0,18)}...`;
            if (row.id === bill_id) mark = "checked";
            
            return `
                <div class="radio no-margins text-center no-padding">
                    <input class="no-margins" type="radio" value="${row.id}" name="billing" aria-label="Single radio One" ${mark}>
                    <label></label>
                </div> ${name}` 
        }},{

        "targets": 1,
        "data": null,
        "className": "text-right",
        "render": function (row) {
            return `
                <div class="btn-group">
                    <button class="btn-mute btn btn-xs" onclick="popBus(this)">view</button>
                    <button class="btn-danger btn btn-xs" id="${row.id}" onclick="updateBus(this.id,'destroy')">Delete</button>
                </div>` }
       }
        
    ]
} );
</script>

@endsection