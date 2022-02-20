<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="../blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>E-Learning Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/font-awesome/4.7.0/css/font-awesome.min.css')}}">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{route('index-ad',$thongtin->id)}}">E-Learning Admin</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Cài đặt</a></li>
            <li><a class="dropdown-item" href="{{route('form-thong-tin-ca-nhan-ad',$id)}}"><i class="fa fa-user fa-lg"></i>Thông tin cá nhân</a></li>
            <li><a class="dropdown-item" href="{{route('login-ad',$id)}}"><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Danh Sách quản lý</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('table-data-gv',$id)}}"><i class="icon fa fa-circle-o"></i> Quản lý Giáo Viên</a></li>
            <li><a class="treeview-item active" href="{{route('table-data-hs',$id)}}"><i class="icon fa fa-circle-o"></i> Quản lý Học Sinh</a></li>
          </ul>
        </li>
    </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Thông tin cá nhân </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Thông tin</li>
          <li class="breadcrumb-item"><a href="#">Thông tin</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
            <div class="col-lg-6">
                <form method="POST" acction="{{route('edit-information-hs',['id'=>$id,'id_hs'=>$id_hs])}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tài khoản</label>
                        <input class="form-control" name="username" type="text" value="{{$thongtin->username}}" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input class="form-control" name="ho_ten" type="text" value="{{$thongtin->ho_ten}}" required> 
                    </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Ngày sinh</label>
                        <input class="form-control" name="ngay_sinh" type="text" value="{{$thongtin->ngay_sinh}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input class="form-control" name="dia_chi" type="text" value="{{$thongtin->dia_chi}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input class="form-control" name="so_dien_thoai" type="text" value="{{$thongtin->so_dien_thoai}}" required>
                    </div>
                    <div class="tile-footer">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc không?')">Cập nhật</button>
                    </div>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('dashboard/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('dashboard/js/popper.min.js')}}"></script>
    <script src=" {{asset('dashboard/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('dashboard/js/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
  </body>
</html>