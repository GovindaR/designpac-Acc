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

    <!--  -->

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <!-- imported by anooz -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.8.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
        
        <div>
                    <?php 
                   \Stripe\Stripe::setApiKey(config('services.stripe.secret'));



                   $plansall = \Stripe\Plan::all();

                   $plansall = substr($plansall,23);?>

                <script>if (window.Stripe) $("#example-form").show()</script>
                <noscript><p>JavaScript is required for the registration form.</p></noscript>
            
        </div>   


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

        

    <div class="form-group">

    <h3>Subscribe to your appropriate plan.</h3>

    </div>
        <script src="https://js.stripe.com/v3/"></script>
    
    <form action="./home" method="POST" class="uk-grid-small" uk-grid id="payment-form">

        <div id="card-element">

           <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                            

                                    <!-- <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="pk_test_5VohQDHM5riWVCrVd2WKG6x4"
                                        data-amount="30000"
                                        data-name="DesignPac Solutions, LLC"
                                        data-description="Subscripton"
                                        data-image="http://localhost/myacc/images/dpac-logo-01.svg"
                                        data-locale="auto"
                                        data-label="Subscribe"
                                        data-email="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                    </script> -->
                                                   
                                            
    
        

            <div class="form-row">
                <label for="name" class="stripeLabel">Your Name</label>
                <input type="text" name="name" class="required" />
            </div>            
    
            <div class="form-row">
                <label for="email">E-mail Address</label>
                <input type="text" name="email" class="required" />
            </div>            
    
            <div class="form-row">
                <label>Card Number</label>
                <input type="text" maxlength="20" autocomplete="off" class="card-number stripe-sensitive required" />
            </div>
            <div class="uk-margin">
                <select class="uk-select" name="post_plan" id="plan">
                    <option>Marketing As A Service</option>
                   <script>
                       var data = [];
                       data = <?php echo $plansall;?>;
                       html = "";
                       //console.log(data.data[0].nickname);
                       for(var i="0";i<data.data.length;i++){
                       html += '<option value="'+data.data[i].id+'">'+data.data[i].nickname+'($'+data.data[i].amount/100+')</option>';
                       }
                       $('#plan').html(html);                    
                        
                     
                   </script>
                </select>
            </div>
            
            <div class="form-row">
                <label>CVC</label>
                <input type="text" maxlength="4" autocomplete="off" class="card-cvc stripe-sensitive required" />
            </div>
            
            <div class="form-row">
                <label>Expiration</label>
                <div class="expiry-wrapper">
                    <select class="card-expiry-month stripe-sensitive required">
                    </select>
                    <script type="text/javascript">
                        var select = $(".card-expiry-month"),
                            month = new Date().getMonth() + 1;
                        for (var i = 1; i <= 12; i++) {
                            select.append($("<option value='"+i+"' "+(month === i ? "selected" : "")+">"+i+"</option>"))
                        }
                    </script>
                    <span> / </span>
                    <select class="card-expiry-year stripe-sensitive required"></select>
                    <script type="text/javascript">
                        var select = $(".card-expiry-year"),
                            year = new Date().getFullYear();
                        for (var i = 0; i < 12; i++) {
                            select.append($("<option value='"+(i + year)+"' "+(i === 0 ? "selected" : "")+">"+(i + year)+"</option>"))
                        }
                    </script>
                </div>
            </div>
            

            <button type="submit" name="submit-button">Submit</button>
            <span class="payment-errors"></span>
        </form> 
    </div>
    

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.33/js/uikit-icons.min.js"></script>


<script type="text/javascript">
          
            $(document).ready(function() {
                function addInputNames() {
                    // Not ideal, but jQuery's validate plugin requires fields to have names
                    // so we add them at the last possible minute, in case any javascript 
                    // exceptions have caused other parts of the script to fail.
                    $(".card-number").attr("name", "card-number")
                    $(".card-cvc").attr("name", "card-cvc")
                    $(".card-expiry-year").attr("name", "card-expiry-year")
                }
                function removeInputNames() {
                    $(".card-number").removeAttr("name")
                    $(".card-cvc").removeAttr("name")
                    $(".card-expiry-year").removeAttr("name")
                }
                function submit(form) {
                    // remove the input field names for security
                    // we do this *before* anything else which might throw an exception
                    removeInputNames(); // THIS IS IMPORTANT!
                    // given a valid form, submit the payment details to stripe
                    $(form['submit-button']).attr("disabled", "disabled")
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(), 
                        exp_year: $('.card-expiry-year').val(),
                        plan: $('[name="post_plan"]').val()
                    }, function(status, response) {
                        if (response.error) {
                            // re-enable the submit button
                            $(form['submit-button']).removeAttr("disabled")
        
                            // show the error
                            $(".payment-errors").html(response.error.message);
                            // we add these names back in so we can revalidate properly
                            addInputNames();
                        } else {
                            // token contains id, last4, and card type
                            var token = response['id'];
                            // insert the stripe token
                            var input = $("<input name='stripeToken' value='" + token + "' style='display:none;' />");
                            form.appendChild(input[0])
                            // and submit
                            form.submit();
                        }
                    });
                    
                    return false;
                }
                
                // add custom rules for credit card validating
                jQuery.validator.addMethod("cardNumber", Stripe.validateCardNumber, "Please enter a valid card number");
                jQuery.validator.addMethod("cardCVC", Stripe.validateCVC, "Please enter a valid security code");
                jQuery.validator.addMethod("cardExpiry", function() {
                    return Stripe.validateExpiry($(".card-expiry-month").val(), 
                                                 $(".card-expiry-year").val())
                }, "Please enter a valid expiration");
                // We use the jQuery validate plugin to validate required params on submit
                $("#example-form").validate({
                    submitHandler: submit,
                    rules: {
                        "card-cvc" : {
                            cardCVC: true,
                            required: true
                        },
                        "card-number" : {
                            cardNumber: true,
                            required: true
                        },
                        "card-expiry-year" : "cardExpiry" // we don't validate month separately
                    }
                });
                // adding the input field names is the last step, in case an earlier step errors                
                addInputNames();
            });
        </script>
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


