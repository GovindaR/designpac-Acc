@extends('layouts.app')
@section('title', 'Roles')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Roles</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
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

                        @if(count($roles) == 0 )
                            <p>You do not have any roles created.<a href="{{url('roles/create')}}"
                                                                    class="btn btn-success btn-sm pull-right"><i
                                            class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Role</a>
                        @else
                            <h5>Roles Listing</h5>
                            <a href="{{url('roles/create')}}" class="btn btn-success btn-sm pull-right"><i
                                        class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Role</a>
                    </div>
                    <!--            Table view-->
                    <div class="ibox-content">
                        @include('errors.list')

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $r)
                                <tr>
                                    <td>{{$r->id}}</td>
                                    <td>{{$r->name}}</td>
                                    <td>{{$r->slug}}</td>
                                    <td>{{$r->description}}</td>
                                    <td>
                                        <a href="{{route('roles.edit', $r->id)}}"
                                           class="btn btn-primary btn-sm"><i
                                                    class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>

                                        <div style="display: inline-table">
                                            {!! Form::open(array('route' => array('roles.destroy', $r->id), 'method' => 'DELETE')) !!}
                                            <button class="btn btn-primary btn-sm btnDelete" type="submit" onclick="return confirm('Are you sure ?')"><i
                                                        class="fa fa-trash"></i>&nbsp;&nbsp;Delete
                                            </button>
                                            {!! Form::close() !!}
                                        </div>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        <!--        Table view ends-->

                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop
