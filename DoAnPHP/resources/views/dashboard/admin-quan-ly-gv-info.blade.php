<h1>Thông tin cá nhân giáo viên </h1>
<h3>Tài khoản: {{$editgv->username}} </h3>
<h3>Họ và tên: {{$editgv->ho_ten}} </h3>
<h3>Ngày Sinh: {{$editgv->ngay_sinh}} </h3>
<h3>Địa chỉ: {{$editgv->dia_chi}} </h3>
<h3>Số điện Thoại: {{$editgv->so_dien_thoai}} </h3>
<a href="{{route('edit-information-gv', $editgv->id)}}">Chỉnh sửa</a></br>
<a href="{{route('table-data-gv')}}">Quay lại</a></br>