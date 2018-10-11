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

    <link rel="stylesheet" href="{{url('/')}}/default.min.css" type="text/css">

    <link rel="stylesheet" href="{{url('/')}}/style.css" type="text/css">











    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-touch-events/1.0.5/jquery.mobile-events.js"></script>

<link rel="stylesheet" href="style.css" type="text/css">
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

<!--  <div class="create-btn">

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

</div> -->

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

    <style type="text/css">
        #refresh{
            position: fixed;
            top: 10px;
        
        }
        #refresh p{
            border: none;
            background: none;
        }
        @media(min-width:969px){
            #refresh{display: none;}
        }
    </style>
    
    
    <div id="refresh">
    <p><span uk-icon="refresh"></span></p>
    </div>
    <div id="notification-stream">
    <style type="text/css">
        p.acts-loader{
            display: flex;
            align-items: flex-start;
            border: none;
            margin-bottom: 15px;
            opacity: 0.5;
            background: none;
        }
        .face-loader{
            display: inline-block;
            width:40px;
            height: 40px;
            border-radius: 50%;
            background: #ececec;
            margin-right: 10px;
            margin-top: -10px;
            
        }
        .act{
            position: relative;
            width: calc(100% - 50px);
            
        }
        .act i{
            position: absolute;
            width: 70px;
            background: #f4f4f4;
            height: 10px;
            top: -10px;
        }
        .act .bar{
            display: inline-block;
            width: 90%;
            height: 15px;
            background: #ddd;
            margin-top: 10px;
        }
    </style>
    <button class="uk-offcanvas-close" type="button" uk-close></button>
    <h3>Notifications</h3>

    
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    </div>



    </div>

</div>



<!--end of offcanvas-->

<!--offcanvas-->

<div id="offcanvas-flip-1" uk-offcanvas="flip: true; overlay: true">

    <div class="uk-offcanvas-bar" id="activities">
    <div id="activity-stream">
    <style type="text/css">
        p.acts-loader{
            display: flex;
            align-items: flex-start;
            border: none;
            margin-bottom: 15px;
            opacity: 0.5;
        }
        .face-loader{
            display: inline-block;
            width:40px;
            height: 40px;
            border-radius: 50%;
            background: #ececec;
            margin-right: 10px;
            margin-top: -10px;
            
        }
        .act{
            position: relative;
            width: calc(100% - 50px);
            
        }
        .act i{
            position: absolute;
            width: 70px;
            background: #f4f4f4;
            height: 10px;
            top: -10px;
        }
        .act .bar{
            display: inline-block;
            width: 90%;
            height: 15px;
            background: #ddd;
            margin-top: 10px;
        }
    </style>
    <button class="uk-offcanvas-close" type="button" uk-close></button>
    <h3>Activity</h3>

    
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>
    <p class="acts-loader"><span class="face-loader"></span><span class="act"><i class="time-loader"></i><span class="bar"></span></span></p>

    </div>

    </div>

</div>

<!--end of offcanvas-->



<!-- Stripe payment popup -->
<!-- <div >
    
        <div >
            <h3>Subscribe</h3>
                <form action="./home" method="POST">

                    {{csrf_field()}}

                  <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_5VohQDHM5riWVCrVd2WKG6x4"
                    data-amount="30000"
                    data-name="DesignPac Solutions, LLC"
                    data-description="Subscripton"
                    data-image="http://localhost/myacc/images/dpac-logo-01.svg"
                    data-locale="auto"
                    data-email="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                  </script>
                </form>
        </div>
        
</div> -->


<div class="main" style="padding-top:0;" id="belt">

<div class="belt draggable">

    <div id="u" class="ur slot">

        <div class="title red">

            <h4>Unlimited Request</h4>

        </div>

        <div id="ur-drag" class="draggable">
            
            <?php foreach ($data_urs as $data_ur){?>

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

                        <span class="comment <?php $test=\App\Notification::where('user_id',Auth::user()->id)->where('task_id',$data_ur->id)->where('seen',0)->get();

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







            <?php }?>


