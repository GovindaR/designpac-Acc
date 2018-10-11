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
    <style type="text/css">
        #client{list-style: none;}
        #client a{display:inline-block;float: left;width: 250px;min-height: 96px;padding: 10px; border-radius: 5px; background: #fff;text-align: center;border:2px solid #ececec;line-height: auto;}
        #client p{font-size: 14px;color: #ec8122;}
        #client li{float: left;margin-right:5px;margin-bottom:5px;}
        #client li h2{color: #2e3192;}
    </style>
</head>
<body class="dc">

<section class="section">
    <div class="nav-bar row">
        <div class="col-md-6 logo"><a href="{{url('/')}}"><img src="{{url('/')}}/images/dpac-logo-01.svg" alt=""></a></div>
        <div class="col-md-6 menu">
            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-right">

                    <ul class="uk-navbar-nav">
                        <li><a href="#" uk-toggle="target: #offcanvas-flip" onclick="myNotification()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 23.9" id="notification-change" class="">
                                    <title>notifation</title><g id="Layer_2" data-name="Layer 2"><g id="Capa_1" data-name="Capa 1"><path class="cls-1" d="M19.9,19.87l-1.68-2.79a8.08,8.08,0,0,1-1.15-4.15V10.49a7.07,7.07,0,0,0-4.88-6.72V2.19a2.19,2.19,0,1,0-4.38,0V3.77a7.07,7.07,0,0,0-4.88,6.72v2.44a8.08,8.08,0,0,1-1.15,4.15L.1,19.87a.78.78,0,0,0,0,.74A.75.75,0,0,0,.73,21H7.34a2.29,2.29,0,0,0,0,.25,2.68,2.68,0,0,0,5.36,0,2.29,2.29,0,0,0,0-.25h6.61a.75.75,0,0,0,.64-.36A.78.78,0,0,0,19.9,19.87ZM2,19.52l1-1.69a9.58,9.58,0,0,0,1.35-4.9V10.49a5.62,5.62,0,1,1,11.24,0v2.44A9.58,9.58,0,0,0,17,17.83l1,1.69ZM10,1.45a.74.74,0,0,1,.74.74V3.45c-.25,0-.49,0-.74,0s-.49,0-.74,0V2.19A.74.74,0,0,1,10,1.45Zm1.23,19.77a1.23,1.23,0,1,1-2.45,0,2.29,2.29,0,0,1,0-.25h2.4A2.42,2.42,0,0,1,11.23,21.22Z"/></g></g>
                                </svg></a></li>
                        <li><a href="#" uk-toggle="target: #offcanvas-flip-1" class="activaty" onclick="myActivity()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.11 18.67">
                                    <title>Activity</title><g id="Layer_2" data-name="Layer 2"><g id="Capa_1" data-name="Capa 1"><path class="cls-1" d="M29.35,11.43H19.2a.78.78,0,0,0-.71.49L17.27,15,14.8.61A.74.74,0,0,0,14.06,0a.76.76,0,0,0-.76.61L10.86,14.19,9.54,7.8a.78.78,0,0,0-.62-.59.75.75,0,0,0-.78.36L5.86,11.44H.76A.76.76,0,1,0,.76,13H6.29a.79.79,0,0,0,.65-.41L8.44,10l1.73,8.25c0,.22.21.47.74.47s.72-.31.75-.49L14,5.12l2.19,12.81a.76.76,0,0,0,.67.63.74.74,0,0,0,.78-.47l2-5.14h9.63a.76.76,0,0,0,0-1.52Z"/></g></g></svg></a></li>
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
<div class="main" style="background: linear-gradient(135deg, rgba(213,98,22,1) 0%, rgba(247,140,0,1) 100%)">
    <div class="container">
        <ul id="client">
            <h3></h3>
            @foreach($clients as $client)
                <li>
                    <a href="{{url('/designer/tasks/'.$client->client_id)}}"><div><h2><?php echo \Illuminate\Support\Facades\DB::table('users')->where('id',$client->client_id)->value('name');?><h2> <p><b> {{ \App\Package::where('user_id',$client->client_id)->value('organization_name') }}</b></p></div></a>
                    <?php
                        $testNotification=\App\Notification::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->where('created_by',$client->client_id)->where('seen',0)->get();
                        if(count($testNotification)!=0){
                            $dataTest=1;
                        }else{
                            $dataTest=0;
                        }
                        ?>
                    <span class="notice__designer"<?php if($dataTest ==1){ echo "style="."'background: #ea5b3e !important;'"."";} ?> >
                     <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 356.484 356.484"
                          xml:space="preserve"

                     >
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
                    <small>
                       {{ count(\App\Notification::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->where('created_by',$client->client_id)->where('seen',0)->get()) }}
                    </small>
                </span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit-icons.min.js"></script>
<script type="text/javascript">
    $('.uk-offcanvas-bar p').click(function() {
        $(this).css('font-weight', 'normal');
    });
</script>
<script type="text/javascript">
    $('.uk-offcanvas-bar p').click(function() {
        $(this).css('background', 'none');
        $('#modal-section115').show();
        $('#modal-section115').addClass('uk-open');
    });
</script>
<script>
    function autoSave()
    {
        url="{{url('/')}}/notification-test";
        $.ajax({
            url:url,
            method:"Get",
            dataType:"text",
            success:function(data)
            {
                 console.log(data);
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
    }, 100000);


    function myNotification() {
        url="{{url('/')}}/client-other-notification";
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
        url="{{url('/')}}/client-activity";
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

</body>
</html>