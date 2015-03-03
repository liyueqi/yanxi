<!DOCTYPE html>
<html>
<?php
include("header.php");
include("logo.php");
include("mysql.php");
?>

<body class="post-template page">

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
              				else{alert("两次输入的密码不一致！");return false;}
						
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
                      //var a2=eval('('+a1+')');
                      document.getElementById("exp").innerHTML="<h4><strong>"+a2.exp+"</strong></h4>";


                  }
              }

              xmlhttp.open("GET","getinfo.php?uid="+str,true);

              xmlhttp.send();


          }
      </script>  
    <?php

    if(isset($_GET['sid']))
    {
        if(isset($_POST['passwd'])){
            if(isset($_POST['uid'])){
                $code = $_GET['sid'];
                $uid = $_POST['uid'];
                $passwd = $_POST['passwd'];

                $conn = new mysql();
                $sql = sprintf("select count(*) from users where mailprefixcode='%s'",
                    mysql_real_escape_string($code));//"select count(*) from invitecode where code='$code'and status='0'";
                $result = $conn->query($sql);
                $rows = mysql_fetch_array($result);
                $num = $rows[0];
                //echo $num;
                $time = date('Y-m-d H:i:s',time());





                if($num == 0){
                    echo "<script>alert('该注册链接无效'); </script>";

                }else{

                    $sql = sprintf("select * from users where mailprefixcode='%s'",
                        mysql_real_escape_string($code));
                    $result = $conn->query($sql);
                    $rows = mysql_fetch_array($result);
                    $mailbox = $rows['mail'];
                    $active = $rows['active_'];
                    $ban = $rows['ban'];
                    $hash = $rows['hash'];
                    $passwd = md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5($passwd)))))))))));
                    var_dump($rows);

                    if($active = "1"){
                        echo $rows['active_'];
                        echo "<script>alert(\'该邮箱已经被注册！$active '); </script>";
                    }else{
                        if($ban=1){
                            echo "<script>alert('该邮箱已经被禁用！'); </script>";
                        }else{
                            $sql = sprintf("update users set id='%s',password='%s',regtime='%s',usergroup='standard',active_=1 where hash='%s'",
                                mysql_real_escape_string($uid),
                                mysql_real_escape_string($passwd),
                                mysql_real_escape_string($time),
                                mysql_real_escape_string($hash));
                            //"update invitecode set status='1',regtime='$time',cert='$cername' where code='$code'";
                            $result = $conn->query($sql);
                            $status = 1;
                            //$url = "<a href='$cername.zip'>单击此处以下载您的openVPN配置文件</a>";


                                                    echo '<div class="alert alert-success" role="alert">'."
                                                    <strong>恭喜， 账号注册成功！</strong>
                                                            </div>";

                                                }
                         }


                        }


            }








            


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
            <td width="374"><form class="navbar-form navbar-left" name="myform"  method="post" onsubmit="return check();">
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

