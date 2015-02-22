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

    if(isset($_POST['mailbox']))
    {
        $mailbox = $_POST['mailbox'];
        $time = date('Y-m-d-H-i-s');

        $conn = new mysql();
        $sql = sprintf("select count(*) from users where mail='%s'and active='1'",
            mysql_real_escape_string($mailbox));
        $result = $conn->query($sql);
        $rows = mysql_fetch_array($result);
        $num = $rows[0];
        //echo $num;

        if($num != 0){
            echo "<script>alert('该邮箱已经被占用！'); </script>";

        }else{
            $stamp = substr(md5(md5($mailbox.$time)),7,8);
            $sql = sprintf("select count(*) from users where mail='%s'and active='0'",
                mysql_real_escape_string($mailbox));
            $result = $conn->query($sql);
            $rows = mysql_fetch_array($result);
            $num = $rows[0];
            if($num==1){
                $sql = sprintf("update users set mailprefixcode = '%s' where mail = '%s'",
                    mysql_real_escape_string($stamp),
                    mysql_real_escape_string($mailbox));
                    $result = $conn->query($sql);

            }else{
                    $sql = sprintf("insert into users (mailprefixcode,active) values ('%s','0')",
                    mysql_real_escape_string($stamp)
                   );
                $result = $conn->query($sql);
            }
            $sql = sprintf("select * from users where mail='%s'and active='0'",
                mysql_real_escape_string($mailbox));
            $result = $conn->query($sql);
            $rows = mysql_fetch_array($result);
            $stamp=$rows['mailprefixcode'];
            $content = "<p>您好，欢迎注册Synapse Web Service账号！</p>

<p>请访问如下链接继续进行注册：</p>

<hr />
<p><a href=\"https://jelly.yanlei.me/reg.php?sid=$stamp\">https://jelly.yanlei.me/reg.php?sid=$stamp</a></p>

<p>(此链接注册完成后即失效)</p>

<hr />
<p>祝您使用愉快！</p>

<p>&nbsp;</p>

<p><span style=\"line-height: 20.7999992370605px;\">Synapse Web Service管理员</span></p>
            ";
                $url = 'http://sendcloud.sohu.com/webapi/mail.send.json';
                //使用子帐号和密码才可以进行邮件的发送。
                $param = array('api_user' => 'synapsewebservicemail',
                    'api_key' => 'WWhy6msPpXlqf2Fr',
                    'from' => 'admin@yanlei.me',
                    'fromname' => 'SendCloud测试邮件',
                    'to' => $mailbox,
                    'subject' => '欢迎注册Synapse Web Service!',
                    'html' => $content);

                $options = array('http' => array('method'  => 'POST','content' => http_build_query($param)));
                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);



            echo '<div class="alert alert-success" role="alert">'."
                <strong>注册邮件已经发送到您的邮箱，请点击邮件中的链接完成注册</strong>
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
                <td width="374"><form class="navbar-form navbar-left" name="myform" action="reg-mail.php" method="post" onsubmit="return check();">
                        <div align="center">
                            <table width="200" border="1" class="table table-bordered table-hover  m10">
                                <tbody>
                                <tr>
                                    <td><h4>邮箱：</h4></td>
                                    <td><input type="email" class="form-control" name="mailbox" onblur="showHint(this.value)">
                                      
                                                                  <span id="exp"></span></td>
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
