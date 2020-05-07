@extends('app')

@section('title')
    @parent
    ShowMessage
@stop

@section('style')
    <link rel="stylesheet" href="{{asset('/MyHome/css/Family/management.css')}}">
@stop

@section('content')

    <div class="mainal">

        <!--按钮控制-->
        <div class="add_box">
            <a href="{{asset('/append')}}" target="_blank">
                <button id="add_btn" class="add_btn1">新增成员</button>
            </a>
            <a href="#" target="_blank">
                <button id="add_btn3" class="add_btn1">看看就好</button>
            </a>
        </div>

        <!--表格信息展示-->
        <div class="info">
            <div class="table_container">
                <div class="table_desc">
                    <table border="1" cellspacing="0" style="margin:0">
                        <tbody id="tbody">

                        </tbody>
                    </table>

                    <span class='show_item'>查询到：<span id='get_item' style="color:#566573;"></span>条数据</span></br>
                    <span class='show_item'>共有：<span id='get_item1' style="color:#566573;"></span>页</span></br>
                    <span class='show_item'>当前在第：<span id='get_item2' style="color:#CB4335;"></span>页</span></br>

                    <!--分页控制栏-->
                    <div class="separateTable">
                        <nav class="navigation_hd">
                            <ul class="pagination">

                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!--详细信息展示栏-->
    <div id="movediv">

    </div>
    @include('common.familyMessage.message')
@stop

@section('script')
    <script src="{{asset('/MyHome/js/Family/management/part.js')}}"></script>
    <script src="{{asset('/MyHome/js/Family/management/page.js')}}"></script>
    <script src="{{asset('/MyHome/js/Family/management/table.js')}}"></script>
    <script src="{{asset('/MyHome/js/Family/management/detail.js')}}"></script>
@stop
