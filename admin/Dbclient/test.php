<?php
header('Content-Type:text/html; charset=utf-8');
require('MysqlClient.class.php');
$mysql=new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
$key = "SELECT *  FROM members";

$res = $mysql->gets($key);
echo $res[0]['content'];
echo $res;
var_dump($res);




?>