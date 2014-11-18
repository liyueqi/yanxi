<?php
header('Content-Type:text/html; charset=utf-8');
$url = $_SERVER['HTTP_REFERER'];
setcookie("jellystatus","");
echo '<script>alert("已注销登录！");</script>';
header("location: $url");
?>
