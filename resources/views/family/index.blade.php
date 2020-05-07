@extends('app')

@section('style')
    <link rel="stylesheet" href="{{asset('/MyHome/css/Family/home.css')}}"/>
    <link rel="stylesheet" href="{{asset('/MyHome/js/swiper/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('/MyHome/js/swiper/css/swiper.min.css')}}"/>
    <script src="{{asset('/MyHome/js/swiper/js/swiper.js')}}"></script>
    <script src="{{asset('/MyHome/js/swiper/js/swiper.min.js')}}"></script>
@stop

@section('content')

    <!--轮播-->
    <div class="picture_display wid">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($list as $url)
                    <div class="swiper-slide"><img src={{asset($url)}} width='618' height='416'></div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{asset('/MyHome/js/Family/home/home.js')}}"></script>
@stop
