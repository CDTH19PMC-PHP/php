@extends('layout_ds.index')
@section('title')
Thông tin lớp
@endsection
@section('content')
<a href="{{route('ds-lop',$gv)}}"> Quay lại </a></br>
<a  class="btn btn--radius btn--green" href="{{route('form-them-hoc-sinh',['gv'=>$gv,'id'=>$id])}}">Thêm học sinh </a>
<span><a  class="btn btn--radius btn--green" href="{{route('form-duyet-hoc-sinh',['gv'=>$gv,'id'=>$id])}}">Danh sách hàng chờ</a>
<a  class="btn btn--radius btn--green" href="{{route('ds-bt',['gv'=>$gv,'id'=>$id])}}">Danh sách bài tập</a>
<a  class="btn btn--radius btn--green" href="{{route('ds-tb',['gv'=>$gv,'id'=>$id])}}">Danh sách Thông Báo</a>
<form class="timkiem" type="get"action="{{route('tim-sv',['gv'=>$gv,'id'=>$id])}}">
							<input class="otimkiem" name="query" type="search">
							<button class="nutbam" type="submit"> Tìm Kiếm Sinh Viên</button>
						</form>
</span>
<table>
                    @csrf
						<thead>
							<tr class="table100-head">
								<th class="column2">Mã học sinh</th>
								<th class="column3">Tên học sinh</th>
								<th class="column3">Email</th>
							</tr>
						</thead>
						<tbody>

@foreach($tensv as $a)
<tr>

    <th class="column2">{{$a->ma_hoc_sinh}}</th>
    <th class="column3">{{$a->ho_ten}}</th>
    <th class="column3">{{$a->username}}</th>
</tr>

@endforeach
																
</tbody>
</table>
@endsection