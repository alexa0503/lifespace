@extends('layout')
@section('bodyStyle')style="background-color:white"@endsection
@section('body')
    <div class="main-body">
        @include('header')
        @include('qr')
        @include('frame')
        <div id="father-bg" style="overflow:hidden"></div>
    <!--<img src="{{asset('assets/img/t3.png')}}" id="arrow-down" style="width: 150px;position: absolute;bottom: 10px;left: 50%;margin-left: -75px;"></img>
        <img src="{{asset('assets/img/t4.png')}}" id="arrow-top" style="width: 60px;position: absolute;bottom: 40px;right: 40px;"></img>-->
        <div class="little-Navi-parent">
            <div id="little-Navi"></div>
            <div id="dot_big">
                <canvas id="dotcanvas" width="44" height="42"></canvas>
                <div id="dot_big_out"><img src="{{asset('assets/img/t2.png')}}"></div>
            </div>
        </div>

        <div class="tit-frame" id="home-frame-bg">
            <div class="tit-frame-inner">
                <img class="frame-img" src="{{asset('assets/img/frame.png')}}"/>
            </div>
        </div>

        <div class="tit-frame" id="home-frame-txt">
            <div class="tit-frame-inner">
                @foreach($page->kvs as $k=>$block)
                    <div class="mb10" id="frame{{$k+1}}">
                        <div class="wrap-wrap">
                            <div class="wrap">
                                <div class="verticalWrap">
                                    <div class="vertical">
                                        <center>
                                            <div class="home-frm-ele unselectable home-line1" unselectable="on">{{$block->title}}</div>
                                            <div class="home-frm-ele unselectable home-line2" unselectable="on">{{$block->description}}</div>
                                            @if($block->link != '#' || empty($block->link))
                                                <div class="home-frm-ele">
                                                    <a class="unselectable home-line3" unselectable="on" href="{{$block->link}}" style="color:white;" onclick="track('首页-{{ ($block->id == 1) ? '访问所有' : '了解更多' }}-{{$block->title}}');">
                                                        {{ ($block->id == 1) ? '访问所有' : '了解更多' }}
                                                        <img class="home-arrow" src="{{asset('assets/img/home/arrow_white.png')}}"/>
                                                    </a>

                                                </div>
                                            @else
                                                <div class="home-frm-logo-hr-2 logo5">
                                                    <center>
                                                        <a onclick="track('首页-了解更多-微博');" href="http://www.weibo.com/5973559206/profile?topnav=1&wvr=6" class="top-links-27" target="_blank"><img class="icon-white-on-hover" id="home_wb" src="{{asset('assets/img/icon-wb_white.png')}}" alt=""></a>
                                                        <a href="javascript:void(0)" onclick="track('首页-了解更多-微信');return myLS1Overlay.show();" class="home-frm-logo-hr-2-end" target="_blank"><img class="icon-white-on-hover" id="home_wc" src="{{asset('assets/img/icon-wc_white.png')}}" alt=""></a>
                                                        <a onclick="track('首页-了解更多-babytree');" href="http://www.babytree.com/user/showuser.php?uid=u123946148552&tab=center" class="home-frm-logo-hr-2-end" target="_blank"><img class="icon-white-on-hover" id="home_babytree" src="{{asset('assets/img/icon-babytree_white.png')}}" alt=""></a>
                                                    </center>
                                                </div>
                                            @endif
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
        <div id="kvgroup">
            @foreach($page->kvs as $k=>$block)
                <section class="scroll-section" id="section0{{$k+1}}" style="">
                    <div class="kvimg kv{{$k+1}}}"><img src="{{asset($block->header_image)}}"/></div>
                </section>
            @endforeach
        </div>
        <div class="home-down-arrow" style="display:none;"><img style="" src="{{asset('assets/img/home/arrow-mobile.gif')}}"/></div>
        @include('footer')
    </div>
@endsection
@section('scripts')
    <script>
        window.init = false;
        $(document).ready(function () {
            if (!window.init) {
                window.init = true;
                new ZmainHome();
            }
        });
    </script>
@endsection
