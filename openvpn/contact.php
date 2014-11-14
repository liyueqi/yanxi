<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jelly VPN</title>
	 <link href="https://yanxihanfu.me/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="https://yanxihanfu.me/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://yanxihanfu.me/bootstrap/css/bootstrap-theme.min.css">
     <link href="https://yanxihanfu.me/bootstrap/css/site.min.css?v3" rel="stylesheet">
  	<script src="https://yanxihanfu.me/bootstrap/js/jquery.min.js"></script>
	<script src="https://yanxihanfu.me/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://yanxihanfu.me/bootstrap/js/site.min.js"></script>

	</head>
	<body class="post-template page">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Jelly VPN</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">主页</a></li>
              <li><a href="reg.php">注册</a></li>
              <li><a href="try.php">试用</a></li>
              <li><a href="#">联系我们</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    <header class="jumbotron subhead">
  <div class="container">
    <h1>Jelly VPN</h1>
    <p class="lead">一个基于IPv6的openVPN代理</p>
  </div>
</header>

  <div class="col-md-3 ">
        <div id="toc" class="bc-sidebar"><ul class="nav"><li class="toc-h2 toc-active"><a href="#toc0">项目说明</a></li><li class="toc-h2"><a href="#toc1">费用说明</a></li>
        <li class="toc-h2"><a href="#toc2">VPN使用教程</a></li>
        <li class="toc-h2"><a href="#toc3">UnBlock Youku 使用教程</a></li>
    <li class="toc-h2"><a href="#toc4">参与人员</a></li></ul></div>
      

	  </div>
  <div class="col-md-9">
        <article class="post page">
        	<section class="post-content">
                <span id="toc0"></span><h2 id="">项目说明<div align="right"><a href="#"><img src="./openvpn-pic/top.jpg" width="76" height="18"/></a>
                </div></h2>
                
              <p><h3>基本介绍</h3></p>
<p><h4>现在一般大学内基本都有免费的<a href="http://zh.wikipedia.org/zh-hk/IPv6">IPv6</a>网络，但是<a href="http://zh.wikipedia.org/wiki/IPv4">IPv4</a>的网络连接往往是收费的（也就是所谓的“外网”）。<br />同时，由于<a href="http://zh.wikipedia.org/wiki/%E9%98%B2%E7%81%AB%E9%95%BF%E5%9F%8E">GFW</a>的封锁与干扰，很多的国外网站都无法正常的访问，除了Facebook、twitter、YouTube以外，还有大量的学术性网站。</h4></p>
<p><h4>本项目的目的即是提供一个基于<a href="http://zh.wikipedia.org/zh-hk/IPv6">IPv6</a>的廉价、稳定、自由的网络连接，通过本项目提供的服务，您可以完美解决上述问题，实现节省上网费用，自由访问任意网站的目的。</h4></p>
<p><h3>项目概况</h3></p>
<p><h4>现阶段，本项目刚刚起步，服务器位于纽约，通过<a href="http://zh.wikipedia.org/zh-hk/IPv6">IPv6</a>线路到国内。<br /></h4></p>
<image ><img src="./openvpn-pic/pic-0.jpg" width="70%" height="70%"/>
<br /> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;openvpn原理图
<p><h4>项目发展一段时间后，将视情况陆续增加服务器以进一步提升服务质量。<br />由于在IPv4情况下严格的网络审查以及openvpn流量极易被识别等因素，<strong>暂时不对IPv4开放服务。</strong><br />近期将会附带相对安全便利的Shaddowsocks和Goagent Paas代理以满足用户在IPv4网络下的需要。</h4></p>
<p><h4>如果项目发展良好，将来会增加国内服务器以提高国内网站的使用体验。</h4></p>
<p><h3>本项目支持试用，请按照相关说明操作或者联系相关人员。<br /><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1136358656&amp;Site=JellyVPN&amp;Menu=yes"><img src="./openvpn-pic/qq.gif" vspace="4" border="0" align="absmiddle" title=""></a></h3></p>
<span id="toc1"></span>
<h2 id="bootstrap">费用说明<div align="right"><a href="#"><img src="./openvpn-pic/top.jpg" width="76" height="18"/></a>
                </div></h2>
