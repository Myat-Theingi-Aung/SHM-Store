<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('common/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('common/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/dashboard.css') }}">
    <script src="{{ asset('common/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/master.js') }}"></script>
</head>
<body>
    <section class="main clearfix">
        <div class="l-inner">
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
                        {{--class="{{ Request::is('role*') ? 'active' : '' }}"--}}
                        <li class="menu-spacer"></li>
                        <li class="menu-item">
                            <a href="" class="menu-item-link active">Dashboard</a>
                        </li>
                        <li class="menu-spacer"></li>
                        <li class="menu-item">
                            <a href="" class="menu-item-link">Category</a>
                        </li>
                        <li class="menu-spacer"></li>
                        <li class="menu-item">
                            <a href="" class="menu-item-link">Product</a>
                        </li>
                        <li class="menu-spacer"></li>
                        <li class="menu-item">
                            <a href="" class="menu-item-link">Order</a>
                        </li>
                        <li class="menu-spacer"></li>
                        <li class="menu-item">
                            <a href="" class="menu-item-link">User</a>
                        </li>
                        <li class="menu-spacer"></li>
                        <li class="menu-item">
                            <a href="" class="menu-item-link">Customer</a>
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
                            <a href="" class="menu-item-link">Logout</a>
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
                    <div class="admin-info">
                        Myat Theingi Aung
                    </div>
                </div>
                <div class="content-area">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
</body>
</html>