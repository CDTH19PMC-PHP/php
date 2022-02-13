<h1>Thông tin cá nhân </h1>
<form method="POST" acction="{{route('edit-information-gv',$editgv->id)}}">
    @csrf
    <table>
        <tr>
            <th>Tài khoản:</th>
            <td>   <input type="text" name="username" value="{{$editgv->username}}" required></br></td>
        </tr>
        <tr>
            <th>Họ và tên:</th>
            <td> <input type="text" name="ho_ten" value="{{$editgv->ho_ten}}" required></br></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><input type="datetime" name="ngay_sinh" value="{{$editgv->ngay_sinh}}" required></br></td>
        </tr>
        <tr>
            <th>Địa chỉ:</th>
            <td> <input type="text" name="dia_chi" value="{{$editgv->dia_chi}}" required></br></td>
        </tr>
        <tr>
            <th>Số điện thoại:</th>
            <td> <input type="text" name="so_dien_thoai" value="{{$editgv->so_dien_thoai}}" required></br></td>
        </tr>
        <tr><th> <button type="submit" onclick="return confirm('Bạn có chắc không?')">Cập nhật</button></th></tr>
        
        
<table>
   
</form>