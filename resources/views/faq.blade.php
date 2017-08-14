@extends('layout')
@section('bodyStyle')class="faq subpage"@endsection
@section('styles')
@endsection
@section('body')
    @include('header')
    @include('qr')
    <div id="content">
        @include('kv', ['bkg_class'=>'bgrosepink'])
        <div id="wrapper">
            <div id="main">
            </div>
        </div>
    </div>

    <div class="faq-main">
        <br/>
        <h3 class="contect_us_text">如您有任何疑问，欢迎发送相关问题到指定邮箱</h3>
        <p class="contect_us_link"><a onclick="track('FAQ-发送邮件');" href="mailto:product@evolutionhealth.com.au">product@evolutionhealth.com.au</a></p>
        <p class="parrow">
            <img style="width:30px;height:30px;" src="{{asset('assets/img/faq/Arrow_Down.png')}}"/>
        </p>
        <div class="faq-ctt">
        @foreach($page->graphic as $k=>$graphic)
            @if($k != 0)<p class="line3dot">---</p>@endif
            @php
            $description = explode("\n", $graphic->description);
            @endphp
            <h3>{{$graphic->title}}</h3>
            @foreach($description as $desc)<p>{{$desc}}</p>@endforeach
        @endforeach
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
                new ZmainSubpage();
                window.myMenu.doline(3);
            }
        });
    </script>
@endsection
