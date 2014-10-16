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
            if(document.myform.oldpassword.value=="")
            {
                alert("原密码不能为空.");return false;
            }else{
                    if(document.myform.newpassword.value=="")
                    {
                        alert("新密码不能为空.");return false;
                    }else{
                            if(document.myform.verifypassword.value=="")
                            {
                                alert("确认密码不能为空.");return false;
                            }else{
                                if(document.myform.verifypassword.value == document.myform.newpassword.value)
                                {

                                    return true;
                                }else{

                                    alert("两次输入的新密码不一致！");return false;
                                }
                            }
                }

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

    if($hash==$arr['hash']){}else{echo '<script>alert("您的会话已经过期，请重新登录！");</script>';header("location: ../login.php");}
}else{echo '<script>alert("您还没有登录，请登陆后操作！");</script>';header("location: ../login.php");}
?>
<body>
<form name="myform" class="form-inline definewidth m20" action="changepassword.php" method="post" onsubmit="return check();">
  
    <table width="313" height="57" border="0">
      <tbody>
      <tr>
       <td align="right">原密码：        </td>
       <td><input type="password" name="oldpassword" id="oldpassword"></td>
      </tr>
      <tr>
       <td align="right"><p>新密码：
         
         
       </p>         </td>
       <td><input type="password" name="newpassword" id="newpassword"></td>
      </tr>
      <tr>
       <td align="right"><p>确认新密码：
         
         
       </p>         </td>
       <td><input type="password" name="verifypassword" id="verifypassword"></td>
      </tr>
       <p>&nbsp;</p>
      <td width="98" height="53"  align="right"><button type="submit" class="btn btn-primary">提交</button> </td>
        <td width="205" align="left"><button type="reset" class="btn btn-success" id="reset">重置</button>
        </td>
        </tr>
      <tr align="right"></tbody>
    </table>
    <?php


    if(isset($_POST['oldpassword']))
    {
        $username = $arr['user'];
        $old = $_POST['oldpassword'];
        $new = $_POST['newpassword'];
        $verify = $_POST['verifypassword'];
        //echo $old;
        for($i=1;$i<=919;$i++)
        {
            $old = md5($old);
        }
        //echo $old."<br>";
        for($i=1;$i<=919;$i++)
        {
            $new = md5($new);
        }

        $add = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
        $sql = "select * from admin where admin= '$username'";
        $stdpassword = $add->gets($sql);
        //echo $stdpassword[0]['passwd'];
        if($stdpassword[0]['passwd'] == $old)
        {
            $sql = "update admin set passwd='$new' where admin='$username' ";
            $update =$conn->gets($sql);
            setcookie("yanxistatus");
            echo '<script>alert("修改密码成功！");</script>';
        }else{
            echo '<script>alert("原密码不正确！");</script>';
        }


    }else{}

    ?>
   
</form>
</body>
</html>
