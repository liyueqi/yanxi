<html>

<head>

    <meta http-equiv="Content-Language" content="zh-cn">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="refresh" content="300">

    <title>VPN状态信息</title>

    <style type="text/css">

        <!--

        .Content_style1 {

            font-family: MingLiU;

            font-size: 12px;

        }

        .Title_style2 {

            font-family: MingLiU;

            font-size: 15px;

            font-weight: bold;

        }

        .style5 {color: #FF0000}

        body {

            margin-top: 0px;

            margin-bottom: 0px;



        -->

    </style>

</head>

<body>

<?

function sizeformat($bytesize)

{

    $i=0;

    while(abs($bytesize) >= 1024)

    {

        $bytesize=$bytesize/1024;

        $i++;

        if($i==4) break;

    }



    $units = array("Bytes","KB","MB","GB","TB");

    $newsize=round($bytesize,2);

    return("$newsize $units[$i]");

}

$mysql_server_name="localhost";

$mysql_username    ="root";

$mysql_password    ="1136358656";

$mysql_database    ="openvpn";



$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);

$sql="SELECT * FROM log  ORDER BY starting_time desc";

mysql_query("SET NAMES BIG5");

$result=mysql_db_query($mysql_database,$sql,$conn);

//$row=mysql_fetch_row($result);

//printf($row);

?>

<div align="right">

    <table width="100%"  border="1" cellpadding="1" cellspacing="1">

        <tr class="Title_style2" bgcolor="#FFFFFF">

            <td width="12%"><div align="left"><a> 连接时间</a></div></td>

            <td width="12%"><div align="left"><a> 断开时间</a></div></td>
			<td width="12%"><div align="left"><a> 服务器名称</a></div></td>

            

            <td width="10%"><div align="left"><a >客户端口</a></div></td>

            

            <td width="11%"><div align="left"><a> 内网IP</a></div></td>

            

            <td width="8%"><div align="left"><a> 用户证书</a></div></td>

            <td width="11%"><div align="left"><a> 上行流量</a></div></td>

            <td width="11%"><div align="left"><a> 下行流量</a></div></td>

        </tr>

        <?

        while($row=mysql_fetch_array($result))

        {

            //print_r ($row);

            ?>

            <tr bgcolor="#ffffff" class="Content_style1">

                <td><?=$row['starting_time']?></td>

                <td><?=$row['end_time']?></td>

                <td><?=$row['server']?></td>

                <td><?=$row['trusted_port']?></td>

                

                <td><?=$row['remote_ip']?></td>

                

                <td><?=$row['common_name']?></td>

                <td><?=sizeformat($row[8])?></td>

                <td><?=sizeformat($row[9])?></td>

            </tr>

        <?

        }

        ?>

    </table>

</div>
<div id=ipv6_enabled_www_test_logo></div>
<script language="JavaScript" type="text/javascript">
    	var Ipv6_Js_Server = (("https:" == document.location.protocol) ? "https://" : "http://");
	document.write(unescape("%3Cscript src='" + Ipv6_Js_Server + "www.ipv6forum.com/ipv6_enabled/sa/SA.php?id=4893' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>

</html>