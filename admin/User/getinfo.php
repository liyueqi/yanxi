<?php
header('Content-Type:text/html; charset=utf-8');
require('MysqlClient.class.php');
$id=$_GET['id'];
$mysql=new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
$key = "SELECT *  FROM members where id = '$id'";
$res = $mysql->gets($key);
$arr = array();
$arr = $res[0];
echo json_encode($arr);
?>