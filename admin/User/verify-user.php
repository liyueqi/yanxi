<?php
header('Content-Type:text/html; charset=utf-8');
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
    <script>
        function check()
        {
            if(document.myform.name.value==""){alert("用户名不能为空.");return false;}else{
                if(document.myform.sex.value==""){alert("性别不能为空.");return false;}else{
                    if(document.myform.number.value==""){alert("学号不能为空.");return false;}else{
                        if(document.myform.phone.value==""){alert("电话不能为空.");return false;}else{return true;}
                    }
                }
            }
        }


        function showHint(str)
        {

            var xmlhttp;
            var a1;


            if (str.length==0)
            {
                a1="";

                return;
            }
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    a1 =xmlhttp.responseText;
                    var a2=eval('('+a1+')');
                    document.getElementById("name").value=a2.name;
                    document.getElementById("number").value=a2.number;
                    document.getElementById("college").value=a2.college;
                    document.getElementById("sex").value=a2.sex;
                    document.getElementById("mail").value=a2.mail;
                    document.getElementById("phone").value=a2.phone;
                    document.getElementById("openid").value=a2.openid;
                }
            }

            xmlhttp.open("GET","getverify.php?id="+str,true);

            xmlhttp.send();


        }
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
<form name="myform" class="form-inline definewidth m20" action="verify-user.php" method="post" onsubmit="return check();">

  <table width="327" border="0">
      
        <tr>
          <td width="321" height="138"><table class="table table-bordered table-hover definewidth m10">
            <tbody>

              <tr>
                <td width="60" class="tableleft" align="right">ID：</td>
                <td width="465"><input type="text" name="id" id="id" onkeyup="showHint(this.value)"></td>
              </tr>
              <tr>
                <td width="60" class="tableleft" align="right">姓名：</td>
                <td width="465"><input type="text" name="name" id="name"></td></tr><tr>
                <td width="60" class="tableleft" align="right">学号：</td>
                <td width="465"><input type="text" name="number" id="number"></td>
              </tr>
              <tr>
                <td class="tableleft" align="right">院系：</td>
                <td><input type="text" name="college" id="college"></td></tr><tr>
                <td class="tableleft" align="right">性别：</td>
                <td><input type="text" name="sex" id="sex"></td>
              </tr>
              <tr>
                <td class="tableleft" align="right">邮箱：</td>
                <td><input type="text" name="mail" id="mail"></td></tr><tr>
                <td class="tableleft" align="right">电话：</td>
                <td><input type="text" name="phone" id="phone"></td>
              </tr>
              <tr>
                <td class="tableleft" align="right">openid：</td>
                <td><input name="openid" type="text" id="openid"></td></tr><tr><td align="right"></td>
                <td  align="center"><button type="submit" class="btn btn-small btn btn-primary">提交</button>&nbsp;<button type="reset" class="btn btn-small btn btn-success" id="reset">重置</button></td>
              </tr>
          </table></td>
        </tr>
      </tbody>
    </table>
</form>
<?php

//require('MysqlClient.class.php');
$verifyid = $_POST["id"];
$name = $_POST["name"];
$number = $_POST["number"];
$college = $_POST["college"];
$sex = $_POST["sex"];
$mail = $_POST["mail"];
$phone = $_POST["phone"];
$openid = $_POST["openid"];
if(isset($name))
{
    $date = date('Y-m-d H:i:s',time());
    $add = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
    $sql = "select * from lasts where name= 1";
    $idraw = $add->gets($sql);
    //var_dump($idraw);
    $id = $idraw[0]['content'];
    $sql = "INSERT INTO members (id, number,name, sex,mail,college,phone,boolfudan,boolfetion,time,openid) VALUES ( '$id', '$number','$name', '$sex','$mail','$college','$phone','1','0','$date','$openid')" ;
    $res = $add->gets($sql);
    $id = $id + 1;

    $sql = "update lasts set content = $id where name = 1";
    $update = $add->gets($sql);
	$sql = "update preuser set status='已通过' where id = $verifyid";
    echo $verifyid;
    $update = $add->gets($sql);
    echo '<script>alert("操作成功！");</script>';
}else{}

$mysql = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
$sql = "SELECT *  FROM preuser where status='未处理'";
$result = $mysql->gets($sql);
$n = count ($result);

echo '<table class="table table-bordered table-hover definewidth m10">';
echo "<tr><thead>";
echo "<th>ID</th><th>姓名</th><th>性别</th><th>学号</th><th>邮箱</th><th>院系</th><th>联系电话</th><th>备注</th><th>openid</th><th>申请时间</th><th>状态</th></tr></thead>";
for ($i = 0 ;$i < $n ;$i++ )
{
    $p = $i;
    echo "<tr><td>".$result[$p]['id']."</td><td>".$result[$p]['name']."</td><td>".$result[$p]['sex']."</td><td>".$result[$p]['number']."</td><td>".$result[$p]['mail']."</td><td>".$result[$p]['college']."</td><td>".$result[$p]['phone']."</td><td>".$result[$p]['description']."</td><td>".$result[$p]['openid']."</td><td>".$result[$p]['time']."</td><td>".$result[$p]['status']."</td></tr>";
}

$sql = "SELECT *  FROM preuser where status='已通过'";
$result = $mysql->gets($sql);
$n = count ($result);
for ($i = 0 ;$i < $n ;$i++ )

    
    $p = $i;
    echo "<tr><td>".$result[$p]['id']."</td><td>".$result[$p]['name']."</td><td>".$result[$p]['sex']."</td><td>".$result[$p]['number']."</td><td>".$result[$p]['mail']."</td><td>".$result[$p]['college']."</td><td>".$result[$p]['phone']."</td><td>".$result[$p]['description']."</td><td>".$result[$p]['openid']."</td><td>".$result[$p]['time']."</td><td>".$result[$p]['status']."</td></tr>";
}



echo "</table>";

?>


</body>
</html>
