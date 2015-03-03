<!DOCTYPE html>
<html>
<?php
include("header.php");
include("logo.php");
include("mysql.php");
?>

<body >

    <div id="in1" style="background: rgba(255, 255, 255, 0.4) !important;width: 70%; height:100%;overflow:hidden;margin:0 auto;opacity: 0.9; "><script>
	  document.getElementById("in1").style.height=document.getElementById("in2").scrollHeight+"px"
          function check()
          {
              if(document.myform.uid.value=="")
              {alert("用户名不能为空.");return false;}
              else{
				  	if(document.myform.passwd.value=="")
              		{alert("密码不能为空.");return false;}
              		else{
							if(document.myform.confirm.value==document.myform.passwd.value)
							{return true;}
              				else{alert("密码不能为空.");return false;}
						
						}
				  
				  
				  
				  }
                  
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

              xmlhttp.open("GET","getinfo.php?uid="+str,true);

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
                      <td><h4>用户名：</h4></td>
                      <td><input type="text" class="form-control" name="uid" onkeyup="showHint(this.value)"><span id="exp"></span></td>
                    </tr>
                    <tr>
                      <td><h4>密码：</h4></td>
                      <td><input type="text" class="form-control" name="passwd"></td>
                    </tr>
                    <tr>
                      <td><h4>确认密码：</h4></td>
                      <td><input type="text" class="form-control" name="confirm" ></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><button type="submit" class="btn btn-mid btn-primary">注册</button>
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

