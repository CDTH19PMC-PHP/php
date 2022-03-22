<!DOCTYPE html>
<html></html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"  href="{{asset('upbai/upbaitap.css')}}">

</head>


<div class="frame">
<div class="framex">
	<div class="center">
		<div class="title">
			<h1>Chon file bài tập</h1>
		</div>
     
		<form  enctype="multipart/form-data" method="POST" action="{{route('xu-ly-up-bai',['gv'=>$gv,'id'=>$id])}}"  >
		@csrf
		<div class="dropzone">
			<img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
			<input type="file" name="file" class="upload-input" />
		</div>
		<button type="submit" class="btn" name="uploadbutton">Tải lên</button>
		</form>
	</div>
	
</div>

</div>

</html>
