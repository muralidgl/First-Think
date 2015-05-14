<?php
session_start();
include_once("group.cls.php");
include_once("mail.cls.php");
switch($_POST['submit']){
	case 'save':
		$cont_data = json_decode($_POST['data']);
		$objCon = new group;
		$f = array('group_id');
		$v = array($cont_data->groupID);
		$objCon->add($f,$v);
		// echo json_encode($objCon->getContacts());
		break;
		case 'edit':
		$cont_data = json_decode($_POST['data']);
		$objCon = new group;
		$f = array('group_id');
		$v = array($cont_data->groupID);
		$objCon->edit($v);
		// echo json_encode($objCon->getContacts());
		break;
	case 'get':
		$objCon = new group;
		echo json_encode($objCon->get());
		break;	
	case 'email':
		$objCon = new Mail;
		$cont_data = json_decode($_POST['data']);
		// $id = array($cont_data->groupID);
		// $data = array($cont_data->postData);
		$send_mail_to = 'sweathadey@gmail.com';
		$subject='test';
		$mail_content='content';
		$objCon->murali_email($send_mail_to,$subject,$mail_content);
		break;
	default :
		break;
}
?>