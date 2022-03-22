
@extends('layout_ctbaitap.index')
@section('content')
<div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                              
                                <h6 class="f-w-600">Bài Tập </h6>
                            </div>
                         
                        </div>
                        @if(session('success'))
<div class="alert alert-success">
    {{session()->get('success')}}
</div> 
@endif
                        <div class="col-sm-8">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Tên Bài Tập</p>
                                        <p class="text-muted f-w-400">{{$baitap->ten_bt}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Mã Lớp</p>
                                        <p class="text-muted f-w-400">{{$baitap->ma_lop}} </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Thời Gian</p>
                                        <p class="text-muted f-w-400"> {{$baitap->thoi_gian}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Điểm</p>
                                        <p class="text-muted f-w-400">{{$baitap->diem}}</p>
                                    </div>
                                  
                                    </div>
                                    <div class="col-sm-7">
                                        <p class="m-b-10 f-w-600">Nội Dung</p>
                                        <p class="text-muted f-w-400">{{$baitap->noi_dung}}</p>
                                    </div>
                                    <div class="td">

                                    <a href="#" class="a1">Chỉnh sửa bài tập</a>
                                    </div>
                                
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="back">
            <a href="#" class="a4">Trở về trang chủ</a>
       
    </div>
    </div>
@endsection