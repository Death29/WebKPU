<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pemilih</title>
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
    <script src="js/jquery-3.4.1.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script src="js/emailvalidation.js"></script>
<!--===============================================================================================-->
    <style>
        table
        {
            width: 100%;
            margin: 0 auto;
            font-size: 14px;
        }
        button
        {
            margin-left: 65%;
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
        a
        {
            color: blue;
        }
    </style>
<!--===============================================================================================-->
    <script type="text/javascript">
        function validasi()
        {
            let validator = $("#registerForm").validate
            ({
                rules:
                {
                    name: "required",
                    email: "required",
                    password: "required",
                    u_password: 
                    {
                        equalTo: "#password",
                    },
                },
                messages:
                {
                    name: "Masukkan Nama!",
                    email: "Masukkan E-mail!",
                    password: "Masukkan Password!",
                    u_password: "Password tidak sesuai!",
                }
            });
            if(validator.form())
            {

            }
        }
    </script>
<!--===============================================================================================-->
</head>
<body>
    <div class="limiter">
        <div class="container-login100" style="background-image:url({{asset('images/bg-01.jpg')}})">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form class="login100-form validate-form flex-sb flex-w" id="registerForm" method="POST" action="{{ url('daftar-pemilih') }}">
                {{ csrf_field() }}
                    <span class="login100-form-title p-b-53">
                        Registrasi Pemilih Pemilwa KM UII 2020
                    </span>
                    <table>
                        <tr>
                            <th>Nama :</th>
                            <td><input type="text" name="name" id="name" class="input" required /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr>
                            <th>E-mail :</th>
                            <td><input type="text" name="email" id="email" class="input" required /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr>
                            <th>Password :</th>
                            <td><input type="password" name="password" id="password" class="input" required /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr>
                            <th>Ulangi Password :</th>
                            <td><input type="password" name="u_password" id="u_password" class="input" required /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" name="daftar" id="daftar" class="btn btn-primary" onclick="validasi()">Daftar</button>
                            </td>
                        </tr>
                        @if($errors->any())
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="error-msg">{{ $errors->first() }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p align="center">
                                    Sudah punya akun? Silahkan <a href="{{ url('/login-pemilih') }}">Login</a> dengan E-mail UII
                                </p>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>