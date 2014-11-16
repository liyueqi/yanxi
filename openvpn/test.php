<?php
include 'mysql.php';
$type = $_GET['type'];
$con = new mysql();
$sql = "select * from studentdb where stunum='$username' and pass='$password'";
$rawresult = $con->query($sql);



?>