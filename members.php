<!DOCTYPE>

<?php
session_start();
include("includes/connection.php");
include("function/function.php");
?>
<html>
	<head>
		<title>Homepage</title>
		<style>
			#content_timeline{
				width: 800px;
				float: right;
				position: relative;
				left: -40px;
			}
			#div1:hover{
				background-color: aliceblue;
				border-radius: 100px;
				border: 2px solid black;
			}
			#div1{
				margin:10px;
			}
			#div1 h3{
				margin-right: 50px;
				font-size: 30px;
			text-shadow: 3px 2px blue;
				color: burlywood;
			}
			form #search:hover{
				color: crimson;
				background-color: burlywood;
				text-decoration: underline;
				border: 1px solid green;
			}
		</style>
	</head>
	<link rel="stylesheet" href="styles/home.css" media="all">
	<link rel="stylesheet" href="styles/posts.css" media="all">
	<link rel="stylesheet" href="styles/new_posts.css" media="all">

	<?php include("includes/user_session.php");?>
		<!--content timeline start-->
				<div id="content_timeline">
					
						<center><h3>see all members!</h3></center>
						<?php members();?>
				</div>
		<!--content area ends-->
	</div>
	<!--container ends-->
	
</body>
</html>