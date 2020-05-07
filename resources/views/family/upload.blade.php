@extends('app')


@section('title')
    @parent
    修改中心
@stop

@section('style')
    <link rel="stylesheet" href="{{asset('/MyHome/css/Family/upload.css')}}">
@show

@section('content')
    <!--第一部分-->
    @include('common.familyMessage.message')
    @include('common.familyMessage.fail')
    <div id="upLoadContent">
        <div class="up_Box">
            <h2>修改头像</h2>
            <input type="file" id="inputSelf" name="file"/>
            <div class="imageContent">
                <label for="inputSelf">
                    <img id="uploadImage" width="140" height="140"/>
                </label>
            </div>
            <div class="buttonContent" id="submit_btn">
                <button class='bule-btn'>提交</button>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{asset('/MyHome/js/Family/upImage/upload.js')}}"></script>
@stop