</div>

</div>




    <div id="d" class="da slot">

        <div class="title red" >

            <h4>Design Added</h4>

        </div>

        <div id="da-drag" class="draggable">

            <?php foreach ($data_das as $data_ur){?>

            <div class="card" id="{!! $data_ur->id !!}" >

                <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle onclick="myModel({{$data_ur->id}})">

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

                        <?php echo \App\FileModel::where('task_id',$data_ur->id)->get()->count();?>

                     </span>

                 </span>

                    </div>

                </a>



                <div id="modal-section{{$data_ur->id}}" uk-modal>



                </div>

            </div>







            <?php }?>

        </div>

    </div>

    <div id="r" class="r slot">

        <div class="title red">

            <h4>Revisions</h4>

        </div>

        <div id="r-drag" class="draggable">

            <?php foreach ($data_rs as $data_ur){?>

            <div class="card" id="{!! $data_ur->id !!}" >

                <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle onclick="myModel({{$data_ur->id}})">

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

                         <?php echo \App\FileModel::where('task_id',$data_ur->id)->get()->count();?>

                     </span>

                 </span>

                    </div>

                </a>



                <div id="modal-section{{$data_ur->id}}" uk-modal>



                </div>

            </div>







            <?php }?>

        </div>

    </div>

    <div id="h" class="h slot">

        <div class="title red">

            <h4>Handover</h4>

        </div>

        <div id="h-drag" class="draggable">

            <?php foreach ($data_hs as $data_ur){?>

            <div class="card" id="{!! $data_ur->id !!}" >
<!--                <a data-href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle onclick="myModel({{$data_ur->id}})">-->
                <a href="#modal-section{{$data_ur->id}}" class="card-wrap" uk-toggle onclick="myModel({{$data_ur->id}})">

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

                      <?php echo \App\FileModel::where('task_id',$data_ur->id)->get()->count();?>

                     </span>

                 </span>

                    </div>

                </a>



                <div id="modal-section{{$data_ur->id}}" uk-modal>



                </div>

            </div>







            <?php }?>

        </div>
        <!--receiver-for-mobile-->
    <style type="text/css">
        @media(max-width:968px){
            .main .slot{
                height: 100%;
            }
            body,html{
                 overscroll-behavior-y: contain;
            }
            
        }
    #mobile-basket.slot{
/*
        position: fixed;
        right: 0;
*/      position: fixed;
        right: 0px;
        left: 0;
        bottom: 0;
        width: 100vw;
        background: #fff;
        text-align: center;
        z-index: 0;
        opacity: 1;
        height: 60px;
        padding-top: 10px;
        box-sizing: border-box;
        display: none;
    }
