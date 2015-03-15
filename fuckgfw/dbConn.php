<?php
include("./config/config.php");
function dbConn()
{
    if(!isset($__con))
    {
        $con = mysql_connect(constant("DB_HOST"),
            constant("DB_USER"),constant("DB_PASSWORD"));
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db(constant("DB_NAME"), $con);
        mysql_query("SET NAMES UTF8");
        $__con=$con;
        return $con;
    } else return $__con;
}