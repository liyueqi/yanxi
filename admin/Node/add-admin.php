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
            if(document.myform.name.value==""){alert("用户名不能为空.");return false;}else{
                if(document.myform.password.value==""){alert("密码不能为空.");return false;}else{
                    if(document.myform.group.value==""){alert("权限组不能为空.");return false;}else{}
                }
            }
        }
    </script>

<?php
require('MysqlClient.class.php');
$username = $arr['user'];
$conn = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
$sql = "select * from admin where admin= '$username'";
$result = $conn->gets($sql);
$hash = $result[0]['cookie'];
if($cookie != "")
{

    if($hash==$arr['hash']){if($arr['group'] == "root"){}else{if($arr['group'] == "sa"){}else{echo '<script>alert("您没有该项权限！");</script>';header("location: 401.php");}}}else{echo '<script>alert("您的会话已经过期，请重新登录！");</script>';header("location: login.php");}
}else{echo '<script>alert("您还没有登录，请登陆后操作！");</script>';header("location: login.php");}
?>
</head>
<body>
<form name="myform" class="form-inline definewidth m20" action="add-admin.php" method="post" onsubmit="return check();">

  <table width="315" border="0">
      
        <tr>
          <td width="309" height="138"><table width="100%" class="table table-bordered table-hover  m10">
            <tbody>
              <tr>
                <td width="70" class="tableleft" align="right">账号：</td>
                <td width="227"><input type="text" name="name" id="name">
                </td></tr><tr>
                <td width="70" class="tableleft" align="right">权限组：</td>
                <td width="227">
                <input name="group" type="radio" disabled="disabled" value = "root">root<br>
				<input type="radio" name="group" value = "sa">sa<br>
				<input type="radio" name="group" value = "admin">admin<br>
                <input type="radio" name="group" value = "standard">standard<br>
                
                  </td>
              </tr>
              <tr>
                <td class="tableleft" align="right">密码：</td>
                <td><input type="password" name="password" id="password"></td></tr>
              <tr><td align="right"></td>
                <td  align="center"><button type="submit" class="btn btn-small btn btn-primary">添加</button>&nbsp;<button type="reset" class="btn btn-small btn btn-success" id="reset">重置</button></td>
              </tr>
            
          </table></td>
        </tr>
        
      </tbody>
    </table>
</form>
<?php
    header('Content-Type:text/html; charset=utf-8');

    $name = $_POST["name"];
    $group = $_POST["group"];
    $rawpassword = $_POST["password"];
if(isset($name))
{
    for($i=1;$i<=919;$i++)
    {
        $rawpassword = md5($rawpassword);
    }
    $password = $rawpassword;
    $date = date('Y-m-d H:i:s',time());
    $add = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
    $sql = "select * from lasts where name= 3";
    $idraw = $add->gets($sql);
    //var_dump($idraw);
    $id = $idraw[0]['content'];
    $sql = "INSERT INTO admin (id,admin,passwd,groups,time) VALUES ( '$id','$name','$password','$group','$date')" ;
    $res = $add->gets($sql);
    $id = $id + 1;
    $sql = "update lasts set content = $id where name = 3";
    $update = $add->gets($sql);
    echo "添加成功！";
}else{}
$mysql = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
$sql = "SELECT *  FROM admin";
$result = $mysql->gets($sql);
$n = count ($result);

echo '<table class="table table-bordered table-hover definewidth m10">';
echo "<thead><tr>";
echo "<th>ID</th><th>管理员</th><th>权限组</th><th>注册时间</th></tr>";
for ($i = 0 ;$i < $n ;$i++ )
{
    $p = $i;
    echo "<tr><td>".$result[$p]['id']."</td><td>".$result[$p]['admin']."</td><td>".$result[$p]['groups']."</td><td>".$result[$p]['time']."</td></tr>";
}
echo "</table>";


?>
</body>
</html>
