@extends('layout')
@section('bodyStyle')class="why subpage"@endsection
@section('styles')
@endsection
@section('body')
    @include('header')
    @include('qr')
    <!--------视频开始-------->
    <div class="vp" style='display:none;overflow:hidden;position:fixed;z-index:999;width:100%;height:100%; '>
        <div class="vbg" style="width:100%;height:100%;position:absolute;"  onclick="myLSwhy.closeVideo();"><img style="width:100%;height:100%;" src="{{asset('assets/img/1.1_Overlay/bggray.png')}}" /></div>
        <div class="vc" style="position:absolute;left:50%;top:50%;">
            <div class="vl" style="margin-left:-600px;margin-top:250;">
                <video src="{{asset('assets/video/video.mp4')}}" style="width:100%;" controls preload ></video>
            </div>
        </div>
        <div class="vc" style="position:absolute;left:50%; ">
            <div class="vX" style="position:absolute;"><center>
                    <a href="javascript:void(0)" onclick="myLSwhy.closeVideo();"><img style="width:100%" src="{{asset('assets/img/1.1_Overlay/btnX.png')}}"></a>
                </center></div>
        </div>
    </div>
    <!--------视频结束-------->

    <div id="content">
    @include('kv', ['bkg_class'=>'bgyellow'])

        <div id="wrapper">
            <div id="main">


                <div style="height:50px;"></div>
                <!--第2屏-->
                <!---------------------->
                @if($page->graphic && count($page->graphic) > 0)
                    @php
                    $content = explode("\n", $page->graphic[0]->content);
                    @endphp
                <div id="index-banner" class="parallax-container" style="height:656px;">
                    <div class="">
                        <div class="container" style="width:100%;">
                            <center>
                                <div class="blue-frame" style="margin-top:50px;visibility:hidden;"><img style="width:1031px;height:556px;" src="{{asset('assets/img/232_WhyProbiotics/screen2_frame_whyProbiotics46.png')}}"  /></div>
                            </center>
                            <div class="why-screen2" style="margin-top:-556px">
                                <table style="height:556px">
                                    <tr>
                                        <td  style="valign:middle;text-align:center;height:100%;">
                                            <div class="overlay-text-1" style="">
                                                {{$page->graphic[0]->title}}
                                            </div>
                                            @foreach($content as $v)
                                                <div class="overlay-text-2" style="margin-top:40px;">
                                                    {{$v}}
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="parallax"><img src="{{asset($page->graphic[0]->bkg_image)}}" ></div>
                </div>
                @endif

                <!---------------------->

                <!---------------------->
@if($page->graphic && count($page->graphic) > 1)
    @foreach($page->graphic as $key=>$graphic)
        @if($key >= 1)
        @php
            $content = explode("\n", $graphic->content);
            $description = explode("\n", $graphic->description);
        @endphp
                <div class="whyLins">
                    <div class="whyLine">
                        <div class="innerDiv">
                            @if($key%2 == 1)
                            <div class="col-md-4 col-md-offset-2  col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1 txtFrame" style="">
                                <img class="oriimg" src="{{asset('assets/img/232_WhyProbiotics/screen3_block1_whyProbiotics67.jpg')}}" style="width:100%;">
                                <div class="txtInFrame" >
                                    <div class="brandTitle"> {{$graphic->title}}</div>
                                @foreach($description as $v)
                                    <div class="whyContext">{{$v}}</div>
                                @endforeach
                                    <div class="whyContext">
                                        <ul>
                                        @foreach($content as $v)
                                            <li>{{$v}}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-4 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1 whyLineRight imgBlock" >
                                <img src="{{asset($graphic->header_image)}}" width="100%" >
                            </div>
                            @else
                            <div class=" col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1 imgBlock" >
                                <img src="{{asset($graphic->header_image)}}" width="100%" >
                            </div>
                            <div class=" col-md-4 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1 whyLineRight txtFrame" style="">
                                <img class="oriimg" src="{{asset('assets/img/232_WhyProbiotics/screen3_block2_frame.png')}}" style="width:100%;">
                                <div class="txtInFrame">
                                    <div class="brandTitle">{{$graphic->title}}</div>
                                    @foreach($description as $v)
                                        <div class="whyContext">{{$v}}</div>
                                    @endforeach
                                    <div class="whyContext">
                                        <ul>
                                        @foreach($content as $v)
                                            <li>{{$v}}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
        @endif
    @endforeach
@endif
                <!---------------------->
                <div class="sub-main  page-players">
                    <div class="players-full" style="background-image: url('{{asset('assets/img/232_WhyProbiotics/screen4_video_video_bg.jpg')}}');">
                        <a class="overlay-text-32" href="javascript:void(0)" onclick="myLSwhy.showVideo();" >
                            <div class="players-full-text">
                                <div class="overlay-text-3"><img style="width:110px;height:110px;" src="{{asset('assets/img/232_WhyProbiotics/screen4_video_video_btnPlayer.png')}}"></div>
                                <div class="overlay-text-32" >看看GIAAN&nbsp;ROONEY是如何评价LIFE-SPACE益生菌的</div>
                            </div>
                        </a>
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
        $(document).ready(function() {
            if (!window.init) {
                window.init = true;
                window.listID = 0;
                new ZmainSubpage();
                window.myMenu.doline(2);
            }
        });
    </script>
@endsection