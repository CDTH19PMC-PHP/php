<!DOCTYPE html>
<html lang="en">

<head>
  
    <title>Create Classroom</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{ asset('addclass/css/main.css')}}" rel="stylesheet" media="all">

</head>
@csrf
<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
               
                    <h2 class="title">@yield('title')</h2>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('addclass/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('addclass/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('addclass/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('addclass/vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('addclass/js/global.js')}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->