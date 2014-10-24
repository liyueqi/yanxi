<?php
if(isset($_GET['sh'])){
$sh = $_GET['sh'];
$command = "bash /home/wwwroot/yanxi/openvpn/reg.sh $sh";
$result = shell_exec($command);
//echo $result;
echo "<br>";
$url = "<a href='http://yanxihanfu.me/openvpn/$sh.zip'>Click here to download the keys!</a>";
echo "<html><body>".$url."</body></html>";
}
else{echo "just joking!";}


?>
