<!DOCTYPE html>



<html>

  <head>
    <meta charset="gbk">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jelly VPN</title>
	 <link href="http://yanxihanfu.me/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="http://yanxihanfu.me/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="http://yanxihanfu.me/bootstrap/css/bootstrap-theme.min.css">
	<script src="http://yanxihanfu.me/bootstrap/js/jquery.min.js"></script>
	<script src="http://yanxihanfu.me/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
    <nav class="navbar navbar-inverse">
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
              <li class="active"><a href="#">主页</a></li>
              <li><a href="#">注册</a></li>
              <li><a href="try.php">试用</a></li>
              <li><a href="contact.php">联系我们</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    <div class="well">
        <p><h4>本VPN走IPv6线路，IPv6下有效，</h4></p>
        <p><h4>服务器位于纽约。</h4></p>
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



            

            $url = "<a href='http://yanxihanfu.me/openvpn/$cername.zip'>单击此处以下载您的openVPN配置文件</a>";


            echo '<div class="alert alert-success" role="alert">'."
      <strong>恭喜！</strong> 配置文件生成成功！<br>$url
    </div>";
        }
    }else{

    }





    ?>
    
    <p><h2><a name="reg"></a></h2><h2>注册并获取您的openVPN配置文件</h2></p>
	<form class="navbar-form navbar-left" name="myform" action="reg.php" method="post">
    <table width="200" border="1" class="table table-bordered table-hover  m10">
  <tbody>
    <tr>
      <td><h4>注册码：</h4></td>
      <td><input type="text" class="form-control" name="code"></td>
    </tr>
    <tr>
      <td><h4>有效期：</h4></td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><button type="submit" class="btn btn-mid btn-primary">提交</button>&nbsp;<button type="reset" class="btn btn-success">重置</button></td>
    </tr>
  </tbody>
</table>
    </form>
	</body>
	
	</html>

