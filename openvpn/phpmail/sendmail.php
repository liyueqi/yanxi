<?php
    function send_mail() {
      $url = 'http://sendcloud.sohu.com/webapi/mail.send.json';
      //��ͬ�ڵ�¼SendCloudվ����ʺţ�����Ҫ��¼��̨�����������ʺţ�ʹ�����ʺź�����ſ��Խ����ʼ��ķ��͡�
      $param = array('api_user' => 'synapsewebservicemail',
              'api_key' => 'WWhy6msPpXlqf2Fr',
              'from' => 'admin@yanlei.me',
              'fromname' => 'SendCloud�����ʼ�',
              'to' => '1136358656@qq.com',
              'subject' => '����SendCloud�ĵ�һ���ʼ���',
              'html' => '��̫���ˣ����ѳɹ��Ĵ�SendCloud������һ������ʼ������������¼ǰ̨ȥ�����˻���Ϣ�ɣ�');

      $options = array('http' => array('method'  => 'POST','content' => http_build_query($param)));
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);

      return $result;
    }
  echo send_mail();
  var_dump($param);
?>