/*
        #mobile-basket.slot:before{
            content: '';
            position: fixed;
            z-index: -1;
            background: #000;
            opacity: 0.8;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
        }
*/
    #mobile-basket h4{
        margin-top: 30px;
        margin-bottom: 20px;
        color: #ddd;
    }
        #mobile-basket .wrap-drop{
            display: flex;
        }
        #mobile-basket .draggable{
            height: 60px;
            position: relative;
            border-radius: 5px;
            background: #e3ecf8;
            margin: 10px 10px;
            overflow: visible;
            z-index: 1;
        }
        #mobile-basket .draggable{
            height: 60px;
            padding: 0;
            width: 25%;
            display: inline-block;
        }
        #mobile-basket .draggable:after{
            content: attr(data-name);
            position: absolute;
            top: 10px;
            right: 0;
            left: 0;
            text-align: center;
            opacity: 0.5;
            font-size: 10px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            padding: 0 5px;
        }
        #mobile-basket .draggable:before{
            content: attr(data-plus);
            position: absolute;
            bottom: 10px;
            font-size: 22px;
            text-align: center;
            left: 0;
            right: 0;
            opacity: 0.6;
        }
        #mobile-basket .draggable .card,#mobile-basket .draggable .sortable-placeholder{
            margin: 0;
            width: 100%;
        }
        #mobile-basket .draggable .sortable-placeholder{
            background: #ddd;
        }
        #mobile-basket .draggable .card{
            position: relative;
            z-index: 11;
            width: 98%;
            margin: 0 auto;
            margin-top: 4px;
            height: 73px;
        }
        .slot{width: 25%;}
        .main{height: calc(100vh - 140px);}
        .create-btn{
                position: fixed;    
                right: 0;
                bottom: 0;
                width: 100%;
                height: auto;
                display: inline-block;
                z-index: 9;
                background: red;
        }
        @media(max-width:968px){
            .section{    position: fixed;
    height: 80px;
    width: 100%;
            top:0;}
            .belt{width: 360%;}
            .slot .card .card-title{ overflow:hidden;white-space: nowrap;text-overflow: ellipsis;}
            body{width: 100vw;overflow: hidden;}
            .main{overflow: hidden; overflow-x: scroll;margin-top:80px;}
            #slider-mob{display:none;}
            #mob-create-btn{margin: 0 auto;padding: 10px 20px;width: 90%;height: 35px;margin-top: 10px;font-size:14px;line-height: 0;}
            .wrap-drop{margin-top: -10px; opacity: 0;transition: 0.2s all ease-in-out;}
            .main .belt,.main{height: calc(100vh - 180px);}
            .main .belt.mob-drag,.main.mob-drag{height: calc(100vh - 180px);}
            .create-btn{
                
                bottom: 60px;
                left: 0;
                right: 0;
/*                background: green;*/
                opacity: 1;
                z-index: 99;
            }
            .wrap-create-btn{
/*                background: red;*/
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                height: 60px;
                margin-top: 0px;
            
            }
            #mobile-basket.slot{display: block;}
            .card.moving{
                box-shadow: 0px 0px 10px rgba(0,0,0,0.4);
            }
            }
        @media(min-width:969px){
            .create-btn{
                background: none;
                width: 220px;
            }
            .main .belt,.main{height: calc(100vh - 80px);}
            .card-wrap span{
  -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */

            }
        }

</style>
    <div id="mobile-basket" class="slot">

<!--
        <div class="title" uk-sticky>

            <h4 style="background:none;">Drop Here</h4>

        </div>
-->
<!--
        <div class="draggable" style="opacity:0;">
           
        </div>
-->
       <div class="wrap-drop">
        <div id="ur-reveive" class="draggable" data-plus="+" data-name="Unlimited Request">
           
        </div>
        <div id="da-reveive" class="draggable" data-plus="+" data-name="Design Added">
              
        </div>
        <div id="r-reveive" class="draggable" data-plus="+" data-name="Revisions">
             
        </div>
        <div id="h-reveive" class="draggable" data-plus="+" data-name="Handover">
<!--            <div class="card" style="height:60px;opacity:0;"></div> -->
        </div>
        </div> 


        </div>
    </div>
    
    

   

    </div>






</div>

<!--
<div id="mobile-basket">
    <h3>Drop Here!</h3>
    <div class="slot-receiver">
        <div id="ur-reveive" class="draggable"><div>Unlimitedv Request</div></div>
        <div id="da-reveive" class="draggable"><div>Design Added</div></div>
        <div id="r-reveive" class="draggable"><div>Revisions</div></div>
        <div id="h-reveive" class="draggable"><div>Handover</div></div>       
    </div>
</div>
-->
<!-- ------------- -->
<div class="create-btn">

            <div class="wrap-create-btn">

                <?php if(Auth::user()->hasRole('client')){?>

                <button class="uk-button uk-button-default" type="button" uk-toggle="target: #creat" id="mob-create-btn">Create Task</button>

                    <?php }?>

                

            </div>

</div>
<div id="creat" uk-modal>

<div class="uk-modal-dialog uk-modal-body" >


<form action="./create/task" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="uk-modal-header">
<h3>Title</h3>
<h2 class="uk-modal-title has-edit"><textarea name="title" id="title"  style="font-weight:bold;" placeholder="Enter Title">Enter your Task Title</textarea></h2>

