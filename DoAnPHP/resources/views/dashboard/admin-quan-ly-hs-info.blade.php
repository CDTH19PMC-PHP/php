<h1>Thông tin cá nhân học sinh </h1>
<h3>Tài khoản: {{$ediths->username}} </h3>
<h3>Họ và tên: {{$ediths->ho_ten}} </h3>
<h3>Ngày Sinh: {{$ediths->ngay_sinh}} </h3>
<h3>Địa chỉ: {{$ediths->dia_chi}} </h3>
<h3>Số điện Thoại: {{$ediths->so_dien_thoai}} </h3>
<a href="{{route('edit-information-hs', $ediths->id)}}">Chỉnh sửa</a></br>
<a href="{{route('table-data-hs')}}">Quay lại</a></br>