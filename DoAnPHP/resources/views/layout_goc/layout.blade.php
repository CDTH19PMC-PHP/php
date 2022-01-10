<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>My E-learning @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}"/>
</head>
<body>
    <div class = header>
        <p>LOGO + HEADER</p>

    </div>
        <div class ="left1">
            <div class="left_menu"> 
                <ul>
                    <li><a href="{{  route('ds-lop',1) }}">Trang chủ</a></li>
                    <li><a href="{{ route('them-lop',1) }}">Giang Vien</a></li>
                </ul>
            </div> 
        </div>
        <div class = "right1">
        @yield('content')
        </div>
    </div>
</body>
</html>