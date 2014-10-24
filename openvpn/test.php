<?php
class mysql
{
    public $Conn;
    private $sql;
    private $dbStatus;
    private $RawResult;
    private $Result;
    public function __construct(){
        $this->Conn = mysql_connect("localhost","root","1136358656");
        mysql_select_db("openvpn") or die(mysql_error());
    }
    public function SelectDb($db)
    {
        $this->dbStatus = mysql_select_db($db,$this->Conn);
        mysql_query("set names gb2312",$this->Conn);
        return $this->dbStatus;
    }
    public function query($query)
    {
        $this->RawResult = mysql_query($query,$this->Conn);
        //$this->Result = mysql_fetch_row($this->RawResult);
        return $this->RawResult;
    }
    public function GetConn(){
        return $this->Conn;
    }
}
if(isset($_GET['code']))
{
    $code = $_GET['code'];
    $conn = new mysql();
    $sql = "select count(*) from invitecode where code='$code'";
    $result = $conn->query($sql);
    $rows = mysql_fetch_array($result);
    echo $rows[0];
    $sql = "select * from invitecode where code='$code'";
    $result = $conn->query($sql);
    $rows = mysql_fetch_array($result);
    $type = $rows['exp'];
    echo $type;


}else{}





?>