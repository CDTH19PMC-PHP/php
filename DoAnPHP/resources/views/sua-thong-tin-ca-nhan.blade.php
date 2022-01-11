
@extends('layout_doittcn.index')
@section('content')

<form class="contact1-form validate-form" method="POST" acction="{{route('xuly-chinh-sua',['id'=>$thongtin->id])}}">
@csrf
				<span class="contact1-form-title">
					Thay Đổi Thông Tin
				</span>
				<div class="wrap-input1 validate-input" data-validate = "Name is required">
                <input class="input1" type="text" name="ho_ten" value="{{$thongtin->ho_ten}}" required placeholder="Họ tên">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <input class="input1" type="text" name="email" value="{{$thongtin->username}}" readonly placeholder="Email">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
                <input class="input1" type="datetime" name="ngay_sinh" value="{{$thongtin->ngay_sinh}}" required placeholder="Ngày sinh">
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
                <input class="input1" type="text" name="dia_chi" value="{{$thongtin->dia_chi}}" required placeholder="Địa Chỉ">
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
                <input class="input1" type="text" name="so_dien_thoai" value="{{$thongtin->so_dien_thoai}}" required placeholder="Số điện thoại">
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" type="submit">
						<span>
							Cập Nhật
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>

			</form>

            @endsection