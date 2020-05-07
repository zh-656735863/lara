@extends('app');

@section('title')
    @parent
    TEST页面
@stop

@section('content')
    <div id="app">@{{message}}</div>
@stop

@section('script')
    <script src="{{asset('/MyHome/js/vue.js')}}"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!'
            }
        })
    </script>
@stop
