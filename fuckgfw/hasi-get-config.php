<?php
/**
 * Created by PhpStorm.
 * User: kaguya
 * Date: 15-4-3
 * Time: 上午2:45
 */
require_once("./dbConn.php");
require_once("./des.php");
$conn = dbConn();
$key = "e537bfa04fef8b9e6b29e66a61620ef6";
if(isset($_POST['ver']))
{
    $mac = $_POST['mac'];
    //echo $mac;
    $time = date('Y-m-d-H-i-s');
    $sql = sprintf("select count(*) from hasi_user where mac='%s'",mysql_real_escape_string($mac));
    $rawResult = mysql_query($sql,$conn);
    $result = mysql_fetch_array($rawResult);
    //var_dump($result);
    $Des = new Des();
    if($result[0]==0)
    {
        $sql = "select count(*) from hasi-user ";
        $rawNum = mysql_query($sql,$conn);
        $num = mysql_fetch_array($rawNum);
        $least = array();
        $least['num'] = 0;
        $least['server'] = 1;
        for($i=1;$i<$num+1;$i++)
        {
            $sql = "select * from ssserver where id=$i";
            $rawResult = mysql_query($sql,$conn);
            $result = mysql_fetch_array($rawResult);
            if($result['usernum']<$least['num']){
                $least['num'] = $result['usernum'];
                $least['server'] = $i;
            }
        }
        $server = $least['server'];
        $hash = md5($mac.$time);
        $sql = "insert into hasi_user (hash,mac,node,firsttime,lasttime) VALUES ('$hash','$mac','$server','$time','$time')";
        $result = mysql_query($sql);
        $config= getConfig($mac,$server);
        $encode = $Des->encrypt($config,$key,false);
        echo $encode;
    }else
    {
        $sql = "select * from hasi_user";
        $rawResult = mysql_query($sql,$conn);
        $result = mysql_fetch_array($rawResult);
        $mac = $result['mac'];
        $server = $result['node'];
        $sql = "update hasi_user set lasttime='$time' where mac='$mac'";
        $result = mysql_query($sql,$conn);
        $config= getConfig($mac,$server);
        $encode = $Des->encrypt($config,$key,false);
        echo $encode;
    }

}else{
    //header('HTTP/1.1 404 Not Found');
    //header('status: 404 Not Found');
    echo "ver not set!";
}

function getConfig($mac,$node)
{
    $conn = dbConn();
    $sql = sprintf("select * from hasi_user where mac='%s'",mysql_real_escape_string($mac));
    $rawResult = mysql_query($sql,$conn);
    $result = mysql_fetch_array($rawResult);
    if($result['node']==$node)
    {
        $sql = sprintf("select * from ssserver where id=%d",$node);
        $rawResult = mysql_query($sql,$conn);
        $config = mysql_fetch_array($rawResult);
        $configJson = sprintf("{\n
    \"configs\" : [
    {\n
    \"server\" : \"%s\",
    \"server_port\" : %d,
    \"password\" : \"%s\",
    \"method\" : \"%s\",
    \"remarks\" : \"\"}\n
    ],
    \"index\" : 0,
    \"global\" : true,
    \"enabled\" : false,
    \"shareOverLan\" : false,
    \"isDefault\" : false,
    \"localPort\" : 1080}",$config['ip'],$config['port'],$config['password'],$config['method']);

    }else{return 0;}


    return $configJson;
}



?>
