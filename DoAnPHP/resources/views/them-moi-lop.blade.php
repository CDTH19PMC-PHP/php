
@extends('layout_addclass.index')
@section('title')
Thêm mới lớp học
@endsection
@section('content')
<form method="POST" action="{{route('xuly-them-lop',$idgiaovien)}}">
@csrf
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Nhập tên lớp" name="Mon_hoc">
                        </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Tạo</button>
                        </div>
                    </form>
                    <a href="{{route('ds-lop',$idgiaovien)}}">Quay lại</a>
@endsection