<p><h4>VPN的当前价格为￥10.00/月，其中包含：</h4></p>
<blockquote>
<h4>
<p>IPv6下有效的VPN使用权</p>
<p>IPv4下有效的shadowsocks和Goagent PaaS使用权</p>
</h4>
<div class="alert alert-danger" role="alert">注意：本项目提供的openVPN账号仅在IPv6环境下有效，在IPv4环境下无效！(shadowsocks和Goagent PaaS不受影响)请在购买前仔细确认，恕不接受由于无IPv6而提出的退款要求！谢谢合作！</div>
</blockquote>
<p><h4>免费试用</h4></p>
<blockquote>
<h4>
<p>用于免费试用的VPN配置文件有效期为48小时，逾期自动作废</p>
<p>仅包含IPv6下有效的VPN使用权，无IPv4下shadowsocks和Goagent PaaS使用权</p>
<p>对于复旦大学学生，可以直接在试用界面输入自己的姓名和学号获取试用资格</p>
<p>对于非复旦大学学生，可以与相关人员联系以获取试用资格</p>
</h4>
</blockquote>



<span id="toc2"></span><h2 id="bootstrap">使用教程<div align="right"><a href="#"><img src="./openvpn-pic/top.jpg" width="76" height="18"/></a>
                </div></h2>
<p><h3>（仅限windows，相信Linux党不需要这个）</h3></p>
<p><h4>1、软件安装</h4></p>
<blockquote>
<ol type="I">
<li><p><h4>根据自己系统下载相应的openvpn软件：</h4></p>
<blockquote>
<p><h4>64位Windows系统：<br /><a href="./exe/openvpn-2.3.4-x64.exe">OpenVPN-2.3.4 X64</a><br /><a href="./exe/openvpn-2.3.5-x64.exe">OpenVPN-2.3.5 X64</a></h4></p>
<p><h4>32位Windows系统：<br /><a href="./exe/openvpn-2.3.4-x86.exe">OpenVPN-2.3.4 X86</a><br /><a href="./exe/openvpn-2.3.5-x86.exe">OpenVPN-2.3.5 X86</a></h4></p>
</blockquote>
</li>
<li>
<p><h4>右键点击下载得到的安装程序，点击“以管理员身份运行”</h4><img src="./openvpn-pic/pic-1.PNG"></p>
</li>
<p>
<li><p><h4>在welcome界面下点击“next”继续。</h4><img src="./openvpn-pic/pic-2.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>在用户协议界面点击“I Agree”，进入下一步。</h4><img src="./openvpn-pic/pic-3.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>选择组件界面，直接点击“Next”，进入下一步。</h4><img src="./openvpn-pic/pic-4.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>选择您想要安装到的文件夹，一般保持默认即可，牢记该安装目录，之后的配置过程中会用到，点击“Next”，进入下一步。</h4><img src="./openvpn-pic/pic-5.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>进入安装过程，请耐心等待，不要进行任何其他操作。</h4><img src="./openvpn-pic/pic-6.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>如果系统弹出类似下图的提示“您想安装这个软件设备吗”，请勾选“始终信任”并点击“安装”</h4><img src="./openvpn-pic/pic-7.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>安装完成后，直接点击“Next”，进入下一步。</h4><img src="./openvpn-pic/pic-8.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>在完成后，取消“start OpenVPN”和“Show Readme”，直接点击“Next”，进入下一步。</h4><img src="./openvpn-pic/pic-9.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>根据刚才记下的安装目录，找到openvpn文件夹。</h4><img src="./openvpn-pic/pic-10.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>进入openvpn文件夹，找到config文件夹。</h4><img src="./openvpn-pic/pic-11.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>进入config文件夹，里面除了一个自述文档，什么也没有。</h4><img src="./openvpn-pic/pic-12.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>在本网站根据相关提示下载openVPN证书文件，压缩包打开如下：</h4><img src="./openvpn-pic/pic-13.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>将压缩文件中的五个文件全部解压到config文件夹中，如图所示。</h4><img src="./openvpn-pic/pic-14.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>找到openvpn的桌面快捷方式，右键以管理员身份运行。</h4><img src="./openvpn-pic/pic-15.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>在弹出的“用户账户控制”对话框中，单击“是”启动openvpn。</h4><img src="./openvpn-pic/pic-16.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>找到任务栏右下角托盘区的openvpn图标。</h4><img src="./openvpn-pic/pic-17.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>右击小图标，在弹出的菜单中单击“connect”。</h4><img src="./openvpn-pic/pic-18.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>openvpn将自动连接服务器，请耐心等待。</h4><img src="./openvpn-pic/pic-19.PNG"></p>
</li>
</p>
<p>
<li>
<p><h4>待上一步出现的窗口自动消失，托盘区显示“**** is now connected”字样的气泡，同时图标变绿时，即为成功建立openvpn连接。</h4><img src="./openvpn-pic/pic-20.PNG"></p>
</li>
<p>
<li>
<p><h4>尽情享受廉价且自由的互联网吧！</h4></p>
</li>
</p>
</p>
</ol>
</blockquote>

