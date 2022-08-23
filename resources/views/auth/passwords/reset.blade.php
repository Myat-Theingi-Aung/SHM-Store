<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHM Store | Reset Password</title>
    <link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/login.css')}}">
</head>
<body class="sec-login">
    <section class="login">
        <form action="{{ route('password.update') }}"  method="POST" class="log-form">
        @csrf
            <h2 class="cmn-ttl">
                Reset Password
            </h2>
            <div class="input-gp">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-box">
                    <input type="email" name="email" class="input @error('email') is-invalid @enderror" 
                    placeholder="Enter Your Email Address">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                <div class="input-box">
                    <input type="password" name="password" class="input @error('password') is-invalid @enderror" 
                    placeholder="Enter Your New Password">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>

                <div class="input-box">
                    <input type="password" name="password_confirmation" class="input" 
                    placeholder="Confirm Your New Password">
                </div>

                <div class="login-btn">
                    <button type="submit" class="submit">Reset Password</button>
                </div>

                <a href="{{ route('login') }}" class="forgot">Sign In Here</a>
                <p class="or">OR</p>
                <a href="{{ route('register') }}" class="create">Create an New Account</a>
            </div>
        </form>
    </section>


    <script src="{{asset('frontend/js/libary/jquery-3.6.0.min.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script src="{{asset('frontend/js/common.js')}}"></script>
</body>
</html>




