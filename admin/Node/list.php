<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>

 

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form class="form-inline definewidth m20" action="index.html" method="get">    
    用户名称：
    <input type="text" name="username" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>
<?php
	$conn = mysql_connect("localhost","wyl","123456");
			mysql_query("SET NAMES 'GBK'");
        	mysql_select_db("app_fudanyanxi") or die(mysql_error());
			$time = date('Y-m-d H:i:s',time());
			mysql_select_db("aboutme");//选择MYSQL数据库
			$result = mysql_query("select * from aboutme",$conn);
			echo '<table class="table table-bordered table-hover definewidth m10">';
			echo "<thead><tr>";
			while($field = mysql_fetch_field($result))
			{//使用while输出表头

    				echo "<th>&nbsp;".$field->name."&nbsp;</th>";

			}

			echo "</tr>";
			echo "</thead><tr>";
			while($rows = mysql_fetch_row($result)){//使用while遍历所有记录，并显示在表格的tr中

    				echo "<tr>";

    					for($i = 0; $i < count($rows); $i++)
        				echo "<td>&nbsp;".$rows[$i]."</td>";
				}
			echo '<td><a href="edit.html">编辑</a></td>';
			echo "</tr></table>";


?>

</body>
</html>
<script>
    $(function () {
        

		$('#addnew').click(function(){

				window.location.href="add.html";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>