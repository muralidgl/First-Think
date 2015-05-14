<!DOCTYPE html> 
<html> 
	<head>
	<title>FaceBook Auto Post</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
	<link rel="stylesheet" href="css/front_end.css" />
	<script>
	$(document).ready(function(){
		$.post('ajax.php',{data:jdata,submit:'get'},function(rdata){
			if (rdata == 1){
				alert ("Group Added Successfully");
				$.mobile.loadPage( "add_form.php");
			}else{
				alert ("Please check Group ID's data");
			}
		});
	});
	function delete(){
		var data = {
			groupID: $('#group_id').val()
		};
		var jdata = JSON.stringify(data);
		$.post('ajax.php',{data:jdata,submit:'delete'},function(rdata){
			if (rdata == 1){
				alert ("Group Added Successfully");
				$.mobile.loadPage( "add_form.php");
			}else{
				alert ("Please check Group ID's data");
			}
		});
	}
	</script>
</head> 
<body> 

<div data-role="page" data-theme="b">

	<div data-role="header" data-theme="a">
		<h1>First Mobile UI</h1>
	</div><!-- /header -->

	<div data-role="content">
		<ul data-role="listview" data-filter="true" data-filter-placeholder="Search Group..." data-inset="true">
			<li><a href="#">Apple</a></li>
			<li><a href="#">Banana</a></li>
			<li><a href="#">Cherry</a></li>
			<li><a href="#">Cranberry</a></li>
			<li><a href="#">Grape</a></li>
			<li><a href="#">Orange</a></li>
		</ul>
		<a href="main.php" data-role="button">Cancel</a>
	</div><!-- /content -->

	<!--<div data-role="footer" data-theme="b">
		Need Help ?
	</div>-->
	<!-- /footer -->
</div><!-- /page -->

</body>
</html>