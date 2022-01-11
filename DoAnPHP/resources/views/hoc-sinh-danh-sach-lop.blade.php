@extends('layout_ds.index')
@section('title')
Học sinh
@endsection
@section('content')
<a class="btn btn--radius btn--green" href="{{route('hs-thong-tin-ca-nhan',$idhs)}}">Thông tin cá nhân</a>
<a class="btn btn--radius btn--green" href="{{route('dang-nhap-hs')}}">Đăng xuất</a></br>

@if(session('success2'))
<div class="alert alert-success">
    {{session()->get('success2')}}
</div> 
@elseif(session('success1'))
<div class="alert alert-danger">
    {{session()->get('success1')}}
</div> 
@elseif(session('success3'))
<div class="alert alert-danger">
    {{session()->get('success3')}}
</div> 
@elseif(session('success4'))
<div class="alert alert-danger">
    {{session()->get('success4')}}
</div> 
@endif
<form method="POST" action="{{route('hs-them-lop',['id'=>$idhs])}}">
@csrf
    <table>
        <tr>
            <th>Mã lớp</th>
            <td><input type="text" name="code" require></td>
        </tr>
        <tr>
            <th></th>
            <td><button class="btn btn--radius btn--green" type="submit">Xin vào lớp</button></td>
        </tr>
</table>

</form>
@csrf
<table>

<thead>
<tr class="table100-head">
    <th class="column2">Mã lớp</th>
    <th class="column3">Tên Lớp Học</th>
    <th class="column3">Số lượng học sinh</th>
    <th class="column3">Chức năng</th>
</tr>
</thead>
<tbody>
@forelse($danhsachlop as $a)
@if($a->trang_thai == 1)
<tr>
    <th class="column2">{{$a->ma_lop}}</th>
    <th class="column3">{{$a->ten_lop}}</th>
    <th class="column3">{{$a->so_luong}}</th>
    <th class="column3"><a href="#">View</a></th>
</tr>

@endif
@empty
<tr>
    <td colspan="3">Không có dữ liệu</td>
</tr>
@endforelse
</tbody>
</table>

@endsection