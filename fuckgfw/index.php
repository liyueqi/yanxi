<head>
<meta charset="utf-8">
<title>Shadowsocks����ȫ��Socks5����</title>
<meta name="keywords" content="ShadowSocks,ShadowSocks����,ShadowSocks�ٷ�վ,ShadowSocks�ʺ�,ShadowSocks�̳�">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Shadowsocks��һ������python��������socks����������������κ�ϵͳ�򵥵�ʵ�ַ��ʱ����ε���վ��">
<meta name="author" content="DaiGe International Network">
<script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"},atok:"c17fbea04f64a9440a66226487c09cff",petok:"1479a96fe9bae74a95956d8bcddf4483f70e52e1-1425738916-1800",zone:"shadowsocks.cn",rocket:"a",apps:{}}];document.write('<script type="text/javascript" src="//edge.yunjiasu.com/cdn-cgi/nexp/dok3v=919620257c/cloudflare.min.js"><'+'\/script>');}}catch(e){};
//]]>
</script>
<link rel="stylesheet" href="./app.css">
<link rel="shortcut icon" href="./favicon.ico">
<link rel="apple-touch-icon" href="./apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="./apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="./apple-touch-icon-114x114.png"><style type="text/css"></style>
<link href="./css" rel="stylesheet" type="text/css"><script type="text/rocketscript" data-rocketsrc="./spzjz.js"></script>
</head>
<body style="zoom: 1;"><div id="wrap" class="boxed">
<header>
<div class="container clearfix"><div class="eight columns"><div class="logo"><a href="./index.html">shadowsocks</a></div></div>
<div class="eight columns"><nav id="menu" class="navigation"><ul id="nav">
<li style="z-index: 100;"><a href="javascript:void" class="">����<img src="" class="downarrowclass" style="border:0;"></a>
<ul style="display: none; top: 87px; visibility: visible;"><li><a href="./clients.html">�ͻ���</a></li>
<li><a href="./servers.html">��������</a></li></ul></li>
<li style="z-index: 99;"><a href="javascript:void" class="">����<img src="" class="downarrowclass" style="border:0;"></a>
<ul style="display: none; top: 87px; visibility: visible;"><li><a href="./quick-guide.html">����ָ��</a></li>
<li><a href="./advanced.html">��ǿ����</a></li></ul></li>
<li style="z-index: 98;"><a href="javascript:void" class="">����<img src="" class="get" style="border:0;"></a>
<ul style="display: none; top: 87px; visibility: visible;"><li><a href="./get.html">��ȡ</a></li></ul></li><li style="z-index: 97;">
<a href="javascript:void">���İ�<img src="" class="downarrowclass" style="border:0;"></a><ul style="display: none; top: 87px; visibility: visible;"><li><a href="http://shadowsocks.org">English</a></li></ul></li></ul>
</nav></div>
<div class="sixteen columns"><hr></div></div>
</header>
<div class="container clearfix"><div id="welcome" class="sixteen columns"><div class="qoute"><div class="ten-and-half columns omega">
<h1>һ����ȫ��Socks5����,</h1>
<h1>Ϊ�������簲ȫ���ݻ�����</h1></div>
<div class="four-and-half columns alpha">
<a href="./clients.html" class="btn-download link">
<span><i class="fa fa-download fa-lg"></i>&nbsp; ���ϳ���!</span></a>
<a href="https://groups.google.com/forum/#!forum/shadowsocks" class="btn-support link">
<span><i class="fa fa-comments-o fa-lg"></i>&nbsp; ��ü���֧��</span></a></div></div></div></div><div class="container clearfix">
<div id="brand" class="sixteen columns bottoms"><blockquote class="large center">�������Ҫ����������˽��Ӱ��һ��������ѵ�ѡ��</blockquote></div></div>
<div class="container clearfix"><div class="our-services"><ul><li class="one-third column"><div class="icon-box"><i class="fa fa-bolt fa-2x"></i></div>
<h3>����Ѹ��</h3><p>�������Ƚ���I/O��Event-driven programming������</p></li>
<li class="one-third column"><div class="icon-box"><i class="fa fa-shield fa-2x"></i></div><h3>���ļ��ܷ�ʽ</h3><p>ȫ����������רҵ����ļ��ܣ�����ѡ��ͬ�ļ��ܷ�ʽ��</p></li><li class="one-third column"><div class="icon-box"><i class="fa fa-mobile fa-2x"></i></div>
<h3>�ƶ����</h3>
<p>�Ż��ƶ��豸���������磬����Ҫ�������ӡ�</p></li><li class="one-third column last"><div class="icon-box"><i class="fa fa-arrows-alt fa-2x"></i></div>
<h3>��ƽ̨֧��</h3>
<p>֧�ָ��ֵ�ƽ̨, including PC, MAC, �ƶ��豸 (Android and iOS) �� ·���� (OpenWRT)��</p></li>
<li class="one-third column last"><div class="icon-box"><i class="fa fa-group fa-2x"></i></div>
<h3>��Դ</h3>
<p>ʵ�ֲ�ͬ�汾�Ŀ�Դ����python, node.js, golang, C# �� pure C��</p></li><li class="one-third column last"><div class="icon-box"><i class="fa fa-cloud fa-2x"></i></div>
<h3>������</h3>
<p>�򵥵Ŀ����� <a href="https://pypi.python.org/pypi/shadowsocks">pip</a>, <a href="https://npmjs.org/package/shadowsocks">npm</a>, <a href="https://aur.archlinux.org/packages/shadowsocks-libev/">aur</a>, <a href="http://www.freshports.org/net/shadowsocks-libev/">freshports</a> ������ƽ̨��</p></li></ul></div></div>
<div class="push"></div></div>
<footer><div class="container"><div class="sisteen columns"><span class="copyright">
<a href="https://github.com/shadowsocks">Shadowsocks</a>&nbsp;is released under the <a href="https://github.com/madeye/shadowsocks-libev/blob/master/LICENSE">GPLv3 license</a>&nbsp; or the <a href="https://github.com/clowwindy/shadowsocks/blob/master/LICENSE">MIT license</a>. Site by <a href="http://www.daige.cf">DaiGe International Network</a>.</span></div></div></footer><script async="" data-rocketsrc="./analytics.js" type="text/rocketscript"></script><script data-rocketsrc="./app.js" type="text/rocketscript"></script><script data-rocketsrc="./analytics(1).js" type="text/rocketscript"></script>
</body>
</html>