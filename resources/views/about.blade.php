@extends('layout')
@section('bodyStyle')class="about subpage"@endsection
@section('styles')
@endsection
@section('body')
    @include('header')
    @include('qr')
    <div id="content">
        @include('kv', ['bkg_class'=>'bggreen'])

        <div id="wrapper">
            <div id="main-about">
                @foreach($page->graphic as $graphic)
                    @php
                    $content = explode("\n",$graphic->content);
                    @endphp
                    <div class="sub-main">
                        <div class="center-contents">
                            @if($graphic->header_image)<img src="{{asset($graphic->header_image)}}"/>@endif
                            <h2>{{$graphic->title}}</h2>
                            @foreach($content as $v)
                                <div class="screen4_txt">{{$v}}</div>
                            @endforeach

                        </div>
                    </div>
                    @if($graphic->bkg_image)
                    <div class="parallax-container">
                        <div class="section no-pad-bot">
                            <div class="container">
                            </div>
                        </div>
                        <div class="parallax"><img src="{{asset($graphic->bkg_image)}}"></div>
                    </div>
                    @endif
                @endforeach
            </div>
            @php
                $gallery = count($page->gallery) > 0 ? $page->gallery[0] : null;
            @endphp
            @if($gallery)
            <div id="screen7" style="width:100%">
                <div class="Gallery">
                    <div class="Gallery-button">
                        <div class="Gallery-button-left" style="display:block">
                            <div class="abs frame1" style="display:block">
                                <img src="{{asset('assets/img/about/btnL1.png')}}"/>
                            </div>
                            <div class="abs frame2" style="display:none">
                                <img src="{{asset('assets/img/about/btnL2.png')}}"/>
                            </div>
                        </div>
                        <div class="Gallery-button-right" style="display:block">
                            <div class="abs frame1" style="display:block">
                                <img src="{{asset('assets/img/about/btnR1.png')}}"/>
                            </div>
                            <div class="abs frame2" style="display:none">
                                <img src="{{asset('assets/img/about/btnR2.png')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="Gallery-wrap">
                        @foreach($gallery->gallery as $image)
                        <div class="Gallery-item">
                            <img src="{{asset($image)}}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @include('footer')
@endsection
@section('scripts')
    <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.touchSwipe.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.fitvids.js')}}"></script>
    <script src="{{asset('assets/js/bxslider.min.js')}}"></script>
    <script>
        about_ex_init();
        window.init = false;
        $(document).ready(function() {
            if (!window.init) {
                window.init = true;
                window.listID = 0;
                new ZmainSubpage();
                window.myMenu.doline(1);
            }
        });
    </script>
@endsection
