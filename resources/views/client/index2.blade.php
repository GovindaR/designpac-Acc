<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DesignPac</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="http://www.designpac.net/wp-content/uploads/2017/01/dpac-150x150.png" sizes="32x32" />
    <link rel="icon" href="http://www.designpac.net/wp-content/uploads/2017/01/dpac.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="http://www.designpac.net/wp-content/uploads/2017/01/dpac.png" />
    <meta name="msapplication-TileImage" content="http://www.designpac.net/wp-content/uploads/2017/01/dpac.png" />
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/css/uikit.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/default.min.css" type="text/css">
    <link rel="stylesheet" href="/style.css" type="text/css">





    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script>
        function convert(id)
        {
            if(document.getElementById(id)){
                var text=document.getElementById(id).textContent;
                var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
                var text1=text.replace(exp, "<a href='$1' target='_blank'>$1</a>");
                var exp2 =/(^|[^\/])(www\.[\S]+(\b|$))/gim;
                document.getElementById(id).innerHTML=text1.replace(exp2, '$1<a target="_blank" href="http://$2">$2</a>');
                //console.log("worked");
            }
        }
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.3/balloon/ckeditor.js"></script>
    <!-- include summernote css/js -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <style type="text/css">
        textarea {
            resize: none;
        }
    </style>





</head>
<body>

@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" style="margin-bottom:0;" id="msg-al">

        <strong>{{Session::get('message')}} Thanks for creating task. One of our expert designers will be assigned to you soon.</strong>
        <span class="glyphicon glyphicon-remove" style="float:right;cursor:pointer;" onClick="document.getElementById('msg-al').style.display='none';"></span>
    </div>

@endif
<div id="slider">
    <div class="uk-margin">
        <input class="uk-range" type="range" value="0" min="0" max="100" step="4" id="slider-mob">
    </div>
</div>
<div class="create-btn">
    <div>
        <?php if(Auth::user()->hasRole('client')){?>
        <button class="uk-button uk-button-default" type="button">Create Task</button>
        <?php }?>
        <div uk-dropdown="mode: click">
            <form action="/create/task" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" placeholder="task name" name="title">
                <input type="submit" value="create">
            </form>
        </div>
    </div>
</div>
<section class="section">
    <div class="nav-bar row">
        <div class="logo col-md-6"><a href="{{url('/')}}"><img src="{{url('/')}}/images/dpac-logo-01.svg" alt=""><span class="beta">Beta</span></a></div>
        <div class="menu col-md-6">
            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-right">

                    <ul class="uk-navbar-nav">
                        <li><a href="#" uk-toggle="target: #offcanvas-flip" onclick="myFunction()">
                            <!-- <img src="{{url('/')}}/images/notification.png" alt="notification"> -->

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 23.9" id="notification-change">
                                    <title>notifation</title><g id="Layer_2" data-name="Layer 2"><g id="Capa_1" data-name="Capa 1"><path class="cls-1" d="M19.9,19.87l-1.68-2.79a8.08,8.08,0,0,1-1.15-4.15V10.49a7.07,7.07,0,0,0-4.88-6.72V2.19a2.19,2.19,0,1,0-4.38,0V3.77a7.07,7.07,0,0,0-4.88,6.72v2.44a8.08,8.08,0,0,1-1.15,4.15L.1,19.87a.78.78,0,0,0,0,.74A.75.75,0,0,0,.73,21H7.34a2.29,2.29,0,0,0,0,.25,2.68,2.68,0,0,0,5.36,0,2.29,2.29,0,0,0,0-.25h6.61a.75.75,0,0,0,.64-.36A.78.78,0,0,0,19.9,19.87ZM2,19.52l1-1.69a9.58,9.58,0,0,0,1.35-4.9V10.49a5.62,5.62,0,1,1,11.24,0v2.44A9.58,9.58,0,0,0,17,17.83l1,1.69ZM10,1.45a.74.74,0,0,1,.74.74V3.45c-.25,0-.49,0-.74,0s-.49,0-.74,0V2.19A.74.74,0,0,1,10,1.45Zm1.23,19.77a1.23,1.23,0,1,1-2.45,0,2.29,2.29,0,0,1,0-.25h2.4A2.42,2.42,0,0,1,11.23,21.22Z"/></g></g>
                                </svg>
                            </a></li>
                        <li><a href="#" uk-toggle="target: #offcanvas-flip-1" class="activaty">
                            <!-- <img src="{{url('/')}}/images/activity.png" alt="activity"> -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.11 18.67">
                                    <title>Activity</title><g id="Layer_2" data-name="Layer 2"><g id="Capa_1" data-name="Capa 1"><path class="cls-1" d="M29.35,11.43H19.2a.78.78,0,0,0-.71.49L17.27,15,14.8.61A.74.74,0,0,0,14.06,0a.76.76,0,0,0-.76.61L10.86,14.19,9.54,7.8a.78.78,0,0,0-.62-.59.75.75,0,0,0-.78.36L5.86,11.44H.76A.76.76,0,1,0,.76,13H6.29a.79.79,0,0,0,.65-.41L8.44,10l1.73,8.25c0,.22.21.47.74.47s.72-.31.75-.49L14,5.12l2.19,12.81a.76.76,0,0,0,.67.63.74.74,0,0,0,.78-.47l2-5.14h9.63a.76.76,0,0,0,0-1.52Z"/></g></g>
                                </svg>
                            </a></li>
                        <li class="initials">
                            <a href="#" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li><a href="{{url('/')}}">Task Board</a></li>
                                    <li><a href="{{url('/profile')."/".\Illuminate\Support\Facades\Auth::user()->id}}">Profile</a>
                                    </li>
                                    <li><a href="{{url('/account')}}">Account</a></li>
                                    <li><a href="{{url('logout')}}">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>
    </div>
