<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thêm bài tập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('formthemtb/css/main.css')}}">
	<link rel="stylesheet"  href="{{asset('upbai/upbaitap.css')}}">
</head>
<body>
@csrf

	<div class="contact1">
		
		<div class="container-contact1">
		
	</div>
		
			<form class="contact1-form validate-form" enctype="multipart/form-data" method="POST" action="{{route('xuly-tb',['id'=>$id,'gv'=>$gv])}}" >
			@csrf
				<span class="contact1-form-title">
					Đăng Thông Báo Lớp
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="name" placeholder="Tên Thông Báo">
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input" data-validate = "Noidung is required">
					<textarea class="input1" name="noidung" placeholder="Nội Dung"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn">
						<span>
                        Đăng
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
						
					</button>
					
				</div>
				
				
				
			</form>
		</div>
	</div>
</body>
</html>
