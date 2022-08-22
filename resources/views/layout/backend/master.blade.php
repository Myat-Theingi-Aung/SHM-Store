<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('common/css/reset.css') }}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('common/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/dashboard.css') }}">
</head>
<body>
    <section class="main clearfix">
        <div class="sidebar">
            <div class="nav-brand clearfix">
                <div class="logo">
                    <h1><a href="#">SHM STORE</a></h1>
                </div>
                <p class="hide-sidebar-btn" id="hide-sidebar-btn">
                    <span></span>
                    <span></span>
                </p>
            </div>
            <div class="nav-menu">
                <ul>
                    <li class="menu-spacer"></li>
                    <li class="menu-item">
                        <a href="{{ route('admin.dashboard') }}" class="menu-item-link {{ Request::is('admin') ? 'active' : '' }}">Dashboard</a>
                    </li>
                    <li class="menu-spacer"></li>
                    <li class="menu-item">
                        <a href="" class="menu-item-link">Category</a>
                    </li>
                    <li class="menu-spacer"></li>
                    <li class="menu-item">
                        <a href="{{ url('admin/product') }}" class="menu-item-link {{ Request::is('admin/product*') ? 'active' : '' }}">Product</a>
                    </li>
                    <li class="menu-spacer"></li>
                    <li class="menu-item">
                        <a href="" class="menu-item-link">Order</a>
                    </li>
                    <li class="menu-spacer"></li>
                    <li class="menu-item">
                        <a href="{{ route('admin.user.index') }}" class="menu-item-link {{ Request::is('admin/user*') ? 'active' : '' }}">User</a>
                    </li>
                    <li class="menu-spacer"></li>
                    <li class="menu-item">
                        <a href="" class="menu-item-link">Subscriber</a>
                    </li> 
                    <li class="menu-spacer"></li>
                    <li class="menu-item">
                        <a href="" class="menu-item-link">Profile</a>
                    </li> 
                    <li class="menu-spacer"></li>
                    <li class="menu-item">
                        <a href="{{ route('logout') }}" class="menu-item-link">Logout</a>
                    </li>        
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="hdr clearfix">
                <p class="show-sidebar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </p>
                <div class="blank"></div>
                <div class="admin-info clearfix">
                    @if(auth()->user()->photo)
                        <img src="{{  asset('uploads/user/'.auth()->user()->photo) }}" alt="">
                    @else
                        <img src="https://ui-avatars.com/api/?background=fff&color=006699&name={{ auth()->user()->name }}"/>
                    @endif
                    <p>{{ auth()->user()->name }}</p>
                </div>
            </div>
            <div class="content-area">
                @yield('content')
            </div>
        </div>
    </section>
<script src="{{ asset('common/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/js/master.js') }}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<!-- Sweet Alert v2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('js')
</body>
</html>