</section>
<!--offcanvas-->
<div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar uk-offcanvas-bar1" id="notifications">


    </div>
</div>

<!--end of offcanvas-->
<!--offcanvas-->
<div id="offcanvas-flip-1" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <h3>Activity</h3>
        <?php
        foreach ($acts as $act){
        $as=\App\ActivityNotificationModel::where("task_id",$act->id)->where('client_id',\Illuminate\Support\Facades\Auth::User()->id)->orderBy('created_at','desc')->get();
        foreach ($as as $a){
        $task_name=\App\TaskModel::where('id',$a->task_id)->value('title');
        ?>
        <p><?php echo \Illuminate\Support\Facades\Auth::user()->name . " ".  $a->action ."<strong> ". $task_name.".   </strong><i>" .$a->created_at ."</i>"; ?> </p>
        <?php
        }
        }
        ?>



    </div>
</div>
<!--end of offcanvas-->

<div class="main" style="padding-top:0;" id="belt">
    <div class="belt draggable">
        <div id="u" class="ur slot">
            <div class="title red" uk-sticky>
                <h4>Unlimited Request</h4>
            </div>
            <div id="ur-drag" class="draggable">
                <?php foreach ($data_urs as $data_ur){?>
                <div class="card" id="{!! $data_ur->id !!}" >
                    <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle>
                        <span class="card-title"><?php echo $data_ur->title?></span>
                        <div>
                 <span class="comment">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 356.484 356.484"
                         xml:space="preserve">
                        <g>
                            <g>
                                <path d="   M293.984,7.23H62.5C28.037,7.23,0,35.268,0,69.731v142.78c0,34.463,28.037,62.5,62.5,62.5l147.443,0.001l70.581,70.58
                                    c2.392,2.393,5.588,3.662,8.842,3.662c1.61,0,3.234-0.312,4.78-0.953c4.671-1.934,7.717-6.49,7.717-11.547v-62.237
                                        c30.759-3.885,54.621-30.211,54.621-62.006V69.731C356.484,35.268,328.447,7.23,293.984,7.23z M331.484,212.512
                                        c0,20.678-16.822,37.5-37.5,37.5h-4.621c-6.903,0-12.5,5.598-12.5,12.5v44.064l-52.903-52.903
                                        c-2.344-2.345-5.522-3.661-8.839-3.661H62.5c-20.678,0-37.5-16.822-37.5-37.5V69.732c0-20.678,16.822-37.5,37.5-37.5h231.484
                                        c20.678,0,37.5,16.822,37.5,37.5V212.512z"/>
                                    <path d="M270.242,95.743h-184c-6.903,0-12.5,5.596-12.5,12.5c0,6.903,5.597,12.5,12.5,12.5h184c6.903,0,12.5-5.597,12.5-12.5
                                        C282.742,101.339,277.146,95.743,270.242,95.743z"/>
                                    <path d="M270.242,165.743h-184c-6.903,0-12.5,5.596-12.5,12.5s5.597,12.5,12.5,12.5h184c6.903,0,12.5-5.597,12.5-12.5
                                        S277.146,165.743,270.242,165.743z"/>
                            </g>
                        </g>
                    </svg>

                     <span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
                            <span class="comment">
                    <svg class="attach__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"  xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 612.001 612.001"
                         xml:space="preserve">
                            <g>
                                <g id="Clip">
                                    <g>
                                        <path d="M565.488,74.616l-2.868-2.833c-63.386-61.375-164.907-60.728-227.507,1.889L45.34,363.532
                                            C23.501,385.406,0,425.134,0,460.683c0,33.38,13.027,64.802,36.65,88.407c23.641,23.658,55.08,36.686,88.53,36.686h0.018
                                            c33.45-0.018,64.89-13.045,88.513-36.702l250.151-250.168c17.188-17.188,26.596-41.004,25.756-65.379
                                            c-0.786-22.364-9.932-43.364-25.756-59.154c-16.646-16.629-38.749-25.792-62.284-25.792c-23.536,0-45.655,9.145-62.249,25.792
                                            L147.754,365.963c-4.826,4.773-7.851,11.383-7.851,18.691c0,14.479,11.733,26.229,26.229,26.229
                                            c7.239,0,13.779-2.938,18.517-7.676l0.018,0.018l191.766-191.8c6.854-6.837,16.314-10.194,25.739-10.037
                                            c9.04,0.14,18.027,3.515,24.619,10.089c6.383,6.382,10.072,14.88,10.404,23.851c0.35,10.002-3.357,19.427-10.422,26.491
                                            l-250.15,250.167c-13.744,13.744-31.999,21.315-51.425,21.333h-0.018c-19.427,0-37.699-7.589-51.443-21.333
                                            c-13.709-13.709-21.28-31.929-21.28-51.303c0-16.297,13.744-43.784,29.988-60.063l289.773-289.843
                                            c42.455-42.49,111.349-42.788,154.188-1.049l2.78,2.798c41.074,42.945,40.497,111.297-1.73,153.542L287.623,505.918
                                            c-4.809,4.773-7.799,11.349-7.799,18.657c0,14.479,11.733,26.229,26.229,26.229c7.24,0,13.761-2.938,18.518-7.658l0.017,0.018
                                            l239.975-239.991C627.51,240.188,627.807,137.967,565.488,74.616z"/>
                                    </g>
                                </g>
                            </g>
                        </svg>

                     <span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
                        </div>
                    </a>

                    <div id="modal-section{{$data_ur->id}}" uk-modal>
                        <div class="uk-modal-dialog">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <form action="/update/task/{{$data_ur->id}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="uk-modal-header">
                                    <h3>Title</h3>
                                    <h2 class="uk-modal-title has-edit"><textarea name="title" id="title-{{$data_ur->id}}" onFocus="btnChange({{$data_ur->id}},1)" style="font-weight:bold;" placeholder="Enter Title"><?php echo $data_ur->title?></textarea></h2>

                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;display: none;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},1)" id="btn-{{$data_ur->id}}-1">Save</button>
                                </div>


                                <div class="uk-modal-body">
                                    <h3 class="u-inline-block">Description</h3>
                                    <div id="brief-{{$data_ur->id}}" class="has-edit">
                                        <p id="brief"><textarea placeholder="Type your design brief here" name="description" id="comment-{{$data_ur->id}}" onClick="autoSizeText({{$data_ur->id}});" onFocus="btnChange({{$data_ur->id}},2)" style="display:none;"> <?php echo $data_ur->description?></textarea></p>
                                        <div class="inner-editor"><?php echo $data_ur->description ?></div>
                                    </div>
                                    <?php if($data_ur->description == "") { ?>
                                    <script>
                                        document.getElementById('comment-{{$data_ur->id}}').style.display = "block";
                                        document.getElementById('comment-{{$data_ur->id}}').value = "";
                                    </script>
                                    <?php } ?>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="edit({{$data_ur->id}}); return false;">Edit</button>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},2)" id="btn-{{$data_ur->id}}-2">Save</button>
                                    <h3 class="Attach">Attachments</h3>
                                    <div class="uk-margin" uk-margin>
                                        <div uk-form-custom="target: true">
                                            <input type="file" id="fileU" name="attach" size="2048KB" multiple>
                                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Upload File (Computer)" disabled>
                                            <!-- <button style="background: #f78d1e;border: none;display:none;padding: 10px 15px;color: #fff;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" type="submit">Upload</button> -->
                                            <input type="submit"  value="Upload" style="background: #f78d1e;border: none;display:none;padding: 10px 15px;color: #fff;margin-top: 10px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" class="del__file">
                                        </div><br>

                                        <div id="progressbar" class="uk-progress uk-hidden">
                                            <div class="uk-progress-bar" style="width: 0%;">...</div>
                                        </div>
                                        <div class="files">
                                            <div class="attachment-thumbnail">
                                                <a href="#" class="attachment-thumbnail-preview">
                                                    <!-- <img src="../images/fi_0000_jpng.png"> -->
                                                </a>
                                                <p class="attachment-thumbnail-details">
                                                    <span class="attachment-thumbnail-name js-attachment-name">1407793943-nation-top-consumer-watchdog-warning-bitcoin-danger.jpg</span>
                                                    <span class="u-block quiet attachment-thumbnail-details-title-options">
                               <span>Added <span class="date" dt="2018-05-18T08:09:48.973Z" title="May 18, 2018 1:54 PM">an hour ago</span></span>
                                                        <!-- <span><a class="attachment-thumbnail-details-title-options-item js-reply" href="#"><span class="attachment-thumbnail-details-options-item-text">Comment</span></a></span> -->
                               <span><a class="attachment-thumbnail-details-title-options-item dark-hover js-confirm-delete" href="#"><span class="attachment-thumbnail-details-options-item-text">Delete</span></a></span>
                           </span>
                                                </p>
                                            </div>
                                        </div>
                                        <a href="{{url('client/tasks/delete')."/".$data_ur->id}}" style="background: nonee;border: #ddd 3px solid;color: #8e8d8d;padding: 7px 15px;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" onclick="return confirm('Are you sure ?')">Save Task</a>

                                        <a href="{{url('client/tasks/delete')."/".$data_ur->id}}" style="background: nonee;border: #ddd 3px solid;color: #8e8d8d;padding: 7px 15px;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" onclick="return confirm('Are you sure ?')">Delete Task</a>
                                    </div>
                                    <div class="files">

                                        <ul>
                                            <?php
                                            $files=\App\FileModel::where('task_id',$data_ur->id)->get();
                                            foreach ($files as $file){
                                            $newstring = substr($file->path, -4);
                                            ?>

                                            <?php if($newstring ==".png"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0000_jpng.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".jpg" || $newstring ==".gif"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0000_jpng.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".doc" || $newstring =="docx"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0003_word.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".txt" || $newstring ==".psd"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0004_file.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".pdf"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0001_pdf.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }else{?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0004_file.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }?>



                                            <?php
                                            }
                                            ?>

                                        </ul>

                                    </div>
                                </div>
                            </form>

                            <div class="uk-modal-body1">
                                <h4 style="clear:both;"><span>
                                <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                            </span>Comment(s)</h4>

                                <form action="create/comment" class="comment" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="task_id" value="{{ $data_ur->id }}">
                                    <input type="hidden" name="created_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

                                    <label for="" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</label>
                                    <textarea name="comment"  placeholder="Wanna say something?"></textarea>
                                    <input type="submit" value="Comment">
                                </form>

                                <!-- preloader start -->
                                <div class="comments dommy__cmt">
                                    <ul>
                                        <li>
                                            <div class="usr-av">

                                            </div>
                                            <div class="content">
                                            <span class="inline-member">
                                                <span class="u-font-weight-bold">
                                                </span>
                                            </span>
                                                <h5 class="loading"></h5>
                                                <p class="info loading">
                                                    <span class="date"></span>
                                                    <a href="#"></a>
                                                    <a href="#"></a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- preloader start end -->

                                <?php
                                $comments=\App\CommentModel::where('task_id',$data_ur->id)->get();
                                $cmt = 0;
                                foreach ($comments as $comment){
                                ?>
                                <div class="comments">
                                    <ul>
                                        <li>
                                            <div class="usr-av">{{\App\User::where('id',$comment->created_by)->value('name')[0].\App\User::where('id',$comment->created_by)->value('last_name')[0]}}</div>
                                            <div class="content">
                                            <span class="inline-member">
                                                <span class="u-font-weight-bold">
                                                ABC</span>
                                            </span>
                                                <h5 id="cmt-{{$data_ur->id}}-{{ $cmt }}">{{ $comment->comment }}</h5>
                                                <p class="info">
                                                    <span class="date">{{ $comment->created_at }}</span>
                                                    <?php if($comment->created_by == \Illuminate\Support\Facades\Auth::user()->id){?>
                                                    <a href="/comment/edit/{{$comment->id}}">Edit</a>
                                                    <a href="/comment/delete/{{$comment->id}}">Delete</a>
                                                    <?php }?>
                                                </p>
                                                <script type="text/javascript">
                                                    console.log("cmt-{{$data_ur->id}}"+"-{{$cmt}}");
                                                    convert("cmt-{{$data_ur->id}}"+"-{{$cmt}}");
                                                </script>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <hr>

                                <?php $cmt++; }?>

                            </div>
                            <!--<div class="uk-modal-footer uk-text-right">
                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                <button class="uk-button uk-button-primary" type="button">Save</button>
                            </div>-->
                        </div>
                    </div>
                </div>



                <?php }?>

            </div>


        </div>

        <div id="d" class="da slot">
            <div class="title red" uk-sticky>
                <h4>Design Added</h4>
            </div>
            <div id="da-drag" class="draggable">
                <?php foreach ($data_das as $data_ur){?>
                <div class="card" id="{!! $data_ur->id !!}" >
                    <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle>
                        <span class="card-title"><?php echo $data_ur->title?></span>
                        <span>
                 <span class="comment"><img src="images/comment.png" alt="comment">
                     <span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
             </span>
                    </a>

                    <div id="modal-section{{$data_ur->id}}" uk-modal>
                        <div class="uk-modal-dialog">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <form action="/update/task/{{$data_ur->id}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="uk-modal-header">
                                    <h3>Title</h3>
                                    <h2 class="uk-modal-title has-edit"><textarea name="title" id="title-{{$data_ur->id}}" onFocus="btnChange({{$data_ur->id}},1)" style="font-weight:bold;" placeholder="Enter Title"><?php echo $data_ur->title?></textarea></h2>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;display: none;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},1)" id="btn-{{$data_ur->id}}-1">Save</button>
                                </div>


                                <div class="uk-modal-body">
                                    <h3 class="u-inline-block">Description</h3>
                                    <div id="brief-{{$data_ur->id}}" class="has-edit">
                                        <p id="brief"><textarea placeholder="Type your design brief here" name="description" id="comment-{{$data_ur->id}}" onClick="autoSizeText({{$data_ur->id}});" onFocus="btnChange({{$data_ur->id}},2)" style="display:none;"> <?php echo $data_ur->description?></textarea></p>
                                        <div class="inner-editor"><?php echo $data_ur->description ?></div>
                                    </div>
                                    <?php if($data_ur->description == "") { ?>
                                    <script>
                                        document.getElementById('comment-{{$data_ur->id}}').style.display = "block";
                                        document.getElementById('comment-{{$data_ur->id}}').value = "";
                                    </script>
                                    <?php } ?>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="edit({{$data_ur->id}}); return false;">Edit</button>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},2)" id="btn-{{$data_ur->id}}-2">Save</button>
                                    <div class="uk-margin" uk-margin>
                                        <div uk-form-custom="target: true">
                                            {!! Form::file('attach[]',["multiple"=>"multiple"]) !!}
                                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Upload File (Computer)" disabled>
                                            <button style="background: #f78d1e;border: none;display:none;padding: 10px 15px;color: #fff;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" type="submit">Upload</button>
                                        </div><br>

                                        <a href="{{url('client/tasks/delete')."/".$data_ur->id}}" style="background: none;border: #ddd 3px solid;color: #8e8d8d;padding: 7px 15px;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" onclick="return confirm('Are you sure ?')">Delete Task</a>
                                    </div>
                                    <h4 class="attach__extraa">Attachments</h4>

                                    <div class="files">
                                        <ul>
                                            <?php
                                            $files=\App\FileModel::where('task_id',$data_ur->id)->get();
                                            foreach ($files as $file){
                                            $newstring = substr($file->path, -4);
                                            ?>
                                            <?php if($newstring ==".png"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0000_jpng.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".jpg"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0000_jpng.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".doc" || $newstring="docx"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0003_word.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".txt"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0004_file.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".pdf"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0001_pdf.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }else{?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0004_file.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }?>



                                            <?php
                                            }
                                            ?>

                                        </ul>


                                    </div>
                                </div>
                            </form>

                            <div class="uk-modal-body">
                                <h4 style="clear:both;"><span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>&nbsp;Comment(s)</h4>
                                <form action="create/comment" class="comment" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="task_id" value="{{ $data_ur->id }}">
                                    <input type="hidden" name="created_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

                                    <label for="" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</label>
                                    <textarea name="comment" placeholder="Wanna say something?" id="cm-{{ $data_ur->id }}"></textarea>
                                    <input type="submit" value="Comment" data-tskid="{{ $data_ur->id }}" data-crtby="{{ \Illuminate\Support\Facades\Auth::user()->id }}" class="comment-add">

                                </form>
                                <!-- preloader start -->
                                <div class="comments dommy__cmt">
                                    <ul>
                                        <li>
                                            <div class="usr-av">

                                            </div>
                                            <div class="content">
                                           <span class="inline-member">
                                               <span class="u-font-weight-bold">
                                               </span>
                                           </span>
                                                <h5 class="loading"></h5>
                                                <p class="info loading">
                                                    <span class="date"></span>
                                                    <a href="#"></a>
                                                    <a href="#"></a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- preloader start end -->
                                <?php
                                $comments=\App\CommentModel::where('task_id',$data_ur->id)->orderBy('created_at', 'desc')->get();
                                $cmt=0;
                                foreach ($comments as $comment){
                                ?>

                                <div class="comments">
                                    <ul>
                                        <li>
                                            <div class="usr-av">
                                                {{\App\User::where('id',$comment->created_by)->value('name')[0].\App\User::where('id',$comment->created_by)->value('last_name')[0]}}
                                            </div>

                                            <div class="content">

                                                <p class="info">
                                                    <span class="date">{{ $comment->created_at }}</span>
                                                    <?php if($comment->created_by == \Illuminate\Support\Facades\Auth::user()->id){?>
                                                    <a href="/comment/delete/{{$comment->id}}" data-cmtid="cmt-{{$data_ur->id}}-{{ $cmt }}">Delete</a>
                                                    <?php }?>
                                                </p>

                                                <h5 id="cmt-{{$data_ur->id}}-{{ $cmt }}">{{ $comment->comment }}</h5>
                                                <script type="text/javascript">
                                                    // console.log("cmt-{{$data_ur->id}}"+"-{{$cmt}}");
                                                    convert("cmt-{{$data_ur->id}}"+"-{{$cmt}}");
                                                </script>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <hr>

                                <?php $cmt++; }?>

                            </div>
                            <!--<div class="uk-modal-footer uk-text-right">
                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                <button class="uk-button uk-button-primary" type="button">Save</button>
                            </div>-->
                        </div>
                    </div>
                </div>



                <?php }?>
            </div>
        </div>
        <div id="r" class="r slot">
            <div class="title red"  uk-sticky>
                <h4>Revisions</h4>
            </div>
            <div id="r-drag" class="draggable">
                <?php foreach ($data_rs as $data_ur){?>
                <div class="card" id="{!! $data_ur->id !!}" >
                    <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle>
                        <span class="card-title"><?php echo $data_ur->title?></span>
                        <span>
                 <span class="comment"><img src="images/comment.png" alt="comment">
                     <span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
             </span>
                    </a>

                    <div id="modal-section{{$data_ur->id}}" uk-modal>
                        <div class="uk-modal-dialog">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <form action="/update/task/{{$data_ur->id}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="uk-modal-header">
                                    <h3>Title</h3>
                                    <h2 class="uk-modal-title has-edit"><textarea name="title" id="title-{{$data_ur->id}}" onFocus="btnChange({{$data_ur->id}},1)" style="font-weight:bold;" placeholder="Enter Title"><?php echo $data_ur->title?></textarea></h2>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;display: none;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},1)" id="btn-{{$data_ur->id}}-1">Save</button>
                                </div>


                                <div class="uk-modal-body">
                                    <h3 class="u-inline-block">Description</h3>
                                    <div id="brief-{{$data_ur->id}}" class="has-edit">
                                        <p id="brief"><textarea placeholder="Type your design brief here" name="description" id="comment-{{$data_ur->id}}" onClick="autoSizeText({{$data_ur->id}});" onFocus="btnChange({{$data_ur->id}},2)" style="display:none;"> <?php echo $data_ur->description?></textarea></p>
                                        <div class="inner-editor"><?php echo $data_ur->description ?></div>
                                    </div>
                                    <?php if($data_ur->description == "") { ?>
                                    <script>
                                        document.getElementById('comment-{{$data_ur->id}}').style.display = "block";
                                        document.getElementById('comment-{{$data_ur->id}}').value = "";
                                    </script>
                                    <?php } ?>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="edit({{$data_ur->id}}); return false;">Edit</button>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},2)" id="btn-{{$data_ur->id}}-2">Save</button>
                                    <div class="uk-margin" uk-margin>
                                        <div uk-form-custom="target: true">
                                            {!! Form::file('attach[]',["multiple"=>"multiple"]) !!}
                                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Upload File (Computer)" disabled>
                                            <button style="background: #f78d1e;border: none;display:none;padding: 10px 15px;color: #fff;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" type="submit">Upload</button>
                                        </div><br>

                                        <a href="{{url('client/tasks/delete')."/".$data_ur->id}}" style="background: nonee;border: #ddd 3px solid;color: #8e8d8d;padding: 7px 15px;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" onclick="return confirm('Are you sure ?')">Delete Task</a>
                                    </div>
                                    <h4 class="attach__extraa">Attachments</h4>

                                    <div class="files">
                                        <ul>
                                            <?php
                                            $files=\App\FileModel::where('task_id',$data_ur->id)->get();
                                            foreach ($files as $file){
                                            $newstring = substr($file->path, -4);
                                            ?>
                                            <?php if($newstring ==".png"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0000_jpng.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".jpg"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0000_jpng.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring =="doc" || $newstring="docx"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0003_word.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".txt"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0004_file.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".pdf"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0001_pdf.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }else{?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0004_file.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }?>



                                            <?php
                                            }
                                            ?>

                                        </ul>


                                    </div>
                                </div>
                            </form>

                            <div class="uk-modal-body">
                                <h4 style="clear:both;"><span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>&nbsp;Comment(s)</h4>
                                <form action="create/comment" class="comment" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="task_id" value="{{ $data_ur->id }}">
                                    <input type="hidden" name="created_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

                                    <label for="" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</label>
                                    <textarea name="comment" placeholder="Wanna say something?" id="cm-{{ $data_ur->id }}"></textarea>
                                    <input type="submit" value="Comment" data-tskid="{{ $data_ur->id }}" data-crtby="{{ \Illuminate\Support\Facades\Auth::user()->id }}" class="comment-add">

                                </form>
                                <!-- preloader start -->
                                <div class="comments dommy__cmt">
                                    <ul>
                                        <li>
                                            <div class="usr-av">

                                            </div>
                                            <div class="content">
                                           <span class="inline-member">
                                               <span class="u-font-weight-bold">
                                               </span>
                                           </span>
                                                <h5 class="loading"></h5>
                                                <p class="info loading">
                                                    <span class="date"></span>
                                                    <a href="#"></a>
                                                    <a href="#"></a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- preloader start end -->
                                <?php
                                $comments=\App\CommentModel::where('task_id',$data_ur->id)->orderBy('created_at', 'desc')->get();
                                $cmt=0;
                                foreach ($comments as $comment){
                                ?>

                                <div class="comments">
                                    <ul>
                                        <li>
                                            <div class="usr-av">{{\App\User::where('id',$comment->created_by)->value('name')[0].\App\User::where('id',$comment->created_by)->value('last_name')[0]}}</div>

                                            <div class="content">

                                                <p class="info">
                                                    <span class="date">{{ $comment->created_at }}</span>
                                                    <?php if($comment->created_by == \Illuminate\Support\Facades\Auth::user()->id){?>
                                                    <a href="/comment/delete/{{$comment->id}}"  data-cmtid="cmt-{{$data_ur->id}}-{{ $cmt }}">Delete</a>
                                                    <?php }?>
                                                </p>

                                                <h5 id="cmt-{{$data_ur->id}}-{{ $cmt }}">{{ $comment->comment }}</h5>
                                                <script type="text/javascript">
                                                    // console.log("cmt-{{$data_ur->id}}"+"-{{$cmt}}");
                                                    convert("cmt-{{$data_ur->id}}"+"-{{$cmt}}");
                                                </script>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <hr>

                                <?php $cmt++; }?>

                            </div>
                            <!--<div class="uk-modal-footer uk-text-right">
                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                <button class="uk-button uk-button-primary" type="button">Save</button>
                            </div>-->
                        </div>
                    </div>
                </div>



                <?php }?>
            </div>
        </div>
        <div id="h" class="h slot">
            <div class="title red" uk-sticky>
                <h4>Handover</h4>
            </div>
            <div id="h-drag" class="draggable">
                <?php foreach ($data_hs as $data_ur){?>
                <div class="card" id="{!! $data_ur->id !!}" >
                    <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle>
                        <span class="card-title"><?php echo $data_ur->title?></span>
                        <span>
                 <span class="comment"><img src="images/comment.png" alt="comment">
                     <span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
             </span>
                    </a>

                    <div id="modal-section{{$data_ur->id}}" uk-modal>
                        <div class="uk-modal-dialog">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <form action="/update/task/{{$data_ur->id}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="uk-modal-header">
                                    <h3>Title</h3>
                                    <h2 class="uk-modal-title has-edit"><textarea name="title" id="title-{{$data_ur->id}}" onFocus="btnChange({{$data_ur->id}},1)" style="font-weight:bold;" placeholder="Enter Title"><?php echo $data_ur->title?></textarea></h2>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;display: none;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},1)" id="btn-{{$data_ur->id}}-1">Save</button>
                                </div>


                                <div class="uk-modal-body">
                                    <h3 class="u-inline-block">Description</h3>
                                    <div id="brief-{{$data_ur->id}}" class="has-edit">
                                        <p id="brief"><textarea placeholder="Type your design brief here" name="description" id="comment-{{$data_ur->id}}" onClick="autoSizeText({{$data_ur->id}});" onFocus="btnChange({{$data_ur->id}},2)" style="display:none;"> <?php echo $data_ur->description?></textarea></p>
                                        <div class="inner-editor"><?php echo $data_ur->description ?></div>
                                    </div>
                                    <?php if($data_ur->description == "") { ?>
                                    <script>
                                        document.getElementById('comment-{{$data_ur->id}}').style.display = "block";
                                        document.getElementById('comment-{{$data_ur->id}}').value = "";
                                    </script>
                                    <?php } ?>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="edit({{$data_ur->id}}); return false;">Edit</button>
                                    <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},2)" id="btn-{{$data_ur->id}}-2">Save</button>
                                    <div class="uk-margin" uk-margin>
                                        <div uk-form-custom="target: true">
                                            {!! Form::file('attach[]',["multiple"=>"multiple"]) !!}
                                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Upload File (Computer)" disabled>
                                            <button style="background: #f78d1e;border: none;display:none;padding: 10px 15px;color: #fff;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" type="submit">Upload</button>
                                        </div><br>

                                        <a href="{{url('client/tasks/delete')."/".$data_ur->id}}" style="background: nonee;border: #ddd 3px solid;color: #8e8d8d;padding: 7px 15px;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" onclick="return confirm('Are you sure ?')">Delete Task</a>
                                    </div>
                                    <h4 class="attach__extraa">Attachments</h4>

                                    <div class="files">
                                        <ul>
                                            <?php
                                            $files=\App\FileModel::where('task_id',$data_ur->id)->get();
                                            foreach ($files as $file){
                                            $newstring = substr($file->path, -4);
                                            ?>
                                            <?php if($newstring ==".png"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0000_jpng.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".jpg"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0000_jpng.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".doc" || $newstring="docx"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0003_word.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".txt"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0004_file.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }elseif($newstring ==".pdf"){?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0001_pdf.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }else{?>
                                            <li>
                                                <div class="file-thumb">
                                                    <img src="images/fi_0004_file.png" alt="">
                                                </div>
                                                <a href="/uploads/{!! $file->path !!}"
                                                   target="_blank">{{$file->path}} </a> 
                                            </li>
                                            <?php }?>



                                            <?php
                                            }
                                            ?>

                                        </ul>


                                    </div>
                                </div>
                            </form>

                            <div class="uk-modal-body">
                                <h4 style="clear:both;">
                                <span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                            </span>&nbsp;Comment(s)</h4>
                                <form action="create/comment" class="comment" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="task_id" value="{{ $data_ur->id }}">
                                    <input type="hidden" name="created_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

                                    <label for="" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</label>
                                    <textarea name="comment" placeholder="Wanna say something?" id="cm-{{ $data_ur->id }}"></textarea>
                                    <input type="submit" value="Comment" data-tskid="{{ $data_ur->id }}" data-crtby="{{ \Illuminate\Support\Facades\Auth::user()->id }}" class="comment-add">

                                </form>
                                <!-- preloader start -->
                                <div class="comments dommy__cmt">
                                    <ul>
                                        <li>
                                            <div class="usr-av">

                                            </div>
                                            <div class="content">
                                           <span class="inline-member">
                                               <span class="u-font-weight-bold">
                                               </span>
                                           </span>
                                                <h5 class="loading"></h5>
                                                <p class="info loading">
                                                    <span class="date"></span>
                                                    <a href="#"></a>
                                                    <a href="#"></a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- preloader start end -->
                                <?php
                                $comments=\App\CommentModel::where('task_id',$data_ur->id)->orderBy('created_at', 'desc')->get();
                                $cmt = 0;
                                foreach ($comments as $comment){
                                ?>

                                <div class="comments">
                                    <ul>
                                        <li>
                                            <div class="usr-av">{{\App\User::where('id',$comment->created_by)->value('name')[0].\App\User::where('id',$comment->created_by)->value('last_name')[0]}}</div>

                                            <div class="content">

                                                <p class="info">
                                                    <span class="date">{{ $comment->created_at }}</span>
                                                    <?php if($comment->created_by == \Illuminate\Support\Facades\Auth::user()->id){?>
                                                    <a href="/comment/delete/{{$comment->id}}" data-cmtid="cmt-{{$data_ur->id}}-{{ $cmt }}">Delete</a>
                                                    <?php }?>
                                                </p>

                                                <h5 id="cmt-{{$data_ur->id}}-{{ $cmt }}">{{ $comment->comment }}</h5>
                                                <script type="text/javascript">
                                                    // console.log("cmt-{{$data_ur->id}}"+"-{{$cmt}}");
                                                    convert("cmt-{{$data_ur->id}}"+"-{{$cmt}}");
                                                </script>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <hr>

                                <?php $cmt++; }?>

                            </div>
                            <!--<div class="uk-modal-footer uk-text-right">
                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                <button class="uk-button uk-button-primary" type="button">Save</button>
                            </div>-->
                        </div>
                    </div>
                </div>



                <?php }?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit-icons.min.js"></script>


