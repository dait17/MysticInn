<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng Nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="user_assets/css/login-util.css">
    <link rel="stylesheet" type="text/css" href="user_assets/css/login-main.css">
    <link rel="stylesheet" type="text/css" href="user_assets/login-vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="user_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="user_assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="user_assets/login-vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="user_assets/login-vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="user_assets/login-vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="user_assets/login-vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="user_assets/login-vendor/daterangepicker/daterangepicker.css">


</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="{{ route('login') }}">
                @csrf
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
                <span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                    <input class="input100" type="text" name="username">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <input type="submit" class="login100-form-btn" value="Đăng Nhâp">
{{--                        <button class="login100-form-btn">--}}
{{--                            Login--}}
{{--                        </button>--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="user_assets/login-vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="user_assets/login-vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="user_assets/login-vendor/bootstrap/js/popper.js"></script>
<script src="user_assets/login-vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="user_assets/login-vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="user_assets/login-vendor/daterangepicker/moment.min.js"></script>
<script src="user_assets/login-vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="user_assets/login-vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="user_assets/js/login-main.js"></script>

</body>
</html>
