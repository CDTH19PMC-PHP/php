@extends('layout_ds.index')
@section('title')
Thông tin lớp
@endsection
@section('content')
<a href="{{route('ds-hoc-sinh',['gv'=>$giaovien,'id'=>$lop])}}">Quay lại</a>
@if(session('success'))
<div class="alert alert-success">
    {{session()->get('success')}}
</div> 
@endif
<table>
						<thead>
							<tr class="table100-head">
								<th class="column2">Mã học sinh</th>
								<th class="column3">Tên học sinh</th>
								<th class="column3">Email</th>
                                <th class="column3">Chức năng</th>
							</tr>
						</thead>
						<tbody>
@forelse($hs as $a)
<tr>

    <th class="column2">{{$a->ma_hoc_sinh}}</th>
    <th class="column3">{{$a->ho_ten}}</th>
    <th class="column3">{{$a->username}}</th>
    <th><a  class="btn btn--radius btn--green" href="{{route('xl-duyet-hoc-sinh',['gv'=>$giaovien,'id'=>$lop,'hs'=>$a->id])}}" onclick="return confirm('Bạn có muốn chấp nhận học sinh này vô lớp không?')">Chấp nhận</a></th>
</tr>
@empty
<tr>
    <td colspan="3">Không có học sinh nào trong lớp này</td>
</tr>
@endforelse

																
</tbody>
</table>
@endsection