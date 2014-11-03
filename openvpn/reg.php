<!DOCTYPE html>



<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jelly VPN</title>
    <style>
	body {
		TEXT-ALIGN: center;
 background-image: url(./openvpn-pic/test3.jpg);
 background-size:cover;
}
	.post-template.page #in1 div .well h3 {
	font-family: 微软雅黑;
}
    .post-template.page #in1 div .well h3 {
	font-family: 微软雅黑;
}
    #in1 h2 {
	font-family: 微软雅黑;
}
    .post-template.page #in1 div table tbody tr td .navbar-form.navbar-left div .table.table-bordered.table-hover.m10 tbody tr td {
	font-family: 微软雅黑;
}
    .post-template.page #in1 div table tbody tr td .navbar-form.navbar-left div .table.table-bordered.table-hover.m10 tbody tr td h4 {
	font-family: 微软雅黑;
}
    .post-template.page #in1 div table tbody tr td .navbar-form.navbar-left div .table.table-bordered.table-hover.m10 tbody tr td .btn.btn-mid.btn-primary {
	font-family: 微软雅黑;
}
    .post-template.page #in1 div table tbody tr td .navbar-form.navbar-left div .table.table-bordered.table-hover.m10 tbody tr td .btn.btn-success {
	font-family: 微软雅黑;
}
    .post-template.page #in1 div h3 {
	font-family: 微软雅黑;
}
    .post-template.page .navbar.navbar-inverse.navbar-fixed-top {
	font-family: 微软雅黑;
}
    .post-template.page #in1 div h4 {
	font-family: 微软雅黑;
}
    </style>
	 <link href="https://yanxihanfu.me/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="https://yanxihanfu.me/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://yanxihanfu.me/bootstrap/css/bootstrap-theme.min.css">
	 
	<script src="https://yanxihanfu.me/bootstrap/js/jquery.min.js"></script>
	<script src="https://yanxihanfu.me/bootstrap/js/bootstrap.min.js"></script>
      <script>
	  document.getElementById("in1").style.height=document.getElementById("in2").scrollHeight+"px"
          function check()
          {
              if(document.myform.code.value=="")
              {alert("注册码不能为空.");return false;}
              else{
                  return true;}
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
                      document.getElementById("exp").innerHTML="<h4><strong>"+a2.exp+"</strong></h4>";


                  }
              }

              xmlhttp.open("GET","getinfo.php?id="+str,true);

              xmlhttp.send();


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
              <li><a href="#">注册</a></li>
              <li><a href="try.php">试用</a></li>
              <li><a href="contact.php">联系我们</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
</nav>
    
    
    <div id="in1" style="background: rgba(255, 255, 255, 0.4) !important;width: 70%; height:100%;overflow:hidden;margin:0 auto;opacity: 0.9; ">
    
      <p>&nbsp;</p>
      <p><br />
      <div style="width: 70%;margin:0 auto;opacity: 0.7;">
      
        <p>
        <h3 align="center">本 VPN 走 Pv6 线路， IPv6 下有效，</h3></p>
        <p align="center"><h3 align="center">服务器位于纽约。</h3></p>
    
      </div>
      </p>
        
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
    if(isset($_POST['code']))
    {
        $code = $_POST['code'];
        $conn = new mysql();
        $sql = "select count(*) from invitecode where code='$code'and status='0'";
        $result = $conn->query($sql);
        $rows = mysql_fetch_array($result);
        $num = $rows[0];
        //echo $num;
        do{
        $time = date('Y-m-d H:i:s',time());
        $timeshot = strtotime($time);
        $cername = substr(md5($timeshot),0,8);
        $sql = "select count(*) from invitecode where cert='$cername'";
        $result = $conn->query($sql);
        $rows = mysql_fetch_array($result);
        $count = $rows[0];
        }while($count != 0);
        if($num == 0){
            echo "<script>alert('该注册码无效！'); </script>";

        }else{
            do{
                $time = date('Y-m-d H:i:s',time());
                $timeshot = strtotime($time);
                $cername = substr(md5($timeshot),0,8);
                $sql = "select count(*) from invitecode where cert='$cername'";
                $result = $conn->query($sql);
                $rows = mysql_fetch_array($result);
                $count = $rows[0];
            }while($count != 0);
            $sql = "select * from invitecode where code='$code'";
            $result = $conn->query($sql);
            $rows = mysql_fetch_array($result);
            $type = $rows['exp'];

            $sql = "update invitecode set status='1',regtime='$time',cert='$cername' where code='$code'";
            switch($type){
                case "1month":
                    $command = "bash /home/wwwroot/yanxi/openvpn/reg-1.sh $cername";
                    $result = shell_exec($command);
                    break;
                case "2months":
                    $command = "bash /home/wwwroot/yanxi/openvpn/reg-2.sh $cername";
                    $result = shell_exec($command);
                    break;
                case "3months":
                    $command = "bash /home/wwwroot/yanxi/openvpn/reg-3.sh $cername";
                    $result = shell_exec($command);
                    break;
                default:

            }
            $result = $conn->query($sql);



            

            $url = "<a href='$cername.zip'>单击此处以下载您的openVPN配置文件</a>";


            echo '<div class="alert alert-success" role="alert">'."
      <strong>恭喜！</strong> 配置文件生成成功！<br>$url
    </div>";
        }
    }else{

    }





    ?>
    
    <p><h2><a name="reg"></a></h2>
    <h2>注册并获取您的 OpenVPN 配置文件</h2></p>
    <div align="center"></div>
    <div align="center">
      <table width="380" border="0">
        <tbody>
          <tr>
            <td width="374"><form class="navbar-form navbar-left" name="myform" action="reg.php" method="post" onsubmit="return check();">
              <div align="center">
                <table width="200" border="1" class="table table-bordered table-hover  m10">
                  <tbody>
                    <tr>
                      <td><h4>注册码：</h4></td>
                      <td><input type="text" class="form-control" name="code" onkeyup="showHint(this.value)"></td>
                    </tr>
                    <tr>
                      <td><h4>有效期：</h4></td>
                      <td><label id="exp"></label></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><button type="submit" class="btn btn-mid btn-primary">提交</button>
                        &nbsp;
                        <button type="reset" class="btn btn-success">重置</button> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </form></td>
          </tr>
        </tbody>
      </table>
      <h4>购买注册码请联系QQ：1136358656 <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1136358656&amp;Site=JellyVPN&amp;Menu=yes"><img src="http://skin.54kefu.net/icon/3_online.gif" vspace="4" border="0" align="absmiddle" title=""></a><br />或者E-mail： 13307130177@fudan.edu.cn</h4>
      
      <h6>&nbsp;</h6>
      <h6><br />
      </h6>
      <h6>&nbsp;</h6>
      <h6><br />
        <br /><br />
      </h6>
    </div>
    <hr>
<div align="center">Powered By Kaguya & Xiao </div> 
</div>

	</body>
	
	</html>

