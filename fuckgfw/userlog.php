<?php
    include("dbConn.php");
    function GetIP(){
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif(!empty($_SERVER["REMOTE_ADDR"])){
            $cip = $_SERVER["REMOTE_ADDR"];
        }
        else{
            $cip = "无法获取！";
        }
        return $cip;
    }
    //echo GetIP();
    if(isset($_POST['version'])){
        //$hash = $_POST['hash'];
        $mac = $_POST['mac'];
        $version = $_POST['version'];
        $ip = GetIP();
        $time = date('Y-m-d H:i:s',time());
        $hash = md5($mac.$time);
        $sql = sprintf("insert into hasilog (hash,mac,ip,time,version) VALUES ('%s','%s','%s','%s','%s')",
            mysql_real_escape_string($hash),
            mysql_real_escape_string($mac),
            mysql_real_escape_string($ip),
            mysql_real_escape_string($time),
            mysql_real_escape_string($version)
            );
        $rawResult=mysql_query($sql,dbConn());



    }else{
        header('HTTP/1.1 401 Unauthorized');
        header('status: 401 Unauthorized');
        echo "401 Unauthorized";
    }

?>