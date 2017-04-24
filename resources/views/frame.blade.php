<!--外框开始-->
<div class="Frames-top" style="position:absolute;width: 100%; height: 25px; left: 0px; top: -3px;  background-image: url('{{asset("assets/img/frame/Frames_top.png")}}');"></div>
<div class="Frames-bottom{{Request::segment(2) == 'index' ? ' Frames-bottom-home' : ''}}" style="position:absolute;width: 100%; height: 25px; left: 0px; bottom: 0px;  background-image: url('{{asset("assets/img/frame/Frames_bottom.png")}}');"></div>
<div class="Frames-left" style="position:absolute;width: 25px; height: 100%; left: 0px; top: -4px;  background-image: url('{{asset("assets/img/frame/Frames_left.png")}}');"></div>
<div class="Frames-right" style="position:absolute;width: 25px; height: 100%; right: 0px; top: -4px;  background-image: url('{{asset("assets/img/frame/Frames_right.png")}}');"></div>
<!--外框结束-->