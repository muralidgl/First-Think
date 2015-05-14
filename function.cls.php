<?php
class db 
{
	function db(){
		mysql_connect("localhost","root", "");
		mysql_select_db("android");
	}
	
	function db_result($query, $no_debug=false) //Returns the dataset as a two dimensional array
		{
			$resultArray = array();
			$res = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_assoc($res)){
				$resultArray[] = $row;
			}
			return $resultArray;
		}
	
	function db_write($query) //This inserts to the db and returns the affected rows 
		{
	
			return mysql_query($query) or die('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=error.php">');
		}
}
?>