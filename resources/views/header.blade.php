<!--菜单开始-->
<div class="header" style="position:absolute;z-index:9999; ">
    <div class="logo">
        <a href="/"><img style="width:100%" src="{{asset('assets/img/ls-logo.png')}}" alt=""></a>
    </div>
    <div class="menuIcon"><img src="{{asset('assets/img/nav.png')}}" alt=""></div>
    <div class="top-menu">
        <ul class="ul-root">
            <li id="submenu-hotdot"><a href="javascript:void(0)" onclick="myMenu.toggleSubMenu();">我们的产品
                    <img class="menuarrow-down" src="{{asset('assets/img/272_qrcode/arrow_down.png')}}"/>
                </a>
                <ul class="sub-menu" style="width: 162px; height: 200px; left: 1131px; top: 91px;background-color:#fff;display:none;">
                    @foreach($categories as $category)
                        <li class="sub-li"><a href="{{url('items/'.$category->id)}}" class="active">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{url('page/about')}}">关于我们</a></li>
            <li><a href="{{url('page/why')}}">为什么选择益生菌</a></li>
            <li><a href="{{url('page/faq')}}">常见问题及解答 </a></li>
            <li><span>联系我们</span>
                <span><a class="nav-icon-1" href="http://www.weibo.com/5973559206/profile?topnav=1&wvr=6" class="top-links-sm" target="_blank"><img class="icon-white-on-hover" src="{{asset('assets/img/icon-wb_white.png')}}" alt=""></a></span>
                <span><a class="nav-icon-1" href="javascript:void(0)" onclick="myQrcode.toggle();" class="top-links-sm" target="_blank"><img id="qrcode-hotdot" class="icon-white-on-hover" src="{{asset('assets/img/icon-wc_white.png')}}" alt=""></a></span>
            </li>
        </ul>
    </div>
    <div class="clerfix"></div>
</div>
<!--菜单结束-->