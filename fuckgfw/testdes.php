<?php
require_once("./des.php");
$key = "e537bfa04fef8b9e6b29e66a61620ef6";
$Des = new Des();
$config = "qwertyuiopasdfghjkl";
$encode = $Des->encrypt($config,$key,true);
$decode = $Des->decrypt($encode,$key,true);

echo $config."|".$encode."|".$decode;
?>