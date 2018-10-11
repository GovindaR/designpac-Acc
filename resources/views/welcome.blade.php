@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-content">

    <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        <h5>Clients</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{$clients}}</h1>

                        <small>Total </small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        <h5>Task</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{$tasks}}</h1>

                        <small>Total</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        <h5>Designers</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{$designers}}</h1>

                        <small>Total</small>
                    </div>
                </div>
            </div>


        </div>
@endsection
