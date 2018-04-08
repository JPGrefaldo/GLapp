@extends('layouts.master')

@section('title', 'Client')

@section('styles')
{!! Html::style('css/plugins/toastr/toastr.min.css') !!}
{!! Html::style('css/plugins/bootstrap-toggle-master/bootstrap-toggle.min.css') !!}
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
    /* @media (min-width: 1500px) {
    .modal-lg {
        width: 80%;
        height: 100%; /* control height here */
    } */
}
</style>
@endsection



@section('content')

 <!-- Top bar/BreadCrumbs -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="rmrt col-lg-1" style="width: 6%; text-align:center;">
            <h2 class="fa fa-user-circle" style="font-size:60px;  margin-top:17px; color: #1bb393;"></h2>
    </div>
    <div class="rmlt col-lg-2">
       <h2>Client's Info</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/"><strong>Clients</strong></a>
            </li>
        </ol>
    </div>
    <div class="col-lg-6 pull-right">
        <div class="input-group" style="margin-top:40px;">
            <span class="input-group-btn">
                    <button type="button" class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
            </span>
            <input type="text" placeholder="Search client" class="input form-control">
            <span class="input-group-btn">
                    <button class="btn btn-primary " type="button"><i class="fa fa-user-o"></i>&nbsp;Add</button>
            </span>
        </div>
    </div>
</div>
 <!-- Top end -->


 <!-- Main Content  -->
