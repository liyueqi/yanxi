<?php
$conn = null;
function getConnection(){

	global $conn;
	$conn = mysql_connect("mysql5.000webhost.com",'a8750801_wyl','wylbbdd.');
	mysql_query("set names 'GBK'");
	mysql_select_db("a8750801_check") or die(mysql_error());

}

function closeConnection(){
	global $conn;
	if($conn){
		mysql_close($conn);
	}
}
//echo md5('admin');
?>
