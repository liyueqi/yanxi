﻿<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jelly VPN</title>
	 <link href="https://yanxihanfu.me/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="https://yanxihanfu.me/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://yanxihanfu.me/bootstrap/css/bootstrap-theme.min.css">
     <style>
	body {
		TEXT-ALIGN: center;
 background-image: url(./openvpn-pic/test3.jpg);
 background-size:cover;
}
	</style>
	<script src="https://yanxihanfu.me/bootstrap/js/jquery.min.js"></script>
	<script src="https://yanxihanfu.me/bootstrap/js/bootstrap.min.js"></script>
      <script>
          function check()
          {
              if(document.myform.name.value=="")
              {alert("姓名不能为空.");return false;}
              else{
                  if(document.myform.stunum.value=="")
                  {alert("学号不能为空.");return false;}
                  else{
                      return true;}
              }
          }
      </script>
	</head>
	<body class="post-template page">
<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Jelly VPN</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">主页</a></li>
              <li><a href="reg.php">注册</a></li>
              <li><a href="#">试用</a></li>
              <li><a href="contact.php">联系我们</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
       <div id="in1" style="background: rgba(255, 255, 255, 0.4) !important;width: 70%; height:100%;overflow:hidden;margin:0 auto;opacity: 0.9; ">
    
      <p>&nbsp;</p>
      <p><br />
      <div style="width: 70%;margin:0 auto;opacity: 0.7;">
    <div class="well">
        <p><h3 align="center">本VPN走IPv6线路，IPv6下有效，<br>
        服务器位于纽约。<br>
        本页申请的试用VPN配置文件有效期为2天</h3></p>
    </div>
    </div>
    <?php
    class mysql
    {
        public $Conn;
        private $sql;
        private $dbStatus;
        private $RawResult;
        private $Result;
        public function __construct(){
            $this->Conn = mysql_connect("localhost","root","1136358656");
            mysql_select_db("openvpn") or die(mysql_error());
        }
        public function SelectDb($db)
        {
            $this->dbStatus = mysql_select_db($db,$this->Conn);
            mysql_query("set names gb2312",$this->Conn);
            return $this->dbStatus;
        }
        public function query($query)
        {
            $this->RawResult = mysql_query($query,$this->Conn);
//$this->Result = mysql_fetch_row($this->RawResult);
            return $this->RawResult;
        }
        public function GetConn(){
            return $this->Conn;
        }
    }
    if(isset($_POST['stunum']))
    {
        $name=$_POST['name'];
        $stunum=$_POST['stunum'];
        $conn = new mysql();
        $sql = "select count(*) from studentdb where names='$name' and stunum='$stunum'";
        $result = $conn->query($sql);
        $rows=mysql_fetch_array($result);
        $n = $rows[0];
        if($n == 0){
            echo "<script>alert('姓名/学号错误，请输入真实有效的复旦大学学生姓名和学号！'); </script>";
        }else{
            $sql = "select * from studentdb where names='$name' and stunum='$stunum'";
            $result = $conn->query($sql);
            $rows=mysql_fetch_array($result);
            $status=$rows['status'];
            if($status == 0){

                $time = date('Y-m-d H:i:s',time());
                $timeshot = strtotime($time).$name.$stunum;
                $cername = substr(md5($timeshot),0,8);
                $sql = "update studentdb set status='1',cername='$cername' where stunum='$stunum'";
                $result = $conn->query($sql);
                $command = "bash /home/wwwroot/yanxi/openvpn/try.sh $cername";
                $result = shell_exec($command);
                $url = "<a href='$cername.zip'>单击此处以下载您的试用openVPN配置文件</a>";


                echo '<div class="alert alert-success" role="alert">'."
                <strong>恭喜！</strong> 试用配置文件生成成功！<br>$url
                    </div>";




            }else{
                echo "<script>alert('您已经试用过了，暂不支持重复试用，谢谢合作！'); </script>";
            }

        }


    }else{}



    ?>
    <p><h2><a name="reg"></a></h2>
    <h3 align="center">如果您是复旦大学学生，您可以：<br />验证身份并获取您的试用openVPN配置文件</h3></p>
	
	<div align="center">
    
	  <table width="334" border="0">
	    <tbody>
        <form class="navbar-form navbar-left" name="myform" action="try.php" method="post" onSubmit="return check()">
	      <tr>
	        <td width="328"><div align="right">
	          <table width="86%" border="1" class="table table-bordered table-hover  m10">
	            <tbody>
	              <tr>
	                <td width="28%"><h4 align="center">姓名：</h4></td>
	                <td width="72%"><div align="center">
	                  <input type="text" class="form-control" name="name">
                    </div></td>
                  </tr>
	              <tr>
	                <td><h4 align="center">学号：</h4></td>
	                <td><div align="center">
	                  <input type="text" class="form-control" name="stunum">
                    </div></td>
                  </tr>
	              <tr>
	                <td><div align="center"></div></td>
	                <td><div align="center">
	                  <button type="submit" class="btn btn-mid btn-primary">提交</button>
	                  &nbsp;
	                  <button type="reset" class="btn btn-success">重置</button>
                    </div></td>
                  </tr>
                </tbody>
              </table>
	          </div>
            <div align="center"></div></td>
          </tr>
          </form>
        </tbody>
      </table>
       
	  <br/>
  <br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
	<hr>
	
<div align="center">Powered By Kaguya & Xiao </div> 
</div>
	</body>
	
	</html>

