<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard Admin</title>
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
</head>
<body>
    <div class="sidenav">
        <hr>
        <img src="images/icons/profil-pic.png" alt="Admin" width="50" height="50">
        <a href="/admin">Admin</a>
        <hr>
        <a href="/daftar-calon">Daftar</a>
        <hr>
        <a href="/info-pemilwa-univ">Info Pemilwa Universitas</a>
        <hr>
        <a href="/info-pemilwa-fakultas">Info Pemilwa Fakultas</a>
        <hr>
        <a href="/info-pemilih">Info Pemilih</a>
        <hr>
    </div>
    <div class="limiter">
		<div class="container-login100" style="background-image:url({{asset('images/bg-01.jpg')}})">
        </div>
    </div>
</body>
</html>
