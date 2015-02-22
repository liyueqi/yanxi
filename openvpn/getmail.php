<?php
include("mysql.php");

if(isset($_GET['id'])){
    $mailbox=$_GET['id'];
    $conn = new mysql();
    $sql = sprintf("select count(*) from users where mail='%s'and active='1'",
        mysql_real_escape_string($mailbox));
    $result = $conn->query($sql);
    $rows = mysql_fetch_array($result);
    $num = $rows[0];
    if($num !=0){
        echo "该邮箱已被占用";
    }else{}


}else{
    echo "<html>
<head><title>401 Unauthorized</title></head>
<body bgcolor=\"white\">
<center><h1>401 Unauthorized</h1></center>
<hr><center>nginx</center>
</body>
</html>
";
}
?>
