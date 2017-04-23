@extends('layout')
@section('bodyStyle')class="producelist subpage"@endsection
@section('styles')
@endsection
@section('body')
    @include('header')
    @include('qr')
    <div id="content">
        @php
            $kv = count($page->kvs) > 0 ? $page->kvs[0] : null;
        @endphp
        <div id="header-container" class="height-500 header-container-class bgblue">
            @if($kv)
                <div style="background-image: url('{{asset($kv->header_image)}}'); transform: translate3d(0px, 0px, 0px);" id="header-parallax" class="height-500 header-parallax-class "></div>

            <div class="header-outer">
                <div class="header-inner">
                    <div class="header-title"><img style="width:212px;height:41px;" src="{{asset('assets/img/kv/logo.png')}}"></div>
                    <div id="header-subtitle"><img style="width:29px;height:1px;" src="{{asset('assets/img/kv/screen1_line_1.png')}}"></div>
                    <div class="header-subtitle-subpage">{{$kv->title}}</div>
                    <div id="header-subtitle"><img style="width:29px;height:1px;" src="{{asset('assets/img/kv/screen1_line_1.png')}}"></div>
                </div>
            </div>
        @endif
            <!--------外框开始-------->
            <div class="Frames-top" style="position:absolute;width: 100%; height: 25px; left: 0px; top: -3px;  background-image: url('{{asset("assets/img/frame/Frames_top.png")}}');"></div>
            <div class="Frames-bottom" style="position:absolute;width: 100%; height: 25px; left: 0px; bottom: 0px;  background-image: url('{{asset("assets/img/frame/Frames_bottom.png")}}')');"></div>
            <div class="Frames-left" style="position:absolute;width: 25px; height: 100%; left: 0px; top: -4px;  background-image: url('{{asset("assets/img/frame/Frames_left.png")}}')');"></div>
            <div class="Frames-right" style="position:absolute;width: 25px; height: 100%; right: 0px; top: -4px;  background-image: url('{{asset("assets/img/frame/Frames_right.png")}}')');"></div>
            <!--------外框结束-------->
        </div>

        <div id="wrapper">
            <div id="main">

                <div class="sub-main produce-select-pp">
                    <div class="produce-select">
                        <div class="macji">
                            <ul class="macji-skin">

                                <li><a class="color-black" onclick="track('列表页-点击菜单');" href="producelist1.html">成人</a></li>
                                <li><a class="color-gray" onclick="track('列表页-点击菜单');" href="producelist2.html">孕妇</a></li>
                                <li><a class="color-black" onclick="track('列表页-点击菜单');" href="producelist3.html">婴幼儿</a></li>
                                <li><a class="color-black" onclick="track('列表页-点击菜单');" href="producelist4.html">儿童</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" style="margin-top:0px;position:relative;">
                    <div id="row" class=" col-sm-offset-2 col-sm-8 col-xs-offset-0  col-xs-12 outout">
                        <!--<div id="row" class=" col-sm-offset-2 col-sm-8  col-md-6  col-md-offset-3 outout">   -->
                        <!------------------LINE1------------------->

                        <div class="  col-sm-4  col-xs-6 produce-cell"><a href="detail01.html">
                                <div class="">
                                    <div class="bottle-name color-black">孕期和哺乳期益生菌</div>
                                    <div class="bottle-pic"><img src="img/list/p2/1.png"></div>
                                    <div class="bottle-txt">包装规格 – 60粒胶囊</div>
                                    <center><div class="bottle-line"></div></center>
                                </div></a>
                        </div><!-- /box -->
                        <div class="  col-sm-4  col-xs-6 produce-cell"><a href="detail11.html">
                                <div class="">
                                    <div class="bottle-name color-black">孕妇和哺乳期DHA+</div>
                                    <div class="bottle-pic"><img src="img/list/p2/2.png"></div>
                                    <div class="bottle-txt">包装规格 – 60粒软胶囊</div>
                                    <center><div class="bottle-line"></div></center>
                                </div></a>
                        </div><!-- /box -->
                        <div class="  col-sm-4  col-xs-6 produce-cell"><a href="detail07.html">
                                <div class="">
                                    <div class="bottle-name color-black">泌尿生殖盾益生菌</div>
                                    <div class="bottle-pic"><img src="img/list/p2/3.png"></div>
                                    <div class="bottle-txt">包装规格 – 60粒胶囊</div>
                                    <center><div class="bottle-line"></div></center>
                                </div></a>
                        </div><!-- /box -->
                        <div class="  col-sm-4  col-xs-6 produce-cell"><a href="detail04.html">
                                <div class="">
                                    <div class="bottle-name color-black">成人广谱益生菌</div>
                                    <div class="bottle-pic"><img src="img/list/p2/4.png"></div>
                                    <div class="bottle-txt">包装规格 – 30，60和90粒胶囊</div>
                                    <center><div class="bottle-line"></div></center>
                                </div></a>
                        </div><!-- /box -->
                        <div class="  col-sm-4  col-xs-6 produce-cell"><a href="detail05.html">
                                <div class="">
                                    <div class="bottle-name color-black">成人640亿益生菌</div>
                                    <div class="bottle-pic"><img src="img/list/p2/5.png"></div>
                                    <div class="bottle-txt">包装规格 – 30粒胶囊</div>
                                    <center><div class="bottle-line"></div></center>
                                </div></a>
                        </div><!-- /box -->


                    </div>






                </div>


            </div>

        </div>
    </div>
    @include('footer')
@endsection
@section('scripts')
    <script>
        about_ex_init();
        window.init = false;
        $(document).ready(function () {
            if (!window.init) {
                window.init = true;
                window.listID = 0;
                new ZmainSubpage();
                window.myMenu.doline(1);
            }
        });
    </script>
@endsection
