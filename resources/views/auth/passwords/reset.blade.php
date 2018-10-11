<!DOCTYPE html><!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
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
    max-width: 300px;
    margin: 27vh auto;
    padding: 40px;
    margin-top: calc(50vh - 240px);
    border-radius: 20px;
    }
    input[type="email"],input[type="password"]{
    height: 35px;
    border: 2px solid #ececec;
    width: 100%;
    }
    
    body{background: #0455d1;}
    @media(max-width:768px){ 
    .input-same{width:240px !important;}
    .header-nav{display: block;margin:0;margin-top:-10px;padding:15px 0;}
    }
    </style>
</head>
<body>

<div style="background: #fff;" class="header-nav">

    <div class="row" style="background: #fff;">
        <div class="container">
            <div class="col--1-of-12" style="width: 100%;">
                <div class="col col--2-of-12">
                    <div class="logo">
                        <img src="{{asset('assert/img/logo.png')}}" alt="designPac">
                    </div>
                </div>

            </div>
        </div>

    </div>



</div>
<div class="row">
    <div class="container">
        <div class="login-wrapper req-form">
            <div class="col col--4-of-4">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control input-same" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control input-same" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control input-same" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="action start">
                                <button type="submit">
                                    Reset Password
                                </button>
                        </div>
                    </form>
            </div>


        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('assert/js/main.js')}}"></script>
</body></html>

