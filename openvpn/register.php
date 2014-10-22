<?php
if(isset($_GET['sh'])){
$sh = $_GET['sh'];
$command = "bash /home/wwwroot/yanxi/openvpn/reg.sh $sh";
$result = system($command);
echo $result;
echo "\n";
$url = "<a href='http://yanxihanfu.me/openvpn/$sh.zip'>点击此处下载配置文件包</a>";
echo "<html><body>".$url."</body></html>";
}
else{echo "just joking!";}


?>
