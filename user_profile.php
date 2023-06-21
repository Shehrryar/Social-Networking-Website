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
			#user_profile table tr td img{
				float: right;
			}
			#user_profile table{
				height: 75%;
				width: 30%;
				font-size: 20px;
				margin-top: 30px;
			}
			#user_profile table tr td a button{
				height: 40px;
				border-radius: 10px;
			}
			#user_profile table tr td a button:hover{
				background-color: cadetblue;
				color: cornsilk;
				font-size: 15px;
			}
			#user_p{
				background-color: antiquewhite;
				height: 100%;
				
			}`
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
				<div id="user_p">
					
						<h1 id="h1">Infromation about this user!</h1>
						<center>
							
					<?php user_profile(); 
					?>
						
					</center>
				</div>
		<!--content area ends-->
	</div>
	<!--container ends-->
	
</body>
</html>