<script>


    var edit = function(id) {

        $('#brief-'+id+' .inner-editor').css("display","none");
        // alert(" $('brief-'+id+' .inner-editor')");
        $('#comment-'+id).summernote({
            focus: true,
            shortcuts: false,
            airMode: false,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['link', ['linkDialogShow', 'unlink']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });


    };


</script>


<script src="autosize.min.js"></script>
<script>
    autosize(document.querySelectorAll('textarea'));

    $( function() {
        $( "#da-drag, #r-drag, #h-drag, #ur-drag" ).sortable({
            connectWith: ".draggable",
            distance: 0.1,
            update : function () {
                var order1 = $('#ur-drag').sortable('toArray');
                var order2 = $('#da-drag').sortable('toArray');
                var order3 = $('#r-drag').sortable('toArray');
                var order4 = $('#h-drag').sortable('toArray');
                $.ajax({
                    url: '{{ url('/project_status') }}',
                    type: 'GET',
                    data: { order1: order1,order2: order2,order3: order3,order4: order4},
                    success: function(result) {
                        //alert(result);
                    }
                })
                // window.location.reload();
                //  alert("Order 1:"+order1+"\n Order 2:"+order2+"\n Order 3:"+order3+"\n Order 4:"+order4);


            },
            cursor: "-webkit-grabbing",
            start: function( event, ui ) {
                //console.log(ui);
                ui.item.context.style.transform= "rotate(10deg)";
                //testPos($('.ui-sortable'), ui.helper);
            },
            stop: function( event, ui ) {
                //console.log(ui);
                ui.item.context.style.transform= "rotate(0deg)";
                // clearInterval(timerId);
            },
            placeholder: "sortable-placeholder",
            forcePlaceholderSize: true,
            scrollSensitivity: 10,
            scroll: true
        }).disableSelection();
    } );
</script>
<script>
    function autoSizeText(id){


        var ta = document.getElementById("comment-"+id);

        // autosize(ta);
        ta.style.height = ta.scrollHeight+"px";
    }
    var scroll = document.getElementById("slider-mob");

    scroll.oninput = function () {
        //console.log(this.value);
        var panel = document.getElementById("belt");

        var total = panel.scrollWidth - panel.offsetWidth;
        var percentage = total*(this.value/100);

        //console.log(total);
        panel.scrollLeft = percentage;
        //console.log(percentage);
    }
</script>
<script>
    var token,desc,title,attach,data,url,btn;
    function saveInfo(id,num){
        event.preventDefault();
        desc = document.getElementById("comment-"+id).value;
        title = document.getElementById("title-"+id).value;
        attach = null;
        data = {
            "_token": "{{ csrf_token() }}",
            title: title,
            description: desc
        };
        if(num == 1){
            $("#"+id).find("span.card-title").text(title);
            $("#title-"+id).parent().css({"background-color":"#fff"});
            document.getElementById("btn-"+id+"-1").style.display = "none";

        }else{
            //document.getElementById("btn-"+id+"-2").style.display = "none";
            $('#brief-'+id).find('.inner-editor').html(desc).show();
            $('#comment-'+id).val(desc);
            $('#comment-'+id).summernote('destroy');
            $('#comment-'+id).hide();

        }
        url = "/update/task/"+id;
        $.ajax({
            method: "POST",
            url: url,
            data: data
        })
            .done(function( msg ) {
                //alert( "Data Saved: " + msg );
                //alert(num);
                if(num == 1){
                    //document.getElementById("btn-"+id+"-1").innerHTML = "Saved";

                }else{
                    //document.getElementById("btn-"+id+"-2").innerHTML = "Saved";

                }
            });
    }

    function countcmt(tskid){
        var cnt = $('#modal-section'+tskid+' .comments').not(".dommy__cmt").length;
        $('#modal-section'+tskid+' form.comment').prev().find('span').text(cnt);
        $("#"+tskid).find('.comment').find('span').text(cnt);
    }

    function createComment(tskid,crtby,av){
        $('.dommy__cmt').fadeIn();
        var comment = document.getElementById("cm-"+tskid).value;
        data = {
            "_token": "{{ csrf_token() }}",
            task_id: tskid,
            created_by: crtby,
            comment: comment
        };
        url = "/create/comment";
        $.ajax({
            method: "POST",
            url: url,
            data: data,
            statusCode: {
                422: function(){
                    alert("Comment box is empty");
                    $('.dommy__cmt').fadeOut();
                }
            },
            error: function(xhr, status, error) {
                if(xhr.responseText == ""){
                    alert("Error. Please try again.");
                }else{
                    alert(xhr.responseText);
                }
                $('.dommy__cmt').fadeOut();
            }
        })
            .done(function( msg ) {
                //alert( "Data Saved: " + msg );
                $('.dommy__cmt').fadeOut();
                console.log(msg);
                //$('body').html(msg);
                //alert("Comment added successfully.");
                //location.reload();

                // console.log(html);
                $('<div class="comments"><ul><li><div class="usr-av">'+av+'</div><div class="content"><p class="info"><span class="date">'+msg.created_at+'</span><a\ href="/comment/delete/'+msg.id+'" data-cmtid="cmt-'+msg.task_id+'-'+msg.id+'">Delete</a></p><h5 id="cmt-'+msg.task_id+'-'+msg.id+'">'+msg.comment+'</h5></div></li></ul></div><hr>').insertAfter("#modal-section"+tskid+" .comments.dommy__cmt");
                convert('cmt-'+msg.task_id+'-'+msg.id);
                countcmt(msg.task_id);
                document.getElementById("cm-"+tskid).value = "";

                // console.log(msg);


            });
        //$('#'+tskid+' a.card-wrap').trigger("click");
    }

    $('.comment-add').click(function(e){
        e.preventDefault();
        var tskid = $(this).data("tskid");
        var crtby= $(this).data("crtby");
        var av = $(this).parent().find('.name').text();
        createComment(tskid,crtby,av);
    });
    $('body').on("click",".comments .info a",function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var cmtid = $(this).data('cmtid');
        var tskid = cmtid.split('-')[1];
        if(confirm('Are you sure?')){
            $.ajax({
                method: "GET",
                url: url,
                error: function(xhr, status, error) {
                    if(xhr.responseText == ""){
                        alert("Error. Please try again.");
                    }else{
                        alert(xhr.responseText);
                    }

                }
            })
                .done(function( msg ) {
                    $('#'+cmtid).parent().parent().parent().parent().next().remove();
                    $('#'+cmtid).parent().parent().parent().parent().remove();
                    countcmt(tskid);
                });
        }

    });
    function btnChange(id,num){
        if(num == 1){
            btn = document.getElementById("btn-"+id+"-1");
            $("#title-"+id).parent().css({"background-color":"#eff4f7"});
        }else{
            btn = document.getElementById("btn-"+id+"-2");


        }
        btn.innerHTML = "Save";
        btn.style.display = "inline-block";

    }



    /*Image upload*/
    // Function to preview image after validation
    /*
    function fileUpload(){
    var file = this.files[0];
    var imagefile = file.type;
    var match= ["image/jpeg","image/png","image/jpg"];
    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
    {
    return false;
    }
    else
    {
    var reader = new FileReader();
    reader.onload = imageIsLoaded;
    reader.readAsDataURL(this.files[0]);
    }
    }
    function imageIsLoaded(e) {

    $('#previewing').attr('src', e.target.result);
    $('#previewing').attr('width', '250px');
    $('#previewing').attr('height', '230px');
    }*/

    $(document).ready(function(){
        function autoSave()
        {
            url="/notification-test";
            $.ajax({
                url:url,
                method:"Get",
                dataType:"text",
                success:function(data)
                {
                    if(data == 1){
                        $('#notification-change').addClass("notification-change");
                    }

                }
            });


        }
        setInterval(function(){
            autoSave();
        }, 100);
    });

    function myFunction() {
        url="/client-notification";
        $.ajax({
            url:url,
            method:"Get",
            dataType:"text",
            success:function(data)
            {
                $('#notifications').html(data);
            }
        });

    }


</script>
<script>

    $(function(){

        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {

                action: '/', // upload url

                allow : '*.(jpg|jpeg|gif|png)', // allow only images

                loadstart: function() {
                    bar.css("width", "0%").text("0%");
                    progressbar.removeClass("uk-hidden");
                },

                progress: function(percent) {
                    percent = Math.ceil(percent);
                    bar.css("width", percent+"%").text(percent+"%");
                },

                allcomplete: function(response) {

                    bar.css("width", "100%").text("100%");

                    setTimeout(function(){
                        progressbar.addClass("uk-hidden");
                    }, 250);

                    alert("Upload Completed")
                }
            };

        var select = UIkit.uploadSelect($("#upload-select"), settings),
            drop   = UIkit.uploadDrop($("#upload-drop"), settings);
    });

</script>
</body>

</html>