
@extends('layout_goc.layout')
@section('content')
<h1>Thêm mới học sinh</h1>

<a href="{{route('ds-hoc-sinh',['gv'=>$giaovien,'id'=>$lop])}}">Quay lại</a>
<form method="POST" action="{{route('xl-them-hoc-sinh',['gv'=>$giaovien,'id'=>$lop])}}">
@csrf
    <table>
        <tr>
            <th>Email học sinh</th>
            <td><input type="text" name="email" require></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">thêm</button></td>
        </tr>
</table>
</form>
@endsection