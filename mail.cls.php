<?php
include_once ('mail/swift_required.php');
class Mail extends db 
{
	function Mail()
	{
		parent::db();
	}
	
	function murali_email($send_mail_to,$subject,$mail_content){	
		$company_name = "Murali";
		$username = "creatorsnest2015@gmail.com";
		$password = "muralidhi12";
		
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'tls')
			 ->setUsername($username)
			 ->setPassword($password)
		;
	// print_r($transport);
	// exit();

		//Create the Mailer using your created Transport
		$mailer = Swift_Mailer::newInstance($transport);

		//Create a message
		  $message = Swift_Message::newInstance($subject)
		  ->setFrom(array($username => $company_name)) //Change to your user name...
		  ->setBcc(array($send_mail_to))
		  ->setBody($mail_content);
		
		//Send the message
		$result = $mailer->send($message);
		// print_r($result);
		// exit();
		//$result = $mailer->batchSend($message);
		if ($result)
		{
			echo "Mail Send successfully";
		}else{
			echo "Send Failed";
		}
	}
}

?>