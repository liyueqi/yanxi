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
    <script>
        function check()
        {
            if(document.myform.name.id==""){alert("ID不能为空.");return false;}else{
                var r=confirm("高风险操作警告：\n确定要删除该用户吗？\n删除用户为高风险操作，无法恢复，请务必谨慎操作！！！");
                if(r){return true;}else{return false;}
                }

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

    if($hash==$arr['hash']){if($arr['group'] == "root"){}else{if($arr['group'] == "sa"){}else{echo '<script>alert("您没有该项权限！");</script>';header("location: ../Node/401.php");}}}else{echo '<script>alert("您的会话已经过期，请重新登录！");</script>';header("location: login.php");}
}else{echo '<script>alert("您还没有登录，请登陆后操作！");</script>';header("location: login.php");}

?>
<body>

<form name="myform" class="form-inline definewidth m20" action="del-user.php" method="post" onsubmit="return check();">

  <table width="302" border="0">
      
        <tr>
          <td width="296" height="138"><table width="82%" class="table table-bordered table-hover  m10">
            <tbody>
              <tr>
                <td width="60" class="tableleft" align="right">ID：</td>
                <td width="219"><input type="text" name="id" id="id">
                </td></tr>
              <tr><td align="right"></td>
                <td  align="center"><button type="submit" class="btn btn-small btn btn-primary">删除</button>&nbsp;<button type="reset" class="btn btn-small btn btn-success" id="reset">重置</button></td>
              </tr>
            
          </table></td>
        </tr>
        
      </tbody>
    </table>
</form>
<?php

    header('Content-Type:text/html; charset=utf-8');
    //require('MysqlClient.class.php');

    $id = $_POST["id"];

    if(isset($id))
    {
        $date = date('Y-m-d H:i:s',time());
        $del = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
        $sql = "delete from members where id= $id";

        $update = $del->gets($sql);
        echo '<script>alert("删除成功！");</script>' ;
    }else{}

    $mysql = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
    $sql = "SELECT *  FROM members";
    $result = $mysql->gets($sql);
    $n = count ($result);

    echo '<table class="table table-bordered table-hover definewidth m10">';
    echo "<thead><tr>";
    echo "<th>ID</th><th>姓名</th><th>学号</th><th>性别</th><th>专业</th><th>邮件</th><th>电话</th><th>注册时间</th><th>openid</th></tr>";
    for ($i = 0 ;$i < $n ;$i++ )
    {
        $p = $i;
        echo "<tr><td>".$result[$p]['id']."</td><td>".$result[$p]['name']."</td><td>".$result[$p]['number']."</td><td>".$result[$p]['sex']."</td><td>".$result[$p]['college']."</td><td>".$result[$p]['mail']."</td><td>".$result[$p]['phone']."</td><td>".$result[$p]['time']."</td><td>".$result[$p]['openid']."</td></tr>";
    }
    echo "</table>";

?>
</body>
</html>
