<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="{{asset('/MyHome/css/login/login.css')}}">
    <link rel="stylesheet" href="{{asset('/MyHome/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('/MyHome/css/login/can.css')}}">
    <script src="{{asset('/MyHome/js/jQuery.js')}}"></script>
</head>
<body>
<canvas></canvas>
<div class="menu"></div>
<div class='root'>
    <div class="login_box">
        <div class=login_content>
            <div class="title_login"><span>WELCOME TO VUEKEY!</span></div>
            <div class="content_input">

                <lable class="input_lable">
                    <span class="desc_input">User</span>
                    <span class="cont_input">
                            <input type="text" class="input_item input_item_1" placeholder="用户名"/>
                        </span>
                </lable>

                <lable class="input_lable">
                    <span class="desc_input">Password</span>
                    <span class="cont_input">
                            <input type="password" class="input_item input_item_1" placeholder="密码"/>
                        </span>
                </lable>

                <lable class="input_lable">
                    <span class="span_btn">
                        <input type="button" class="input_item_btn" id="sub_btn" value="登陆"/>
                    </span>
                    <span class="span_btn">
                        <a href="/register"><input type="button" class="input_item_btn" id="zc_btn" value="注册"/></a>
                    </span>
                </lable>
            </div>
        </div>
    </div>
</div>
<!--登陆等待图片-->
<div id="loading">
    <img src="{{asset('/MyHome/images/hhhh.gif')}}">
</div>

@include('common.familyMessage.login-fail')

@include('common.familyMessage.no-register')
<div class="foot"><span>欢迎登陆 || @656735863</span></div>
</body>
<script src="{{asset('/MyHome/js/login/login/lo.js')}}"></script>
<script src="{{asset('/MyHome/js/login/login/check.js')}}"></script>

</html>
