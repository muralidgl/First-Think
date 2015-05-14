<!DOCTYPE html> 
<html> 
	<head>
	<title>FaceBook Auto Post</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.1.0.min.css" />
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.mobile-1.1.0.min.js"></script>
	<link rel="stylesheet" href="css/front_end.css" />
	<script>
	$(document).ready(function(){
		console.log('The DOM is ready.');
		$(".handle").hide();
	});
	function back(){
		window.location.href="main.php";
	}
	function showId(){
		$("#dummy").hide();
		$("#group_id").val("");
		var data = "";
		var jdata = "";
		$.post('ajax.php',{data:jdata,submit:'get'},function(rdata){
		// alert ("Fetching Group ID's");
		var group = JSON.parse(rdata);
		// alert(group.group_id);
		$("#group_id").val(group.group_id);
		$(".handle").show();
		});
	}
	function send(){
		var data = {
			groupID: $('#group_id').val(),
			postData: $('#postText').val()
		};
		var jdata = JSON.stringify(data);
		$.post('ajax.php',{data:jdata,submit:'email'},function(rdata){
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

	<div data-role="main" data-role="content">
		<div id="dummy">
			<br/><br/><input type="submit" value="Show Group ID" onclick = 'showId()'/>
		</div> 
		<div class="handle"><br/>
				<label for="textarea-a" placeholder="MyGroupId,">Your FB Group ID's:</label><br/>
				<textarea name="textarea" id="group_id" placeholder="MyGroupId," readonly></textarea><br/>
				<label for="textarea-a" placeholder="MyGroupId,">FB Group Post Text</label><br/>
				<textarea name="postText" id="postText" placeholder="Enter your Post Text" required></textarea><br/>
		</div>
		<div class="handle">
			<a href="main.php" data-role="button" data-inline="true" data-theme="d" onclick = 'back()'>Back</a>
			<input type="submit" name="submit" id="submit" value="Post" onclick='send()' data-inline="true"/>
		</div>
	</div><!-- /content -->

	<!--<div data-role="footer" data-theme="b">
		Need Help ?
	</div>-->
	<!-- /footer -->
</div><!-- /page -->

</body>
</html>