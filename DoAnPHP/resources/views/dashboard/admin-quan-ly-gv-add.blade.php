<h1>Thêm Giáo Viên vào danh sách</h1>
<div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form method="POST" acction="{{route('handle-add-gv')}}">
        @csrf
        <table>
            <tr>
                <th>Tài khoản:</th>
                <td>   <input type="text" name="username" value="" required></br></td>
                @if($errors->has('username'))
                    <span>{{$errors->first('username')}}</span>
                @endif
            </tr>
            <!-- <tr>
                <th>Họ và tên: </th>
                <td><input type="text" name="ho_ten" value="" required></br></td>
            </tr>
            <tr>
                <th>Ngày sinh: </th>
                <td><input type="text" name="ngay_sinh" value="" required></br></td>
            </tr>
            <tr>
                <th>Địa chỉ: </th>
                <td><input type="text" name="dia_chi" value="" required></br></td>
            </tr>
            <tr>
                <th>Số điện thoại: </th>
                <td><input type="text" name="so_dien_thoai" value="" required></br></td>
            </tr> -->
            <tr><th> <button type="submit" onclick="return confirm('Bạn có chắc không?')">Thêm tài khoản</button></th></tr>
            
            
        <table>  
    </form>
</div>