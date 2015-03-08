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
            <blockquote>
			<ol type="I">
            <p><li><h3>OpenVPN:</h3><h4>现在一般大学内基本都有免费的<a href="http://zh.wikipedia.org/zh-hk/IPv6">IPv6</a>网络，但是<a href="http://zh.wikipedia.org/wiki/IPv4">IPv4</a>的网络连接往往是收费的（也就是所谓的“外网”）。本项目的目的是提供一个基于<a href="http://zh.wikipedia.org/zh-hk/IPv6">IPv6</a>的廉价、稳定、自由的网络连接，通过本项目提供的服务，您可以完美解决上述问题，节省上网费用，自由访问任意网站。</h4></li></p>
            <p><li>
              <h3>ShadowSocks</h3><h4>在大陆，由于<a href="http://zh.wikipedia.org/wiki/%E9%98%B2%E7%81%AB%E9%95%BF%E5%9F%8E">GFW</a>的封锁与干扰，很多的国外网站都无法正常的访问，除了Facebook、twitter、YouTube以外，还有大量的学术网站，而各种VPN正在被重点打击，越来越不稳定。本项目的目的是提供一个稳定、轻量、跨平台的代理方案，实现自由访问互联网。</h4></li></p>
            </ol></blockquote>
            <div class="alert alert-success" role="alert"><h4>我们拥有自己开发的专用客户端，功能丰富且实用，无论您是否熟悉网络配置，均可简便地通过我们提供的客户端使用服务。</h4></div>
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
            <p><li><h3>点击链接下载客户端：<br /><a href="./exe/setup.exe">VPN客户端</a></h3></li></p>
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
            <p><li><h3>IPv6下，主界面如图所示：<br /><img src="./openvpn-pic/jelly-7-1.png"></h3></li></p>
            <p><li><h3>VPN需要有效的证书才能进行连接，所以需要先导入证书，点击箭头所示处，选择从本站获取的证书文件(zip格式)，点击“添加”即可：<br /><img src="./openvpn-pic/jelly-9-1.png"><img src="./openvpn-pic/jelly-10-1.png"></h3></li></p>
            <p><li><h3>需要使用VPN时，在列表中选择有效证书，点击“连接”即可：<br /><img src="./openvpn-pic/jelly-7-1-1.png"></h3></li></p>
            <p><li><h3>出现如图所示窗口，显示连接过程详情，可以点击右上角将其关闭，可随时单击右下角图标显示该窗口，也可以点击“断开”以断开VPN连接：<br /><img src="./openvpn-pic/jelly-8-1.png"></h3></li></p>
            <p><li><h3>在使用VPN时，如果手机和其他设备同时需要上网，可以使用我们提供的Wi-Fi共享组件，点击“Wi-Fi共享”标签页，即可启动Wi-Fi共享组件：<br /><img src="./openvpn-pic/jelly-8-2.png"><img src="./openvpn-pic/jelly-9-2.png"></h3></li></p>
            <p><li><h3>点击“修改，输入自己喜欢的Wi-Fi名称和密码，再点击“应用”：<br /><img src="./openvpn-pic/jelly-10-2.png"><img src="./openvpn-pic/jelly-11-2.png"></h3></li></p>
            <p><li><h3>点击“开启热点”即可启动虚拟Wi-Fi，其他设备连接Wi-Fi以后会有显示：<br /><img src="./openvpn-pic/jelly-12-2.png"><img src="./openvpn-pic/jelly-13-2.png"></h3></li></p>
            <p><li>
              <h3>此时虽然有了Wi-Fi，但是是无法连接网络的，需要设置共享，单击“共享设置”，“共享服务来自于”选择本地连接2（或者其他名称，就是OpenVPN使用的那块虚拟网卡，具体可以在系统的“网络和共享中心”查看），wifi源选择“无线网络连接2”（或者其他名称，其实是创建的虚拟wifi的那个设备，，具体可以在系统的“网络和共享中心”查看），设置完点击开启共享，即可连接到网络：<br />
                <img src="./openvpn-pic/jelly-14-2.png"></h3></li></p>
            <hr>
            <p><li><h3>IPv4下主要用途为翻墙，在所有网络环境下均可正常使用，主界面如图所示：<br /><img src="./openvpn-pic/jelly-7-2.png"></h3></li></p>
            <p><li><h3>使用Shadowsocks代理不需要任何额外设置，保证网络畅通即可，点击“启动Shadowsocks代理”即可自动启动代理：<br /><img src="./openvpn-pic/jelly-15-2.png"></h3></li></p>
            <p><li><h3>鼠标悬停右下角图标，会有如图的显示，表示代理启动成功，若显示“未配置的服务器”，则启动失败，请关闭shadowsocks组件重新启动：<br /><img src="./openvpn-pic/jelly-16-2.png"></h3></li></p>
            <p><li><h3>右击右下角托盘图标，单击“启动系统代理”选项，即可在浏览器和其他程序访问任意网站：<br /><img src="./openvpn-pic/jelly-17-2.png"></h3></li></p>
            <p><li><h3>根据需要设置系统代理模式，如果所有网站都需要经过代理，请选择“全局模式”，优势：稳定、安全；若希望只有被墙网站走代理，国内网站直连，则选择“PAC模式”，优势：国内网站速度不会受到影响，可以观看国内的版权视频（优酷、土豆之类的）<br /><img src="./openvpn-pic/jelly-18-2.png"></h3></li></p>
            <p><li><h3>注意：退出ShadowSocks的时候，请务必取消“启用系统代理选项”，否则退出后浏览器将无法上网！<br /><img src="./openvpn-pic/jelly-17-2.png"></h3></li></p>
            <p><li><h3>如果有可以独立设置代理的其他程序需要通过代理使用网络，可以双击右下角图标，弹出的窗口中有相关参数：<br />协议：scoks5<br />IP:127.0.0.1<br />端口：1080<br /><img src="./openvpn-pic/jelly-20.png"></h3></li></p>
            
            
            
            
            
            </ol>
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
<p><span id="toc3-2"></span><h4>2、360<s>安全</s>浏览器(强烈不建议使用该浏览器，建议换用Chrome！<a href="./exe/chrome.exe">点此下载安装Chrome</a>)<div align="right"><a href="#"><img src="./openvpn-pic/top.jpg" width="76" height="18"/></a>
                </div></h4></p>
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

</ol></blockquote>

            
            
            </blockquote>
            </section>
            </article>
        
      </div>

<?php
include('footer.php');
?>
</body>
</html>