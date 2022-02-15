<!DOCTYPE html>
<html>
    <header>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('Login_v18/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Login_v18/css/main.css')}}">
   
    
</header>

<body style="background-color: #666666;">
	
	<div class="limiter">

		<div class="container-login100">
			<div class="wrap-login100">
            <form action="{{route('xl-dang-nhap-hs')}}" method="POST" class="login100-form validate-form">
            @csrf
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Tài khoản</span>
					</div>
            <div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Mật khẩu</span>
					</div>
                    <div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>


                    <div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

                    <div class="text-center p-t-46 p-b-20">
					<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Menu Đăng Nhập
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{route('dang-nhap-hs')}}">Học sinh</a>
    <a class="dropdown-item" href="{{route('dang-nhap-gv')}}">Giáo Viên</a>
    <a class="dropdown-item" href="{{route('login-ad')}}">Admin</a>
  </div>
</div>
					</div>
    </form>

    <div class="login100-more" style="background-image: url({{asset('Login_v18/images/bg-01.jpg')}});">
				</div>
			</div>
		</div>
	</div>
	<script src="{{asset('Login_v18/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('Login_v18/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('Login_v18/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('Login_v18/js/main.js')}}"></script>

</body>
</html>


