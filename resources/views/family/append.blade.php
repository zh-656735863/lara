@extends('app')

@section('title')
    @parent
    Append
@stop

@section('style')
    <link rel="stylesheet" href="{{asset('/MyHome/css/Family/addinfo.css')}}">
    <link rel="stylesheet" href="{{asset('https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css')}}">
@stop

@section('content')

    @include('common.familyMessage.message')

    <div class="input_box">
        <!--姓名输入框-->
        <div class="name_box">
            <li class="info_li"><span class="info_li_span">*</span>姓名</li>
            <input type="text" id="getname" placeholder="NAME" class="form-control info_inp" value="{{$data->name}}">
            <div class="verify_box">

            </div>

        </div>
        <!--性别勾选框-->
        <div class="name_box">
            <li class="info_li"><span class="info_li_span">*</span>性别</li>
            <div id='check_sex'>
                <label class="sex_lable"><input name="che" type="radio" id="checkb" checked="{{$data['sex']!=='男'?'false':'true'}}">男</label>
                <label class="sex_lable"><input name="che" type="radio" id="checkg" checked="{{$data['sex']!=='女'?'false':'true'}}">女</label>
            </div>
            <div class="verify_box" id="showSexError">

            </div>
        </div>
        <div>
        </div>

        <!--生日输入框-->
        <div class="name_box">
            <li class="info_li"><span class="info_li_span">*</span>生日</li>
            <input type="text" id="getbirthday" placeholder="YYYY-MM-DD" class="form-control info_inp" value="{{$data['birthday']}}">
            <div class="verify_box">

            </div>

        </div>
        <!--年龄输入框-->
        <div class="name_box">
            <li class="info_li"><span class="info_li_span">*</span>年龄</li>
            <input type="text" id="getage" placeholder="22" class="form-control info_inp" value="{{$data['age']}}">
            <div class="verify_box">

            </div>
        </div>
        <!--备注输入框-->
        <div class="name_box">
            <li class="info_li"><span class="info_li_span">*</span>备注</li>
            <input type="text" id="remarkd" placeholder="NOTE" class="form-control info_inp" value="{{$data['note']}}">
            <div class="verify_box">

            </div>
        </div>
        <div class="btn_box">
            <button type="button" class="btn btn-success" id="sub_btn">提交</button>
            <button type="button" class="btn btn-info" id="del_btn">放弃</button>
        </div>
    </div>

    <!--生日下拉列表-->
    <div id="getbirthday_box">
        <div class="birSel_box">
            <select id="sel_year" rel="2000"></select>年
            <select id="sel_month" rel="2"></select>月
            <select id="sel_day" rel="20"></select>日
        </div>
    </div>
    <button id="subBir">确定</button>

    <div id="loading">
        <img src="{{asset('/MyHome/images/hhhh.gif')}}">
    </div>

@stop

@section('script')
    <script type="text/javascript" src="{{asset('/MyHome/js/Family/append/birthday.js')}}"></script>
    <script type="text/javascript" src="{{asset('/MyHome/js/Family/append/append.js')}}"></script>
    <script type="text/javascript" src="{{asset('/MyHome/js/Family/append/validataForm.js')}}"></script>
@stop
