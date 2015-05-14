<?php
require_once ("function.cls.php");
include_once ("mail.cls.php");
class group extends db{
	function group(){
		parent::db();
	}
	
	function add($field, $value){
		$sql = "INSERT INTO user_details (".	implode(", ",$field) .") VALUES ('" 
				.implode("','",$value). "') where user_id ='navigate' ";
		$this->db_write($sql);		
		
	}
	
	function edit($value){
		// $format = str_replace( ",", "@groups.facebook.com,",$value);
		$count = "SELECT group_id FROM user_details WHERE user_id='".$_SESSION['session_user']."'";
		$result = $this->db_result($count);
		if ($result[0]['group_id'] == ""){
			$sql = "UPDATE user_details SET group_id = CONCAT(group_id,'".implode($value)."') WHERE user_id='".$_SESSION['session_user']."'";
		}else {
			$comma_before = "',".implode($value)."'";
			$sql = "UPDATE user_details SET group_id = CONCAT(group_id,".$comma_before.") WHERE user_id='".$_SESSION['session_user']."'";
		}
		$result = $this->db_write($sql);
		echo $result;
	}
	function delete($id){
		$sql = "DELETE FROM contact WHERE id = $id";
		$this->db_write($sql);
	}

	function get(){
		$sql = "SELECT group_id FROM user_details WHERE user_id='".$_SESSION['session_user']."'";
		$result = $this->db_result($sql); 
		return $result[0];
	}
	
}