<!-- {{--<button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;display: none;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},1)" id="btn-{{$data_ur->id}}-1">Save</button>--}}-->
</div>

<div class="uk-modal-body">

<h3 class="u-inline-block">Description</h3>
<div  class="has-edit">
<p><textarea placeholder="Type your design brief here" name="description" id="comment" >Description</textarea></p>

</div>


<button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" type="submit" value="create">Save</button>
<h3 class="Attach">Attachments</h3>

<div class="js-upload uk-placeholder uk-text-center">
<span uk-icon="icon: cloud-upload"></span>
<span class="uk-text-middle">Upload Files</span>
<div uk-form-custom>
<input id="avatar" type="file" name="avatar" multiple="multiple" />
<span class="uk-link">Click to choose files</span>
</div>
</div>

<progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>



<div class="uk-margin" uk-margin>

<meta name="csrf-token" content="{!! csrf_token() !!}">



</div>
<div class="files" id="file-uploaded">

</div>
</div>
</form>
</div>
</div>
<!-- ------------- -->

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

    ['link', ['linkDialogShow', 'unlink']],

    ['para', ['ul', 'ol', 'paragraph']],

//    ['height', ['height']]

  ]

  });





};





</script>





<script src="autosize.min.js"></script>

<script>

   autosize(document.querySelectorAll('textarea'));
    var orderData = {
        order1: [],
        order2: [],
        order3: [],
        order4: []
    };
    function inMobile(){
        var ck = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
    ck = true;
}
        return ck;
    }
    //ck = inMobile();
    function refreshStatus(s) {
                $.ajax({

                    url: '{{ url('/project_status') }}',

                    type: 'GET',

                    data: orderData,

                    success: function(s) {
                    //console.log(s);
                    if(s == 0){
                    UIkit.notification({
    message: "<span uk-icon='icon: check'></span> Moved Successfully!",
    status: 'primary',
    pos: 'top-center',
    timeout: 5000
});
                    location.reload();
                }else if(s == undefined){
                    
                }
                       else{
                       }
                    }.bind(this, s),
                        error: function(jqXHR, textStatus, errorThrown){
                             UIkit.notification({
    message: "<span uk-icon='icon: question'></span>"+textStatus+", "+errorThrown,
    status: 'danger',
    pos: 'top-center',
    timeout: 5000
});
                        }

                })

                // window.location.reload();

                //  alert("Order 1:"+order1+"\n Order 2:"+order2+"\n Order 3:"+order3+"\n Order 4:"+order4);





            }
    var sort = function(){$( function() {

        $( "#da-drag, #r-drag, #h-drag, #ur-drag, #ur-reveive, #da-reveive, #r-reveive, #h-reveive,.wrap-drop" ).sortable({

            connectWith: ".draggable",

            distance: 0.1,

            update : function(){
                var order1 = $('#ur-drag').sortable('toArray');

                var order2 = $('#da-drag').sortable('toArray');

                var order3 = $('#r-drag').sortable('toArray');

                var order4 = $('#h-drag').sortable('toArray');
                orderData.order1 = order1;
                orderData.order2 = order2;
                orderData.order3 = order3;
                orderData.order4 = order4;
                refreshStatus();
            },

            cursor: "-webkit-grabbing",
            

             start: function( event, ui ) {

             //console.log(ui);

            ui.item.context.style.transform= "rotate(10deg)";
                
                 //console.log(event);
                 if(inMobile()){
                     //$("#da-drag, #r-drag, #h-drag, #ur-drag").droppable({disabled: true});
                     //$("#da-drag, #r-drag, #h-drag, #ur-drag").css("width","1px");
                     ui.item.context.style.transform= "scale(.6) rotate(0deg)";
                     //$('.wrap-drop').css("opacity","1");
                     $('.main .belt,.main').addClass("mob-drag");
                     //$('.create-btn').css("display","none");
                     //$('.belt').css("width","100%");
//                     ui.item.context.style.position="relative";
//                     ui.item.context.style.left="99999px";
                     //refreshStatus();
                 }

            //testPos($('.ui-sortable'), ui.helper);

            },

            stop: function( event, ui ) {
                 
             //console.log(ui);

            ui.item.context.style.transform= "rotate(0deg)";
                
                if(inMobile()){
                    var $item = ui.item.context;
                    var rcv = $($item).parent().attr("id");
                    //$item.removeClass("moving");
                    if(rcv == "ur-reveive"){
                        //alert(rcv);
                        orderData.order1.push(ui.item.context.id);
                        refreshStatus(0);
                    }else if(rcv == "da-reveive"){
                        orderData.order2.push(ui.item.context.id);
                        refreshStatus(0);
                    }else if(rcv == "r-reveive"){
                        orderData.order3.push(ui.item.context.id);
                        refreshStatus(0);
                    }else if(rcv == "h-reveive"){
                        orderData.order4.push(ui.item.context.id);
                        refreshStatus(0);
                    }
                    
                   //$("#da-drag, #r-drag, #h-drag, #ur-drag").css("width","auto");
                    
                    setTimeout(function(){
                          //$('#mobile-basket.slot').css("display","none");
                        //$('.belt').css("width","400%");
                        $('.wrap-drop').css("opacity","0");
                        $('.main .belt,.main').removeClass("mob-drag");
                        $('.create-btn').css("display","block");
                        
                        $( "#da-drag, #r-drag, #h-drag, #ur-drag, #ur-reveive, #da-reveive, #r-reveive, #h-reveive,.wrap-drop" ).sortable("destroy");
                        
                        //$i.removeClass("moving");
                        $('.card').removeClass("moving");
                        $('.card').css({
                "pointer-events":"auto",
                "opacity":"1"
            });
                        
                    },500);
                    
                }

           // clearInterval(timerId);

            },

           placeholder: "sortable-placeholder",

           forcePlaceholderSize: true,

           scrollSensitivity: 10,

           scroll: true

        }).disableSelection();
        
       // $("#ur-reveive, #da-reveive, #r-reveive, #h-reveive").droppable();

    } );}
    
    if(!inMobile()){
       sort(); 
    }
    if(inMobile()){
        //sort(); 
        $('body').attr("oncontextmenu","return false;");
        $('.card-wrap').removeAttr("href");
        //$('.card-wrap').removeAttr("onClick");
        $('.card-wrap').removeAttr("uk-toggle");
        
       // $( "#ur-drag, #da-drag, #r-drag, #h-drag").sortable({connectWith: ".draggable"}).sortable("disable");
       // $('.card').draggable("disable");
    }
        $('.card').taphold(function(e){
            e.preventDefault();
            e.stopPropagation();
            $('body').css('-moz-user-select', 'none');
      $('body').css('-webkit-user-select', 'none');
//             $( "#ur-drag, #da-drag, #r-drag, #h-drag").sortable({connectWith: ".draggable"}).sortable("enable");
            $id = $(this).find("a").attr("href");
            //$(this).find('a').removeAttr("href");
           $(this).addClass("moving");
            $(this).siblings().css({
                "pointer-events":"none",
                "opacity":"0.3"
            });
            $(this).parent().parent().siblings().find('.card').css({
                "pointer-events":"none",
                "opacity":"0.3"
            });
            $('.wrap-drop').css("opacity","1");
             $('.main .belt,.main').addClass("mob-drag");
             $('.create-btn').css("display","none");
            //UIkit.modal.alert($id);
            //UIkit.modal(""+$id).show();
            //UIkit.modal().$destroy();
            
            sort();
                           },{
            duration: 3000
        });
    
    $('.card').doubletap(function(e){
//        e.preventDefault();
        $id = $(this).find("a").attr("data-href");
        $elem = $(""+$id);
        //$elem.attr("uk-toggle","");
        //$elem.attr("href",$id);
        //alert($elem.attr("href"));
        UIkit.modal($id).show();
        $elem.show();
        
    });
    
     
     //change status on mobile version
