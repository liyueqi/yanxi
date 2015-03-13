<?php



    function sendTextMsg($me,$toUserName,$content){
        $time = time();
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";
        $msgType = "text";
        $resultStr = sprintf($textTpl, $toUserName, $me, $time, $msgType,$content );
        echo $resultStr;
        return 0;
    }
    if(isset($_GET['cron']))
    {
        $f = new SaeFetchurl();
        $content = $f->fetch("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx3324854046fdafbf&secret=258b855db8b44068bba73b831c05bea3");
        $jsonContent = json_decode($content,true);
        $accessSecret = $jsonContent['access_token'];
        //echo $accessSecret;
        $mysql = mysql_connect('w.rdc.sae.sina.com.cn:3307','l1womo3lo4','wz2x5hz0mjixwi00ilyj3jwjkxzxzwww13kj2ki2');
        if (!$mysql)
        {
            die('Could not connect: ' . mysql_error());
        }
        $time = time();//date('y-m-d h:m:s',time());
        //echo $time;
        mysql_select_db("app_kaguyatest",$mysql);
        $sql = sprintf("update accesstoken set timeshot='%s',accesstoken='%s' where id=0",
            mysql_real_escape_string($time),
            $accessSecret);
        // $sql = sprintf("select * from  accesstoken where id=0");
        $result = mysql_query($sql,$mysql);
        // $resultAreray = mysql_fetch_array($result,MYSQL_BOTH);
        //var_dump($resultAreray);

    }else
    {
        $RawMsg = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postObj=simplexml_load_string($RawMsg, 'SimpleXMLElement', LIBXML_NOCDATA);
        $msgType = $postObj->MsgType;
        $toUserName = $postObj->ToUserName;
        $fromUserName = $postObj->FromUserName;
        $createTime = $postObj->CreateTime;

        switch($msgType)
        {
            case "event":
                $event = $postObj->Event;
                if($event == "VIEW")
                {
                    $eventKey = $postObj->EventKey;
                }else
                {
                    if($event == "CLICK")
                    {
                        $eventKey = $postObj->EventKey;
                        if($eventKey =='test')
                        {
                            $content = "请点击链接查看测试文章~\n<a href=\" http://kaguyatest.sinaapp.com/gettest.php?openid=$fromUserName \">点我查看文章</a>\nBy Kaguya";
                            $result = sendTextMsg($toUserName,$fromUserName,$content);
                        }else
                        {
                            if($eventKey =='sauce')
                            {
                                $content = "这里是酱油\nBy Kaguya";
                                $result = sendTextMsg($toUserName,$fromUserName,$content);
                            }
                            else{}
                        }
                    }
                    else{}
                }

            case "text":
                $textMsgContent = $postObj->Content;
                $content = "你发送的内容是：".$textMsgContent."\n这里是回复测试，请点击链接查看测试文章~\n<a href=\" http://kaguyatest.sinaapp.com/gettest.php?openid=$fromUserName \">点我查看文章</a>\nBy Kaguya";
                $result = sendTextMsg($toUserName,$fromUserName,$content);
            default:



        }


    }


?>
