<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300" />
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
    <link rel="stylesheet" href="{{url('/')}}/default.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/style.css" type="text/css">





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
<section class="section">
    <div class="nav-bar row">
        <div class="logo col-md-6"><a href="{{url('/')}}"><img src="{{url('/')}}/images/dpac-logo-01.svg" alt=""><span class="beta">Beta</span></a></div>
        <div class="menu col-md-6">
            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-right">

                    <ul class="uk-navbar-nav">
                        <li><a href="#" uk-toggle="target: #offcanvas-flip" onclick="myNotification()">
                            <!-- <img src="{{url('/')}}/images/notification.png" alt="notification"> -->

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 23.9" id="notification-change">
                                    <title>notifation</title><g id="Layer_2" data-name="Layer 2"><g id="Capa_1" data-name="Capa 1"><path class="cls-1" d="M19.9,19.87l-1.68-2.79a8.08,8.08,0,0,1-1.15-4.15V10.49a7.07,7.07,0,0,0-4.88-6.72V2.19a2.19,2.19,0,1,0-4.38,0V3.77a7.07,7.07,0,0,0-4.88,6.72v2.44a8.08,8.08,0,0,1-1.15,4.15L.1,19.87a.78.78,0,0,0,0,.74A.75.75,0,0,0,.73,21H7.34a2.29,2.29,0,0,0,0,.25,2.68,2.68,0,0,0,5.36,0,2.29,2.29,0,0,0,0-.25h6.61a.75.75,0,0,0,.64-.36A.78.78,0,0,0,19.9,19.87ZM2,19.52l1-1.69a9.58,9.58,0,0,0,1.35-4.9V10.49a5.62,5.62,0,1,1,11.24,0v2.44A9.58,9.58,0,0,0,17,17.83l1,1.69ZM10,1.45a.74.74,0,0,1,.74.74V3.45c-.25,0-.49,0-.74,0s-.49,0-.74,0V2.19A.74.74,0,0,1,10,1.45Zm1.23,19.77a1.23,1.23,0,1,1-2.45,0,2.29,2.29,0,0,1,0-.25h2.4A2.42,2.42,0,0,1,11.23,21.22Z"/></g></g>
                                </svg>
                            </a></li>
                        <li><a href="#" uk-toggle="target: #offcanvas-flip-1" class="activaty" onclick="myActivity()">
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
                                    <li><a href="{{url('/designer/profile')."/".\Illuminate\Support\Facades\Auth::user()->id}}">Profile</a>
                                    </li>
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
    <div class="uk-offcanvas-bar" id="activities">




    </div>
</div>
<!--end of offcanvas-->


