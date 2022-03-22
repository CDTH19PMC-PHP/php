@extends('layout_baitap.index')
@section('content')
					</div>
					<div class="p-t-30">
						<a class="btn btn--radius btn--green" href="{{route('them-bt',['id'=>$id,'gv'=>$gv])}}">Thêm mới</a>
						<form class="timkiem" type="get"action="">
                        <input class="otimkiem" name="query" type="search">
							<button class="nutbam" type="submit"> Tìm Kiếm Bài Tập </button>
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
                        @foreach($tenbt as $baitap)

<tr>
    <th class="column2">{{$baitap->id}}</th>
    <th class="column3">{{$baitap->ten_bt}}</th>
    <th class="column3">{{$baitap->diem}}</th>
    <th class="column6">{{$baitap->thoi_gian}}</th>
    <th class="column2"><a class="btn btn--radius btn--green" href="{{route('show-bt',['gv'=>$baitap->ma_lop,'id'=>$baitap->ma_lop,'id_bt'=>$baitap->id])}}">Chi Tiết</a>| <a class="btn btn--radius btn--green" href="{{route('xoa-bt',['gv'=>$gv,'id'=>$id,'idbt'=>$baitap->id])}}" onclick="return confirm('Bạn có muốn xoá bài tập này không?')">Xoá Bài</a>
</tr>

@endforeach
																
						</tbody>
					</table>

					<div class="back">
						<a href="#" class="btn btn--radius btn--green">Quay lại Danh Sách Lớp</a>
					</div>
@endsection