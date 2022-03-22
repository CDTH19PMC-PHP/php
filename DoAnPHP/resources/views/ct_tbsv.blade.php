
@extends('layout_cttb.index')
@section('content')
<div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                              
                                <h6 class="f-w-600">Thông Báo </h6>
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
                                        <p class="m-b-10 f-w-600">Tên Thông Báo</p>
                                        <p class="text-muted f-w-400">{{$tb->ten_tb}}</p>
                                    </div>
    
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Thời Gian</p>
                                        <p class="text-muted f-w-400"> {{$tb->thoi_gian}}</p>
</div>
                                    </div>
                                    <div class="col-sm-7">
                                        <p class="m-b-10 f-w-600">Nội Dung</p>
                                        <p class="text-muted f-w-400">{{$tb->noi_dungtb}}</p>
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