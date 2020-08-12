{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"--}}
{{--          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
{{--    <title>@yield('title')</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--        <a class="navbar-brand" href="#">Trang Chủ</a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"--}}
{{--                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <ul class="navbar-nav mr-auto">--}}
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link" href="{{route('cities.index')}}">Danh sách tỉnh thành <span class="sr-only">(current)</span></a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{route('customers.index')}}">Danh sách khách hàng</a>--}}
{{--                </li>--}}

{{--            </ul>--}}
{{--            <form class="form-inline my-2 my-lg-0" action="{{ route('customers.search') }}" method="get">--}}
{{--                <input class="form-control mr-sm-2" type="search" name="keyword">--}}
{{--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--            </form>--}}
{{--            <a href="{{ route('user.logout') }}">--}}
{{--                <button type="button" class="btn btn-outline-primary">Đăng Xuất</button>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--    @yield('content')--}}
{{--</div>--}}

{{--</body>--}}
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--        crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"--}}
{{--        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"--}}
{{--        crossorigin="anonymous"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"--}}
{{--        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"--}}
{{--        crossorigin="anonymous"></script>--}}
{{--</html>--}}
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Wing the Air</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}}" type="text/css" media="all" />
    <!--[if lte IE 6]><style type="text/css" media="screen">.tabbed { height:420px; }</style><![endif]-->
    <script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
    <script src="js/jquery.slide.js" type="text/javascript"></script>
    <script src="js/jquery-func.js" type="text/javascript"></script>
</head>
<body>
<!-- Top -->
<div id="top">
    <div class="shell">
        <!-- Header -->
        <div id="header">
            <h1 id="logo"><a href="#">Urgan Gear</a></h1>
            <div id="navigation">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">The Store</a></li>
                    <li class="last"><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
        <!-- End Header -->
        <!-- Slider -->
        <div id="slider">
            <div id="slider-holder">
                <ul>
                    <li><a href="#"><img src="css/images/slide1.jpg" alt="" /></a></li>
                    <li><a href="#"><img src="css/images/slide2.jpg" alt="" /></a></li>
                    <li><a href="#"><img src="css/images/slide1.jpg" alt="" /></a></li>
                    <li><a href="#"><img src="css/images/slide2.jpg" alt="" /></a></li>
                    <li><a href="#"><img src="css/images/slide1.jpg" alt="" /></a></li>
                    <li><a href="#"><img src="css/images/slide2.jpg" alt="" /></a></li>
                </ul>
            </div>
            <div id="slider-nav"> <a href="#" class="prev">Previous</a> <a href="#" class="next">Next</a> </div>
        </div>
        <!-- End Slider -->
    </div>
</div>
<!-- Top -->
<!-- Main -->
