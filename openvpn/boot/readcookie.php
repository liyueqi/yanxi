<?php
$cookie =  $_COOKIE["yanxistatus"];
$arr = unserialize($cookie);
echo $arr['name']."<br />".$arr['username']."<br />".$arr['hash'];

?>