@extends('layout')
@section('bodyStyle')class="detail {{$item->template ? : 'bgred'}}"@endsection
@section('styles')
@endsection
@section('body')
    @include('header')
    <div class="main-body detail-body" style="border:0px solid white;border-collapse:collapse;">
        <div id="father-bg" class="bg-color" style="overflow:hidden"> </div>
        <div class="detail-frame-outer">
        @include('frame')
        </div>
    <div id="content">
        <div id="wrapper">
            <div id="main-detail">


                <div class="container-fluid detailblock">
                    <div id="row" class="col-md-9 col-md-offset-1 col-sm-offset-1 col-sm-10 col-xs-offset-0  col-xs-12">
                        <!--<div id="row" class=" col-sm-offset-2 col-sm-8  col-md-6  col-md-offset-3 outout">   -->
                        <!------------------LINE1------------------->
                        <div class="  col-sm-4  col-sm-offset-0 col-xs-10 col-xs-offset-1 produce-cell">
                            <div class="">
                                <div class="bottle-pic" ><img style='width:100%' src="{{asset($item->image)}}"></div>
                            </div>
                        </div><!-- /box -->


                        <div class="col-sm-7 col-xs-12 produce-cell" style="text-align:left;">
                            <div class="detail-block" style="height:300px;">
                                <div class="boxscroll asscroll">
                                    <div id="block_top" class="abs" style="left:53px;top:24px;">
                                        <div class="block_top_logo1">
                                            <div class="title-icon1"></div>
                                            @if($item->icon)
                                            <div class="title-icon2" style="background-image:url('{{asset($item->icon)}}')"></div>
                                            @endif
                                        </div>
                                        <div class="title">{{$item->name}}</div>
                                        <div id="block_top_dot">
                                            <div class="txt-dot"></div>
                                            <div class="txt-dot"></div>
                                            <div class="txt-dot"></div>
                                        </div>
                                    </div>
                                    <div id="block_ctt" class="abs" style="left:53px;top:225px;">
                                        <div class="block_ctt_txt" >
                                    @php
                                    $description = explode("\n", $item->description);
                                    @endphp
                                    @foreach($description as $v)
                                        @if($v == '')
                                            <br/>
                                        @else
                                            <p>{{$v}}</p>
                                        @endif
                                    @endforeach
                                            <br/>
                                            <p>{{$item->getItemAttribute('specification')->title}} – {{$item->getItemAttribute('specification')->content}}</p>
                                            <br/>
                                            <h3>{{$item->getItemAttribute('features')->title}}</h3>
                                            <ul class="ul-gou">
                                            @php
                                                $content = explode("\n", $item->getItemAttribute('features')->content);
                                            @endphp
                                                @foreach($content as $v)
                                                <li>{{$v}}</li>
                                                @endforeach
                                            </ul>
                                            <br/>
                                            <h3>{{$item->getItemAttribute('contains')->title}}</h3>
                                            @php
                                                $content = explode("\n", $item->getItemAttribute('contains')->content);
                                            @endphp
                                            @foreach($content as $v)
                                                <p>{{$v}}</p>
                                            @endforeach
                                            <br/>
                                            <h3>{{$item->getItemAttribute('method')->title}}</h3>
                                            <ul class="ul-gou">
                                                @php
                                                    $content = explode("\n", $item->getItemAttribute('method')->content);
                                                @endphp
                                                @foreach($content as $v)
                                                    <li>{{$v}}</li>
                                                @endforeach
                                            </ul>
                                            <p>{{$item->getItemAttribute('artg')->title}}<a href="https://www.tga.gov.au/artg/artg-id-{{$item->getItemAttribute('artg')->content}}" target="_blank">{{$item->getItemAttribute('artg')->content}}</a></p>
                                            <br/>
                                            <h3>在以下电商平台搜索“Life-Space”产品</h3>
                                            <div class="detail-link-btn">
                                                <a id="bttm" href="javascript:void(0)" onclick="track('详细页-天猫按钮');myQrcode.jump('{{$item->tmall_url}}');" target="_blank"><div class="imgtm"></div></a>

                                            </div>
                                            <div style="clear:both;"></div>
                                            <div class="clear-float"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="block_bar" class="col-sm-1 produce-cell">
                            <div class="detail-box-btn" >
                                <a onclick="track('详细页-返回按钮');" href="{{url('items/'.Request::segment(2))}}">
                                    <div id="btnBack"><img src="{{asset('assets/img/detail/ViewAll1.png')}}"/></div>
                                </a>
                            </div>
                            <div class="detail-box-btn" >
                                <a onclick="track('详细页-上一页按钮');" href="{{url('item/'.Request::segment(3).'/pre')}}">
                                    <div id="btnPre"><img src="{{asset('assets/img/detail/Pre1.png')}}"/></div>
                                </a>
                            </div>
                            <div class="detail-box-btn" >
                                <a onclick="track('详细页-下一页按钮');" href="{{url('item/'.Request::segment(3).'/next')}}">
                                    <div id="btnNxt"><img src="{{asset('assets/img/detail/Nxt1.png')}}"/></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection
@section('scripts')
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.fitvids.js')}}"></script>
    <script src="{{asset('assets/js/bxslider.min.js')}}"></script>
    <script src="{{asset('assets/js/oldmain.js')}}"></script>
    <script src="{{asset('assets/script/main.js')}}"></script>
    <script>
        about_ex_init();
        window.init = false;
        $(document).ready(function() {
            if (!window.init) {
                window.init = true;
                window.listID = 0;
                new ZmainSubpage();
                window.myMenu.doline(0);
            }
        });
    </script>
@endsection
