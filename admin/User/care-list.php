<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>
    <script src="../Node/jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
    <style type="text/css">
        .comments {
            width:100%;/*自动适应父布局宽度*/
            overflow:auto;
            word-break:break-all;
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
    </head>
<body>
<?php
define('IN_SYS',true);
require_once 'class_weixin.php';
$wxmoli = new WX_Remote_Opera();
$wxmoli->init('732467466@qq.com','wyldyj919');
$wxmoli->get_account_info();
$sResult = $wxmoli->getsumcontactlist();
$sum = 0;
for($i = 0;$i < count($sResult);$i++){
    $sum  =$sum + $sResult[$i]['cnt'];
}
$page = ceil($sum/10);


echo '<table class="table table-bordered table-hover definewidth m10">';
echo "<thead><tr>";
for($i = 0;$i < $page;$i++){
    $grest = $wxmoli->getcontactlist(10,$i);
    $num = $num + count($grest);

    for($m = 0;$m < count($grest);$m=$m+5){
        echo "<tr><td>".$grest[$m]['nick_name']."</td><td>";
        echo $grest[$m+1]['nick_name']."</td><td>";
        echo $grest[$m+2]['nick_name']."</td><td>";
        echo $grest[$m+3]['nick_name']."</td><td>";
        echo $grest[$m+4]['nick_name']."</td></tr>";

        //echo $grest[$m]."\n";
    }

}
echo "总人数：$num";
echo "</table>";
?>


</body>
</html>