<!DOCTYPE html>
<html>
<?php
include('header.php');
?>
<body>
<div class="col-md-3 ">
        <div id="toc" class="bc-sidebar"><ul class="nav">
        <li class="toc-h2 toc-active"><a href="#toc0">项目说明</a></li>
        <li class="toc-h2"><a href="#toc1">费用说明</a></li>
        <li class="toc-h2"><a href="#toc2">使用教程</a></li>
        <li class="toc-h2"><a href="#toc3">UnBlock Youku 使用教程</a></li>
    <li class="toc-h2"><a href="#toc4">FAQ</a></li></ul></div>
	  </div>
<div class="col-md-9">
        <article class="post page">
        	<section class="post-content">
            <span id="toc0"></span><h2 id="">项目说明<div align="right"><a href="#"><img src="./openvpn-pic/top.jpg" width="76" height="18"/></a>
                </div></h2>
            <p><h3>基本介绍</h3></p>
            <p><h4>现在一般大学内基本都有免费的<a href="http://zh.wikipedia.org/zh-hk/IPv6">IPv6</a>网络，但是<a href="http://zh.wikipedia.org/wiki/IPv4">IPv4</a>的网络连接往往是收费的（也就是所谓的“外网”）。本项目的目的是提供一个基于<a href="http://zh.wikipedia.org/zh-hk/IPv6">IPv6</a>的廉价、稳定、自由的网络连接，通过本项目提供的服务，您可以完美解决上述问题，节省上网费用，自由访问任意网站。</h4></p>
            <p><h4>我们拥有自己开发的专用客户端，功能丰富且实用，无论您是否熟悉网络配置，均可简便地通过我们提供的客户端使用服务。</h4></p>
            <span id="toc1"></span><h2 id="">费用说明<div align="right"><a href="#"><img src="./openvpn-pic/top.jpg" width="76" height="18"/></a>
                </div></h2>
                <p><h4>VPN的当前价格为￥10.00/月，其中包含：</h4></p>
<blockquote>
<h4>
<p>IPv6下有效的VPN使用权</p>
<p>IPv4下有效的shadowsocks和Goagent PaaS使用权</p>
</h4>
<div class="alert alert-danger" role="alert">注意：本项目提供的OpenVPN账号仅在IPv6环境下有效，在IPv4环境下无效！(shadowsocks和Goagent PaaS不受影响)请在购买前仔细确认，恕不接受由于无IPv6而提出的退款要求！谢谢合作！</div>
</blockquote>
<p><h4>免费试用</h4></p>
<blockquote>
<h4>
<p>用于免费试用的VPN配置文件有效期为48小时，逾期自动作废</p>
<p>包含IPv6下有效的VPN使用权和IPv4下Shadowsocks使用权</p>

</h4>
</blockquote>
      <span id="toc2"></span><h2 id="">使用教程<div align="right"><a href="#"><img src="./openvpn-pic/top.jpg" width="76" height="18"/></a></div></h2>
            <div class="alert alert-info" role="alert"><h3>我们提供的代理服务都可以通过我们的专用客户端实现，所以本教程为专用客户端的使用教程。</h3></div>
            <p><h3>1、软件安装</h3></p>
            <blockquote>
			<ol type="I">
            <p><li><h3>点击链接下载客户端：<br /><a href="./exe/install.exe">VPN客户端</a></h3></li></p>
            <p><li><h4>双击运行下载完成的安装程序</h4></li></p>
            <p><li><h4>点击“我同意”进入下一步：</h4><br><img src="./openvpn-pic/jelly-1.png"></li></p>
            <p><li><h4>点击“确定”进入下一步以安装OpenVPN程序：</h4><br><img src="./openvpn-pic/jelly-2.png"></li></p>
            <p><li><h4>点击“Next”进入下一步：</h4><br><img src="./openvpn-pic/pic-2.PNG"></li></p>
            <p><li><h4>在用户协议界面点击“I Agree”，进入下一步。</h4><img src="./openvpn-pic/pic-3.PNG"></li></p>
			<p><li><h4>选择组件界面，直接点击“Next”，进入下一步。</h4><img src="./openvpn-pic/pic-4.PNG"></li></p>
            <p><li><h4>选择您想要安装到的文件夹，一般保持默认即可,点击“Next”，进入下一步。</h4><img src="./openvpn-pic/pic-5.PNG"></li></p>
            <p><li><h4>进入安装过程，请耐心等待，不要进行任何其他操作。</h4><img src="./openvpn-pic/pic-6.PNG"></li></p>
            <p><li><h4>如果系统弹出类似下图的提示“您想安装这个软件设备吗”，请勾选“始终信任”并点击“安装”</h4><img src="./openvpn-pic/pic-7.PNG"></li></p>
            <p><li><h4>安装完成后，直接点击“Next”，进入下一步。</h4><img src="./openvpn-pic/pic-8.PNG"></li></p>
            <p><li><h4>在完成后，取消“start OpenVPN”和“Show Readme”，直接点击“Next”，进入下一步。</h4><img src="./openvpn-pic/pic-9.PNG"></li></p>
            <p><li><h4>在安装其他组件界面，点击“确定”，安装其他必备组件。</h4><img src="./openvpn-pic/jelly-3.png"></li></p>
            <p><li><h4>在完成界面，点击“完成”，完成安装。</h4><img src="./openvpn-pic/jelly-4.png"></li></p>
            </ol>
            </blockquote>
            <p><h3>2、软件使用</h3></p>
            <blockquote>
            <ol type="I">
            <p><li><h3>双击桌面图标启动客户端程序：<br /><img src="./openvpn-pic/jelly-5.png"></h3></li></p>
            <p><li><h3>根据自身网络环境选择IPv6（内网）/IPv4（外网）：<br /><img src="./openvpn-pic/jelly-6.png"></h3></li></p>
            </ol>
            </blockquote>
            </section>
            </article>
        
      </div>

<?php
include('footer.php');
?>
</body>
</html>