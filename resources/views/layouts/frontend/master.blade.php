<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/common.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/home.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/cart.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/feedback.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/product.css')}}">

  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>

  <header class="sec-header">
    <div class="l-inner clearfix">
      <div class="logo">
        <h1 class="logo-ttl"><a href="#">SHM <br> STORE</a></h1>
      </div>
      <!--logo-->
      <nav class="gnav">
        <ul>
          <li><a href="{{route('home')}}" class="{{  Request::is('/') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{route('product')}}" class="{{  Request::is('product') ? 'active' : '' }}">Product</a></li>
          <li>
              <a href="{{ route('cart.view') }}">
              Cart
              (<span class="cart-count">{{ session()->has('cart') && count(session()->get('cart')) > 0 ? count(session()->get('cart')) : 0 }}</span>)
              </a>
          </li>
          <li><a href="{{route('about')}}" class="{{  Request::is('about') ? 'active' : '' }}">About</a></li>
          <li><a href="{{route('feedback')}}" class="{{  Request::is('feedback') ? 'active' : '' }}">Feedback</a></li>
          @auth
          <li><a href="{{url('/logout')}}">Logout</a></li>
          @else

         
          <li class="dropdown pc">
            <button class="dropbtn pc"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M344.7 238.5l-144.1-136C193.7 95.97 183.4 94.17 174.6 97.95C165.8 101.8 160.1 110.4 160.1 120V192H32.02C14.33 192 0 206.3 0 224v64c0 17.68 14.33 32 32.02 32h128.1v72c0 9.578 5.707 18.25 14.51 22.05c8.803 3.781 19.03 1.984 26-4.594l144.1-136C354.3 264.4 354.3 247.6 344.7 238.5zM416 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c17.67 0 32 14.33 32 32v256c0 17.67-14.33 32-32 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c53.02 0 96-42.98 96-96V128C512 74.98 469 32 416 32z"/></svg></button>
            <div class="dropdown-content pc">
            <a href="{{route('login')}}">Login</a>
          <a href="{{route('register')}}"  class="{{  Request::is('/register') ? 'active' : '' }}">Register</a>
          </div>
          
          </li>
          <li class="  sp">
          <ul class="list">
          <li><a href="{{route('register')}}"  class="{{  Request::is('/register') ? 'active' : '' }}  sp">Register</a></li>
          <li class="sp"><a href="{{route('login')}} ap">Login</a>
          </li>
          </ul>
</li>
          @endauth
        </ul>
      </nav>
      <!--gnav-->
      <button class="menu-icon">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
    <!--l-inner-->

  </header>
  <!--header-->
  @yield('content')

  <section class="sec-footer">
    <div class="l-inner">
      <h3 class="logo-ttl"><a href="#">SHM <br> STORE</a></h3>
      <div class="footer-box clearfix">

        <div class="left">

          <div class="map-blk">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.889807968003!2d96.15450567144687!3d16.778828656486738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ec821e07a833%3A0xdde741e3cd511209!2sJunction%20City!5e0!3m2!1sen!2smm!4v1660581689171!5m2!1sen!2smm" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
          </div>
        </div>
        <!--left-->
        <div class="right clearfix">
          <ul>
            <li>
              <h3 class="list-ttl ">Email : <a href="mailto:shm@gmail.com">shm22@gmail.com</a></h3>
            </li>
            <li>
              <h3 class="list-ttl">Phone : <a href="tel:+09-123-456-789">09- 123 456 789</a> </h3>
            </li>
            <li>
              <h3 class="list-ttl">Location: <a href="https://goo.gl/maps/c3WJn1SUzJ4cyjPc7">Junction City, Yangon</a> </h3>
            </li>
          </ul>
          <form action="" class="sub-form">
            <input type="email" placeholder="Enter your email">
            <input type="submit" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
    <footer>
      copyright@shm2022
    </footer>
    <!--footer-->
  </section>
  <!--sec-footer-->

  <script src="{{asset('frontend/js/libary/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/js/libary/slick.min.js')}}"></script>
  <script src="{{asset('frontend/js/libary/jquery.heightLine.js')}}"></script>
  <script src="{{asset('frontend/js/slider.js')}}"></script>
  <script src="{{asset('frontend/js/heightline.js')}}"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <script src="{{asset('frontend/js/common.js')}}"></script>


  <script>
    @if(session('status'))
    let alert_msg = "<?php echo session('status'); ?>";
    toastr.success(alert_msg, 'SUCCESS', {
        closeButton: true,
        progressBar: true,
    });
    @endif
  </script>
  @stack('js')
</body>
</html>