<div class="main" style="padding-top:0;"  id="belt">
<div class="belt draggable">
    <div id="u" class="ur slot">
        <div class="title red" uk-sticky>
            <h4>Unlimited Request</h4>
        </div>
        <div id="ur-drag" class="draggable">
            <?php foreach ($data_urs as $data_ur){
            if($data_ur->status == "ur"){
            ?>

                <div class="card" id="{!! $data_ur->id !!}" >
                    <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle onclick="myModel({{$data_ur->id}})">
                        <span class="card-title"><?php echo $data_ur->title?></span>
                        <div>
                 <span id="comment{{$data_ur->id}}" class="comment <?php $test=\App\Notification::where('user_id',Auth::user()->id)->where('task_id',$data_ur->id)->where('seen',0)->get();
                 if(count($test)!=0){
                     echo "comment-remove";
                 }
                 ?>">
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
                            <span class="comment  <?php $test=\App\Notification::where('user_id',Auth::user()->id)->where('task_id',$data_ur->id)->where('seen',0)->get();
                            if(count($test)!=0){
                                echo "comment-remove";
                            }
                            ?>">
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
                         <?php echo \App\FileModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
                        </div>
                    </a>

                    <div id="modal-section{{$data_ur->id}}" uk-modal>

                    </div>
                </div>



            <?php }}?>

        </div>
       
    </div>
    <div id="d" class="da slot">
        <div class="title red" uk-sticky>
            <h4>Design Added</h4>
        </div>
        <div id="da-drag" class="draggable">
            <?php foreach ($data_das as $data_ur){
            if($data_ur->status == "da"){
            ?>

                <div class="card" id="{!! $data_ur->id !!}" >
                    <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle onclick="myModel({{$data_ur->id}})">
                        <span class="card-title"><?php echo $data_ur->title?></span>
                        <div>
                 <span id="comment{{$data_ur->id}}" class="comment <?php $test=\App\Notification::where('user_id',Auth::user()->id)->where('task_id',$data_ur->id)->where('seen',0)->get();
                 if(count($test)!=0){
                     echo "comment-remove";
                 }
                 ?>">
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
                            <span class="comment  <?php $test=\App\Notification::where('user_id',Auth::user()->id)->where('task_id',$data_ur->id)->where('seen',0)->get();
                            if(count($test)!=0){
                                echo "comment-remove";
                            }
                            ?>">
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
                         <?php echo \App\FileModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
                        </div>
                    </a>

                    <div id="modal-section{{$data_ur->id}}" uk-modal>

                    </div>
                </div>




            <?php }}?>
        </div>
    </div>
    <div id="r" class="r slot">
        <div class="title red" uk-sticky>
            <h4>Revisions</h4>
        </div>
        <div id="r-drag" class="draggable">
            <?php foreach ($data_rs as $data_ur){
            if($data_ur->status == "r"){
            ?>
                <div class="card" id="{!! $data_ur->id !!}" >
                    <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle onclick="myModel({{$data_ur->id}})">
                        <span class="card-title"><?php echo $data_ur->title?></span>
                        <div>
                 <span id="comment{{$data_ur->id}}" class="comment <?php $test=\App\Notification::where('user_id',Auth::user()->id)->where('task_id',$data_ur->id)->where('seen',0)->get();
                 if(count($test)!=0){
                     echo "comment-remove";
                 }
                 ?>">
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
                            <span class="comment  <?php $test=\App\Notification::where('user_id',Auth::user()->id)->where('task_id',$data_ur->id)->where('seen',0)->get();
                            if(count($test)!=0){
                                echo "comment-remove";
                            }
                            ?>">
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
                         <?php echo \App\FileModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
                        </div>
                    </a>

                    <div id="modal-section{{$data_ur->id}}" uk-modal>

                    </div>
                </div>




            <?php }}?>
        </div>
    </div>
    <div id="h" class="h slot">
        <div class="title red" uk-sticky>
            <h4>Handover</h4>
        </div>
        <div id="h-drag" class="draggable">
            <?php foreach ($data_hs as $data_ur){
            if($data_ur->status == "h"){
            ?>
                <div class="card" id="{!! $data_ur->id !!}" >
                    <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle onclick="myModel({{$data_ur->id}})">
                        <span class="card-title"><?php echo $data_ur->title?></span>
                        <div>
                 <span id="comment{{$data_ur->id}}" class="comment <?php $test=\App\Notification::where('user_id',Auth::user()->id)->where('task_id',$data_ur->id)->where('seen',0)->get();
                 if(count($test)!=0){
                     echo "comment-remove";
                 }
                 ?>">
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
                            <span class="comment  <?php $test=\App\Notification::where('user_id',Auth::user()->id)->where('task_id',$data_ur->id)->where('seen',0)->get();
                            if(count($test)!=0){
                                echo "comment-remove";
                            }
                            ?>">
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
                         <?php echo \App\FileModel::where('task_id',$data_ur->id)->get()->count();?>
                     </span>
                 </span>
                        </div>
                    </a>

                    <div id="modal-section{{$data_ur->id}}" uk-modal>

                    </div>
                </div>




            <?php }}?>
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
               // ['height', ['height']]
            ]
        });


    };


</script>
<script src="{{url('/')}}/autosize.min.js"></script>
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
        url = "{{url('/')}}/update/task/description/"+id;
        //alert("test");
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
        url = "{{url('/')}}/create/comment";
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
                countcmt(taskId);
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
        document.getElementById("task-model-test").innerHTML ='';
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



    $(document).ready(function(){
        function autoSave()
        {
            url="{{url('/')}}/notification-test";
            $.ajax({
                url:url,
                method:"Get",
                dataType:"text",
                success:function(data)
                {
                    // console.log(data);
                    if(data == 1){
                        $('#notification-change').addClass("notification-change");
                    }else{
                        $('#notification-change').removeClass("notification-change");
                    }

                }
            });


        }
        setInterval(function(){
            autoSave();
        }, 10000);
    });

    function myNotification() {
        url="{{url('/')}}/designer-notification";
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
    function myActivity() {
        url="{{url('/')}}/designer-activity";
        $.ajax({
            url:url,
            method:"Get",
            dataType:"text",
            success:function(data)
            {
                $('#activities').html(data);
            }
        });

    }


</script>
<script>
    function myModel(modelId) {
        //  document.getElementById('#task-model-test').reset();
//        if( $('#task-model-test').is(':empty') ) {
//            alert("test");
//        }else{
//            document.getElementById('#task-model-test').empty();
//        }
        url="{{url('/')}}/designer-model/"+modelId;
        $.ajax({
            url:url,
            method:"Get",
            dataType:"text",
            success:function(data)
            {
                $('#comment'+modelId).removeClass("comment-remove");
                $('#modal-section'+modelId).html(data);
            }
        });
    }
</script>




</body>
</html>