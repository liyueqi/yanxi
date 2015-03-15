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
    echo $ip;
    if(isset($_POST['hash'])){
        //$hash = $_POST['hash'];
        $mac = $_POST['mac'];
        $ip = $_POST['ip'];
        $time = date('Y-m-d H:i:s',time());
        $sql = sprintf("insert ");



    }

?>