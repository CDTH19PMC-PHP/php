<h1>Reset mật khẩu học sinh</h1>
<form method="POST" acction="{{route('reset-password-hs',$resetPassword->id)}}">
    @csrf
    <table>
        <tr>
            <th>Tài khoản:</th>
            <td><input type="text" name="username" value="{{$resetPassword->username}}" required></br></td>
        </tr>
        <tr>
            <th>Mật khẩu:</th>
            <td> <input type="text" name="password" value="{{$resetPassword->password}}" required></br></td>
        </tr>
        <tr>
            <th>Họ và tên:</th>
            <td> <input type="text" name="ho_ten" value="{{$resetPassword->ho_ten}}" required></br></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><input type="datetime" name="ngay_sinh" value="{{$resetPassword->ngay_sinh}}" required></br></td>
        </tr>
        <tr>
            <th>Địa chỉ:</th>
            <td> <input type="text" name="dia_chi" value="{{$resetPassword->dia_chi}}" required></br></td>
        </tr>
        <tr>
            <th>Số điện thoại:</th>
            <td> <input type="text" name="so_dien_thoai" value="{{$resetPassword->so_dien_thoai}}" required></br></td>
        </tr>
        <tr><th> <button type="submit" onclick="return confirm('Bạn có chắc không?')">Cập nhật</button></th></tr>
        
        
<table>
   
</form>