<?php
    function send_mail() {
      $url = 'http://sendcloud.sohu.com/webapi/mail.send.json';
      //不同于登录SendCloud站点的帐号，您需要登录后台创建发信子帐号，使用子帐号和密码才可以进行邮件的发送。
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

      return $result;
    }
  echo send_mail();
  var_dump($param);
?>