<div class="wrapper wrapper-content animated fadeInUp">
<div class="row">
    <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="clients-list">
                    <div class="tab-content">
                        <div class="full-height-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    @foreach($client as $var)

                                    <tr data-toggle="modal" data-target="#myModal5">
                                        <td class="client-avatar"><img alt="image" src="img/a{{ $var['imgNo'] }}.jpg"> </td>
                                        <td><a data-toggle="tab" href="#contact-1" class="client-link">{{ $var['name'] }}</a></td>
                                        <td> {{ $var['company'] }}</td>
                                        <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                        <td> {{ $var['email'] }}</td>
                                        <td>
                                            <button class="btn btn-danger btn-circle btn-xm" type="button">
                                                    <i class="fa fa-times"></i>
                                            </button>
                                        </td>
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
<div class="row">
<div class="col-lg-12">
<div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated fadeInUp">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Modal title</h4>
                    <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                </div>

                        <div class="tabs-container no-margins">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Personal Info</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Office Address</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Billing Info</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">Billing Address</a></li>
                            </ul>
                            <div class="tab-content">

                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="col-lg-6">
                                            <div class="input-group m-b"><span class="input-group-addon bg-primary">First Name</span><input type="text" class="form-control"></div>
                                            <div class="input-group m-b"><span class="input-group-addon bg-primary">Middle Name</span><input type="text" class="form-control"></div>
                                            <div class="input-group m-b"><span class="input-group-addon bg-primary">Last Name</span><input type="text" class="form-control"></div>
                                        </div>

                                        <div class=" col-lg-6">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Tel. No</span>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Plaintiff Type</span>
                                                <select type="text" placeholder="Username" class="form-control">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Business Type</span>
                                                <select type="text" placeholder="Username" class="form-control">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <div class=" col-lg-12">
                                        <div class="input-group m-b">
                                            <span class="input-group-addon bg-primary">Search</span>
                                            <input id="acInput1" placeholder="Enter your address" onfocus="" type="text" class="form-control autocomplete" autocomplete="off">

                                            <span class="input-group-btn" id="toggle">
                                                    <input type="checkbox" data-toggle="toggle" onchange="toggle()">
                                            </span>
                                        </div>
                                        <div class="input-group m-b">
                                            <span class="input-group-addon bg-primary">Street Address</span>
                                            <div class="row">
                                                <div class="col-lg-3"><input type="text" class="form-control street_number_acInput1" disabled></div>
                                                <div class="rmlt col-lg-9"><input type="text" class="form-control route_acInput1" disabled></div>
                                            </div>
                                        </div>
                                        <div class="input-group m-b">
                                            <span class="input-group-addon bg-primary">Barangay/Town</span>
                                            <input type="text" class="form-control neighborhood_acInput1 administrative_area_level_5_acInput1" disabled>
                                        </div>
                                        <div class="input-group m-b">
                                            <span class="input-group-addon bg-primary">Municipality/City</span>
                                            <input type="text" class="form-control locality_acInput1" disabled>
                                        </div>
                                        <div class="input-group m-b">
                                            <span class="input-group-addon bg-primary">Province/Conurbation</span>
                                            <input type="text" class="form-control administrative_area_level_1_acInput1 administrative_area_level_2_acInput1" disabled>
                                        </div>
                                        
                                        <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="input-group m-b">
                                                        <span class="input-group-addon bg-primary">Country</span>
                                                        <input type="text" class="form-control  country_acInput1" disabled></div>
                                                </div>
                                                <div class="col-lg-5">
                                                        <div class="input-group m-b">
                                                            <span class="input-group-addon bg-primary">Zip Code</span>
                                                            <input type="text" class="form-control  postal_code_acInput1" disabled></div>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="tab-3" class="tab-pane">
                                    <div class="panel-body">
                                        <div class="col-lg-6">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Contact No.</span>
                                                <input type="text" class="form-control" >
                                            </div>
            
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">O.I.C.</span>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group m-b">
                                                    <span class="input-group-addon bg-primary">Contract</span>
                                                    <input type="text" class="form-control" >
                                            </div>
                                            
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Type</span>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="tab-4" class="tab-pane">
                                    <div class="panel-body">
                                        <div class=" col-lg-12">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Search</span>
                                                <input id="acInput2" placeholder="Enter your address" onfocus="" type="text" class="form-control autocomplete" autocomplete="off">
                                                <span class="input-group-btn"><button type="button" class="btn btn-primary"><i class="fa fa-paste"></i></button></span>
                                            </div>
                                            <div class="input-group m-b">
                                                <span class="input-group-btn bg-primary">
                                                    <button type="button" class="btn btn-primary">Street Address</button>
                                                </span>
                                                <div class="row">
                                                    <div class="col-lg-3"><input type="text" class="form-control street_number_acInput2" ></div>
                                                    <div class="rmlt col-lg-9"><input type="text" class="form-control route_acInput2" ></div>
                                                </div>
                                            </div>
                                            <div class="input-group m-b">
                                                <span class="input-group-btn bg-primary">
                                                    <button type="button" class="btn btn-primary">Barangay/Town</button>
                                                </span>
                                                <input type="text" class="form-control neighborhood_acInput2 administrative_area_level_5_acInput2" >
                                            </div>

                

                                            <div class="input-group m-b">
                                                <span class="input-group-btn bg-primary">
                                                    <button type="button" class="btn btn-primary">Municipality/City</button>
                                                </span>
                                                <input type="text" class="form-control locality_acInput2" >
                                            </div>
                                            <div class="input-group m-b">
                                                <span class="input-group-btn bg-primary">
                                                    <button type="button" class="btn btn-primary">Province/Conurbation</button>
                                                </span>
                                                <input type="text" class="form-control administrative_area_level_1_acInput2 administrative_area_level_2_acInput2" >
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="input-group m-b">
                                                        <span class="input-group-btn bg-primary">
                                                            <button type="button" class="btn btn-primary">Country</button> 
                                                        </span>
                                                        <input type="text" class="form-control  country_acInput2" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="input-group m-b">
                                                        <span class="input-group-btn bg-primary">
                                                            <button type="button" class="btn btn-primary">Zip Code</button>
                                                        </span>
                                                        <input type="text" class="form-control  postal_code_acInput2" >
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                                </div>
                            </div>
    
    
                        </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

 <!-- Main Content End -->
@endsection

@section('scripts')

{!! Html::script('js/plugins/bootstrap-toggle-master/bootstrap-toggle.min.js') !!}
@yield('greetings')

<script>

// document.querySelectorAll("tr").forEach((tr) => {
//         tr.addEventListener('click', function(e) {
//         e = e || window.event;
//         var target = e.target || e.srcElement;
//             // text = target.textContent || text.innerText;
//             console.log(target);   
// }, false);});

let data = {
    name: "John Paul Grefaldo",
    age: "19"
}

function toggle(acInput) {
    for (var component in componentForm){
        document.getElementsByClassName(`${component}_${acInput}`)[0].value = '';
        document.getElementsByClassName(`${component}_${acInput}`)[0].disabled = false;}
        document.getElementById("toggle").children[0].disabled = true;
        document.getElementById("toggle").children[0].click();
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVS0CN-Ez85eOLGEh7d113v9LE9ZzDses&libraries=places&callback=initAutocomplete"
async defer></script>
{!! Html::script('js/google.js') !!}
@endsection