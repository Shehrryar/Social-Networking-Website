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
			#content_timeline
			{
				width: 800px;
				float: right;
				position: relative;
				left: -40px;
			}
			#posts a button:hover{
				background: orange;
				color: white;
				border: 1px solid silver;
			}
			#posts a button{
				width: 50px;
				margin-left: 1px;
				font-weight: bold;
				position: relative;
				top: 3px;
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
					
						<center><h3>User posts!</h3></center>
						<?php user_post();?>
				</div>
		<!--content area ends-->
	</div>
	<!--container ends-->
	
</body>
</html>