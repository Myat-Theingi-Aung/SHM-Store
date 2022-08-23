<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHM Store | Login</title>
    <link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/login.css')}}">
</head>
<body class="sec-login">
    <section class="login">
        <form action="{{ route('login') }}"  method="post" class="log-form">
        @csrf
            <h2 class="cmn-ttl">
                Sing In
            </h2>
            <div class="input-gp">
                <div class="input-box">
                    <input type="email" name="email"  class="input @error('email') is-invalid @enderror" placeholder="Enter Your Email Address"
                    value="{{ @old('email') }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                <div class="input-box">
                    <input type="password" name="password" id="password" class="input @error('password') is-invalid @enderror" placeholder="Enter Your Password">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>

                <div class="login-btn">
                    <button type="submit" class="submit">Sign In</button>
                </div>
            
                <a href="{{ route('password.request') }}" class="forgot">Forgot Password ?</a>
                <p class="or">OR</p>
                <a href="{{ route('register') }}" class="create">Create an New Account</a>
            </div>
        </form>
    </section>


    <script src="{{asset('frontend/js/libary/jquery.min.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>
</html>




