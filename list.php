
<?php
			//header("Content-Type:text/html;charset=gb2312");
			$conn = mysql_connect("w.rdc.sae.sina.com.cn:3307","0lmw2kowy3","h4hz21w5km1k4zz20kly4lzkw3wiyxz5wkm5k00j");
			mysql_query("SET NAMES 'GBK'");
        	mysql_select_db("app_fudanyanxi") or die(mysql_error());
			$time = date('Y-m-d H:i:s',time());
	

		
?>
<?php
		
		
		
		
		
		
			mysql_select_db("aboutme");//ѡ��MYSQL���ݿ�

			$result = mysql_query("select * from aboutme",$conn); //ִ��SQL��ѯָ��
			echo "��¼�б�";

			echo "<table border=1><tr>";

			while($field = mysql_fetch_field($result))
			{//ʹ��while�����ͷ

    				echo "<td>&nbsp;".$field->name."&nbsp;</td>";

			}

			echo"</tr>";

			while($rows = mysql_fetch_row($result)){//ʹ��while�������м�¼������ʾ�ڱ���tr��

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
      <td width="106" height="167" align="center" valign="middle"><p>�������ݣ�</p>
      <p>&nbsp;</p></td>
      <td colspan="2"><textarea name="content" cols="100" rows="13"  id="content"></textarea></td>
    </tr>
    <tr align="center" valign="middle">
      <td height="31" align="center" valign="middle">&nbsp;</td>
      <td width="90">id:(0��1)
        <input name="id" type="text" id="id" value="0" size="4"></td>
      <td width="617"><input type="submit" name="submit" id="submit" value="�ύ">
        <input type="reset" name="reset" id="reset" value="����"></td>
    </tr>
  </tbody>
</table>
</form>
