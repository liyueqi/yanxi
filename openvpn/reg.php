<!DOCTYPE html>
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
    $sql = "select * from invitecode where code='$code'";
    $result = $conn->query($sql);
    $rows = mysql_fetch_row($result);
    $num = count($rows);
    $time = date('Y-m-d H:i:s',time());
    $timeshot = strtotime($time);
    do{
    $cername = substr(crypt($timeshot),0,8);
    $sql = "select * from invitecode where cert='$cername'";
    $result = $conn->query($sql);
    $rows = mysql_fetch_row($result);
    $count = count($rows);
    }while($count != 0);
    if($num = 0){
        echo "<script>alert('��ע������Ч��'); </script>";
    }else{
        $sql = "update invitecode set status='��ʹ��',regtime='$time',cert='$cername' where code='$code'";
        $result = $conn->query($sql);
        $command = "bash /home/wwwroot/yanxi/openvpn/reg.sh $cername";
        $result = shell_exec($command);
        $url = "<a href='http://yanxihanfu.me/openvpn/$cername.zip'>�����˴�����������openVPN�����ļ�</a>";
    }
}else{
}
?>


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
              <li class="active"><a href="#">��ҳ</a></li>
              <li><a href="#">ע��</a></li>
              <li><a href="try.php">����</a></li>
              <li><a href="contact.php">��ϵ����</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    <div class="well">
        <p><h4>��VPN��IPv6��·��IPv6����Ч��</h4></p>
        <p><h4>������λ��ŦԼ��</h4></p>
    </div>
    <?php
    if(isset($_POST['$code'])){
        echo '<div class="alert alert-success" role="alert">'."
      <strong>��ϲ��</strong> �����ļ����ɳɹ���<br>$url
    </div>";
    }
    else{}
    ?>
    
    <p><h2><a name="reg"></a></h2><h2>ע�Ტ��ȡ����openVPN�����ļ�</h2></p>
	<form class="navbar-form navbar-left" name="myform" action="reg.php" method="post" onSubmit="return check()">
    <table width="200" border="1" class="table table-bordered table-hover  m10">
  <tbody>
    <tr>
      <td><h4>ע���룺</h4></td>
      <td><input type="text" class="form-control" name="code"></td>
    </tr>
    <tr>
      <td><h4>��Ч�ڣ�</h4></td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><button type="submit" class="btn btn-mid btn-primary">�ύ</button>&nbsp;<button type="reset" class="btn btn-success">����</button></td>
    </tr>
  </tbody>
</table>
    </form>
	</body>
	
	</html>

