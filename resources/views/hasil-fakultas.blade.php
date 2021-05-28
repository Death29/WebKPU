<!DOCTYPE html>
<html lang="en">
<head>
	<title>Info Pemilwa Fakultas</title>
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
        table
        {
            margin: 0 auto;
            width: 100%;
            border: 1px solid;
            text-align: center;
        }
        tr
        {
            border: 1px solid;
            text-align: center;
        }
        th
        {
            border: 1px solid;
            text-align: center;
        }
        td
        {
            border: 1px solid;
            text-align: center;
        }
        .filtering
        {
            border-radius: 20px;
            border: 1px solid #2D9FD9;
            color: #A0D18C;
            width: 400px;
            height: 30px;
            padding-left: 10px;
        }
        .filtering:focus
        {
            outline: none;
            border: 1px solid #A0D18C;
            color: #2D9FD9;
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
        <a href="/logout">Logout</a>
        <hr>
    </div>
    <div class="limiter">
		<div class="container-login100" style="background-image:url({{asset('images/bg-01.jpg')}})">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <span class="login100-form-title p-b-53">
					Calon Legislatif Fakultas
				</span>
                @if(isset($selected_fakultas))
                <p align="center">{{ $selected_fakultas }}</p>
                @else
                <p align="center">Fakultas Bisnis dan Ekonomika</p>
                @endif
                <form method="POST" action="{{ url('filter-hasilfakultas') }}">
                {{ csrf_field() }}
                    <select name="fakultas" id="fakultas" class="filtering">
                        <option value="Fakultas Bisnis dan Ekonomika" selected>Fakultas Bisnis dan Ekonomika</option>
                        <option value="Fakultas Hukum">Fakultas Hukum</option>
                        <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                        <option value="Fakultas Ilmu Agama Islam">Fakultas Ilmu Agama Islam</option>
                        <option value="Fakultas Teknologi Industri">Fakultas Teknologi Industri</option>
                        <option value="Fakultas Teknik Sipil dan Perencanaan">Fakultas Teknik Sipil dan Perencanaan</option>
                        <option value="Fakultas Psikologi dan Ilmu Sosial Budaya">Fakultas Psikologi dan Ilmu Sosial Budaya</option>
                        <option value="Fakultas Matematika dan Ilmu Pengetahuan Alam">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                    </select>
                    <button class="btn btn-info btn-sm">Filter</button>
                </form>
                <table>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Fakultas</th>
                        <th>Vote</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($calonlegis as $key => $data)
                    <tr>
                        <input type="hidden" name="id" id="id" value="{{ $data->id }}" />
                        <td>{{ $data->nim }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->fakultas }}</td>
                        <td>{{ $data->suara }}</td>
                        <td>
                            <button type="button" onclick="window.location='{{ url("/edit-calon/$data->id") }}'" class="btn btn-warning btn-sm">Edit</button>
                            <button type="button" onclick="window.location='{{ url("/hapus-calon/$data->id") }}'" class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
