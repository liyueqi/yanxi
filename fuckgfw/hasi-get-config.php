<?php
/**
 * Created by PhpStorm.
 * User: kaguya
 * Date: 15-4-3
 * Time: 上午2:45
 */
require_once("./dbConn.php");
$conn = dbConn();
if(isset($_POST['ver']))
{
    $mac = $_POST['mac'];
    $time = date('Y-m-d-H-i-s');
    $sql = sprintf("select count(*) from hasi-user where mac='%s'",mysql_real_escape_string($mac));
    $rawResult = mysql_query($sql,$conn);
    $result = mysql_fetch_array($rawResult);
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
        $sql = "insert into hasi-user (hash,mac,node,firsttime,lasttime) VALUES ('$hash','$mac','$server','$time','$time')";
        $result = mysql_query($sql);
        echo getConfig($mac,$server);
    }else
    {
        $sql = "select * from hasi-user";
        $rawResult = mysql_query($sql,$conn);
        $result = mysql_fetch_array($rawResult);
        $mac = $result['mac'];
        $server = $result['node'];
        $sql = "update hasi-user set lasttime='$time' where mac='$mac'";
        $result = mysql_query($sql,$conn);
        echo getConfig($mac,$server);
    }

}else{
    header('HTTP/1.1 404 Not Found');
    header('status: 404 Not Found');
}

function getConfig($mac,$node)
{
    $configJson = "";

    return $configJson;
}

?>