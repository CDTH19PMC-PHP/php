@extends('layout_goc.layout')
@section('content')
<h1> Danh sách Lớp học</h1>
@csrf
<table border="1">
<a href="#">Thông tin cá nhân</a></br>

<a href="#">Thêm mới</a>
<tr>
<th>Mã giáo viên</th>
    <th>Mã lớp</th>
    <th>Tên Lớp</th>
    <th>Giáo Viên</th>
    <th>Số lượng học sinh</th>
    <th>Ngày tạo</th>
    <th>Trạng thái</th>
    <th>Chức năng</th>
</tr>
@forelse($giaovien as $a)
<tr>
    <th>{{$a->ma_giao_vien}}</th>
    <th>{{$a->ma_lop}}</th>
    <th>{{$a->ten_lop}}</th>
    <th>{{$a->ho_ten}}</th>
    <th>{{$a->so_luong}}</th>
    <th>{{$a->thoi_gian}}</th>
    @if($a->trang_thai==0)
    <th>Ngưng hoạt đông</th>
    <th><a href="#">Khôi Phục</a></th>
    @else
    <th>Đang hoạt động</th>
    <th><a href="#">Ngưng hoạt động</a></th>
    @endif
    
</tr>

@empty
<tr>
    <td colspan="6">Không có dữ liệu</td>
</tr>
@endforelse
</table>

@endsection