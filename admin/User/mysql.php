<?php
$cookie =  $_COOKIE["yanxistatus"];
$arr = unserialize($cookie);
?>
<!DOCTYPE html>
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
<script src="../Node/jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
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

    if($hash==$arr['hash']){if($arr['group'] == "root"){}else{echo '<script>alert("您没有该项权限！");</script>';header("location: ../Node/401.php");}}else{echo '<script>alert("您的会话已经过期，请重新登录！");</script>';header("location: login.php");}
}else{echo '<script>alert("您还没有登录，请登陆后操作！");</script>';header("location: login.php");}
?>
<body>
<form name="myform" class="form-inline definewidth m20" action="mysql.php" method="post">

  <table width="365" border="0">
      
        <tr>
<td width="359" height="154"><label for="textarea">SQL命令:</label>
  <textarea class="comments" name="textarea" rows="8" id="textarea"></textarea>
</td>
        </tr>
        <tr>
        <td align="center"><button type="submit" class="btn btn-small btn btn-primary">执行</button>&nbsp;<button type="reset" class="btn btn-small btn btn-success" id="reset">重置</button></td>
    </tr>
  </table>
        </form>

</body>
<?php
if(isset($_POST['textarea']))
{
    $sql = $_POST['textarea'];
    $result = $conn->gets($sql);
    echo "结果:<br>";
    var_dump($result);
}
else
{

}
?>
</html>