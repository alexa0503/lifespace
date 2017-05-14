<!--菜单开始-->
<div class="header" style="position:absolute;z-index:9999; ">
    <div class="logo">
        <a href="/" onclick="track('菜单-logo');"><img style="width:100%" src="{{asset('assets/img/ls-logo.png')}}" alt=""></a>
    </div>
    <div class="menuIcon"><img src="{{asset('assets/img/nav.png')}}" alt=""></div>
    <div class="top-menu">
        <ul class="ul-root">
            <li id="submenu-hotdot"><a href="javascript:void(0)" onclick="myMenu.toggleSubMenu();">我们的产品
                    <img class="menuarrow-down" src="{{asset('assets/img/272_qrcode/arrow_down.png')}}"/>
                </a>
                <ul class="sub-menu" style="width: 162px; height: 200px; left: 1131px; top: 91px;background-color:#fff;display:none;">
                    @foreach($categories as $category)
                        <li class="sub-li"><a href="{{url('items/'.$category->id)}}" class="active" onclick="track('菜单-我们的产品-{{$category->name}}');">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{url('page/about')}}" onclick="track('关于我们');">关于我们</a></li>
            <li><a href="{{url('page/why')}}" onclick="track('为什么选择益生菌');">为什么选择益生菌</a></li>
            <li><a href="{{url('page/faq')}}" onclick="track('菜单-FAQ');">常见问题及解答 </a></li>
            <li><span>联系我们</span>				<span><a class="nav-icon-1" onclick="track('菜单-微博');" href="http://www.weibo.com/5973559206/profile?topnav=1&wvr=6" class="top-links-sm" target="_blank"><img class="icon-white-on-hover menu-wb" src="{{asset('assets/img/icon-wb_white.png')}}" alt=""></a></span>
                <span><a class="nav-icon-1" href="javascript:void(0)" onclick="track('菜单-切换二维码');return myQrcode.toggle();" class="top-links-sm" target="_blank"><img id="qrcode-hotdot" class="icon-white-on-hover menu-wc" src="{{asset('assets/img/icon-wc_white.png')}}" alt=""></a></span>				<span><a class="nav-icon-1" onclick="track('menu-click-babytree');" href="http://www.babytree.com/user/showuser.php?uid=u123946148552&tab=center" class="top-links-sm" target="_blank"><img id="qrcode-hotdot" class="icon-white-on-hover menu-babytree" src="{{asset('assets/img/icon-babytree_white.png')}}" alt=""></a></span>
            </li>
        </ul>
    </div>
    <div class="clerfix"></div>
</div>
<!--菜单结束-->


<!--二维码开始-->
<div class="overlay" style="display:none;">
    <div class="pp2">
        <div class="wrap2">
            <div class="qrcodeX">
                <a href="javascript:void(0)" onclick="myLS1Overlay.hide();"><img src="{{asset('assets/img/1.1_Overlay/btnX.png')}}"/></a>
            </div>
            <div class="qrblock">
                <p>扫描二维码，关注我们！</p>
                <div class="qrcode"><img style="width:100%" src="{{asset('assets/img/1.1_Overlay/overlay4.png')}}"/></div>
            </div>
        </div>
    </div>
</div>
<!--二维码结束-->
