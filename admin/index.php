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

  <div class="header">
    
      <div class="dl-title">
       <!--<img src="/chinapost/Public/assets/img/top.png">-->
      </div>

    <div class="dl-log">欢迎您，<?php echo $arr['user']; ?> | 权限组：<?php echo $arr['group']; ?> | <span class="dl-log-user"></span><a href="logout.php" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
  <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
      <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">常规管理</div></li>		<li class="nav-item dl-selected"><div class="nav-item-inner nav-order">系统设置</div></li>

      </ul>
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
      var config = [{id:'1',homePage : '12',menu:[{text:'常规管理',items:[{id:'12',text:'欢迎页',href:'<?php if($arr['user']=="yier"){echo 'mylove.php'; }else{echo 'welcome.php';} ?>'},{id:'2',text:'消息推送',href:'Node/textmsg.php'},{id:'4',text:'活动管理',href:'activity-frame.php'},{id:'6',text:'会员管理',href:'user-frame.php'},{id:'5',text:'信息门户',href:'http://www.fudanyanxi.tk/tpl/wp-admin'},{id:'13',text:'官方后台',href:'https://mp.weixin.qq.com/'},{id:'8',text:'SQL执行',href:'http://www.fudanyanxi.tk/admin/User/mysql.php'}]}]},{id:'7',homePage : '9',menu:[{text:'系统设置',items:[{id:'9',text:'修改密码',href:'Node/changepassword.php'},{id:'10',text:'添加管理员',href:'Node/add-admin.php'},{id:'11',text:'修改管理员',href:'Node/mod-admin.php'},{id:'14',text:'删除管理员',href:'Node/del-admin.php'},{id:'15',text:'版本信息',href:'Node/version.php'}]}]}];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
	
	
  </script>
  <?php
  include 'foot.php';
  ?>
 </body>

</html>