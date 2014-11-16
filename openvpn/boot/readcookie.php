<?php
$cookie =  $_COOKIE["jellystatus"];
$arr = unserialize($cookie);
echo $arr['name']."<br />".$arr['username']."<br />".$arr['hash'];

?>