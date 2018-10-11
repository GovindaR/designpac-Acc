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



</head>

<body class="dc">



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





    </div>

</div>
</div>



<!--end of offcanvas-->

<!--offcanvas-->

<div id="offcanvas-flip-1" uk-offcanvas="flip: true; overlay: true">

    <div class="uk-offcanvas-bar" id="activities">

    </div>

</div>

<!--end of offcanvas-->

<div class="main p20">

    <div class="container">

    <div class="dc-wrap">

        <!--<h2>Account Details</h2>

        <form role="form" method="POST" action="#">

            {{ csrf_field() }}

            <div class="form-group">

                <label for="name">First Name:</label>

                {{\Illuminate\Support\Facades\Auth::user()->name}}

            </div>

            <div class="form-group">

                <label for="last_name">Last Name:</label>

                {{\Illuminate\Support\Facades\Auth::user()->last_name}}

            </div>

            <div class="form-group">

                <label for="email">Email:</label>

                {{\Illuminate\Support\Facades\Auth::user()->email}}

            </div>

            <div class="form-group">

                <label for="organization_name">Organization Name:</label>

                {{ \App\Package::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->value('organization_name')}}

            </div>

            <div class="form-group">

                <label for="position_name">Position/ Job Title:</label>

                {{ \App\Package::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->value('position_name')}}

            </div>

            <div class="form-group">

                <label for="">Choose Suitable Package:</label>

                <br>

                {{ \App\Package::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->value('suitable_package')}}



            </div>

            <div class="form-group">

                <label for="">Package Cost:</label>

                <br>

                <?php

                    $cost=\App\Package::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->value('suitable_package');

                    $rate = 0;

                    if($cost=="Starter Package"){

                        echo "$199";

                        $rate = 199;

                    }elseif($cost=="Small Business Package"){

                        echo "$399";

                        $rate = 399;

                    }else{

                        echo "$699";

                        $rate = 699;

                    }

                ?>



            </div>



        </form>-->

        <!--PAYMENT API-->

        <?php

		$invoiceNo = str_pad(rand(),5,"0",STR_PAD_LEFT); 

		

		//echo $invoiceNo."<br>";

		$merchantId =9100931799;

		//$merchantId = str_pad($merchantId, 15, '0', STR_PAD_LEFT);

		//echo $merchantId;

		$amount = $rate*100;

		$amount = str_pad($amount, 12, '0', STR_PAD_LEFT);

		//echo $amount;

		//$currencyCode = 524;

		$currencyCode = 840;

		$nonSecure = "Y";

		$signatureString = $merchantId.$invoiceNo.$amount.$currencyCode.$nonSecure; 

		//$signatureString = $merchantId.$invoiceNo.$amount; 

		//echo urlencode($signatureString);  

		$secretKey = "JG1YO3FXIZRLA81K6XRZYO4YF121MAZ5";

		$signData = hash_hmac('SHA256', $signatureString, $secretKey, false);   

		$signData = strtoupper($signData); 

		//$bank_response = $_POST;

		

		//echo $signData;  

		//https://hblpgw.2c2p.com/HBLPGW/Payment/Payment/Payment

		//http://www.designpac.net/dashboard/account-complete

		//http://myaccount.designpac.net/account/complete

        ?>

	<div class="form-group">

	<label for="">Your Current Plan:</label>

	<br>

	<?php

	$pacc = \App\Package::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->value('suitable_package');

	if($pacc == "Starter Package"){

	echo "Monthly";

	}else{

	echo "Semi-annually";

	}

	?>

	</div>

	<div class="form-group">

	<label for="">Package Cost:</label>

	<br>

	<?php

	$cost=\App\Package::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->value('suitable_package');

	$rate = 0;

	if($cost=="Starter Package"){

	echo "$300";

	$rate = 300;

	}elseif($cost=="Small Business Package"){

	echo "$1440";

	$rate = 1440;

	}else{

	echo "$699";

	$rate = 699;

	}

	?>

	

	</div>

	

	<form action="https://hblpgw.2c2p.com/HBLPGW/Payment/Payment/Payment" target='_blank' method='post' id="form" onsubmit="DoSubmit()" name="payform" class="req-form">

	{{ csrf_field() }}

	<input type="hidden" id="paymentGatewayID" name="paymentGatewayID" value="{{$merchantId}}"/> 

	<input type="hidden" id="invoiceNo" name="invoiceNo" value="{{$invoiceNo}}"/> 

	<!--<input type="hidden" id="Amount" name="Amount" value="33"/> 

	<input type="hidden" id="dateTime" name="dateTime" value="20180303045613"/> 

	<input type="hidden" id="tranRef" name="tranRef" value="4462"/> 

	<input type="hidden" id="respcode" name="respCode" value="00"/>

	<input type="hidden" id="sts" name="Status" value="AP"/>-->

	<input type="hidden" id="productDesc" name="productDesc" value="Payment for DesignPac"/> 

	<!--<label>We accept Visa only at the moment.<label/>-->

	<input type="text" id="amount" name="amount" value="" placeholder="Enter amount" style="width:200px;" onKeyUp="checkCoupon()"/>

	<input type="text" id="coupon" name="coupon" value="" placeholder="Coupon code (Optional)" style="width:200px;" onKeyUp="checkCoupon()" onChange="checkCoupon()" autocomplete="off"/>

	<input type="hidden" id="currencyCode" name="currencyCode" value="{{$currencyCode}}"/>

	<input type="hidden" id="userDefined1" name="userDefined1" value="{{$cost}}"/>

	<input type="hidden" id="nonSecure" name="nonSecure" value="N"/>

	<input type="hidden" id="hashValue" name="hashValue" value="{{$signData}}"/>

	<p id="paymsg"></p>

	<div class='action start btn-green'>

	<button type='submit'>Pay Now</button>

	<br>

	<p>You will be redirected to our bank&apos;s secured site.</p>

	</div>

	</form>

	<div class="payment">

	<ul>

	<li></li>

	<li></li>

	</ul>

	</div>

	<script type="text/javascript">

	var coupon = "FIRST10";var val;

	function DoSubmit(){

	

	val = val*100;

	var str = "" + val;

	var pad = "000000000000";

	var ans = pad.substring(0, pad.length - str.length) + str;

	document.payform.amount.value = ans;

	//alert(ans);

	return false;

	}

	function checkCoupon(){

	val = document.payform.amount.value;

	var inpCoupon = document.payform.coupon.value;

	if(inpCoupon == ""){

	}else{

	if(inpCoupon == coupon){

	val *= .9;

	document.getElementById("paymsg").innerHTML = "Total: " + val;

	//return true;

	}else{

	document.getElementById("paymsg").innerHTML = "Incorrect Coupon. No discount granted.";

	//return false;

	}

	}

	}

	</script>

        <!--END of PAYMENT API-->

    </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit-icons.min.js"></script>



<script>

    function autoSave()

    {

        url="/notification-test";

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

    }, 1000);





    function myNotification() {

        url="/client-other-notification";

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

        url="/client-activity";

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