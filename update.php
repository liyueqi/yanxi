<?php
	header("Content-Type:text/html;charset=UTF-8");
	$content = $_POST['content'];
	$id = $_POST['id'];
	$conn = mysql_connect("w.rdc.sae.sina.com.cn:3307","0lmw2kowy3","h4hz21w5km1k4zz20kly4lzkw3wiyxz5wkm5k00j");
			mysql_query("SET NAMES 'GBK'");
        	mysql_select_db("app_fudanyanxi") or die(mysql_error());
			$result = mysql_query("UPDATE aboutme SET content = '$content' WHERE id = '$id' ");
			if($result!= false){echo "更改记录成功！";}else{echo "修改记录失败！请联系开发者";}


?>



<table width="910" border="0">
  <tbody>
    <tr>
      <td align="center"><a href="list.php">返回</a></td>
    </tr>
  </tbody>
</table>
