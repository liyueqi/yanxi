<!DOCTYPE html>



<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jelly VPN</title>
    <link href="http://yanxihanfu.me/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://yanxihanfu.me/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://yanxihanfu.me/bootstrap/css/bootstrap-theme.min.css">
    <script src="http://yanxihanfu.me/bootstrap/js/jquery.min.js"></script>
    <script src="http://yanxihanfu.me/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function check()
        {
            if(document.myform.code.value=="")
            {alert("注册码不能为空.");return false;}
            else{
				if(document.myform.exp.value=="")
            {alert("有效期不能为空.");return false;}
				else
				{
					if(document.myform.node.value=="")
            		{alert("节点不能为空.");return false;}
					else
					{return true;
					}
				}
            }
        }


    </script>
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
                <li class="active"><a href="index.php">主页</a></li>
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
    $conn = new mysql();
    $time = date('Y-m-d H:i:s',time());
    $code = $_POST['code'];
    $exp = $_POST['exp'];
    $node = $_POST['node'];
    switch($exp){
        case "1":
            $exp = "1month";
            break;
        case "2":
            $exp = "2months";
            break;
        case "3":
            $exp = "3months";
            break;
        default:


    }
    $res = array();
    global $i;
    $i = 0;
    $len = strlen($code);
    while($len >= 8){
        $res[$i] = substr($code,0,8);
        $code = str_replace($res[$i],"",$code);
        $sql = "insert into test (code,status,generatetime,exp,node) values ('$res[$i]','0','$time','$exp','$mode')";
        $result = $conn->query($sql);
        $len = strlen($code);
        $i++;
    }

}else{

}





?>

<p><h2><a name="reg"></a></h2><h2>生成注册码</h2></p>
<form class="navbar-form navbar-left" name="myform" action="generate.php" method="post" onsubmit="return check();">
    <table width="118%" border="1" class="table table-bordered table-hover  m10">
        <tbody>
        <tr>
            <td width="34%"><h4>待切分码：</h4></td>
            <td width="66%"><textarea class="form-control" name="code" rows="4" ></textarea></td>
        </tr>
        <tr>
        <td>
        <h4>有效期：</h4>
        </td>
        <td>
        <input type="text" class="form-control" name="exp">
        </td>
        </tr>
        <tr>
        <td>
        <h4>节点：</h4>
        </td>
        <td>
        <input type="text" class="form-control" name="node">
        </td>
        </tr>
        <tr>
            <td><h4>注册码：</h4></td>
            <td><?php
                $n = 0;
                for($n=0;$n<$i;$n++){
                    echo $res[$n]."<br />";
                }
                ?></td>
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

