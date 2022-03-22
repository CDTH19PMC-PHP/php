@extends('layout_tb.index')
@section('content')
					</div>
					<div class="p-t-30">
						
						<form class="timkiem" type="get"action="">
                        <input class="otimkiem" name="query" type="search">
							<button class="nutbam" type="submit"> Tìm Kiếm Thông Báo </button>
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
                        @foreach($tentb as $tb)

<tr>
    
<th class="column3">{{$tb->ten_tb}}</th>
    <th class="column6">{{$tb->thoi_gian}}</th>
    <th class="column2"><a class="btn btn--radius btn--green" href="{{route('show-tbsv',['gv'=>$tb->ma_lop,'id'=>$tb->ma_lop,'id_tb'=>$tb->id])}}">Chi Tiết</a>
</tr>

@endforeach
																
						</tbody>
					</table>

					<div class="back">
						<a href="#" class="btn btn--radius btn--green">Quay lại Danh Sách Lớp</a>
					</div>
@endsection