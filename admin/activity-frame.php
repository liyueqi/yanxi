<?php
$cookie =  $_COOKIE["yanxistatus"];
$arr = unserialize($cookie);
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>复旦大学燕曦汉服协会后台管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/main-min.css" rel="stylesheet" type="text/css" />
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
 <div class="content">
   
      
   </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
 </div>
 <script type="text/javascript" src="assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bui-min.js"></script>
  <script type="text/javascript" src="assets/js/common/main-min.js"></script>
  <script type="text/javascript" src="assets/js/config-min.js"></script>
  <script>
    BUI.use('common/main',function(){
      var config = [{id:'1',menu:[{text:'活动管理',items:[{id:'12',text:'添加活动',href:'Node/add-activity.php'},{id:'3',text:'历史活动管理',href:'Node/his-activity.php'}]}]}];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
	
	function ReImgSize(){   
           for (j=0;j<document.images.length;j++)   
          {   
               document.images[j].width=(document.images[j].width>420)?"420":document.images[j].width;   
          }  
} 
  </script>
 </body>
</html>