<!DOCTYPE html>
<html lang="en">
<head>
	<title>Danh Sách Lớp</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet"  href="{{asset('dsclass/css/main.css')}}">

</head>
<body>
	<div class="header">
		<h1>Danh Sách Lớp Học</h1>
	  </div>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
				<div class="p-t-30">
					@yield('content')

				</div>
			</div>
		</div>
	</div>

</body>
</html>