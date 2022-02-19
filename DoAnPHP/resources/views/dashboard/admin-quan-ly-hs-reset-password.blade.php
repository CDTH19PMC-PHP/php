<h1>Thông tin cá nhân học sinh </h1>
<h3>Tài khoản: {{$resetPassword->username}} </h3>
<h3>Mật khẩu: {{$resetPassword->password}} </h3>
<h3>Họ và tên: {{$resetPassword->ho_ten}} </h3>
<h3>Ngày Sinh: {{$resetPassword->ngay_sinh}} </h3>
<h3>Địa chỉ: {{$resetPassword->dia_chi}} </h3>
<h3>Số điện Thoại: {{$resetPassword->so_dien_thoai}} </h3>
<a href="{{route('table-data-hs',$id)}}">Quay lại</a></br>