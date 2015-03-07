<head>
<meta charset="utf-8">
<title>Shadowsocks—安全的Socks5代理</title>
<meta name="keywords" content="ShadowSocks,ShadowSocks中文,ShadowSocks官方站,ShadowSocks帐号,ShadowSocks教程">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Shadowsocks是一个基于python的轻量级socks代理软件，可以在任何系统简单的实现访问被屏蔽的网站。">
<meta name="author" content="DaiGe International Network">
<script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"},atok:"c17fbea04f64a9440a66226487c09cff",petok:"1479a96fe9bae74a95956d8bcddf4483f70e52e1-1425738916-1800",zone:"shadowsocks.cn",rocket:"a",apps:{}}];document.write('<script type="text/javascript" src="//edge.yunjiasu.com/cdn-cgi/nexp/dok3v=919620257c/cloudflare.min.js"><'+'\/script>');}}catch(e){};
//]]>
</script>
<link rel="stylesheet" href="./css.css">
<link rel="shortcut icon" href="./favicon.ico">
<link rel="apple-touch-icon" href="./apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="./apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="./apple-touch-icon-114x114.png"><style type="text/css"></style>
<link href="./css" rel="stylesheet" type="text/css"><script type="text/rocketscript" data-rocketsrc="./rocket.js"></script>
</head>
<body style="zoom: 1;"><div id="wrap" class="boxed">
<header>
<div class="container clearfix"><div class="eight columns"><div class="logo"><a href="./index.html">shadowsocks</a></div></div>
<div class="eight columns"><nav id="menu" class="navigation"><ul id="nav">
<li style="z-index: 100;"><a href="javascript:void" class="">下载<img src="" class="downarrowclass" style="border:0;"></a>
<ul style="display: none; top: 87px; visibility: visible;"><li><a href="./clients.html">客户端</a></li>
<li><a href="./servers.html">服务器端</a></li></ul></li>
<li style="z-index: 99;"><a href="javascript:void" class="">配置<img src="" class="downarrowclass" style="border:0;"></a>
<ul style="display: none; top: 87px; visibility: visible;"><li><a href="./quick-guide.html">快速指南</a></li>
<li><a href="./advanced.html">增强配置</a></li></ul></li>
<li style="z-index: 98;"><a href="javascript:void" class="">分享<img src="" class="get" style="border:0;"></a>
<ul style="display: none; top: 87px; visibility: visible;"><li><a href="./get.html">获取</a></li></ul></li><li style="z-index: 97;">
<a href="javascript:void">中文版<img src="" class="downarrowclass" style="border:0;"></a><ul style="display: none; top: 87px; visibility: visible;"><li><a href="http://shadowsocks.org">English</a></li></ul></li></ul>
</nav></div>
<div class="sixteen columns"><hr></div></div>
</header>
<div class="container clearfix"><div id="welcome" class="sixteen columns"><div class="qoute"><div class="ten-and-half columns omega">
<h1>一个安全的Socks5代理,</h1>
<h1>为您的网络安全保驾护航。</h1></div>
<div class="four-and-half columns alpha">
<a href="./clients.html" class="btn-download link">
<span><i class="fa fa-download fa-lg"></i>&nbsp; 马上尝试!</span></a>
<a href="https://groups.google.com/forum/#!forum/shadowsocks" class="btn-support link">
<span><i class="fa fa-comments-o fa-lg"></i>&nbsp; 获得技术支持</span></a></div></div></div></div><div class="container clearfix">
<div id="brand" class="sixteen columns bottoms"><blockquote class="large center">如果您想要保护个人隐私，影梭一定是您最佳的选择！</blockquote></div></div>
<div class="container clearfix"><div class="our-services"><ul><li class="one-third column"><div class="icon-box"><i class="fa fa-bolt fa-2x"></i></div>
<h3>超级迅速</h3><p>依托于先进的I/O和Event-driven programming技术。</p></li>
<li class="one-third column"><div class="icon-box"><i class="fa fa-shield fa-2x"></i></div><h3>灵活的加密方式</h3><p>全部流量进行专业级别的加密，可以选择不同的加密方式。</p></li><li class="one-third column"><div class="icon-box"><i class="fa fa-mobile fa-2x"></i></div>
<h3>移动便捷</h3>
<p>优化移动设备和无线网络，不需要保持连接。</p></li><li class="one-third column last"><div class="icon-box"><i class="fa fa-arrows-alt fa-2x"></i></div>
<h3>多平台支持</h3>
<p>支持各种的平台, including PC, MAC, 移动设备 (Android and iOS) 和 路由器 (OpenWRT)。</p></li>
<li class="one-third column last"><div class="icon-box"><i class="fa fa-group fa-2x"></i></div>
<h3>开源</h3>
<p>实现不同版本的开源，有python, node.js, golang, C# 和 pure C。</p></li><li class="one-third column last"><div class="icon-box"><i class="fa fa-cloud fa-2x"></i></div>
<h3>开发简单</h3>
<p>简单的开发在 <a href="https://pypi.python.org/pypi/shadowsocks">pip</a>, <a href="https://npmjs.org/package/shadowsocks">npm</a>, <a href="https://aur.archlinux.org/packages/shadowsocks-libev/">aur</a>, <a href="http://www.freshports.org/net/shadowsocks-libev/">freshports</a> 和其他平台。</p></li></ul></div></div>
<div class="push"></div></div>
<footer><div class="container"><div class="sisteen columns"><span class="copyright">
<a href="https://github.com/shadowsocks">Shadowsocks</a>&nbsp;is released under the <a href="https://github.com/madeye/shadowsocks-libev/blob/master/LICENSE">GPLv3 license</a>&nbsp; or the <a href="https://github.com/clowwindy/shadowsocks/blob/master/LICENSE">MIT license</a>. Site by <a href="http://www.daige.cf">DaiGe International Network</a>.</span></div></div></footer><script async="" data-rocketsrc="./analytics.js" type="text/rocketscript"></script><script data-rocketsrc="./app.js" type="text/rocketscript"></script><script data-rocketsrc="./analytics(1).js" type="text/rocketscript"></script>
</body>
</html>