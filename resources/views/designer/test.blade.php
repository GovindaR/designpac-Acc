<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DesignPac</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/css/uikit.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>

<section class="section">
    <div class="nav-bar row">
        <div class="col-md-6 logo"><a href="{{url('/')}}"><img src="{{url('/')}}/images/logo.png" alt=""></a></div>
        <div class="col-md-6 menu">
            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-right">

                    <ul class="uk-navbar-nav">
                        <li><a href="#" uk-toggle="target: #offcanvas-flip"><img src="{{url('/')}}/images/notification.png" alt="notification"></a></li>
                        <li><a href="#" uk-toggle="target: #offcanvas-flip-1"><img src="{{url('/')}}/images/activity.png" alt="activity"></a></li>
                        <li class="initials">
                            <a href="#" class="name">SJ</a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Account</a></li>
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
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <h3>Notifications</h3>

        <?php
        foreach ($data_urs as $act){
        $as=\App\ActivityNotificationModel::where("task_id",$act->id)->where('designer_id',null)->get();
        foreach ($as as $a){
        $dc_name=\App\User::where('id',$a->client_id)->value('name');
        $task_name=\App\TaskModel::where('id',$a->task_id)->value('title');
        ?>
        <p><?php echo $dc_name . " ".  $a->action ." ". $task_name.".  -" .$a->created_at ; ?></p>
        <?php
        }
        }
        ?>
    </div>
</div>
<!--end of offcanvas-->
<!--offcanvas-->
<div id="offcanvas-flip-1" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <h3>Activity</h3>

        <?php
        foreach ($data_urs as $act){
        $as=\App\ActivityNotificationModel::where("task_id",$act->id )->where('designer_id',\Illuminate\Support\Facades\Auth::User()->id)->get();
        foreach ($as as $a){
        $task_name=\App\TaskModel::where('id',$a->task_id)->value('title');
        ?>
        <p><?php echo \Illuminate\Support\Facades\Auth::user()->name . " ".  $a->action ." ". $task_name.".  -" .$a->created_at ;; ?> </p>
        <?php
        }
        }
        ?>

    </div>
