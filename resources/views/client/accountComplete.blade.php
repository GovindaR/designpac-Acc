<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

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



    <link rel="stylesheet" href="{{url('/')}}/style.css" type="text/css">

    <style type="text/css">

    .main .container{

        width: auto;

    background: #fff;

    border-radius: 20px;

    padding: 40px 0;

    }

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

                        <li><a href="#" uk-toggle="target: #offcanvas-flip"><img src="{{url('/')}}/images/notification.png" alt="notification"></a></li>

                        <li><a href="#" uk-toggle="target: #offcanvas-flip-1"><img src="{{url('/')}}/images/activity.png" alt="activity"></a></li>

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

    <div class="uk-offcanvas-bar">



        <button class="uk-offcanvas-close" type="button" uk-close></button>



        <h3>Notifications</h3>



        <?php

        foreach ($acts as $act){

        $as=\App\ActivityNotificationModel::where("task_id",$act->id)->where('client_id',null)->orderBy('created_at','desc')->get();

        foreach ($as as $a){

        $dc_name=\App\User::where('id',$a->designer_id)->value('name');

        $task_name=\App\TaskModel::where('id',$a->task_id)->value('title');

        ?>

        <p><?php echo $dc_name . " ".  $a->action ." ". $task_name.".  -" .$a->created_at ;; ?></p>

        <?php

        }

        }

        ?>

    </div>

</div>

<!--end of offcanvas-->

<!--offcanvas-->

<div id="offcanvas-flip-1" uk-offcanvas="flip: true; overlay: true">
<div class="preload"><img src="http://i.imgur.com/KUJoe.gif">
    <div class="content uk-offcanvas-bar">



        <button class="uk-offcanvas-close" type="button" uk-close></button>



        <h3>Activity</h3>

        <?php

        foreach ($acts as $act){

        $as=\App\ActivityNotificationModel::where("task_id",$act->id)->where('client_id',\Illuminate\Support\Facades\Auth::User()->id)->orderBy('created_at','desc')->get();

        foreach ($as as $a){

        $task_name=\App\TaskModel::where('id',$a->task_id)->value('title');

        ?>

        <p><?php echo \Illuminate\Support\Facades\Auth::user()->name . " ".  $a->action ." <strong>". $task_name.". </strong> -" .$a->created_at ;; ?> </p>

        <?php

        }

        }

        ?>







    </div>

</div>

<!--end of offcanvas-->



<div class="main p20" style="width: 320px;margin:auto;">

    <div class="container">

	<?php

	$invoiceNo = $_POST['invoiceNo'];

	$amount = $_POST['Amount'];

	$date = $_POST['dateTime'];

	$tranref = $_POST['tranRef'];

	$status = "";

	//$invoiceNo = 23434;

	

	$bank_response = $_POST;

	if (!empty($bank_response) && isset($bank_response['invoiceNo'])) {

	//print_r($bank_response);

	/* Issue With Hash for Now */

	//$hash_value = $bank_response['paymentGatewayID'] . $bank_response['respCode'] . $bank_response['fraudCode'] . $bank_response['Pan'] . $bank_response['Amount'] . $bank_response['invoiceNo'] . $bank_response['tranRef'] . $bank_response['approvalCode'] . $bank_response['Eci'] . $bank_response['dateTime'] . $bank_response['Status'];

	//            $signData = hash_hmac('SHA256', $hash_value, $this->visagateway->get_secret_key(), false);

	//            $signData = urlencode(strtoupper($signData));

	

	/*Visa Resp Key*/

	$resp_code = !empty($bank_response['respCode'])?$bank_response['respCode']:"-";

	$fraud_code = !empty($bank_response['fraudCode'])?$bank_response['fraudCode']:"-";

	$pan = !empty($bank_response['Pan'])?$bank_response['Pan']:"-";

	$approval_code = !empty($bank_response['approvalCode'])?$bank_response['approvalCode']:"-";

	$eci = !empty($bank_response['Eci'])?$bank_response['Eci']:"-";

	$bnk_status = !empty($bank_response['Status'])?$bank_response['Status']:"-";

	$fail_reason = !empty($bank_response['failReason'])?$bank_response['failReason']:"-";

	$note_merchant = !empty($bank_response['noteToMerchant'])?$bank_response['noteToMerchant']:"-";

	# verify payment

	$response = false;

	if ($bank_response['respCode'] == '00' || (in_array($bank_response['Status'], array('AP', 'RS')))) {

	$msg = "Payment Success";

	$status = "AP";

	} else {

	$msg = "Payment Fail"; header('Location:http://myaccount.designpac.net/account');?>

	

	<?php }

	

	}

	

	?>

	<?php if($status == "AP"){?>

	<h3>Payment Completed Successfully[<span>{{ $invoiceNo }}</span>]</h3>

	<h2>Your Recent Plan: 

	<?php

	$pac = \App\Package::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->value('suitable_package');

	if($pac == "Starter Package"){

	echo "Monthly";

	$pac = "Monthly";

	}else{

	echo "Semi-annually";

	$pac = "Semi-annually";

	}

	?>

	

	</h2>

	<p>is activated.</p>

	<h4><a href="http://www.designpac.net/dashboard/print.php?inv={{$invoiceNo}}&tran={{$tranref}}&amount={{$amount}}&dat={{$date}}&pac={{$pac}}">Download Receipt (PDF)</a></h4>

	<h4><a href="{{url('/account')}}" style="background: #f58d1f; padding: 5px 10px;border-radius: 20px;display: inline-block;color: #fff;font-size: 12px;">Go To Account</a></h4>

	

	

	<?php 

	//file_get_contents('http://www.designpac.net/jam/sale/amount/' . (int) $amount . '/trans_id/' . $tranref . '/tracking_code/' . $_COOKIE['jamcom']);



	}

	

	 ?>

       

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit-icons.min.js"></script>

<script type="text/javascript">
    $(function() {
    $(".preload").fadeOut(2000, function() {
        $(".content").fadeIn(1000);        
    });
});
</script>



</body>

</html>