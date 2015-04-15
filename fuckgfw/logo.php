<?php
$img= "https://kaguyablog.sinaapp.com/synapse-cdn/images/282f729c837fe16209eefe7e9eeecd7b.jpg";
echo "
<style>
.jumbotron{
	background:url($img); background-size:cover;
}
</style>
<div align='center' class=\"jumbotron\">

  <div class=\"container\">
    <h1>Synapse for Hasi</h1>

    <p class=\"lead\" ><h3>这是为蛤丝们提供的一个免费翻墙服务，本项目基于Shadowsocks,属于实验性项目。<br />服务器租用以及软件的后续开发维护的费用主要由热心蛤丝提供。<br />欢迎愿意提供帮助的蛤丝们按照自己的意愿给本项目捐款，来让这个项目更好的发展下去~<h3></p>
	<p class=\"masthead-button-links\">
	<form name=\"alipay_form\" style=\"padding-bottom: 0;border:none;\" method=\"post\" action=\"https://shenghuo.alipay.com/send/payment/fill.htm\" target=\"_blank\">
	    <input type=\"hidden\" value=\"1136358656@qq.com\" name=\"optEmail\">
	    <input type=\"hidden\" value=\"2.0\" name=\"payAmount\">
	    <input type=\"hidden\" name=\"title\" placeholder=\"付款说明\" value=\"Donations - Synapse for Hasi\">
	    <input type=\"hidden\" name=\"memo\" placeholder=\"付款说明\" value=\"Hasi!\">
	    <a class=\"button button-glow button-border button-rounded button-primary button-large\" href=\"https://kaguyablog.sinaapp.com/synapse-cdn/download/synapse.zip\" target=\"_blank\" role=\"button\">下载客户端(2015.04.05更新)</a>
	    <a class=\"button button-glow button-border button-rounded button-caution button-large\" href=\"javascript:javascript:document.alipay_form.submit();\" target=\"_blank\" role=\"button\">我来捐助</a>
    </form>
		</p>
  </div>
</div>";

?>