</div>
<!--end of offcanvas-->
<div class="main">
    <div id="u" class="ur slot">
        <div class="title red">
            <h4>Unlimited Request</h4>
        </div>
        <div id="ur-drag" class="draggable">
            <?php foreach ($data_urs as $data_ur){
            if($data_ur->status == "ur"){
            ?>

            <div class="card" id="{!! $data_ur->id !!}" >
                <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle>
                    <span class="card-title"><?php echo $data_ur->title?></span>
                    <span>
                 <span class="comment"><img src="{{url('/')}}/images/comment.png" alt="comment">
                     <span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
            
             </span>
                </a>

                <div id="modal-section{{$data_ur->id}}" uk-modal>
                    <div class="uk-modal-dialog">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <form   action="{{url('/')}}/update/task/{{$data_ur->id}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title has-edit"><?php echo $data_ur->title?></h2>
                            </div>
                            <div class="uk-modal-body">

                                <p id="brief" class="has-edit"> <?php echo $data_ur->description?></p>
                                <!--<button class="save">Save</button>-->
                                {!! Form::file('attach',['size'=>"2048KB"]) !!}
                                <label>dfsd</label>
                                <h4>Attachments</h4>

                                <div class="files">
                                    <ul>
                                        <?php
                                        $files=\App\FileModel::where('task_id',$data_ur->id)->get();
                                        foreach ($files as $file){
                                        ?>
                                        <li>
                                            <div class="file-thumb">
                                                <img   src="{{url('/')}}/images/fi_0003_word.png" alt="">
                                            </div>
                                            <a href="/uploads/{!! $file->path !!}"
                                               target="_blank">{{$file->path}} </a> 
                                        </li>

                                        <?php
                                        }
                                        ?>

                                    </ul>

                                    <input style="background: #f78d1e;
    border: none;
    padding: 10px 15px;
    color: #fff;
    float: right;
    margin-top: 4px;
    margin-left: 147px;
    border-radius: 3px;
    outline: 0;" type="submit" value="save">
                                </div>
                            </div>
                        </form>

                        <div class="uk-modal-body">
                            <h4 style="clear:both;"><span>1</span>&nbsp;Comment(s)</h4>
                            <form  action="{{url('/')}}/create/comment" class="comment" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="task_id" value="{{$data_ur->id}}">
                                <input type="hidden" name="created_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

                                <label for="" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</label>
                                <textarea name="comment"></textarea>
                                <input type="submit" value="Comment">
                                {{--<label for="attach" class="btn-attach">Attach File</label>--}}
                                {{--<input type="file" multiple id="attach">--}}
                            </form>
                            <?php
                            $comments=\App\CommentModel::where('task_id',$data_ur->id)->get();
                            foreach ($comments as $comment){
                            ?>

                            <div class="comments">
                                <ul>
                                    <li>
                                        <div class="usr-av">
                                            {{\App\User::where('id',$data_ur->created_by)->value('name')[0].\App\User::where('id',$data_ur->created_by)->value('last_name')[0]}}

                                        </div>
                                        <div class="content">

                                            <p class="info">
                                                <span class="date">{{ $comment->created_at }}</span>
                                                <?php if($comment->created_by == \Illuminate\Support\Facades\Auth::user()->id){?>
                                                <a href="/comment/delete/{{$comment->id}}">Delete</a>
                                                <?php }?>
                                            </p>

                                            <h5>{{ $comment->comment }}</h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>

                            <?php }?>

                        </div>
                        <!--<div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-primary" type="button">Save</button>
                        </div>-->
                    </div>
                </div>
            </div>



            <?php }}?>

        </div>
        <div class="create-btn">
            <div>
                <?php if(Auth::user()->hasRole('client')){?>
                <button class="uk-button uk-button-default" type="button">create task</button>
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

    </div>
    <div id="d" class="da slot">
        <div class="title red">
            <h4>Design Added</h4>
        </div>
        <div id="da-drag" class="draggable">
            <?php foreach ($data_das as $data_ur){
            if($data_ur->status == "da"){
            ?>

            <div class="card" id="{!! $data_ur->id !!}" >
                <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle>
                    <span class="card-title"><?php echo $data_ur->title?></span>
                    <span>
                 <span class="comment"><img src="{{url('/')}}/images/comment.png" alt="comment">
                     <span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
             
             </span>
                </a>

                <div id="modal-section{{$data_ur->id}}" uk-modal>
                    <div class="uk-modal-dialog">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <form   action="{{url('/')}}/update/task/{{$data_ur->id}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title has-edit"><?php echo $data_ur->title?></h2>
                            </div>
                            <div class="uk-modal-body">

                                <p id="brief" class="has-edit"> <?php echo $data_ur->description?></p>
                                <!--<button class="save">Save</button>-->
                                {!! Form::file('attach',['size'=>"2048KB"]) !!}
                                <h4>Attachments</h4>

                                <div class="files">
                                    <ul>
                                        <?php
                                        $files=\App\FileModel::where('task_id',$data_ur->id)->get();
                                        foreach ($files as $file){
                                        ?>
                                        <li>
                                            <div class="file-thumb">
                                                <img   src="{{url('/')}}/images/fi_0003_word.png" alt="">
                                            </div>
                                            <a href="/uploads/{!! $file->path !!}"
                                               target="_blank">{{$file->path}} </a> 
                                        </li>

                                        <?php
                                        }
                                        ?>

                                    </ul>

                                    <input style="background: #f78d1e;
    border: none;
    padding: 10px 15px;
    color: #fff;
    float: right;
    margin-top: 4px;
    margin-left: 147px;
    border-radius: 3px;
    outline: 0;" type="submit" value="save">
                                </div>
                            </div>
                        </form>

                        <div class="uk-modal-body">
                            <h4 style="clear:both;"><span>1</span>&nbsp;Comment(s)</h4>
                            <form  action="{{url('/')}}/create/comment" class="comment" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="task_id" value="{{$data_ur->id}}">
                                <input type="hidden" name="created_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

                                <label for="" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</label>
                                <textarea name="comment"></textarea>
                                <input type="submit" value="Comment">
                                {{--<label for="attach" class="btn-attach">Attach File</label>--}}
                                {{--<input type="file" multiple id="attach">--}}
                            </form>
                            <?php
                            $comments=\App\CommentModel::where('task_id',$data_ur->id)->get();
                            foreach ($comments as $comment){
                            ?>

                            <div class="comments">
                                <ul>
                                    <li>
                                        <div class="usr-av">
                                            {{\App\User::where('id',$data_ur->created_by)->value('name')[0].\App\User::where('id',$data_ur->created_by)->value('last_name')[0]}}

                                        </div>
                                        <div class="content">

                                            <p class="info">
                                                <span class="date">{{ $comment->created_at }}</span>
                                                <?php if($comment->created_by == \Illuminate\Support\Facades\Auth::user()->id){?>
                                                <a href="/comment/delete/{{$comment->id}}">Delete</a>
                                                <?php }?>
                                            </p>

                                            <h5>{{ $comment->comment }}</h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>

                            <?php }?>

                        </div>
                        <!--<div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-primary" type="button">Save</button>
                        </div>-->
                    </div>
                </div>
            </div>



            <?php }}?>
        </div>
    </div>
    <div id="r" class="r slot">
        <div class="title red">
            <h4>Revisions</h4>
        </div>
        <div id="r-drag" class="draggable">
            <?php foreach ($data_rs as $data_ur){
            if($data_ur->status == "r"){
            ?>
            <div class="card" id="{!! $data_ur->id !!}" >
                <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle>
                    <span class="card-title"><?php echo $data_ur->title?></span>
                    <span>
                 <span class="comment"><img src="{{url('/')}}/images/comment.png" alt="comment">
                     <span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
            
             </span>
                </a>

                <div id="modal-section{{$data_ur->id}}" uk-modal>
                    <div class="uk-modal-dialog">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <form   action="{{url('/')}}/update/task/{{$data_ur->id}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title has-edit"><?php echo $data_ur->title?></h2>
                            </div>
                            <div class="uk-modal-body">

                                <p id="brief" class="has-edit"> <?php echo $data_ur->description?></p>
                                <!--<button class="save">Save</button>-->
                                {!! Form::file('attach',['size'=>"2048KB"]) !!}
                                <h4>Attachments</h4>

                                <div class="files">
                                    <ul>
                                        <?php
                                        $files=\App\FileModel::where('task_id',$data_ur->id)->get();
                                        foreach ($files as $file){
                                        ?>
                                        <li>
                                            <div class="file-thumb">
                                                <img   src="{{url('/')}}/images/fi_0003_word.png" alt="">
                                            </div>
                                            <a href="/uploads/{!! $file->path !!}"
                                               target="_blank">{{$file->path}} </a> 
                                        </li>

                                        <?php
                                        }
                                        ?>

                                    </ul>

                                    <input style="background: #f78d1e;
    border: none;
    padding: 10px 15px;
    color: #fff;
    float: right;
    margin-top: 4px;
    margin-left: 147px;
    border-radius: 3px;
    outline: 0;" type="submit" value="save">
                                </div>
                            </div>
                        </form>

                        <div class="uk-modal-body">
                            <h4 style="clear:both;"><span>1</span>&nbsp;Comment(s)</h4>
                            <form  action="{{url('/')}}/create/comment" class="comment" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="task_id" value="{{$data_ur->id}}">
                                <input type="hidden" name="created_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

                                <label for="" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</label>
                                <textarea name="comment"></textarea>
                                <input type="submit" value="Comment">
                                {{--<label for="attach" class="btn-attach">Attach File</label>--}}
                                {{--<input type="file" multiple id="attach">--}}
                            </form>
                            <?php
                            $comments=\App\CommentModel::where('task_id',$data_ur->id)->get();
                            foreach ($comments as $comment){
                            ?>

                            <div class="comments">
                                <ul>
                                    <li>
                                        <div class="usr-av">
                                            {{\App\User::where('id',$data_ur->created_by)->value('name')[0].\App\User::where('id',$data_ur->created_by)->value('last_name')[0]}}

                                        </div>
                                        <div class="content">

                                            <p class="info">
                                                <span class="date">{{ $comment->created_at }}</span>
                                                <?php if($comment->created_by == \Illuminate\Support\Facades\Auth::user()->id){?>
                                                <a href="/comment/delete/{{$comment->id}}">Delete</a>
                                                <?php }?>
                                            </p>

                                            <h5>{{ $comment->comment }}</h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>

                            <?php }?>

                        </div>
                        <!--<div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-primary" type="button">Save</button>
                        </div>-->
                    </div>
                </div>
            </div>



            <?php }}?>
        </div>
    </div>
    <div id="h" class="h slot">
        <div class="title red">
            <h4>Handover</h4>
        </div>
        <div id="h-drag" class="draggable">
            <?php foreach ($data_hs as $data_ur){
            if($data_ur->status == "h"){
            ?>
            <div class="card" id="{!! $data_ur->id !!}" >
                <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle>
                    <span class="card-title"><?php echo $data_ur->title?></span>
                    <span>
                 <span class="comment"><img src="{{url('/')}}/images/comment.png" alt="comment">
                     <span>
                         <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
             
             </span>
                </a>

                <div id="modal-section{{$data_ur->id}}" uk-modal>
                    <div class="uk-modal-dialog">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <form   action="{{url('/')}}/update/task/{{$data_ur->id}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title has-edit"><?php echo $data_ur->title?></h2>
                            </div>
                            <div class="uk-modal-body">

                                <p id="brief" class="has-edit"> <?php echo $data_ur->description?></p>
                                <!--<button class="save">Save</button>-->
                                {!! Form::file('attach',['size'=>"2048KB"]) !!}
                                <h4>Attachments</h4>

                                <div class="files">
                                    <ul>
                                        <?php
                                        $files=\App\FileModel::where('task_id',$data_ur->id)->get();
                                        foreach ($files as $file){
                                        ?>
                                        <li>
                                            <div class="file-thumb">
                                                <img   src="{{url('/')}}/images/fi_0003_word.png" alt="">
                                            </div>
                                            <a href="/uploads/{!! $file->path !!}"
                                               target="_blank">{{$file->path}} </a> 
                                        </li>

                                        <?php
                                        }
                                        ?>

                                    </ul>

                                    <input style="background: #f78d1e;
    border: none;
    padding: 10px 15px;
    color: #fff;
    float: right;
    margin-top: 4px;
    margin-left: 147px;
    border-radius: 3px;
    outline: 0;" type="submit" value="save">
                                </div>
                            </div>
                        </form>

                        <div class="uk-modal-body">
                            <h4 style="clear:both;"><span>1</span>&nbsp;Comment(s)</h4>
                            <form  action="{{url('/')}}/create/comment" class="comment" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="task_id" value="{{$data_ur->id}}">
                                <input type="hidden" name="created_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

                                <label for="" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</label>
                                <textarea name="comment"></textarea>
                                <input type="submit" value="Comment">
                                {{--<label for="attach" class="btn-attach">Attach File</label>--}}
                                {{--<input type="file" multiple id="attach">--}}
                            </form>
                            <?php
                            $comments=\App\CommentModel::where('task_id',$data_ur->id)->get();
                            foreach ($comments as $comment){
                            ?>

                            <div class="comments">
                                <ul>
                                    <li>
                                        <div class="usr-av">
                                            {{\App\User::where('id',$data_ur->created_by)->value('name')[0].\App\User::where('id',$data_ur->created_by)->value('last_name')[0]}}

                                        </div>
                                        <div class="content">

                                            <p class="info">
                                                <span class="date">{{ $comment->created_at }}</span>
                                                <?php if($comment->created_by == \Illuminate\Support\Facades\Auth::user()->id){?>
                                                <a href="/comment/delete/{{$comment->id}}">Delete</a>
                                                <?php }?>
                                            </p>

                                            <h5>{{ $comment->comment }}</h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>

                            <?php }?>

                        </div>
                        <!--<div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-primary" type="button">Save</button>
                        </div>-->
                    </div>
                </div>
            </div>



            <?php }}?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit-icons.min.js"></script>
<script src="{{url('/')}}/public/autosize.min.js"></script>
<script>
    autosize(document.querySelectorAll('textarea'));


    $( function() {
        $( "#da-drag, #r-drag, #h-drag, #ur-drag" ).sortable({
            connectWith: ".draggable",
            update : function () {
                var order1 = $('#ur-drag').sortable('toArray');
                var order2 = $('#da-drag').sortable('toArray');
                var order3 = $('#r-drag').sortable('toArray');
                var order4 = $('#h-drag').sortable('toArray');
                  //alert("Order 1:"+order1+"\n Order 2:"+order2+"\n Order 3:"+order3+"\n Order 4:"+order4);
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


            }
        }).disableSelection();
    } );
</script>
</body>
</html>