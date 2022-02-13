<h1>Thông tin cá nhân học sinh </h1>
<form method="POST" acction="{{route('edit-information-hs',$ediths->id)}}">
    @csrf
    <table>
        <tr>
            <th>Tài khoản:</th>
            <td>   <input type="text" name="username" value="{{$ediths->username}}" required></br></td>
        </tr>
        <tr>
            <th>Họ và tên:</th>
            <td> <input type="text" name="ho_ten" value="{{$ediths->ho_ten}}" required></br></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><input type="datetime" name="ngay_sinh" value="{{$ediths->ngay_sinh}}" required></br></td>
        </tr>
        <tr>
            <th>Địa chỉ:</th>
            <td> <input type="text" name="dia_chi" value="{{$ediths->dia_chi}}" required></br></td>
        </tr>
        <tr>
            <th>Số điện thoại:</th>
            <td> <input type="text" name="so_dien_thoai" value="{{$ediths->so_dien_thoai}}" required></br></td>
        </tr>
        <tr><th> <button type="submit" onclick="return confirm('Bạn có chắc không?')">Cập nhật</button></th></tr>
        
        
<table>
   
</form>