@extends('layouts.app')
@section('title', 'Edit Role')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit Role</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{!!url('/')!!}">Home</a>
                </li>
                <li>
                    <strong>Roles</strong>
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
                        {!! Form::open(array('route' => array('roles.update', $id), 'role' => 'form', 'method' => 'PUT')) !!}
                        <div class="form-group {!! $errors->first('name') ? 'has-error' : '' !!}">
                            <label for="name">Role Name</label>
                            {!!Form::text('name', $name,
                                            array("id"=>"name", "class"=>"form-control", "placeholder"=>"Enter Role Name"))!!}
                            {!!$errors->first('name',  '<p class="text-danger">:message</p>')!!}
                        </div>

                        <div class="form-group {!! $errors->first('slug') ? 'has-error' : '' !!}">
                            <label for="description">Role Slug</label>
                            {!!Form::text('slug', $slug,
                                            array("id"=>"slug", "class"=>"form-control", "placeholder"=>"Enter Role Slug"))!!}
                            {!!$errors->first('slug',  '<p class="text-danger">:message</p>')!!}
                        </div>

                        <div class="form-group {!! $errors->first('description') ? 'has-error' : '' !!}">
                            <label for="description">Description</label>
                            {!!Form::text('description', $description,
                                            array("id"=>"description", "class"=>"form-control", "placeholder"=>"Enter Role Description"))!!}
                            {!!$errors->first('description',  '<p class="text-danger">:message</p>')!!}
                        </div>

                        <button type="submit" class="btn btn-primary">Update Role</button>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop