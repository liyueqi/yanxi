<?php
header("Content-type: text/html; charset=utf-8");
$key = $_GET['word'];
    if(isset($_GET['word']))
    


        $user_agent = "Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko";
        $url = "http://www.simsimi.com/func/reqN?lc=ch&ft=0.0&req=$key&fl=http://www.simsimi.com/talk.htm";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        
        $output = curl_exec($ch);
        curl_close($ch);
        $message = json_decode($output,true);
        $contentStr = $message["sentence_resp"];
        echo  $contentStr;
        echo "<br>".$url;
    }else{}

?>
