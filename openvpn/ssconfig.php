<?php
$IP = $_GET['ip'];
$port = $_GET['port'];
$passwd = $_GET['passwd'];
$method = $_GET['method'];
$IP = "162.243.133.125";
$port = "80";
$passwd = "kaguya01";
$method = "aes-cfb-128";
echo "{\n
\"configs\" : [
  {\n
\"server\" : \"$IP\",
\"server_port\" : $port,
\"password\" : \"$passwd\",
\"method\" : \"$method\",
\"remarks\" : \"\"}\n
],
\"index\" : 0,
\"global\" : true,
\"enabled\" : false,
\"shareOverLan\" : false,
\"isDefault\" : false,
\"localPort\" : 1080}"

?>
