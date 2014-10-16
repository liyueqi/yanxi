<?php
header('Content-Type:text/html; charset=utf-8');
require('MysqlClient.class.php');
$mysql=new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');

//至于这个操作类有哪些方法，则请看MysqlClient.class.php的源码以及注释
$result=$mysql->gets('SELECT *  FROM aboutme');

echo $result;

$arr =  array();
$arr = json_encode($result);
echo $arr;




//如果有错误则输出错误信息
if($mysql->errno)echo $mysql->error_mess;

?>