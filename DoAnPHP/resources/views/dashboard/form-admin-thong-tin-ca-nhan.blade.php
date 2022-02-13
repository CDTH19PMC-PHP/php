<h1>Thông tin cá nhân </h1>
<form method="POST" acction="{{route('xl-chinh-sua-tt-ad',['id'=>$thongtin->id])}}">
    @csrf
    <table>
        <tr>
            <th>Họ và tên:</th>
            <td> <input type="text" name="ho_ten" value="{{$thongtin->ho_ten}}" required></br></td>
</tr>
<!-- <tr>
            <th>  Email:</th>
            <td>   <input type="text" name="email" value="{{$thongtin->email}}" required></br></td>
</tr> -->
<tr>
            <th> Ngày sinh:</th>
            <td><input type="datetime" name="ngay_sinh" value="{{$thongtin->ngay_sinh}}" required></br></td>
</tr>
<tr>
            <th>Địa chỉ:</th>
            <td> <input type="text" name="dia_chi" value="{{$thongtin->dia_chi}}" required></br></td>
</tr>
<tr>
            <th>Số điện thoại:</th>
            <td> <input type="text" name="so_dien_thoai" value="{{$thongtin->so_dien_thoai}}" required></br></td>
</tr>
<tr>
    <th> <button type="submit">Update</button></th>
</tr>
<table>
   
</form>