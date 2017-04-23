<?php  
	//判断是否是微信
	//再来跳转
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($user_agent, 'MicroMessenger') === false) {
    // 非微信浏览器禁止浏览=》跳转到地址栏参数，传递进来的地址
    // echo "HTTP/1.1 401 Unauthorized";
$url = $_GET['param'];
//echo $url;
//$url = iconv('UTF-8','gb2312',$url);
$url = urldecode($url); 
header("Location:".$url); 
exit;
} else {
    // 微信浏览器，允许访问=什么都不做
    // echo "MicroMessenger";
    // 获取版本号
    // preg_match('/.*?(MicroMessenger\/([0-9.]+))\s*/', $user_agent, $matches);
    // echo '<br>Version:'.$matches[2];
}
?>
<html>
<head>
<title>Life-Space</title>
<style>
body,div{ margin: 0;padding:0 ;background:#fff;}
div { position: absolute; }
.text-layer { z-index: 1; }
</style>
</head>

<!--移动端版本兼容 -->
<script type="text/javascript">
         var ww =  parseInt(window.screen.width);
         var hh =  parseInt(window.screen.height);
		 var phoneWidth= (ww>hh)?hh:ww;
         var phoneScale = phoneWidth/640;
         var ua = navigator.userAgent;
         if (/Android (\d+\.\d+)/.test(ua)){
                   var version = parseFloat(RegExp.$1);
                   if(version>2.3){
                            document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
                   }else{
                            document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
                   }
         } else {
                   document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
         }
</script>
<!--移动端版本兼容 end -->
<body > 
<div class="weChat_Bridge4" style="width: 270px; height: 26px; left: 187px; top: 454px;  background-image: url('img/0_WeChat_Bridge/weChat_Bridge4.png');"></div>
<div class="weChat_Bridge3" style="width: 61px; height: 65px; left: 563px; top: 17px;  background-image: url('img/0_WeChat_Bridge/weChat_Bridge3.png');"></div>
<div class="weChat_Bridge1" style="width: 299px; height: 59px; left: 171px; top: 350px;  background-image: url('img/0_WeChat_Bridge/weChat_Bridge1.png');"></div>

</body>
</html>
