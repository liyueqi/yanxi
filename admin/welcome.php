<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="gbk">
    <style>
        #background { position: fixed;top: 0;left: 0;width: 100%;height: 100%;overflow: hidden;background-color: #211f1f; display:none\8;}
        #background .bg-photo {position: absolute;top: 0;left: 0;width: 100%;height: 100%;display: none;overflow: hidden;-webkit-background-size: cover !important;-moz-background-size: cover !important;-o-background-size: cover !important;background-size: cover !important;}

        #background .bg-photo-1 { background: url('background.png') no-repeat center center;}

        #background-ie { position: fixed;top: 0;left: 0;width: 100%;height: 100%;overflow: hidden;background-color: #211f1f;}
    </style>


</head>
<body>
<div id="background">
    <div class="bg-photo bg-photo-1" style="display: block;"></div>
</div>

<?php
    $cookie =  $_COOKIE["yanxistatus"];
    //echo $cookie;
    $arr = unserialize($cookie);
    echo $arr['user']."<br>".$arr['group']."<br>".$arr['hash'];



?>



</body>
</html>
