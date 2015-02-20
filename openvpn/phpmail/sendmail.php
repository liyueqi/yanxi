<?php

	require_once "email.class.php";
	//******************** 配置信息 ********************************
	$mail = new MySendMail();
	//$mail->setServer("", "XXXXX@126.com", "XXXXX"); //设置smtp服务器，普通连接方式
	$mail->setServer("smtp@qq.com", "1136358656@qq.com", "dyjwyl919.", 465, true); //设置smtp服务器，到服务器的SSL连接
	$mail->setFrom("postmaster@yanlei.me"); //设置发件人
	$mail->setReceiver("13307130177@fudan.edu.cn"); //设置收件人，多个收件人，调用多次
	//$mail->setCc("XXXX"); //设置抄送，多个抄送，调用多次
	//$mail->setBcc("XXXXX"); //设置秘密抄送，多个秘密抄送，调用多次
	//$mail->addAttachment("XXXX"); //添加附件，多个附件，调用多次
	$mail->setMail("test", "<b>test</b>"); //设置邮件主题、内容
	$mail->sendMail(); //发送
	//$mailcontent = "<h1>".$_POST['content']."</h1>";//邮件内容
	//$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	//$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	//$smtp->debug = false;//是否显示发送的调试信息
	//$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
/*
	echo "<div style='width:300px; margin:36px auto;'>";
	if($state==""){
		echo "err";
		echo "<a href='index.html'>点此返回</a>";
		exit();
	}
	echo "恭喜！邮件发送成功！！";
	echo "<a href='index.html'>点此返回</a>";
	echo "</div>";
*/
?>