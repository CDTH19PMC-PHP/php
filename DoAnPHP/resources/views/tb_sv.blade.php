@extends('layout_tbsv.index')
@section('content')
					</div>
					<div class="p-t-30">
						<form class="timkiem" type="get"action="{{route('tim-tbsv',['id'=>$id,'gv'=>$gv])}}">
							<input class="otimkiem" name="query" type="search">
							<button class="nutbam" type="submit"> Tìm Kiếm Thông Báo</button>
						</form>
					</div>
					<table>
                    @csrf
						<thead>
							<tr class="table100-head">
			
								<th class="column3">Tên Thông Báo</th>
								<th class="column6">Thời Gian</th>
								<th class="column1">Chức năng</th>
							</tr>
						</thead>
						<tbody>
                        @forelse($tb as $a)
@if($a->trang_thai == 1)
<tr>

    <th class="column3">{{$a->ten_tb}}</th>
    <th class="column6">{{$a->thoi_gian}}</th>
    <th class="column2"><a class="btn btn--radius btn--green" href="{{route('show-tbsv',['gv'=>$a->ma_giao_vien,'id'=>$a->ma_lop,'id_tb'=>$a->id])}}">Chi Tiết</a></th>
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