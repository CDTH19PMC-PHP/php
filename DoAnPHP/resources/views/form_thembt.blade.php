<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thêm bài tập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('formthembt/css/main.css')}}">
	<link rel="stylesheet"  href="{{asset('upbai/upbaitap.css')}}">
</head>
<body>
@csrf

	<div class="contact1">
		
		<div class="container-contact1">
		<div class="center">
		<div class="title">
			<h1>Chọn file</h1>
		</div>
	</div>
		
			<form class="contact1-form validate-form" enctype="multipart/form-data" method="POST" action="{{route('xuly-bt',['id'=>$id,'gv'=>$gv])}}" >
			@csrf
				<span class="contact1-form-title">
					Thêm Bài Tập Lớp
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="name" placeholder="Tên Bài Tập">
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="diem" placeholder="Điểm">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Noidung is required">
					<textarea class="input1" name="noidung" placeholder="Nội Dung"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn">
						<span>
							Thêm Bài Tập
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
						
					</button>
					
				</div>
				
				
				<div class="dropzone">
			<img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
			<input type="file" name="file" class="upload-input" />
		</div>
				
			</form>
		</div>
	</div>
</body>
</html>
