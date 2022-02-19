<h1>Thêm Học Sinh vào danh sách</h1>
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
    <form method="POST" acction="{{route('handle-add-hs',$id)}}">
        @csrf
        <table>
            <tr>
                <th>Tài khoản:</th>
                <td>   <input type="text" name="username" value="" required></br></td>
                @if($errors->has('username'))
                    <span>{{$errors->first('username')}}</span>
                @endif
            </tr>
            <tr><th> <button type="submit" onclick="return confirm('Bạn có chắc không?')">Thêm tài khoản</button></th></tr>
        <table>
    </form>
</div>