//    $('body').delegate('[name="status"]','change',function(){
//        $stats = $(this).val();
//        $taskid = $(this).data("id");
//        //alert($stats+" "+$taskid);
//        if($stats == "ur"){
//            orderData.order1.push($taskid);
//        }else if($stats == "da"){
//            orderData.order2.push($taskid);
//        }else if($stats == "r"){
//            orderData.order3.push($taskid);
//        }else if($stats == "h"){
//            orderData.order4.push($taskid);
//        }
//        refreshStatus(0);
//        
//    });

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
    var EnterKey = 13;

$.fn.isBound = function(type, fn) {
    var data = this.data('events')[type];

    if (data === undefined || data.length === 0) {
        return false;
    }

    return (-1 !== $.inArray(fn, data));
};


    function printOut(){
         return $('#todo-list').html();
    }
        function runBind() {
        $('.destroy').on('click', function(e) {
          $currentListItem = $(this).closest('li');

          $currentListItem.remove();
            printOut();
        });

        $('.toggle').on('click', function(e) {
          var $currentListItemLabel = $(this).closest('li').find('label');
          /*
           * Do this or add css and remove JS dynamic css.
           */
          if ( $currentListItemLabel.attr('data') == 'done' ) {
              $currentListItemLabel.attr('data', '');
              $currentListItemLabel.css('text-decoration', 'none');
           $currentListItemLabel.prev().prop("checked",false);
             printOut();
          }
          else {
              $currentListItemLabel.attr('data', 'done');
        $currentListItemLabel.css('text-decoration', 'line-through');
              $currentListItemLabel.prev().prop("checked",true);
//              $currentListItemLabel.parent().addClass('done');
              printOut();
          }
            });
        }
    
    $todoList = $('#todo-list');
    $cnt = 0;
    $('#new-todo').keypress(function(e) {

    if (e.which === EnterKey) {
            $('.destroy').off('click');
            $('.toggle').off('click');
            var todos = $todoList.html();
             $cnt = $todoList.find('li').length() - 1;
            alert($cnt);
      todos += ""+
                "<li>" +
          "<div class='view'>" +
            "<input class='toggle' type='checkbox' id='li-"+$cnt+"'>" +
            "<label data='' for='li-"+$cnt+"'>" + " " + $('#new-todo').val() + "</label>" +
            "<a class='destroy'></a>" +
          "</div>" +
        "</li>";
      
      $(this).val('');
        $todoList.html(todos);
        printOut();
        runBind();
        $('#main').show();
    
  }}); // end if



