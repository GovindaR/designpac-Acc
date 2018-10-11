<!DOCTYPE html><!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0,maximum-scale=1.0">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{asset('assert/js/bootstrap-min.js')}}"></script>
<script src="{{asset('assert/js/bootstrap-formhelpers-min.js')}}"></script>
<script type="text/javascript" src="{{asset('assert/js/bootstrapValidator-min.js')}}"></script>

    <title>DesignPac</title>
    <link rel="apple-touch-icon" href="{{asset("assert/mg/fav.png")}}i">
    <link rel="shortcut icon" type="image/png" href="{{asset("assert/img/fav.png")}}">
    <link rel="icon" href="http://www.designpac.net/wp-content/uploads/2017/01/dpac-150x150.png" sizes="32x32" />
<link rel="icon" href="http://www.designpac.net/wp-content/uploads/2017/01/dpac.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="http://www.designpac.net/wp-content/uploads/2017/01/dpac.png" />
<meta name="msapplication-TileImage" content="http://www.designpac.net/wp-content/uploads/2017/01/dpac.png" />


<link rel="stylesheet" href="{{asset("assert/css/bootstrap-formhelpers-min.css")}}" media="screen">
<link rel="stylesheet" href="{{asset("assert/css/bootstrapValidator-min.css")}}"/>
<link rel="stylesheet" href="{{asset("assert/css/bootstrap-side-notes.css")}}" />

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
    .up{position: relative; z-index: 2;}
    .down{position: relative; z-index: 1;}
    body{background: #0455d1;}
    .login-wrapper{background: #fff;margin-top: 50px;padding:30px 20px 20px 20px; border-radius: 20px;}
    .custom-select {
  position: relative;
  font-family: Arial;
}
.custom-select select {
  display: none !important; /*hide original SELECT element:*/
}
.select-selected {
  background-color: #0455d1;
  height: 22px;
}
/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 16px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #000 transparent transparent transparent;
}
/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #000 transparent;
  top: 8px;
}
/*style the items (options), including the selected item:*/
.select-items div, .select-selected {
    color: #ffffff;
    padding: 8px 16px;
    border: 1px solid transparent;
    border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
    cursor: pointer;
    user-select: none;
    background: none;
    border: none;
    border: 2px solid #ececec;
    color: #000;
    text-align: left;
    padding-left: 11px;
    font-size: 14px;
  background-color: #fff;

}
/*style items (options):*/
.select-items {
  position: absolute;
  top: 100%;
  left: 0px;
  right: 0;
  z-index: 99;
  background: #fff;
}
.select-items div{ border: none;}
/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}
.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
    position: relative;
  z-index: 99;
}
    @media(max-width:768px){ 
    .input-same   { width: 97% !important; display: block !important;}
    .login-wrapper .pac .wrap-pac{width: 103% !important;position:initial;display: block;}
    .header-nav{display: block;margin:0;margin-top:-10px;padding:15px 0;}
    .custom-select {width:100% !important;}
    }
   
    </style>
     <link rel="stylesheet" href="animate.css" type="text/css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<body>


<!--modal-->
<div class="col-lg-12" style="display:none;">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible">
            {{Session::get('message')}}
        </div>
    @endif

</div>

<div style="background: #fff" class="header-nav">

    <div class="row">
        <div class="container">
            <div class="col col-2-of-2" style="width: 100%;">
                <div class="col col--2-of-12">
                    <div class="logo">
                        <img src="{{asset('assert/img/logo.png')}}" alt="designPac" style="cursor:pointer;" id="img-logo">
                    </div>
                </div>

            </div>
        </div>

    </div>



