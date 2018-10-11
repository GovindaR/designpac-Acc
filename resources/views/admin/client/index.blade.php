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
                    <strong>Clients</strong>
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


                    <div class="ibox-content">
                        @include('errors.list')

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Organization</th>
                                <th>Package</th>
                                <th>Created Date/Time</th>
                                <th>Assign To</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{!! $count !!}</td>
                                    <td>{{$client->name.' '.$client->last_name}}</td>
                                    <td>{{ \App\Package::where('user_id',$client->id)->value('organization_name') }}</td>
                                    <td>{{ \App\Package::where('user_id',$client->id)->value('suitable_package') }}</td>
                                    <td>{{$client->created_at}}</td>
                                    <td>
                                        <?php
                                        $check=\App\AssignModel::where('client_id',$client->id)->value('id');
                                        if($check != null){
                                            $designer_id=\App\AssignModel::where('client_id',$client->id)->value('assign_to');
                                            $designer=\App\User::where('id',$designer_id)->value('name');
                                            echo $designer;
                                            ?>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <a href="{{route('users.edit', $client->id)}}" class="btn btn-sm btn-success"><i
                                                    class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                        <?php
                                        $check=\App\AssignModel::where('client_id',$client->id)->value('id');
                                        if($check == null){

                                        ?>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal{!! $client->id !!}">
                                            Assign
                                        </button>
                                        <div class="modal inmodal" id="myModal{!! $client->id !!}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated flipInY">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title"></h4>
                                                    </div>
                                                    {!! Form::open(['url'=>'admin/client/assign','method'=>'post']) !!}
                                                    <div class="modal-body">
                                                        <p>
                                                            Assign
                                                        </p>
                                                        <input type="hidden" name="client_id" value="{{$client->id}}">
                                                        {!! Form::select('assign_to', array(null => '--Please Select--')+$designers, null, ['class'=>'form-control']) !!}

                                                    </div>

                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" >
                                                    </div>

                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                            <div style="display: inline-table">
                                                {!! Form::open(['url'=>'clients/destroy/','method'=>'post']) !!}
                                                <input type="hidden" name="client_id" value="{{$client->id}}">
                                                <button class="btn btn-danger btn-sm btnDelete" type="submit" onclick="return confirm('Are you sure ?')"><i
                                                            class="fa fa-trash"></i>&nbsp;&nbsp;Remove Assign
                                                </button>
                                                {!! Form::close() !!}
                                            </div>
                                        <?php }?>
                                        <a href="{{url('admin/client/task/'.$client->id)}}" class="btn btn-sm btn-success"><i
                                                    class="fa fa-edit"></i>&nbsp;&nbsp;Tasks</a>


                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalPackage{!! $client->id !!}">
                                            Change Package
                                        </button>
                                        <div class="modal inmodal" id="myModalPackage{!! $client->id !!}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated flipInY">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title"></h4>
                                                    </div>
                                                    {!! Form::open(['url'=>'admin/client/package/','method'=>'post']) !!}
                                                    <div class="modal-body">
                                                        <p>
                                                            Agency
                                                        </p>
                                                        <input type="hidden" name="user_id" value="{{$client->id}}">
                                                        <select name="suitable_package" style="border: 2px solid #e1e1e1;height: 43px;display:block;outline:0;">
                                                            <option value="{{ \App\Package::where('user_id',$client->id)->value('suitable_package') }}">{{ \App\Package::where('user_id',$client->id)->value('suitable_package') }}</option>
                                                            <option value="Starter Package">Starter Package ($199)</option>
                                                            <option value="Small Business Package">Small Business Package ($399)</option>
                                                            <option value="Agency Package">Agency Package ($699)</option>
                                                        </select>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" >
                                                    </div>

                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                                <?php $count++; ?>
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
                </div>
            </div>
        </div>
    </div>

@stop