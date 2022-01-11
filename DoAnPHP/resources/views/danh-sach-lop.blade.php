@extends('layout_ds.index')
@section('content')
<a class="btn btn--radius btn--green" href="{{route('thong-tin-ca-nhan',['id'=>$idgiaovien])}}">Thông tin cá nhân</a>
<a class="btn btn--radius btn--green" href="{{route('dang-nhap-gv')}}">Đăng xuất</a>


@if(session('success'))
<div class="alert alert-success">
    {{session()->get('success')}}
</div> 


@endif
					</div>
					<div class="p-t-30">
						<a class="btn btn--radius btn--green" href="{{ route('them-lop',['id'=>$idgiaovien]) }}">Thêm mới</a>
					</div>
					<table>
                    @csrf
						<thead>
							<tr class="table100-head">
								<th class="column2">Mã lớp</th>
								<th class="column3">Tên Lớp</th>
								<th class="column3">Giáo Viên</th>
								<th class="column5">Số Lượng Học Sinh</th>
								<th class="column6">Ngày Tạo</th>
								<th class="column1">Chức năng</th>
							</tr>
						</thead>
						<tbody>
                        @forelse($giaovien as $a)
@if($a->trang_thai == 1)
<tr>
    <th class="column2">{{$a->ma_lop}}</th>
    <th class="column3">{{$a->ten_lop}}</th>
    <th class="column3">{{$a->ho_ten}}</th>
    <th class="column6">{{$a->so_luong}}</th>
    <th class="column6">{{$a->thoi_gian}}</th>
    <th class="column2"><a class="btn btn--radius btn--green" href="{{route('ds-hoc-sinh',['gv'=>$a->ma_giao_vien,'id'=>$a->id])}}">Edit</a>| <a class="btn btn--radius btn--green" href="{{route('from-xoa-lop',['gv'=>$a->ma_giao_vien,'id'=>$a->id])}}" onclick="return confirm('Bạn có muốn xoá lớp học này không?')">Delete</a>
</tr>

@endif
@empty
<tr>
    <td colspan="6">Không có dữ liệu</td>
</tr>
@endforelse
																
						</tbody>
					</table>

					<div class="back">
						<a href="#" class="btn btn--radius btn--green">Trở về trang chủ</a>
					</div>
@endsection