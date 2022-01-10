<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <form action="{{route('xl-dang-nhap-ad')}}" method="POST">
        @csrf
        <table colspan="2">
            <tr>
                <td >Tài khoản</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td><button type="submit">Đăng nhập</button></td>
                
            </tr>
        </table>
    </form>
</body>
</html>