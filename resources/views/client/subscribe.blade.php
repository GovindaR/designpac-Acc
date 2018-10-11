
<div class="uk-modal-dialog">

    <button class="uk-modal-close-default" type="button" uk-close></button>


	
		<div class="col-md-6 col-md-offset-3">
			<h3>Subscribe</h3>
				<form action="{{url('/')}}/subscribe" method="POST">
				  <script
				    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				    data-key="pk_test_5VohQDHM5riWVCrVd2WKG6x4"
				    data-amount="999"
				    data-name="DesignPac Solutions, LLC"
				    data-description="Widget"
				    data-image="http://localhost/myacc/images/dpac-logo-01.svg"
				    data-locale="auto"
				    data-email="{{\Illuminate\Support\Facades\Auth::user()->data-email[0]}}">
				  </script>
				</form>
		</div>
		
</div>