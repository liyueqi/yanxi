
<?php
			//header("Content-Type:text/html;charset=gb2312");
			$conn = mysql_connect("w.rdc.sae.sina.com.cn:3307","0lmw2kowy3","h4hz21w5km1k4zz20kly4lzkw3wiyxz5wkm5k00j");
			mysql_query("SET NAMES 'GBK'");
        	mysql_select_db("app_fudanyanxi") or die(mysql_error());
			$time = date('Y-m-d H:i:s',time());
	

		
?>
<?php
		
		
		
		
		
		
			mysql_select_db("aboutme");//选择MYSQL数据库

			$result = mysql_query("select * from aboutme",$conn); //执行SQL查询指令
			echo "记录列表";

			echo "<table border=1><tr>";

			while($field = mysql_fetch_field($result))
			{//使用while输出表头

    				echo "<td>&nbsp;".$field->name."&nbsp;</td>";

			}

			echo"</tr>";

			while($rows = mysql_fetch_row($result)){//使用while遍历所有记录，并显示在表格的tr中

    				echo "<tr>";

    					for($i = 0; $i < count($rows); $i++)
        				echo "<td>&nbsp;".$rows[$i]."</td>";
				}

			echo "</tr></table>";
			
		

?>
<form method="post" action="update.php">
<table width="827" border="0">
  <tbody>
    <tr>
      <td width="106" height="167" align="center" valign="middle"><p>介绍内容：</p>
      <p>&nbsp;</p></td>
      <td colspan="2"><textarea name="content" cols="100" rows="13"  id="content"></textarea></td>
    </tr>
    <tr align="center" valign="middle">
      <td height="31" align="center" valign="middle">&nbsp;</td>
      <td width="90">id:(0或1)
        <input name="id" type="text" id="id" value="0" size="4"></td>
      <td width="617"><input type="submit" name="submit" id="submit" value="提交">
        <input type="reset" name="reset" id="reset" value="重置"></td>
    </tr>
  </tbody>
</table>
</form>