<span id="toc3"></span><h2 id="bootstrap">UnBlock Youku使用教程<div align="right"><a href="#"><img src="./openvpn-pic/top.jpg" width="76" height="18"/></a>
                </div></h2>
                <blockquote>
                <h4><a href="#toc3-1">Chrome浏览器</a>|<a href="#toc3-2">360<s>安全</s>浏览器</a></h4>
                </blockquote>
<span id="toc3-1"></span><h4>1、Chrome</h4>
<blockquote>
<ol type="I">
<li><h4>直接访问土豆、优酷等国内视频网站，提示无法播放</h4><br /><img src="./openvpn-pic/pic-27.PNG"></li>
<li>
<h4>下载 UnBlock Youku 插件</h4>
<blockquote>
<h4><a href="./crx/Unblock-Youku.crx">Unblock-Youku.crx</a></h4>
</blockquote>
</li>
<li>
<h4>打开Chrome浏览器，单击右上角菜单图标，在菜单中点击“设置”<br /><img src="./openvpn-pic/pic-21.PNG">
</h4></li>
<li><h4>在设置界面的左半部分选择“扩展程序”</h4><img src="./openvpn-pic/pic-22.PNG"></li>
<li><h4>把下载的crx插件拖动到窗口内进行安装</h4><img src="./openvpn-pic/pic-23.PNG" width="80%"></li>
<li><h4>在插件列表内启用UnBlock Youku 插件</h4><img src="./openvpn-pic/pic-24.PNG" wideth="80%">
</li>
<li><h4>关闭设置界面，点击浏览器右上角新出现的UnBlock Youku 插件小图标</h4>
  <img src="./openvpn-pic/pic-25.PNG"></li>
<li><h4>在弹出的菜单内选择“普通模式”</h4><img src="./openvpn-pic/pic-26.PNG" wideth="80%"></li>
<li><h4>再次进入土豆或者优酷播放视频，可以正常播放。</h4><img src="./openvpn-pic/pic-34.PNG" wideth="80%"></li>
</ol>
</blockquote>
<p><span id="toc3-1"></span><h4>2、360<s>安全</s>浏览器(强烈不建议使用该浏览器，建议换用Chrome！<a href="">点此下载安装Chrome</a>)</h4></p>
<blockquote>
<ol type="I">
<li>
<h4>下载 UnBlock Youku 插件</h4>
<blockquote>
<h4><a href="./crx/Unblock-Youku.crx">Unblock-Youku.crx</a></h4>
</blockquote>
</li>
<li><h4>点击右上角菜单栏“工具”->“选项”</h4><img src="./openvpn-pic/pic-29.PNG" wideth="80%"></li>
<li><h4>进入“选项界面”</h4><img src="./openvpn-pic/pic-30.PNG" wideth="80%"></li>
<li><h4>把下载的crx插件拖到窗口内，在弹出的确认窗口中点击“添加”以安装插件</h4><img src="./openvpn-pic/pic-31.PNG" wideth="80%"></li>
<li><h4>点击在右上角新出现的插件小图标，选择“普通模式”，打开土豆、优酷等网站，视频可以正常播放</h4><img src="./openvpn-pic/pic-28.PNG" wideth="80%"></li>

</ol>
</ol></blockquote>
<span id="toc4"></span><h2 id="">参与人员<div align="right"><a href="#"><img src="./openvpn-pic/top.jpg" width="76" height="18"/></a>
                </div></h2>

<p>Kaguya</p>
<blockquote>
<p>QQ:1136358656</p>
<p>E-mail:wangyanleibbdd@gmail.com</p>
</blockquote>
<p>Xiao</p>
<blockquote>
<p>QQ:1471520536</p>
<p>E-mail:JerryTansWork@hotmail.com</p>
<p><div align="right"><a href="#"><img src="./openvpn-pic/top.jpg" width="76" height="18"/></a>
                </div></p>
</blockquote>



            </section>
        </article>
        
      </div>
   
    
   
<hr>
<div align="center">Powered By Kaguya & Xiao<br /><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1253526699'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s23.cnzz.com/z_stat.php%3Fid%3D1253526699%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></div> 
	</body>
	
	</html>

