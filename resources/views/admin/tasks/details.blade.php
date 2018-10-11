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


                        @include('errors.list')
                        @foreach($tasks as $task)

                            <div class="col-lg-12 animated fadeInRight">
                                <div class="mail-box-header">

                                    <h2>
                                      Task Details
                                    </h2>
                                    <div class="mail-tools tooltip-demo m-t-md">


                                        <h3>
                                            <span class="font-normal">Subject:  </span>{{$task->title}}
                                        </h3>
                                        <h5>

                                            <span class="pull-right font-normal">{{$task->created_at}}</span>
                                            <span class="font-normal"><b>Client: </b></span>{{ \App\User::where('id',$task->created_by)->value('name') }}
                                            <br><br>
                                            <span class="pull-center font-normal">
                                               <b>
                                                     Project Status ::
                                                </b>
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
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="mail-box">


                                    <div class="mail-body">
                                        <p>
                                           {{$task->description}}

                                        </p>
                                    </div>

                                    <?php
                                        $files=\App\FileModel::where('task_id',$task->id)->get();
                                    ?>
                                    <div class="mail-attachment">
                                        <p>
                                            <span><i class="fa fa-paperclip"></i> {{ count($files) }} attachments - </span>

                                        </p>
                                    @foreach($files as $file)
                                            <div class="attachment">
                                                <div class="file-box">
                                                    <div class="file">
                                                        <a href="/uploads/{!! $file->path !!}"
                                                           target="_blank">
                                                            <span class="corner"></span>

                                                            <div class="icon">
                                                                <i class="fa fa-file"></i>
                                                            </div>
                                                            <div class="file-name">
                                                               {{$file->path}}
                                                                <br/>
                                                                <small>{{$file->created_at}}</small>
                                                            </div>
                                                        </a>
                                                    </div>

                                                </div>

                                            </div>
                                        @endforeach

                                        <div class="ibox-content no-padding">
                                            <h3>Comments</h3>
                                            <ul class="list-group">
                                                <?php $comments= \App\CommentModel::where('task_id',$task->id)->get();?>
                                                @foreach( $comments as $comment)
                                                <li class="list-group-item">
                                                    <p><a class="text-info" href="#">{{ \App\User::where('id',$comment->created_by)->value('name') }}</a> :: {{$comment->comment}}</p>
                                                    <small class="block text-muted"><i class="fa fa-clock-o"></i>{{$comment->created_at}}</small>
                                                </li>
                                                    @endforeach

                                            </ul>
                                        </div>

                                    </div>

                                    <div class="clearfix"></div>


                                </div>
                            </div>

                        @endforeach

                </div>
            </div>
        </div>
    </div>

@stop



