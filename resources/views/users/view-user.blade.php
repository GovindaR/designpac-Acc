@extends('layouts.app')
@section('title', 'Users')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Users</h2>
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
                        @if(count($users) == 0 )
                            <p>You do not have any users created.</p><a href="{{url('users/create')}}"
                                                                        class="btn btn-success btn-sm pull-right"><i
                                        class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add User</a>
                        @else
                            <h5>Users Listing</h5>
                            <a href="{{url('users/create')}}" class="btn btn-success btn-sm pull-right"><i
                                        class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add User</a>
                    </div>

                    <div class="ibox-content">
                        @include('errors.list')

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                            <thead>
                            <tr>

                                <th data-toggle="true">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th data-hide="all">Roles</th>
                                <th data-hide="all">Created Date</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if(count($user->roles) > 0)
                                            <?php $roles = []; ?>
                                            @foreach($user->roles as $role)
                                                <?php $roles[] = $role->name; ?>
                                            @endforeach
                                            {!! implode(', ', $roles) !!}
                                        @endif
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                        <div style="display: inline-table">
                                            {!! Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'DELETE')) !!}
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
                                <td colspan="6">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop