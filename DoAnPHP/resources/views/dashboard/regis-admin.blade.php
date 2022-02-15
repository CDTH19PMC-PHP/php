<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <title>Đăng Ký - Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>E-Learning</h1>
      </div>
      <div class="dk-box">
        <form class="login-form" action="#" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Đăng Ký</h3>
          <div class="form-group">
            <label class="control-label">Tên đăng nhập</label>
            <input class="form-control" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Mật khẩu</label>
            <input class="form-control" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label class="control-label">Họ và tên</label>
            <input class="form-control" type="text" placeholder="Họ và tên" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Địa chỉ</label>
            <input class="form-control" type="text" placeholder="Địa chỉ">
          </div>
          <div class="form-group">
            <label class="control-label">Ngày sinh</label>
            <input class="form-control" type="text" placeholder="Ngày sinh" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Số điện thoại</label>
            <input class="form-control" type="text" placeholder="Số điện thoại">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Đăng Ký</button>
          </div>
        </form> 
      </div>
    </section>
     <!-- Essential javascripts for application to work-->
     <script src="{{asset('dashboard/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('dashboard/js/popper.min.js')}}"></script>
    <script src=" {{asset('dashboard/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('dashboard/js/pace.min.js')}}"></script>
  </body>
</html>