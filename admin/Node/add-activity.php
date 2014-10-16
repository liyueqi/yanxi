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
        function check()
        {
            if(document.myform.name.value==""){alert("活动名称不能为空.");return false;}else{
                if(document.myform.date.value==""){alert("活动日期不能为空.");return false;}else{
                    if(document.myform.description.value==""){alert("活动简介不能为空.");return false;}else{
                        return true;
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
$sql = "select * from lasts where name= '4'";
$idraw = $conn->gets($sql);
$id = $idraw[0]['content'];
$id = $id +1;
?>
<body>
<form class="form-inline definewidth m20" name="myform" action="add-activity.php" enctype="multipart/form-data"  method="post" onsubmit="return check();">
  
   
    <table width="96%" height="777" border="0" class="table table-bordered table-hover  m10">
      <tbody>
        <tr>
          <td height="33" align="right" class="tableleft">活动名称：</td>
          <td height="33" colspan="2">
          <input type="text" name="name" id="name"></td>
        <td class="tableleft">&nbsp;</td>
        <td class="tableleft">活动地点：</td>
        <td ><input type="text" name="address" id="address"></td>
        </tr>
        <tr>
          <td height="33" align="right" class="tableleft">活动时间：</td>
          <td height="33" colspan="2">
          <input type="date" name="date" id="date"></td>
          <td width="16"  align="right"class="tableleft">&nbsp;</td>
            <td width="85" height="36"  align="right" class="tableleft">第一副图片：</td>
          <td width="452" colspan="2" align="left">
                <input type="file" name="file1" id="file1">
            最佳比例：200*200            </td>
        </tr>
        <tr>
          <td height="33" align="right" class="tableleft">活动id：</td>
          <td height="33" colspan="2" ><?php echo $id; ?></td>
          <td  align="right" class="tableleft">&nbsp;</td>
            <td height="36"  align="right" class="tableleft">第一副链接：</td>
            <td colspan="2" align="left"><input type="text" class="comments" name="link1" id="link1"></td>
        </tr>
        <tr>
          <td height="53"  align="right" class="tableleft">活动简介：</td>
          <td height="53" colspan="2"  align="right"><textarea class="comments" rows=12 name=description cols=27 onpropertychange= "this.style.posHeight=this.scrollHeight "></textarea></td>
          <td  align="right" class="tableleft">&nbsp;</td>
            <td height="36"  align="right" class="tableleft">第一副文字：</td>
            <td colspan="2" align="left"><textarea class="comments" rows=12 name=text1 cols=27 onpropertychange= "this.style.posHeight=this.scrollHeight "></textarea> </td>
        </tr>
        <tr>
          <td height="28" colspan="6"  align="center" class="tableleft">&nbsp;</td>
        </tr>
        <tr>
          <td height="36"   align="center" class="tableleft">&nbsp;</td>
          <td height="36"  colspan="2"align="center">具体宣传内容</td>
        </tr>
        <tr>
          <td height="36"  align="right" class="tableleft">主图片：</td>
          <td colspan="2" align="left">
            <input type="file" name="filemain">
            最佳比例：
          360*200          </td>
          <td  align="right" class="tableleft">&nbsp;</td>
            <td height="36"  align="right" class="tableleft">第二副图片：</td>
          <td colspan="2" align="left">
                <input type="file" name="file2" id="file2">
              最佳比例：200*200
          </td>
        </tr>
        <tr>
          <td height="36"  align="right" class="tableleft">主文字：</td>
          <td colspan="2" align="left">（即为活动名称，无须另外设置）</td>
          <td  align="right" class="tableleft">&nbsp;</td>
            <td height="199"  align="right" class="tableleft">第二副文字：</td>
            <td colspan="2" align="left"> <textarea class="comments" rows=12 name=text2 cols=27 onpropertychange= "this.style.posHeight=this.scrollHeight "></textarea></td>
        </tr>
        <tr>
          <td height="36"  align="right" class="tableleft">主链接：</td>
          <td colspan="2" align="left"><input type="text" class="comments" name="linkmain" id="linkmain"></td>
          <td  align="right" class="tableleft">&nbsp;</td>
            <td height="26"  align="right" class="tableleft">第二副链接：</td>
            <td colspan="2" align="left"><input type="text" class="comments" name="link2" id="link2"></td>
        </tr>

        <tr>
          <td width="81" height="53"  align="right"class="tableleft"></td>
          <td width="212" align="right">&nbsp;</td>
          <td width="155" align="left"><button type="submit" class="btn btn-primary">提交</button>           &nbsp;<button type="reset" class="btn btn-success" id="reset"> 重置</button></td>
        </tr>
      </tbody>
    </table>
  
   
</form>
</body>
<?php

if(isset($_POST['name']))
{
    $name =$_POST['name'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $filemain = $_FILES['filemain'];
    $address = $_POST['address'];
    $linkmain = $_POST['linkmain'];
    $file1 = $_FILES['file1'];
    $text1 = $_POST['text1'];
//echo $filemain["tmp_name"]."111\n";
//echo $filemain;
    $link1 = $_POST['link1'];
    $file2 = $_FILES['file2'];
    $text2 = $_POST['text2'];
    $link2 = $_POST['link2'];
    $nowtime = date('Y-m-d H:i:s',time());
    $upfile='./images';
    $fname0 = $id."-0.jpg";
    $picName0 = $upfile."/".$fname0;
    move_uploaded_file($filemain['tmp_name'],$picName0);
    $fname1 = $id."-1.jpg";
    $picName1 = $upfile."/".$fname1;
    move_uploaded_file($file1['tmp_name'],$picName1);
    $fname2 = $id."-2.jpg";
    $picName2 = $upfile."/".$fname2;
    move_uploaded_file($file2['tmp_name'],$picName2);
    $picmain = "http://www.fudanyanxi.tk/admin/Node/images/".$fname0;
    $pic1 = "http://www.fudanyanxi.tk/admin/Node/images/".$fname1;
    $pic2 = "http://www.fudanyanxi.tk/admin/Node/images/".$fname2;
    $add = new Mysql('http://fudanyanxi.sinaapp.com/database/','1136358656');
    $sql = "insert into activity (id,name,content,time,activitydate,mainpicture,address,mainlink,firstpicture,firsttext,firstlink,secondpicture,secondtext,secondlink) values ('$id','$name','$description','$nowtime','$date','$picmain','$address','$linkmain','$pic1','$text1','$link1','$pic2','$text2','$link2')";
    $result = $add->gets($sql);
    $sql = "update lasts set content = $id where name = 4";
    $update = $add->gets($sql);
    $ip = $_SERVER["REMOTE_ADDR"];
    echo '<script>alert("添加成功！");</script>';
}else{}


?>
</html>
