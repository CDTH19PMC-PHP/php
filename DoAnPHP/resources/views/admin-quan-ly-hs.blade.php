<h1> Danh sách Giáo Viên</h1>
@csrf
<table border="1">
<tr>
    <th>Email</th>
    <th>Password</th>
    <th>Họ và tên</th>
    <th>Địa chỉ</th>
    <th>Ngày sinh</th>
    <th>Số điện thoại</th>
</tr>
@forelse($dsHocSinh as $dshs)
@if($dshs->trang_thai==1)
<tr>
    <th>{{$dshs->username}}</th>
    <th>{{$dshs->password}}</th>
    <th>{{$dshs->ho_ten}}</th>
    <th>{{$dshs->dia_chi}}</th>
    <th>{{$dshs->ngay_sinh}}</th>
    <th>{{$dshs->so_dien_thoai}}</th>
</tr>
@endif
@empty
<tr>
    <td colspan="6">Không có dữ liệu</td>
</tr>
@endforelse
</table>
