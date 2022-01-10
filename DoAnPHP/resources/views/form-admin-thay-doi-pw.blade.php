<h1>Thông tin mật khẩu </h1>
<div class="panel-body">
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
<form acction="{{route('update-pw',['id'=>$change->id])}}"  method="POST">
{{ csrf_field() }}
    <table>
        <tr>
            <th>Mật khẩu hiện tại</th>
            <td> <input id='password' type="password" name="password_old" required></br></td>
            @if($errors->has('password_old'))
            <span>{{$errors->first('password_old')}}</span>
            @endif
        </tr>
        <tr>
            <th>Mật khẩu mới</th>
            <td><input id='password_new' type="password" name="password_new" required></br></td>
            @if($errors->has('password_new'))
            <span>{{$errors->first('password_new')}}</span>
            @endif
        </tr>
        <tr>
            <th>Nhập lại mật khẩu</th>
            <td> <input id='password_cf' type="password" name="password_cf" required></br></td>
            @if($errors->has('password_cf'))
            <span>{{$errors->first('password_cf')}}</span>
            @endif
        </tr>
        <tr>
            <th> <button type="submit">Cập nhật</button></th>
        </tr>
<table>
   
</form>
</div>