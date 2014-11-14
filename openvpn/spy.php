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

        <tr class="Title_style2" bgcolor="#808080">

            <td width="12%"><div align="left"><a starting_time</a></div></td>

            <td width="12%"><div align="left"><a end_time</a></div></td>

            <td width="8%"><div align="left"><a trusted_ip</a></div></td>

            <td width="10%"><div align="left"><a trusted_port</a></div></td>

            <td width="8%"><div align="left"><a protocol</a></div></td>

            <td width="11%"><div align="left"><a remote_ip</a></div></td>

            <td width="11%"><div align="left"><a remote_netmask</a></div></td>

            <td width="8%"><div align="left"><a common_name</a></div></td>

            <td width="11%"><div align="left"><a bytes_received</a></div></td>

            <td width="11%"><div align="left"><a bytes_sent</a></div></td>

        </tr>

        <?

        while($row=mysql_fetch_row($result))

        {

            //print_r ($row);

            ?>

            <tr bgcolor="#C0C0C0" class="Content_style1">

                <td><?=$row[0]?></td>

                <td><?=$row[1]?></td>

                <td><?=$row[2]?></td>

                <td><?=$row[3]?></td>

                <td><?=$row[4]?></td>

                <td><?=$row[5]?></td>

                <td><?=$row[6]?></td>

                <td><?=$row[7]?></td>

                <td><?=sizeformat($row[8])?></td>

                <td><?=sizeformat($row[9])?></td>

            </tr>

        <?

        }

        ?>

    </table>

    <p align="center" class="Content_style1">本页面每5分钟刷新一次</p>

</div>

</body>

</html>