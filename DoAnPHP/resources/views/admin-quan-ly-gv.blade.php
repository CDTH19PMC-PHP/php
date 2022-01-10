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
@forelse($dsGiaoVien as $dsgv)
@if($dsgv->trang_thai==1)
<tr>
    <th>{{$dsgv->username}}</th>
    <th>{{$dsgv->password}}</th>
    <th>{{$dsgv->ho_ten}}</th>
    <th>{{$dsgv->dia_chi}}</th>
    <th>{{$dsgv->ngay_sinh}}</th>
    <th>{{$dsgv->so_dien_thoai}}</th>
    
</tr>
@endif
@empty
<tr>
    <td colspan="6">Không có dữ liệu</td>
</tr>
@endforelse
</table>