<?php
$IP = $_GET['ip'];
$port = $_GET['port'];
$passwd = $_GET['passwd'];
$method = $_GET['method'];
echo "\{\n
\"configs\" \: \[\n
  \{\n
\"server\" \: \"$IP\",\n
\"server_port\" \: $port\,\n
\"password\" \: \"$passwd\"\,\n
\"method\" \: \"$method\"\,\n
\"remarks\" \: \"\"\}\n\n
\]\,\n
\"index\" \: 0\,\n
\"global\" \: true\,\n
\"enabled\" \: \false\,\n
\"shareOverLan\" \: false\,\n
\"isDefault\" \: false\,\n
\"localPort\" \: 1080\}\n"

?>