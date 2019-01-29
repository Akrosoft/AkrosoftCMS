<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ode Luxury Tailors</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@if(csrf_token())
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="#"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/contact/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/contact/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/contact/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/contact/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/contact/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/contact/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/contact/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/contact/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('site/contact/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div id="errorMsg" style="position: fixed; top: 30px; width: 100%; text-align: center; font-size: 22px;"></div>
		<div class="wrap-contact100">
			<form id="contact_us_form" class="contact100-form validate-form">
				<span class="contact100-form-title">
					Send Us A Message
				</span>

				<div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" id="fullname" name="fullname" placeholder="Full Name">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
					<input class="input100" type="text" id="email" name="email" placeholder="E-mail">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your phone">
					<input class="input100" type="text" id="phone" name="phone" placeholder="Phone">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your message">
					<textarea class="input100" id="message" name="message" placeholder="Your Message"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button id="send_contact_message" class="contact100-form-btn">
						<span>
							<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
							Send
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{ asset('site/contact/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('site/contact/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('site/contact/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('site/contact/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('site/contact/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('site/contact/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('site/contact/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('site/contact/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('site/contact/js/main.js') }}"></script>

	<script src="{{ asset('common/js/variables.js') }}"></script> 
	<script src="{{ asset('common/js/helpers.js') }}"></script> 
	<script src="{{ asset('common/js/functions.js') }}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

	if (getByID('send_contact_message')) {
		getByID('send_contact_message').addEventListener('click', updateContactUsEnquiryMessage);
	}
</script>

</body>
</html>
