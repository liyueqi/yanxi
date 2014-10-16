<?php
header('Content-Type:text/html; charset=utf-8');
$url = $_SERVER['HTTP_REFERER'];
setcookie("yanxistatus");
echo '<script>alert("已注销登录！");</script>';
header("location: $url");
?>