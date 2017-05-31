@php
    $kv = count($page->kvs) > 0 ? $page->kvs[0] : null;
@endphp
<div id="header-container" class="height-500 header-container-class {{$bkg_class}}">
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
    @include('frame')
</div>

