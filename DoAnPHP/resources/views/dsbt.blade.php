@extends('layout_baitap.index')
@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{session()->get('success')}}
</div> 


@endif
					</div>
					<div class="p-t-30">
						<a class="btn btn--radius btn--green" href="{{route('them-bt',['id'=>$id,'gv'=>$gv])}}">Thêm mới</a>
						<form class="timkiem" type="get"action="{{route('tim-bt',['id'=>$id,'gv'=>$gv])}}">
							<input class="otimkiem" name="query" type="search">
							<button class="nutbam" type="submit"> Tìm Kiếm Bài Tập</button>
						</form>
					</div>
					<table>
                    @csrf
						<thead>
							<tr class="table100-head">
								<th class="column2">Mã Bài Tập</th>
								<th class="column3">Tên Bài Tập</th>
								<th class="column5">Điểm</th>
								<th class="column6">Thời Gian</th>
								<th class="column1">Chức năng</th>
							</tr>
						</thead>
						<tbody>
                        @forelse($baitap as $a)
@if($a->trang_thai == 1)
<tr>
    <th class="column2">{{$a->id}}</th>
    <th class="column3">{{$a->ten_bt}}</th>
    <th class="column3">{{$a->diem}}</th>
    <th class="column6">{{$a->thoi_gian}}</th>
    <th class="column2"><a class="btn btn--radius btn--green" href="{{route('show-bt',['gv'=>$a->ma_giao_vien,'id'=>$a->ma_lop,'id_bt'=>$a->id])}}">Chi Tiết</a>| <a class="btn btn--radius btn--green" href="{{route('xoa-bt',['gv'=>$a->ma_giao_vien,'id'=>$id,'idbt'=>$a->id])}}" onclick="return confirm('Bạn có muốn xoá bài tập này không?')">Xoá Bài</a>
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