</script>
<script>

    var token,desc,title,attach,data,url,btn;

    function saveInfo(id,num){

        event.preventDefault();

        desc = document.getElementById("comment-"+id).value;

        title = document.getElementById("title-"+id).value;
        todos = printOut();

        attach = null;

        data = {

            "_token": "{{ csrf_token() }}",

            title: title,

            description: desc,
            todos: todos

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



    {{--function countcmt(tskid){--}}

        {{--var cnt = $('#modal-section'+tskid+' .comments').not(".dommy__cmt").length;--}}

        {{--$('#modal-section'+tskid+' form.comment').prev().find('span').text(cnt);--}}

        {{--$("#"+tskid).find('.comment').find('span').text(cnt);--}}

    {{--}--}}



    {{--function createComment(tskid,crtby,av){--}}

        {{--alert();--}}

        {{--$('.dommy__cmt').fadeIn();--}}

        {{--var comment = document.getElementById("cm-"+tskid).value;--}}

        {{--data = {--}}

            {{--"_token": "{{ csrf_token() }}",--}}

            {{--task_id: tskid,--}}

            {{--created_by: crtby,--}}

            {{--comment: comment--}}

        {{--};--}}

        {{--url = "/create/comment";--}}

        {{--$.ajax({--}}

            {{--method: "POST",--}}

            {{--url: url,--}}

            {{--data: data,--}}

            {{--statusCode: {--}}

                {{--422: function(){--}}

                    {{--alert("Comment box is empty");--}}

                    {{--$('.dommy__cmt').fadeOut();--}}

                {{--}--}}

            {{--},--}}

            {{--error: function(xhr, status, error) {--}}

                {{--if(xhr.responseText == ""){--}}

                    {{--alert("Error. Please try again.");--}}

                {{--}else{--}}

                    {{--alert(xhr.responseText);--}}

                {{--}--}}

                {{--$('.dommy__cmt').fadeOut();--}}

            {{--}--}}

        {{--})--}}

            {{--.done(function( msg ) {--}}

                {{--//alert( "Data Saved: " + msg );--}}

                {{--$('.dommy__cmt').fadeOut();--}}

                {{--console.log(msg);--}}

                {{--//$('body').html(msg);--}}

                {{--//alert("Comment added successfully.");--}}

                {{--//location.reload();--}}



                {{--// console.log(html);--}}

                {{--$('<div class="comments"><ul><li><div class="usr-av">'+av+'</div><div class="content"><p class="info loading"><span class="date">'+msg.created_at+'</span><a\ href="/comment/delete/'+msg.id+'" data-cmtid="cmt-'+msg.task_id+'-'+msg.id+'">Delete</a></p><h5 class="loading" id="cmt-'+msg.task_id+'-'+msg.id+'">'+msg.comment+'</h5></div></li></ul></div><hr>').insertAfter("#modal-section"+tskid+" .comments.dommy__cmt");--}}

                {{--convert('cmt-'+msg.task_id+'-'+msg.id);--}}

                {{--countcmt(msg.task_id);--}}

                {{--document.getElementById("cm-"+tskid).value = "";--}}



                {{--// console.log(msg);--}}





            {{--});--}}

        {{--//$('#'+tskid+' a.card-wrap').trigger("click");--}}

    {{--}--}}



    $('.comment-add').click(function(e){

        e.preventDefault();

        var tskid = $(this).data("tskid");

        var crtby= $(this).data("crtby");

        var av = $(this).parent().find('.name').text();

        createComment(tskid,crtby,av);

    });

    $('body').on("click",".comments .info a",function(e){

        e.preventDefault();

        //document.getElementById("#task-model-test").innerHTML = "";

        var url = $(this).attr('href');

        var cmtid = $(this).data('cmtid');

        // var tskid = cmtid.split('-')[1];

//         if(confirm('Are you sure?')){

//             $.ajax({

//                 method: "GET",

//                 url: url,

//                 error: function(xhr, status, error) {

//                     if(xhr.responseText == ""){

//                         alert("Error. Please try again.");

//                     }else{

//                        // alert(xhr.responseText);

//                     }



//                 }

//             })

// //                .done(function( msg ) {

// //                    $('#'+cmtid).parent().parent().parent().parent().next().remove();

// //                    $('#'+cmtid).parent().parent().parent().parent().remove();

// //                    countcmt(tskid);

// //                });

//         }



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

        url="./client-notification";

        $.ajax({

            url:url,

            method:"Get",

            dataType:"text",

            success:function(data)

            {

                $('#notification-stream').html(data);
                $('#refresh p').html('<span uk-icon="refresh"></span>');

            }

        });



    }

    function myActivity() {

        url="{{url('/')}}/client-activity";

        $.ajax({

            url:url,

            method:"Get",

            dataType:"text",

            success:function(data)

            {

                $('#activity-stream').html(data);
                //$('#refresh p').html('<span uk-icon="refresh"></span>');

            }

        });



    }
                 if(inMobile()){
                      $('body').delegate('#refresh','tap',function(e){
                          e.preventDefault();
                      $('#refresh').html('<p style="border:none;height:10px;paddin-top:10px;"><span uk-spinner="ratio:0.6" style="margin-top:-15px;"></span>');
                          setTimeout(function(){
                              myNotification();
                          },2000);
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
         url="{{url('/')}}/client-model/"+modelId;
        if(!inMobile()){
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

       

       

    }

</script>





</body>



</html>



