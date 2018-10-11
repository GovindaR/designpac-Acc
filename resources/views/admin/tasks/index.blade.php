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
                    <strong>Tasks</strong>
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
                        <h5>Task Listing</h5>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <table class="table table-striped table-bordered table-hover dataTables-example dataTable"
                                       id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Title
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Create Date and Time
                                        </th>
                                        {{--<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"--}}
                                        {{--colspan="1" aria-label="Browser: activate to sort column ascending">Address--}}
                                        {{--</th>--}}
                                        <th>Operations</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($tasks as $task)
                                        <tr class="gradeA {!! ($count % 2 == 0) ? 'even' : 'odd' !!}" role="row">
                                            <td>{!! $count !!}</td>
                                            <td>{{$task->title}}</td>
                                            <td>
                                                <?php
                                                if ($task->status =="ur"){
                                                    echo "Unlimited Request";
                                                }
                                                if ($task->status =="da"){
                                                    echo "Design Added";
                                                }
                                                if ($task->status =="r"){
                                                    echo "Revisions";
                                                }
                                                if ($task->status =="h"){
                                                    echo "Handover";
                                                }

                                                ?>
                                            </td>
                                            <td>{!! $task->created_at !!}</td>
                                            <td>
                                                <a href="{{url('admin/tasks/details')."/".$task->id}}" class="btn btn-sm btn-primary"><i
                                                            class="fa fa-edit"></i>&nbsp;&nbsp;Detail</a>
                                                <div style="display: inline-table">
                                                    <form role="form" method="POST" action="{{url('admin/tasks/delete')."/".$task->id}}">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-primary btn-sm btnDelete" type="submit" onclick="return confirm('Are you sure ?')"><i
                                                                class="fa fa-trash"></i>&nbsp;&nbsp;Delete
                                                    </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $count++; ?>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Mobile</th>
                                        <th rowspan="1" colspan="1">Create Date and Time</th>
                                        <th rowspan="1" colspan="1">Operations</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop