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
			}
			#posts button:hover{
				background: orange;
				color: aliceblue;
				text-decoration: underline;
				text-decoration-color: seagreen;
			}
			#content_timeline #h3{
				  text-shadow: 2px 1px gray;
			}
			form #search:hover{
				color: crimson;
				background-color: burlywood;
				text-decoration: underline;
				border: 1px solid green;
			}
		
		</style>
		<script src="jQuery/SESIONAL21.js" type="text/javascript"></script>
		<script src="jQuery/SESSIONAL2.js" type="text/javascript"></script>
	</head>
	<link rel="stylesheet" href="styles/home.css" media="all">
	<link rel="stylesheet" href="styles/posts.css" media="all">
	<link rel="stylesheet" href="styles/new_posts.css" media="all">
	
	<?php include("includes/user_session.php");?>

		<!--content timeline start-->
				<div id="content_timeline" class="content">
					<form action="home.php?id=<?php echo $user_id;?>" method="post" id="f">
						<h2>whats qustion your today?</h2>
						<input type="text" name="title" placeholder="write a title......" size="82" required="required"/><br/>
						<textarea cols="83" rows="4" name="content" placeholder="write description........"></textarea><br/>
						<select name="topic">
							<option>Select Topic</option>
							
							<!--get topics using function that is defined in function.php file included in function folder-->
							
							<?php getTopics();?>
						</select>
						<input type="submit" name="sub" value="post to timeline"/>
					</form>
					<!-- get posts using function that is defined in function.php file included in function folder-->
					
					<?php insertpost();?>
						<center><h3 id="h3">Most recent Discussion!</h3></center>
						<?php get_post(); ?>
				</div>
		<!--content area ends-->
	</div>
	<!--container ends-->
	
</body>
</html>