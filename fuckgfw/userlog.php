<?php
    include("dbConn.php");

    if(isset($_POST['hash'])){
        //$hash = $_POST['hash'];
        $mac = $_POST['mac'];
        $ip = $_POST['ip'];
        $time = date('Y-m-d H:i:s',time());
        $sql = sprintf("insert")



    }

?>