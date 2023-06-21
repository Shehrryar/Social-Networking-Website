<?php
session_start();
include("includes/connection.php");
if(!isset($_SESSION['Admin_email'])){
	header("location:admin_login.php");
	
}
else{
?>	

<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to Admin panel</title>
		<link rel="stylesheet" href="style/admin_style.css"/>
		
	</head>
	<body>
		<div class="container">
			<div id="head">
				<h1>Welcome to the Admin panel</h1>
			</div>
			
			<div id="sidebar">
				<h2>Manage Content:</h2>
				<ul id="menu">
					<li><a href="index.php?view_users">View Users</a></li>
					<li><a href="index.php?view_posts">View posts</a></li>
					<li><a href="index.php?view_topics">View topics</a></li>
					<li><a href="index.php?add_new_topics">Add New Topics</a></li>
					<li><a href="index.php?view_comments">View Comments</a></li>
					<li><a href="admin_logout.php">Admin Logout</a></li>
				</ul>
			</div>
			
			<div id="content">
				<?php
	        	$email=$_SESSION['Admin_email'];
	            echo "<center><h2>$email Manage your Account:</h2></center>";
				}
				?>
				<?php
				if(isset($_GET['view_users'])){
					include("includes/view_users.php");
				}
				
				?>
				<?php
				if(isset($_GET['view_posts'])){
					include("includes/view_posts.php");
				}
				
				?>
				<?php
				if(isset($_GET['view_topics'])){
					include("includes/view_topics.php");
				}
					?>
				<?php
				if(isset($_GET['add_new_topics'])){
					include("includes/add_new_topics.php");
				}
					?>
				<?php
				if(isset($_GET['view_comments'])){
					include("includes/view_comments.php");
				}
				
				?>
			</div>
			
			
			<footer>
			
			</footer>
		
		</div>
	
	
	
	</body>

</html>
