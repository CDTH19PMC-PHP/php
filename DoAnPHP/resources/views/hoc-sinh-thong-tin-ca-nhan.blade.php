
@extends('layout_ttcn.index')
@section('content')
<div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                              
                                <h6 class="f-w-600">Thông Tin Cá Nhân </h6>
                            </div>
                            <div class="ico"></div>
                            
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
                                        <p class="m-b-10 f-w-600">Họ và Tên</p>
                                        <p class="text-muted f-w-400">{{$thongtin->ho_ten}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <p class="text-muted f-w-400">{{$thongtin->username}} </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Ngày Sinh</p>
                                        <p class="text-muted f-w-400"> {{$thongtin->ngay_sinh}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Địa Chỉ</p>
                                        <p class="text-muted f-w-400">{{$thongtin->dia_chi}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Số Điện Thoại</p>
                                        <p class="text-muted f-w-400">{{$thongtin->so_dien_thoai}}</p>
                                    </div>
                                    <div class="td">

                                    <a href="{{route('form-thong-tin-ca-nhan',$thongtin->id)}}" class="a1">Thay đổi thông tin</a>
                                    </div>
                                    <div class="td2">
                                        <a href="#" class="a2">Thay đổi mật khẩu</a>
                                   
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="back">
            <a href="{{route('ds-hs-lop',$thongtin->id)}}" class="a4">Trở về trang chủ</a>
       
    </div>
    </div>
@endsection