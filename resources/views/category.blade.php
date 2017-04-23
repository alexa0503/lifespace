@extends('layout')
@section('bodyStyle')class="producelist subpage"@endsection
@section('styles')
@endsection
@section('body')
    @include('header')
    @include('qr')
    <div id="content">
       @include('kv', ['bkg_class'=>'bgblue'])

        <div id="wrapper">
            <div id="main">
                <div class="sub-main produce-select-pp">
                    <div class="produce-select">
                        <div class="macji">
                            <ul class="macji-skin">
                                @foreach($categories as $category)
                                <li><a class="{{($category->id == Request::segment(2)) ? 'color-gray' : 'color-black'}}" onclick="track('列表页-点击菜单');" href="{{url('items/'.$category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" style="margin-top:0px;position:relative;">
                    <div id="row" class=" col-sm-offset-2 col-sm-8 col-xs-offset-0  col-xs-12 outout">
                        <!--<div id="row" class=" col-sm-offset-2 col-sm-8  col-md-6  col-md-offset-3 outout">   -->
                        <!------------------LINE1------------------->
                        @foreach($items as $item)
                            <div class="  col-sm-4  col-xs-6 produce-cell"><a href="detail01.html">
                                    <div class="">
                                        <div class="bottle-name color-black">孕期和哺乳期益生菌</div>
                                        <div class="bottle-pic"><img src="{{asset('assets/img/list/p2/1.png')}}"></div>
                                        <div class="bottle-txt">包装规格 – 60粒胶囊</div>
                                        <center><div class="bottle-line"></div></center>
                                    </div></a>
                            </div><!-- /box -->
                        @endforeach

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
