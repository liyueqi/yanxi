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
<script>
        function check()
        {
            if(document.myform.version.value==""){alert("版本号不能为空.");return false;}else{
                if(document.myform.author.value==""){alert("作者不能为空.");return false;}else{
                    if(document.myform.description.value==""){alert("简介不能为空.");return false;}else{
                        return true;
                    }
                }
            }
        }
    </script>


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
header('Content-type: text/html;charset=UTF-8');
require('MysqlClient.class.php');
$username = $arr['user'];
$conn = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
$sql = "select * from admin where admin= '$username'";
$result = $conn->gets($sql);
$hash = $result[0]['cookie'];
if($cookie != "")
{

    if($hash==$arr['hash'])
    {
        if($arr['group']=="root")
        {}else{
            echo '<script>alert("你没有这项权限！");</script>';header("location: 401.php");
        }
    }else{
        echo '<script>alert("您的会话已经过期，请重新登录！");</script>';header("location: ../login.php");
    }
}else{
    echo '<script>alert("您还没有登录，请登陆后操作！");</script>';header("location: ../login.php");
}

?>
<body>
<form class="form-inline definewidth m20" name="myform" method="post"  action="version.php" onSubmit="return check();">
  
    <table width="364" border="0">
      <tbody>
        <tr>
          <td width="304"><table width="100%" height="57" border="0" class="table table-bordered table-hover  m10">
      <tbody>
      <tr>
        <td align="right" valign="middle" class="tableleft">版本号:</td>
        <td colspan="2"><input type="text" name="version" id="version"></td>
      </tr>
      <tr>
      <td align="right" valign="middle" class="tableleft">作者:
      
      </td>
      <td colspan="2"><input name="author" type="text" id="author" value="王焱磊-13通信">
      </td>
      </tr>
        <tr>
          <td height="53"  align="right" valign="middle" class="tableleft">简介:</td>
          <td colspan="2" align="left"><textarea class="comments" rows=12 name=description cols=27 onpropertychange= "this.style.posHeight=this.scrollHeight "></textarea></td>
        </tr>
        <tr>
          <td width="61" height="53"  align="right" valign="middle">&nbsp; </td>
          <td width="26" align="right"></td>
          <td width="202" align="left"><button type="submit" class="btn btn-primary">提交</button>&nbsp;<button type="reset" class="btn btn-success" id="reset">重置</button></td>
        </tr>
      </tbody>
    </table></td>
          <td width="50">&nbsp;</td>
        </tr>
      </tbody>
    </table>
    
  
   
</form>
<?php
$version = $_POST['version'];
$author = $_POST['author'];
$description = $_POST['description'];
//echo $version."<br>";
//echo $discription;
if(isset($_POST['version']))
{
    $nowtime = date('Y-m-d H:i:s',time());
    $mysql = "update version set version='$version', author='$author',introduction='$description',time='$nowtime' where id='1'";
    $result = $conn->query($mysql);
    $mysql = "select * from lasts where name=5";
    $result = $conn->gets($mysql);
   // var_dump($result);
    $id = $result[0]['content'];
    //echo $id;
    $mysql = "insert into updatehistory (id,version,time,introduction,copyright,author) values ('$id','$version','$nowtime','$description','Apache License Version 2.0','$author')";
    $result = $conn->gets($mysql);
    $id = $id + 1;
    $mysql = "update lasts set content='$id' where name=5";
    $result = $conn->gets($mysql);
    echo '<script>alert("版本信息更新成功！");</script>';
    //echo "null";
}else{//echo "post";
}
//echo "test";
?>
</body>




</html>
