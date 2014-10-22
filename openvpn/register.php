<?php
if(isset($_GET['sh'])){
$sh = $_GET['sh'];
$command = "bash /home/wwwroot/yanxi/openvpn/reg.sh $sh";
$result = system($command);
echo $result;
}
else{echo "just joking!";}


?>
