<?php
header("Content-type: text/html; charset=utf-8"); 
    function send_mail() {
      $url = 'http://sendcloud.sohu.com/webapi/mail.send.json';
      //使用子帐号和密码才可以进行邮件的发送。
      $param = array('api_user' => 'synapsewebservicemail',
              'api_key' => 'WWhy6msPpXlqf2Fr',
              'from' => 'admin@yanlei.me',
              'fromname' => 'SendCloud测试邮件',
              'to' => '1136358656@qq.com',
              'subject' => '来自SendCloud的第一封邮件！',
              'html' => '你太棒了！你已成功的从SendCloud发送了一封测试邮件，接下来快登录前台去完善账户信息吧！');

      $options = array('http' => array('method'  => 'POST','content' => http_build_query($param)));
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
      print_r($param);
      return $result;
    }
  echo send_mail();
  
?>