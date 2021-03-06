<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Ký Tài Khoản</title>
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
   
  <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{route('xl-dang-ky-hs')}}" method="POST">
					@csrf
					<span class="login100-form-title p-b-43">
						Đăng Ký Tài Khoản
					</span>
					@if (session('error'))
					<div class="alert alert-danger">
						{{ session('error') }}
					</div>
					@endif
					@if($errors)
						@foreach ($errors->all() as $error)
							<div class="alert alert-danger">{{ $error }}</div>
						@endforeach
					@endif
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Tài khoản</span>
						@if($errors->has('username'))
                    		<span>{{$errors->first('username')}}</span>
               			@endif
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Mật khẩu</span>
					</div>
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="ho_ten">
						<span class="focus-input100"></span>
						<span class="label-input100">Họ và tên</span>
					</div>
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="ngay_sinh">
						<span class="focus-input100"></span>
						<span class="label-input100">Ngày sinh</span>
					</div>
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="dia_chi">
						<span class="focus-input100"></span>
						<span class="label-input100">Địa chỉ</span>
					</div>
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="so_dien_thoai">
						<span class="focus-input100"></span>
						<span class="label-input100">Số điện thoại</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Đăng Ký
						</button>
					</div>
                </br>
					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url({{asset('Login_v18/images/bg-01.jpg')}});">
				</div>
			</div>
		</div>
	</div>
	
	
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