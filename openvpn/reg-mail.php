<!DOCTYPE html>



<html>
<?php
include("header.php");
include("logo.php");
?>






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
                <li><a href="contact.php">关于</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div id="in1" style="background: rgba(255, 255, 255, 0.4) !important;width: 70%; height:100%;overflow:hidden;margin:0 auto;opacity: 0.9; "><script>
        document.getElementById("in1").style.height=document.getElementById("in2").scrollHeight+"px"
        function check()
        {
            if(document.myform.mailbox.value=="")
            {alert("邮箱不能为空.");return false;}
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
                    document.getElementById("exp").innerHTML="<h4>"+a1+"</h4>";


                }
            }

            xmlhttp.open("GET","getmail.php?id="+str,true);

            xmlhttp.send();


        }
    </script>
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
            $server = $rows['server'];
            $node = $rows['node'];

            $sql = "update invitecode set status='1',regtime='$time',cert='$cername' where code='$code'";

            switch($type){
                case "1month":
                    $command = "bash /home/wwwroot/yanxi/openvpn/reg-1.sh $cername $server $node";
                    $result = shell_exec($command);
                    break;
                case "2months":
                    $command = "bash /home/wwwroot/yanxi/openvpn/reg-2.sh $cername $server $node";
                    $result = shell_exec($command);
                    break;
                case "3months":
                    $command = "bash /home/wwwroot/yanxi/openvpn/reg-3.sh $cername $server $node";
                    $result = shell_exec($command);
                    break;
                default:

            }
            $result = $conn->query($sql);






            $url = "<a href='$cername.zip'>单击此处以下载您的openVPN配置文件</a>";


            echo '<div class="alert alert-success" role="alert">'."
                <strong>恭喜！</strong> 配置文件生成成功！<br>$url<br /><strong>戳<a href='./contact.php#toc2'>我</a>查看设置和使用教程~~</strong>
                    </div>";
        }
    }else{

    }

    ?><h2><a name="reg"></a></h2>
    <h2 align="center">注册 Synapse Web Service 账号</h2></p>
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
                                    <td><h4>邮箱：</h4></td>
                                    <td><input type="text" class="form-control" name="mailbox" onblur="showHint(this.value)"><span id="exp"></span></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><button type="submit" class="btn btn-mid btn-primary">确定</button>
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
        <h6><br />
        </h6>
    </div>

</div>

<?php
include("footer.php");
?>
</body>

</html>
