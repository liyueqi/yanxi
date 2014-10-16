<META http-equiv="content-type" content="text/html; charset=utf-8">
<?
define('IN_SYS',true);
require_once 'class_weixin.php';
$wxmoli = new WX_Remote_Opera();
  $wxmoli->init('pan_pureflame@qq.com','YXHFfudan1');
$wxmoli->get_account_info();

//print_r($result);
/*$msglist = $wxmoli->getimgmaterial(); //获取图文消息
for($i = 0;$i < count($msglist);$i++){
    echo $msglist[$i]['title'];
    echo $msglist[$i]['app_id']."</br>";
}*/
//群发消息
$sResult = $wxmoli->getsumcontactlist();
$sum = 0;
for($i = 0;$i < count($sResult);$i++){
    $sum  =$sum + $sResult[$i]['cnt'];
}
$page = ceil($sum/10);
for($i = 0;$i < $page;$i++){
$grest = $wxmoli->getcontactlist(10,$i);
    for($m = 0;$m < count($grest);$m++){

        echo $grest[$m]['nick_name']."<br>";

        //echo $grest[$m]."\n";
    }

}
?>