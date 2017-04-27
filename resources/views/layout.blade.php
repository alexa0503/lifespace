<!DOCTYPE html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>{{ $page ? $page->title.' - ' : ''}}{{env('PAGE_TITLE')}}</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">

	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/materialize.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bgcolor.css')}}">
    <!--[if IE 9]><link rel="stylesheet" type="text/css" href="http://www.taylormadegolf.cn/css/ie9.css"><![endif]-->
    <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="http://www.taylormadegolf.cn/css/ie.css"><![endif]-->
    @yield('styles')

	</head>
    <body @yield('bodyStyle') data-img-root-dir="{{asset('assets')}}/" >
        @yield('body')

        <script src="{{asset('assets/js/jquery1.9.1.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.touchSwipe.min.js')}}"></script>
        <script src="{{asset('assets/js/Velocityjs.js')}}"></script>
        <script src="{{asset('assets/js/oldmain.js')}}"></script>
        <script src="{{asset('assets/script/main.js')}}"></script>
        @yield('scripts')
		<div style="display:none;">
			<script src="https://s11.cnzz.com/z_stat.php?id=1261464287&web_id=1261464287" language="JavaScript"></script>
		</div>
    </body>
</html>