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
				left: -50px;
			}
			#posts #p2{
				margin-left: 64px;
			}
			#posts p{
				margin-left: 15px;
			}
			#posts{
				margin: 8px;
				border-radius: 100px;
			}
			#posts:hover{
				border: 1px solid green;
				color: chocolate;
			}
			#posts button{
				border-radius: 50px;
				height: 30px;
				position: relative;
				top: 2px;
				float: right;
				width: 60px;
			}
			#posts button:hover{
				background: orange;
				color: aliceblue;
				text-decoration: underline;
				text-decoration-color: seagreen;
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
				<h3>See your result here!</h3>
				<?php results();?>
		</div>
		<!--content area ends-->
	</div>
	<!--container ends-->
	
</body>
</html>