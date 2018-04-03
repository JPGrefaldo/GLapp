@extends('layouts.master')

@section('title', 'Post page')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Edit Profile</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>Edit Profile</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create Profile</h5>
                    </div>
                    <div class="ibox-content">
                        {{ Form::open(array('route'=>'profile-store')) }}
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="m-t-none m-b text-success">Basic Information</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            {{Form::text('firstname',$data->profile->firstname, array('class'=>'form-control'))}}
                                            @if($errors->has('firstname'))
                                                <span class="text-danger">{{$errors->first('firstname')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            {{Form::text('middlename',null, array('class'=>'form-control'))}}
                                            @if($errors->has('middlename'))
                                                <span class="text-danger">{{$errors->first('middlename')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            {{Form::text('lastname',null, array('class'=>'form-control'))}}
                                            @if($errors->has('lastname'))
                                                <span class="text-danger">{{$errors->first('lastname')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="data_3">
                                            <label>Date of Birth</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="dob" class="form-control" value="01/13/2000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Marital Status</label>
                                            {{Form::select('status', array(
                                            null => 'Select status',
                                            'married' => 'Married (and not separated)',
                                            'widowed' => 'Widowed (including living common law)',
                                            'separated' => 'Separated (including living common law)',
                                            'divorced' => 'Divorced (including living common law)',
                                            'single' => 'Single (including living common law)'
                                            ),null,array('class'=>'form-control'))}}
                                            @if($errors->has('status'))
                                                <span class="text-danger">{{$errors->first('status')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Blood Type</label>
                                            {{Form::select('blood_type', array(
                                            null => 'Select Blood Type',
                                            'O negative' => 'O negative',
                                            'O positive' => 'O positive',
                                            'A negative' => 'A negative',
                                            'A positive' => 'A positive',
                                            'B negative' => 'B negative',
                                            'B positive' => 'B positive',
                                            'AB negative' => 'AB negative',
                                            'AB positive' => 'AB positive',
                                            ),null,array('class'=>'form-control'))}}
                                            @if($errors->has('blood_type'))
                                                <span class="text-danger">{{$errors->first('blood_type')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <h3 class="m-t-none m-b text-success">Contact Information</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <div class="input-group">
                                                <div class="input-group-btn input-group-select">
                                                    <select name="contact-type" class="form-control">
                                                        <option value="">Select type</option>
                                                        <option value="telephone">Telephone</option>
                                                        <option value="fax">Fax</option>
                                                        <option value="mobile">Mobile</option>
                                                    </select>
                                                </div>
                                                <input type="text" name="contact-number" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Permanent Address</label>
                                            {{Form::textarea('permanent_address',null, array('class'=>'form-control resize-vertical'))}}
                                            @if($errors->has('permanent_address'))
                                                <span class="text-danger">{{$errors->first('permanent_address')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Present Address</label>
                                            {{Form::textarea('present_address',null, array('class'=>'form-control resize-vertical'))}}
                                            @if($errors->has('present_address'))
                                                <span class="text-danger">{{$errors->first('present_address')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <h3 class="m-t-none m-b text-success">In case of Emergency Contact</h3>
                                <div id="icoe-first">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="icoe-name[]" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Relation</label>
                                        <input type="text" name="icoe-relation[]" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <div class="input-group">
                                            <div class="input-group-btn input-group-select">
                                                <select name="icoe-contact-type[]" class="form-control">
                                                    <option value="">Select type</option>
                                                    <option value="telephone">Telephone</option>
                                                    <option value="fax">Fax</option>
                                                    <option value="mobile">Mobile</option>
                                                </select>
                                            </div>
                                            <input type="text" name="icoe-contact-number[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="icoe-address[]" class="form-control resize-vertical"></textarea>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div id="icoe-second"></div>

                                <button type="button" class="btn btn-success add-icoe">Add another</button>


                            </div>

                            <div class="col-sm-6">
                                <h3 class="m-t-none m-b text-success">Account security question</h3>
                                <div class="form-group">
                                    <label>Question 1</label>
                                    <select name="question[]" id="" class="form-control">
                                        <option value="question-01">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, voluptatum!</option>
                                        <option value="question-02">Ad doloribus ipsum unde! Deserunt distinctio illum repellat? Accusamus, provident.</option>
                                        <option value="question-03">Atque beatae doloremque, expedita inventore ipsum iure quis sunt veniam! </option>
                                        <option value="question-04">Ab illo ipsa maxime molestias obcaecati rem voluptatum. Aspernatur, eos?</option>
                                        <option value="question-05">Ab dolorum eaque facilis id inventore iusto laborum reiciendis voluptatem!</option>
                                        <option value="question-06">Accusamus eaque fugiat obcaecati porro unde? Deserunt ea exercitationem vitae.</option>
                                        <option value="question-07">Asperiores atque cumque earum neque quas quisquam sint, ullam voluptas?</option>
                                        <option value="question-08">A culpa iste nostrum odio ratione similique unde voluptates voluptatum!</option>
                                        <option value="question-09">A eveniet fugit quod recusandae repellat! Aliquam qui repellendus sapiente!</option>
                                        <option value="question-10">Aliquam, beatae commodi doloribus obcaecati omnis quisquam reiciendis sit veniam?</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Answer 1</label>
                                    <input type="text" name="answer[]" class="form-control">
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label>Question 2</label>
                                    <select name="question[]" id="" class="form-control">
                                        <option value="question-11">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, voluptatum!</option>
                                        <option value="question-12">Ad doloribus ipsum unde! Deserunt distinctio illum repellat? Accusamus, provident.</option>
                                        <option value="question-13">Atque beatae doloremque, expedita inventore ipsum iure quis sunt veniam! </option>
                                        <option value="question-14">Ab illo ipsa maxime molestias obcaecati rem voluptatum. Aspernatur, eos?</option>
                                        <option value="question-15">Ab dolorum eaque facilis id inventore iusto laborum reiciendis voluptatem!</option>
                                        <option value="question-16">Accusamus eaque fugiat obcaecati porro unde? Deserunt ea exercitationem vitae.</option>
                                        <option value="question-17">Asperiores atque cumque earum neque quas quisquam sint, ullam voluptas?</option>
                                        <option value="question-18">A culpa iste nostrum odio ratione similique unde voluptates voluptatum!</option>
                                        <option value="question-19">A eveniet fugit quod recusandae repellat! Aliquam qui repellendus sapiente!</option>
                                        <option value="question-20">Aliquam, beatae commodi doloribus obcaecati omnis quisquam reiciendis sit veniam?</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Answer 2</label>
                                    <input type="text" name="answer[]" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="hr-line-dashed"></div>
                                <div class="text-right">
                                    {{Form::submit('Create', array('class'=>'btn btn-lg btn-primary'))}}
                                </div>
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('styles')
    {!! Html::style('css/plugins/datapicker/datepicker3.css') !!}
@endsection

@section('scripts')
    <!-- Data picker -->
    {!! Html::script('js/plugins/datapicker/bootstrap-datepicker.js') !!}
    <script>
        $(document).ready(function(){
            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
            $(document).on('click','.add-icoe',function(){
                $('#icoe-first').clone().appendTo('#icoe-second');
                $(this).hide();
                $('#icoe-second').append('<button type="button" class="btn btn-danger remove-icoe">Remove</button>')
            });
            $(document).on('click','.remove-icoe',function(){
                $('#icoe-second').empty();
                $('.add-icoe').show();
                $(this).remove();
            });
        });
    </script>
@endsection