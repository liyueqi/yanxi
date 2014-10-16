
<?php
header('Content-Type:text/html; charset=utf-8');
require('MysqlClient.class.php');
$cookie = $_COOKIE['yanxistatus'];
//echo $cookie;
$username = $_POST["username"];
$password = $_POST["password"];
$conn = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
$sql = "select * from admin where admin= '$username'";
$result = $conn->gets($sql);
$stdusername = $result[0]['admin'];
$stdpassword = $result[0]['passwd'];
$id =$result[0]['id'];
$group = $result[0]['groups'];
//echo $stdpassword;
//echo "\n".$sql;
//var_dump($result);

if(isset($username)&&isset($password))
{
    for($i=1;$i<=919;$i++)
    {
        $password = md5($password);
    }
    //echo $md5;
    $md5 = $password;
    if($stdusername == $username)
    {
        if($stdpassword == $md5)
        {
            $time = date('Y-m-d-H-i-s');
            $stamp = "wyllovedyjat".$time;
            $hash = md5($stamp);
            $arr = array();
            $arr['user'] = $username;
            $arr['group'] = $group;
            $arr['hash'] = $hash;
            $arr_str = serialize($arr);
            $sql = "update admin set cookie = '$hash' where id = '$id'";
            $update = $conn->gets($sql);//'/', '127.0.0.1',0,ture
            setcookie("yanxistatus",$arr_str,time()+3600,"/admin");
            header("location: index.php");


        }else{echo '<script>alert("密码错误！！");</script>';}
    }else{echo '<script>alert("用户名不存在！");</script>';}

}
else{}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="Css/style.css" />
    <script type="text/javascript" src="Js/jquery.js"></script>
    <script type="text/javascript" src="Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="Js/bootstrap.js"></script>
    <script type="text/javascript" src="Js/ckform.js"></script>
    <script type="text/javascript" src="Js/common.js"></script>

    <style type="text/css">
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
            if(document.myform.username.value==""){alert("请输入用户名！");return false;}
            else{
                if(document.myform.password.value==""){alert("请输入密码！");return false;}
                else{return true;}
            }
        }

    </script>
</head>
<body>
<form name="myform" class="form-inline definewidth m20" action="login.php" method="post" onsubmit="return check()">
  
    <table width="281" height="185" border="0">
      <tbody>
      
        <tr>
          <td height="47" colspan="3"  align="center"><strong>系统登录</strong></td>
        </tr>
        <tr>
          <td height="29"  align="right">用户名：</td>
          <td colspan="2" align="left"><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
          <td height="29"  align="right">密码：</td>
          <td colspan="2" align="left"><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
          <td width="53" height="53"  align="right"> </td>
          <td width="82" align="right"><button type="submit" class="btn btn-primary">登录</button>
          <td width="128" align="left"><button type="reset" class="btn btn-success" id="reset">重置</button></td><td width="0"></td>
        </tr>
      </tbody>
    </table>
  
   
</form>

</body>
</html>
