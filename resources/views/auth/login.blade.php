<!DOCTYPE html><!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,maximum-scale=1">
    <meta name="keywords" content="Unlimited designs,Printing, Graphics, flat fee">
    <meta name="description" content=""><!-- fb --->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.designpac.net/">
    <meta property="og:title" content="Monthly Unlimited Package">
    <meta property="og:image" content="">
    <meta property="og:site_name" content="DesignPac">
    <meta property="og:description" content=""><!-- twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="DesignPac via @thedesignpac">
    <meta name="twitter:url" content="https://www.designpac.net/">
    <meta name="twitter:image" content=""><!-- google plus -->
    <meta itemprop="name" content="DesignPac">
    <meta itemprop="description" content="">
    <script src="{{asset('assert/js/vendor/progress.js')}}"></script>
    <title>DesignPac</title>
    <link rel="apple-touch-icon" href="{{asset("assert/mg/fav.png")}}i">
    <link rel="shortcut icon" type="image/png" href="{{asset("assert/img/fav.png")}}">
    <link rel="icon" href="http://www.designpac.net/wp-content/uploads/2017/01/dpac-150x150.png" sizes="32x32" />
<link rel="icon" href="http://www.designpac.net/wp-content/uploads/2017/01/dpac.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="http://www.designpac.net/wp-content/uploads/2017/01/dpac.png" />
<meta name="msapplication-TileImage" content="http://www.designpac.net/wp-content/uploads/2017/01/dpac.png" />
    <link rel="stylesheet" href="{{asset("assert/css/main.css")}}">
    <link rel="stylesheet" href="{{asset("assert/css/dpac.css")}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script>
        var view = false;
        function stopScrolling(e) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        }
    </script>
    <script src="{{asset('assert/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script><!-- Start of Async -->
    <style type="text/css">
     .login-wrapper{
    background: #fff;
    max-width: 60%;
    margin: 27vh auto;
    padding: 40px;
    margin-top: calc(50vh - 160px);
    border-radius: 20px;
    }
    body{background: #0455d1;}
    div.action{text-align: left;}
    .img-right{    
    float: left;
    width: 40%;
    margin-left: 10%;
    }
    .form{float: left;}
    @media(max-width:968px){
    #modal .wrapper{
    max-width: 86% !important;
    }
    h2{max-width:100% !important;}
    .img-right{display:none;}
    .login-wrapper{max-width: 300px;padding:10px;}
    .form{ float: none;display: block;}
    }
    
 
    </style>
</head>
@if(Session::has('message'))
<body style="background: #0455d1 url({{asset('assert/img/success-bg.png')}}) no-repeat;">
@else
<body>
<script src="https://static.tapfiliate.com/tapfiliate.js" type="text/javascript" async></script>
<script type="text/javascript">
    (function(t,a,p){t.TapfiliateObject=a;t[a]=t[a]||function(){ (t[a].q=t[a].q||[]).push(arguments)}})(window,'tap');

    tap('create', '7388-cd8fbd');
    tap('detect');
</script>
@endif


<!--modal-->
<div class="col-lg-12" style="display:block;">
    @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" style="margin-bottom:0;" id="msg-al">

<h2 style="text-align: center;color: #fff;padding-top: 21px;max-width: 32%;margin: auto;">Great! You have successfully created your account. Please login to continue.</h2>
</div>


      
<!--<div id="modal1" style="position:fixed;width:100%;background:rgba(0,0,0,0.3);height:100%;display:block;top:0;">

    <div class="wrapper req-form" style="max-width:30%;margin:15% auto;background:#fff;text-align: center;padding: 20px;">
        <iframe src="https://player.vimeo.com/video/269842879" width="100%" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        <form role="form" method="POST" action="">
            
            <div class="action select cta-btn" style="text-align: left;">
               
                <input type="reset" value="Close" onclick="closeModal();">
            </div>
        </form>
    </div>
</div>-->

    @endif

</div>
<div id="modal" style="position:fixed;width:100%;background:rgba(0,0,0,0.3);height:100%;display:none;top:0;">

    <div class="wrapper req-form" style="max-width:30%;margin:15% auto;background:#fff;text-align: center;padding: 20px;">
        @if ($errors->has('email'))

            <div class="error" style="background:red;padding: 1px;margin: 10px 0;">
                <p style="color:#fff;">{{ $errors->first('email') }}</p>
            </div>
        @endif
        <form role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            <label for="">Enter Email Address where you want to send password reset link.</label><br>
            <input type="text" name="email" placeholder="Enter email" style="border:#ececec 2px solid;width:80%;" required><br>
            <div class="action select cta-btn" style="text-align: left;">
                <input type="submit" value="Send">
                <input type="reset" value="Close" onclick="closeModal();">
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="login-wrapper req-form">
        	 <div class="logo">
                        <img src="{{asset('assert/img/logo.png')}}" alt="designPac" style="margin: 0;cursor:pointer;" id="img-logo">
                    </div>
            <div class="col col--4-of-4">
                <form role="form" method="POST" action="{{ url('/login') }}" class="form">
                    {{ csrf_field() }}
                    <label for="">Email</label>
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus style="width: 270px; height: 35px;" class="uk-input">
                    <label for="">Password</label>
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="password" type="password" name="password" required style="width: 270px; height: 35px;" class="uk-input">

                    <div class="action select cta-btn">
                        <input type="submit" value="Login">
                        <input type="button" value="SignUp" onClick="window.location.href = 'http://myaccount.designpac.net/signup';">
                    </div>
                    <div class="forgot" style="margin-top:10px;">
                        <a href="#" style="border-bottom: 2px solid #f58d1f; background: none; border-radius: 0; padding: 5px 10px;display: inline-block;color: #1e1e1e;font-size: 12px;text-decoration:none;" onclick="showModal();">Forgot Password</a>&nbsp;&nbsp;&nbsp;

                        <!--<a href="{{url('/signUp')}}" style="color:#1e1e1e;font-size:12px;">   Sign Up</a>-->
                    </div>
                    <script>
                        function showModal(){
                            document.getElementById("modal").style.display = "block";
                        }
                        function closeModal(){
                            document.getElementById("modal").style.display = "none";
                        }
                    </script>

                </form>
                <div class="img-right">
                <img src="http://www.designpac.net/wp-content/uploads/2017/11/last-section-01.svg" alt="designpac">
                </div>
            </div>


        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('assert/js/main.js')}}"></script>
</body></html>



