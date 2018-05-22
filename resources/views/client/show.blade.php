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
@endsection