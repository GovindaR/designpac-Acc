@extends('layouts.app')
@section('title', 'Create User')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Add User</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <strong>Users</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        {!! Form::open(array('route' => array('users.store'), 'role' => 'form', 'method' => 'POST')) !!}

                        <div class="form-group {!! $errors->first('name') ? 'has-error' : '' !!}">
                            <label for="name">Name</label>

                            {!! Form::text('name', null, array('class'=>'form-control',
                                                                'id'=>'name',
                                                                 'placeholder'=>'Enter Name'))!!}
                            {!! $errors->first('name', '<p class="text-danger">:message</p>')!!}
                        </div>
                        <div class="form-group {!! $errors->first('last_name') ? 'has-error' : '' !!}">
                            <label for="name">Last Name</label>

                            {!! Form::text('last_name', null, array('class'=>'form-control',
                                                                'id'=>'last_name',
                                                                 'placeholder'=>'Enter Last Name'))!!}
                            {!! $errors->first('last_name', '<p class="text-danger">:message</p>')!!}
                        </div>

                        <div class="form-group {!! $errors->first('email') ? 'has-error' : '' !!}">
                            <label for="name">Email</label>

                            {!! Form::email('email', null, array('class'=>'form-control',
                                                                'id'=>'email',
                                                                 'placeholder'=>'Enter Email'))!!}
                            {!!$errors->first('email', '<p class="text-danger">:message</p>')!!}
                        </div>

                        <div class="form-group {!! $errors->first('password') ? 'has-error' : '' !!}">
                            <label for="name">Password</label>

                            {!! Form::password('password', array('class'=>'form-control',
                                                                'id'=>'password',
                                                                 'placeholder'=>'Enter Password'))!!}
                            {!!$errors->first('password', '<p class="text-danger">:message</p>')!!}
                       </div>

                        <div class="form-group {!! $errors->first('password_confirmation') ? 'has-error' : '' !!}">
                           <label for="name">Confirm Password</label>

                           {!! Form::password('password_confirmation', array('class'=>'form-control',
                                                               'id'=>'password_confirmation',
                                                                'placeholder'=>'Confirm Password'))!!}
                            {!!$errors->first('password_confirmation', '<p class="text-danger">:message</p>')!!}
                       </div>

                       <div class="form-group {!! $errors->first('roles[]') ? 'has-error' : '' !!}">
                           {!!Form::select('roles[]', $availRoles, null,
                               array('multiple'=>'multiple', "size"=>5, "style"=>"display:none"))
                           !!}
                           {!!$errors->first('roles[]', '<p class="text-danger">:message</p>')!!}

                        </div>


                        <button type="submit" class="btn btn-primary">Add User</button>
                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>


@stop