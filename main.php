<?php
session_start();
include_once ("function.cls.php");
$objDb = new db();
$userID = $_POST['user_name']; 
$password = $_POST['password']; 
// $hashed_password = hash( 'sha512', $_POST['password'] );
// $userID = $_POST['user_name'];
// $password = $_POST['password'] ;
$check_or_insert = "SELECT * FROM user_details WHERE user_id ='".$userID."' AND user_password = '".$password."'";
$result1 = $objDb->db_result($check_or_insert);
// echo $check_or_insert;
// exit();
if(count($result1) == 0){
	$create_user = "INSERT INTO user_details (user_id,user_password) VALUES ('".$userID."','".$password."')";
	// echo $create_user;
	// exit();
	$insert = $objDb->db_write($create_user);
	if($insert == 'Mysql Error'){
		echo  "check your password";
	}
}
$_SESSION['session_user'] = $userID;
?>

<!DOCTYPE html> 
<html> 
	<head> 
	<title>FaceBook Auto Post</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.1.0.min.css" />
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.mobile-1.1.0.min.js"></script>
	<script>
	$(document).ready(function(){
		console.log('The DOM is ready.');
	});
	function add_form(){
		window.location.href="add_form.php";
	}
	function list_form(){
		window.location.href="list_form.php";
	}
	function delete_form(){
		window.location.href="delete_form.php";
	}
	</script>
</head> 
<body> 

<div data-role="page" data-theme="b">

	<div data-role="header" data-theme="a">
		<h1>First Mobile UI</h1>
	</div><!-- /header -->

	<div data-role="content">
	<?php
		if(count($result1) > 0){
			echo "<div style='text-align: center;'>Welcome</div>";
		}else {
			echo "<div style='text-align: center;'>Welcome as new user</div>";
		}
	?>
	<div>
	<a href="" data-role="button" onclick ='add_form()'>Add your FB Group ID's</a> 
	</div>
	<div>
	<a href="list_form.php" data-role="button" onclick ='list_form()'>Send your FB Group Post</a> 
	</div>
	<div>
	<a href="delete_form.php" data-role="button" onclick ='delete_form()'>Delete Your FB Group ID's</a> 
	</div>
	<div>
	<a href="index.php" data-role="button">Logout</a> 
	</div>
	</div><!-- /content -->

	<!--<div data-role="footer" data-theme="b">
		Need Help ?
	</div>-->
	<!-- /footer -->
</div><!-- /page -->

</body>
</html>