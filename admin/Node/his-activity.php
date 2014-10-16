<!DOCTYPE html>
<?php
$cookie =  $_COOKIE["yanxistatus"];
$arr = unserialize($cookie);
?>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>

    <style type="text/css">
	
		.comments { 
width:100%;/*自动适应父布局宽度*/ 
overflow:auto; 
word-break:break-all; 
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
    <script>

    </script>
</head>
<?php
require('MysqlClient.class.php');
$username = $arr['user'];
$conn = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
$sql = "select * from admin where admin= '$username'";
$result = $conn->gets($sql);
$hash = $result[0]['cookie'];
if($cookie != "")
{

    if($hash==$arr['hash']){}else{echo '<script>alert("您的会话已经过期，请重新登录！");</script>';header("location: login.php");}
}else{echo '<script>alert("您还没有登录，请登陆后操作！");</script>';header("location: login.php");}
?>
<body>
<?php
$action =$_GET['action'];
$id =$_GET['id'];
//echo $action;
switch($action)
{
    case "delete":
        $file[0] = "images/".$id."-0.jpg";
        $file[1] = "images/".$id."-1.jpg";
        $file[2] = "images/".$id."-2.jpg";
        $sql = "delete from activity where id='$id'";
        $result = $conn->gets($sql);
        $result = @unlink ($file[0]);
        $result = @unlink ($file[1]);
        $result = @unlink ($file[2]);
        break;

    default:

}

header('Content-Type:text/html; charset=utf-8');
    $sql = "select * from activity";
    $result = $conn->gets($sql);
//var_dump($result);
    $n = count ($result);
    echo '<table class="table table-bordered table-hover definewidth m10">';
    echo "<thead><tr>";
    if($arr['group']=='sa' || $arr['group']=='root')
{
    echo '<th align="center">活动ID</th><th align="center">活动名称</th><th align="center">活动时间</th><th align="center">活动简介</th><th >操作</th></tr>';
    for ($i = 0 ;$i < $n ;$i++ )
    {
        $p = $i;
        $x = $result[$p]['id'];
        echo "<tr><td>".$result[$p]['id']."</td><td>".$result[$p]['name']."</td><td>".$result[$p]['activitydate']."</td><td>".$result[$p]['content']."</td><td> <a href='his-activity.php?action=delete&id=$x'>删除</a> </td></tr>";
    }
    echo "</table>";
}else
{
    echo "<th>活动ID</th><th>活动名称</th><th>活动时间</th><th>活动简介</th><th>操作</th></tr>";
    for ($i = 0 ;$i < $n ;$i++ )
    {
        $p = $i;
        echo "<tr><td>".$result[$p]['id']."</td><td>".$result[$p]['name']."</td><td>".$result[$p]['activitydate']."</td><td>".$result[$p]['content']."</td></tr>";
    }
    echo "</table>";
}
?>

</body>
</html>
