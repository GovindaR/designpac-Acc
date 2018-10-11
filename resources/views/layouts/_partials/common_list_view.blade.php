@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{$title}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{!! url('/') !!}">Home</a>
                </li>
                <li>
                    <strong>{{$title}}</strong>
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
                        <h5>Listing</h5>
                    </div>

                    <div class="ibox-content">

                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <table class="table table-striped table-bordered table-hover dataTable doctor-datatable"
                                       id="DataTables_Table_0 referencetable" aria-describedby="DataTables_Table_0_info" role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting">S.N.</th>
                                        @for ($i = 0; $i < count($fields); $i++)
                                            <th class="sorting">{{$fields[$i]}}</th>
                                        @endfor
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{$count}}</td>

                                            @for ($i = 0; $i < count($fields); $i++)
                                                <td>{{$data->$f_n[$i]}}</td>
                                            @endfor
                                        </tr>

                                        <?php $count++; ?>
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
@stop