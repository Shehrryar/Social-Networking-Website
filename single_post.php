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
				width: 850px;
				float: right;
				margin-right: 20px;
			}
			#posts{
			border-radius: 100px;
			}
			#posts p{
				margin-left: 30px;
			}
			#posts #p1{
				margin-left: 30px;
			}
			form textarea{
				margin-top: 5px;
				border: 1px solid gray;
				border-radius: 100px;
				text-align: center;
				font-style: oblique;
			}
			form #search:hover{
				color: crimson;
				background-color: burlywood;
				text-decoration: underline;
				border: 1px solid green;
			}
			form #input1{
				float: right;
				position: relative;
				top: 15px;
				right: 20px;
				height: 30px;
				border-radius: 100px;
			}
			form #input1:hover{
				color: crimson;
				background-color: burlywood;
				text-decoration: underline;
				border: 1px solid green;
			}
			#comment{
				width: 70%;
				text-align: center;
				background-color: azure;
				border-radius: 100px;
				margin-top:10px;
			}
			#comment:hover{
				background-color: DarkCyan;
				color: #E0FFFF;
				width: 80%;
				float: center;
			}
		</style>
	</head>
	<link rel="stylesheet" href="styles/home.css" media="all">
	<link rel="stylesheet" href="styles/posts.css" media="all">
	<link rel="stylesheet" href="styles/new_posts.css" media="all">

	<?php include("includes/user_session.php");?>
		<!--content timeline start-->
				<div id="content_timeline">
					
					<?php insertpost();?>
						<h3>Most recent Discussion!</h3>
						<?php single_post(); ?>
				</div>
		<!--content area ends-->
	</div>
	<!--container ends-->
	
</body>
</html>