@extends('app')
@section('title')
    @parent
    REGISTER
@stop
@section('style')

    <link rel="stylesheet" href="{{asset('https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css')}}">
@stop
@section('style-footer')
    <link rel="stylesheet" href="{{asset('/MyHome/css/login/register.css')}}">
@stop
@section('content')

    {{--错误提示--}}
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $item)
                <li>{{$item}}</li>
            @endforeach
        </div>
    @endif

    <div class="contents-main">

        @csrf
        <form action="{{asset('/registerTest')}}" method="post">
            <div class="form-group">
                <label class="form-label"><i class="fa-star fa"></i>用户名&nbsp:</label>
                <input type="text" name='username' class="form-control input-bo" placeholder="Enter password" value="{{old('username')}}">
                <span class="form-span">字母与数字组合，不包含空格和特殊字符</span>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fa-star fa"></i>密码&nbsp:</label>
                <input type="password" name='password' class=" form-control input-bo" placeholder="Enter password">
                <span class="form-span">长度6-16位，不能为纯数字或字母</span>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fa-star fa"></i>确认密码&nbsp:</label>
                <input type="password" name='password_confirmation' class="form-control input-bo" placeholder="Enter password">
                <span class="form-span">确保两次密码一直</span>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fa-star fa"></i>邮箱&nbsp:</label>
                <input type="email" name='email' class="form-control input-bo" placeholder="Enter password" value="{{old('email')}}">
                <span class="form-span">安全邮箱</span>
            </div>

            <img src="{{captcha_src('mini')}}">

            <div class="btn_box2">
                <a>
                    <button type="submit" class="btn btn-primary btn-sm">注册</button>
                </a>
            </div>
        </form>

    </div>

@stop
@section('footer')
    <div class="logmessage">
            <span class="logmessagespan">
                The man who has made up his mind to win will never say "impossible" | @design by Mr zhang
            </span>
    </div>
@stop
@section('script')
    <script src="{{asset('/MyHome/js/login/register/register.js')}}"></script>
@stop
