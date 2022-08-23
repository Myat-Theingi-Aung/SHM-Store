
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHM Store | Reset Password</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body class="sec-login">

    <h1>Home Page</h1>
    @guest
    <a href="{{ route('login') }}">LOGIN</a>
    <a href="{{ route('register') }}">REGISTER</a>
    @else
    <a href="{{ route('logout') }}">LOGOUT</a>
    @endguest


    <ul>
        @foreach($products as $product)
        <li>{{ $product->name }}</li>
        @endforeach
    </ul>

    <script src="{{asset('frontend/js/libary/jquery.min.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    {{--<script src="{{asset('frontend/js/common.js')}}"></script>--}}
    <script>
        @if(session('alert_msg'))
        let alert_msg = "<?php echo session('alert_msg'); ?>";
        toastr.success(alert_msg, 'SUCCESS', {
            closeButton: true,
            progressBar: true,
        });
        @endif
    </script>
</body>
</html>