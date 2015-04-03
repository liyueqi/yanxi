<?php
require_once("./des.php");
$key = "e537bfa04fef8b9e6b29e66a61620ef6";
$Des = new Des();
$config = "{ \"configs\" : [ { \"server\" : \"162.243.133.125\", \"server_port\" : 84, \"password\" : \"kaguya\", \"method\" : \"aes-128-cfb\", \"remarks\" : \"\"} ], \"index\" : 0, \"global\" : true, \"enabled\" : false, \"shareOverLan\" : false, \"isDefault\" : false, \"localPort\" : 1080}";
$encode = $Des->encrypt($config,$key,true);
$decode = $Des->decrypt($encode,$key,true);

echo $config."|".$encode."|".$decode;
?>