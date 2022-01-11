@extends('layout_ds.index')
@section('title')
Thông tin lớp
@endsection
@section('content')
<h1>Giáo viên: {{$giaovien->ho_ten}}</h1> 
<h1>Lớp: {{ $lop->ten_lop}}</h1>
<a href="{{route('ds-lop',$giaovien->id)}}"> Quay lại </a></br>
@if(session('success1'))
<div class="alert alert-success">
    {{session()->get('success1')}}
</div> 
@elseif(session('success2'))
<div class="alert alert-danger">
    {{session()->get('success2')}}
</div> 
@elseif(session('success3'))
<div class="alert alert-danger">
    {{session()->get('success3')}}
</div> 
@endif
<a  class="btn btn--radius btn--green" href="{{route('form-them-hoc-sinh',['gv'=>$giaovien,'id'=>$lop])}}">Thêm học sinh </a>
<span><a  class="btn btn--radius btn--green" href="{{route('form-duyet-hoc-sinh',['gv'=>$giaovien,'id'=>$lop])}}">Danh sách hàng chờ</a> </span>
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

@forelse($thongtinlop as $a)
<tr>

    <th class="column2">{{$a->ma_hoc_sinh}}</th>
    <th class="column3">{{$a->ho_ten}}</th>
    <th class="column3">{{$a->username}}</th>
</tr>

@empty
<tr>
    <td colspan="3">Không có học sinh nào trong lớp này</td>
</tr>
@endforelse
																
</tbody>
</table>
@endsection