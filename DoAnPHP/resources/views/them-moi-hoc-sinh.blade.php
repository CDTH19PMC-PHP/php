
@extends('layout_addclass.index')
@section('title')
Thêm mới học sinh
@endsection
@section('content')
<form method="POST" action="{{route('xl-them-hoc-sinh',['gv'=>$giaovien,'id'=>$lop])}}">
@csrf
<div class="input-group">

            <input class="input--style-2" type="text" name="email" require placeholder="Nhập Email"></div>
            <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Thêm</button>
                        </div>
</form>
                    <a href="{{route('ds-hoc-sinh',['gv'=>$giaovien,'id'=>$lop])}}">Quay lại</a>
@endsection