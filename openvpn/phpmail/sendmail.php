<?php

	require_once "email.class.php";
	//******************** ������Ϣ ********************************
	$mail = new MySendMail();
	//$mail->setServer("", "XXXXX@126.com", "XXXXX"); //����smtp����������ͨ���ӷ�ʽ
	$mail->setServer("smtp@qq.com", "1136358656@qq.com", "dyjwyl919.", 465, true); //����smtp������������������SSL����
	$mail->setFrom("postmaster@yanlei.me"); //���÷�����
	$mail->setReceiver("13307130177@fudan.edu.cn"); //�����ռ��ˣ�����ռ��ˣ����ö��
	//$mail->setCc("XXXX"); //���ó��ͣ�������ͣ����ö��
	//$mail->setBcc("XXXXX"); //�������ܳ��ͣ�������ܳ��ͣ����ö��
	//$mail->addAttachment("XXXX"); //��Ӹ�����������������ö��
	$mail->setMail("test", "<b>test</b>"); //�����ʼ����⡢����
	$mail->sendMail(); //����
	//$mailcontent = "<h1>".$_POST['content']."</h1>";//�ʼ�����
	//$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
	//************************ ������Ϣ ****************************
	//$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
	//$smtp->debug = false;//�Ƿ���ʾ���͵ĵ�����Ϣ
	//$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
/*
	echo "<div style='width:300px; margin:36px auto;'>";
	if($state==""){
		echo "err";
		echo "<a href='index.html'>��˷���</a>";
		exit();
	}
	echo "��ϲ���ʼ����ͳɹ�����";
	echo "<a href='index.html'>��˷���</a>";
	echo "</div>";
*/
?>