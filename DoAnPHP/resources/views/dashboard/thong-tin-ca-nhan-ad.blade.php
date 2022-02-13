<h1>Thông tin cá nhân </h1>
<h3>Họ tên Học Sinh: {{$thongtin->ho_ten}} </h3>
<h3>Ngày Sinh: {{$thongtin->ngay_sinh}} </h3>
<h3>Địa chỉ: {{$thongtin->dia_chi}} </h3>
<h3>Số điện Thoại: {{$thongtin->so_dien_thoai}} </h3>
<a href="{{route('form-thong-tin-ca-nhan-ad',$thongtin->id)}}">Chỉnh sửa</a></br>