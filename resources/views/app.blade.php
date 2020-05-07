<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <title>@yield('title','Vuelie大地之歌')</title>
    <link rel="shortcut icon'" href="{{asset('/favicon.ico')}}" />
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('/MyHome/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('/MyHome/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/MyHome/bootstrap/css/bootstrap.min.css')}}">

    <script src="{{asset('/MyHome/js/jQuery.js')}}"></script>

    @section('style-footer')
        <link rel="stylesheet" href="{{asset('/MyHome/css/Family/foot.css')}}">
    @show

    @section('style')

    @show
</head>
<body>
<div class="root">
    <!--导航栏-->
    @section('header')
        <div class="nav_div">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/')}}" target="_self">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/manage')}}" target="_self">Manage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/append')}}" target="_self">Append</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/about')}}" target="_self">About</a>
                </li>
            </ul>
        </div>
    @show
<!--躯干-->
    <div class="subject">
        <div class="contents">
            @section('content')

            @show
        </div>
    </div>

    @section('footer')
    <!--底部-->
        <div class="footer">
            <div class="footer_box clearfix">
                @foreach($footarr as $x=>$x_value)
                    <div class="update_log">
                        <span class="footerspan">{{$x}}</span>
                        <ul class="share_ul" id="share_ul1">
                            @foreach ($x_value as $data)
                                <li>{{$data}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <span class="logMessageSpan">
	            Copyright © 2020-2021   home.com All Rights Reserved. 备案号：鄂ICP备15012567号-1
	        </span>
        </div>
@show()
</div>
</body>
<script src="{{asset('/MyHome/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('/MyHome/bootstrap/js/bootstrap.min.js')}}"></script>
@section('script')

@show
</html>
