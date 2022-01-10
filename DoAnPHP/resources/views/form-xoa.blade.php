@extends('layout_giaovien.layout')
@section('content')
<h2>Bạn có chắc muốn xoá lớp này không?</h2>
<a href="{{route('ds-lop',$lop->ma_giao_vien)}}">Quay lại</a><br>
<a href="{{route('xl-xoa-lop',$lop->id)}}">Đồng ý</a>
@endsection