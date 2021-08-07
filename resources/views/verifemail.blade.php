<!DOCTYPE html>
<html lang="en">
<head>
	<title>Verifikasi E-mail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}">
	<!-- {{asset('assets/js/plugins/tables/datatables/datatables.min.js')}} -->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/linearicons-Free-v1.0.0/icon-font.min.css')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}"/>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}"/>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
<!--===============================================================================================-->
<!--===============================================================================================-->
<style>
	table
	{
		width: 100%;
		margin: 0 auto;
		font-size: 14px;
	}
	.button
	{
		margin-left: 65%;
	}
	.link
	{
		margin-left: 35%;
	}
	.input
	{
		border-radius: 20px;
		border: 1px solid #2D9FD9;
		color: #A0D18C;
		width: 250px;
		height: 30px;
		padding-left: 10px;
	}
	.input:focus
	{
		outline: none;
		border: 1px solid #A0D18C;
		color: #2D9FD9;
	}
	.error-msg
	{
		text-align: center;
		color: red;
	}
</style>
<!--===============================================================================================-->
<style>
	/* The sidebar menu */
	.sidenav
	{
	  height: 100%; /* Full-height: remove this if you want "auto" height */
	  width: 160px; /* Set the width of the sidebar */
	  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
	  z-index: 1; /* Stay on top */
	  top: 0; /* Stay at the top */
	  left: 0;
	  background-color: #2832C7; /* Blue */
	  overflow-x: hidden; /* Disable horizontal scroll */
	  padding-top: 20px;
	}

	/* The navigation menu links */
	.sidenav a
	{
	  padding: 6px 8px 6px 16px;
	  text-decoration: none;
	  font-size: 16px;
	  color: #FFFFFF;
	  display: block;
	  text-align: center;
	}

	/* When you mouse over the navigation links, change their color */
	.sidenav a:hover
	{
	  color: #f1f1f1;
	}

	/* Profile pic */
	.sidenav img
	{
		display: block;
		margin-left: auto;
		margin-right: auto;
	}

	/* Style page content */
	.main {
	  margin-left: 160px; /* Same as the width of the sidebar */
	  padding: 0px 10px;
	}

	/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
	@media screen and (max-height: 450px) {
	  .sidenav {padding-top: 15px;}
	  .sidenav a {font-size: 18px;}
	}
</style>
<!--===============================================================================================-->
</head>
<body>
    <div class="limiter">
		<div class="container-login100" style="background-image:url({{asset('images/bg-01.jpg')}})">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ url('/kirim-otp') }}">
                {{ csrf_field() }}
                    <span class="login100-form-title p-b-53">
                        Verifikasi E-mail anda
                    </span>
					<input type="hidden" name="id" id="id" value="{{ $id }}" />
					<input type="hidden" name="email" id="email" value="{{ $email }}" />
					<label for="otp">Kode OTP:</label>
					<input type="text" name="otp" id="otp" class="input" required />
					<br /><br />
					<button type="submit" name="submit" class="btn btn-primary button">Kirim</button>
                </form>
				<br /><br />
				<form method="POST" action="{{ url('/kirim-ulang') }}">
					{{ csrf_field() }}
					<input type="hidden" name="id" id="id" value="{{ $id }}" />
					<input type="hidden" name="email" id="email" value="{{ $email }}" />
					<button type="submit" name="submit" class="btn btn-link link">Kirim Ulang OTP</button>
				</form>
				<br /><br />
				@if(Session::has('resend_msg'))
				<div class="alert alert-success alert-block" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong>{{ Session::get('resend_msg') }}</strong>
				</div>
				@endif
            </div>
        </div>
    </div>
</body>
</html>