</div>
<div class="row">
    <div class="container ">
        <div class="login-wrapper req-form">
    <div class="display">
    <div class="pac" id="cat-0">
    <div class="wrap-pac zoomBounce animated">
    <h2>$ 300/mo.</h2>
    
    <ul>
    <li>One active task at a time</li>
    <li>24 hrs turnaround</li>
    </ul>
    </div>
    </div>
    <div class="pac" id="cat-1">
    <div class="wrap-pac zoomBounce animated">
    <h2>$ 240/mo.</h2>
    
    <ul>
    <li>One active task at a time</li>
    <li>24 hrs turnaround</li>
    </ul>
    </div>
    </div>
    
    </div>
            <div class="signup-form">
                <h2 style="margin-bottom:0;">Register here.<i style="font-size:12px;font-family: Helvetica;font-style:normal;display: block;color:gray;font-weight:light;">(No credit card required.)</i></h2>
                <form role="form" method="POST" action="{{ url('/create/register') }}" class="req-form">
                    {{ csrf_field() }}
                    <div class="req-form pack">
                        <div class="error" style="background:red;display:{!! $errors->first('email') ? 'inline-block': 'none'!!};padding: 0 10px;margin: 10px 0;">
                            <p style="color:#fff;">{!! $errors->first('email', '<span class="help-block">&nbsp;&nbsp;<i class="fa fa-warning"></i>&nbsp;&nbsp;:message</span>') !!}</p>
                        </div>
                        <div class="error" style="background:red;display:{!! ($errors->first('password') || $errors->first('password')) ? 'inline-block': 'none'!!};padding: 0 10px;margin: 10px 0;">
                            <p style="color:#fff;">{!! $errors->first('password', '<span class="help-block">&nbsp;&nbsp;<i class="fa fa-warning"></i>&nbsp;&nbsp;:message</span>') !!}</p>
                        </div>
                        <div class="row">
                            <div class="col col--5-of-12 down">
                                <label for="">First Name</label>
                                <input type="text" name="name" required style="width: 200px;" class="input-same">
                                
                            </div>
                            <div class="col col--5-of-12 up">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" required style="width: 200px;" class="input-same">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col--5-of-12 down">
                                <label for="">Email</label>
                                <input id="emails" type="email" name="email"  required style="width: 200px;" class="input-same">
                                 <input id="email" type="hidden" name="role[0]" value="2" required>
                            </div>
                             <div class="col col--5-of-12 up">
                              <label for="">Organization Name</label>
                                <input type="text" name="organization_name" required style="width: 200px;" class="input-same">
                             </div>

                        </div>
                       

                        <div class="row">
                            
                            <div class="col col--5-of-12">
                                <label for="">Position/ Job Title</label>
                                <input type="text" name="position_name" required style="width: 200px;" class="input-same down">

                            </div>
                            <div class="col col--5-of-12 fa-angle-parent">
                             
                             <div class="custom-select" style="width:213px;">
                             <label for="" style="margin-bottom:10px;">Choose Plan</label>
                                <select name="suitable_package" style="border: 2px solid #e1e1e1;height: 41px;display:block;outline:0;margin-top:10px;width:213px;text-indent: 5px;" id="pac" class="input-same">
                                    <option value="Starter Package" data-cat="starter">Monthly</option>
                                    <option value="Small Business Package" data-cat="small">Semiannually - Save 20%</option>
                                </select>
                               </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col col--5-of-12 down">
                                <label for="">Password</label>
                                <input id="password" type="password" name="password" required style="width: 195px;" class="input-same">

                            </div>
                            <div class="col col--5-of-12 up">
                                <label for="">Confirm Password</label>
                                <input id="password-confirm" type="password" name="password_confirmation" required style="width: 195px;" class="input-same">
  
                            </div>
                        </div>
                           

                    <div class="action start">
                        <input type="submit" value="Sign Up">
                        <a href="" style="border-bottom: 2px solid #f58d1f; background: none; border-radius: 0; padding: 5px 10px;display: inline-block;color: #1e1e1e;font-size: 12px;transition: all .5s;" onClick="login()">Back to Login</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>



<script>
function login(){
window.location.href = "http://localhost/myacc/login";
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function abc(elem){
  var val = elem.getAttribute('data-cat');
    $('#'+val).fadeIn().siblings().fadeOut();

}
</script>

<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected up");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 0; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class","same-as-selected");
            h.setAttribute("data-cat","cat-"+i);
            abc(h);
            break;
          }
        }
        h.click();
        
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);</script>
 
<script src="{{asset('assert/js/main.js')}}"></script>


<script type="text/javascript">
  $.ajax({
    url: "./stripe/",
    method: "get",
    success: function(data){
      $('#stripe').html(data);
    }
  });
</script>

</body></html>