<?php
session_start();
include("includes/connection.php");
include("functions/get_topic.php");
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
		<link rel="stylesheet" href="style/edit_user.css"/>
		
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
					<li><a href="admin_logout.php">Admin Logout</a></li>
				</ul>
			</div>
			
			<div id="content">
				<?php
	        	$email=$_SESSION['Admin_email'];
	            echo "<h2>$email Manage your Account:</h2>";
				}
				?>
			<?php
if(isset($_GET['edit'])){
	$edit_id=$_GET['edit'];
	$get_com="select * from comments where com_id='$edit_id'";
	$run_com=mysqli_query($con,$get_com);
	$rows=mysqli_fetch_array($run_com);
			$com_id=$rows['com_id'];
			$comment_auther=$rows['comment_auther'];
			$comments=$rows['comments'];
?>	
				<center><h2>Update the comment</h2></center>
	
					<center><form action="" method="post" id="f">
						<h2>Edit your post:</h2>
						<input type="text" name="title"  size="82" required="required" value="<?php echo $comment_auther;?>"/><br/>
						<textarea cols="83" rows="4" name="content" value="<?php echo $comments;?>" required="required"></textarea><br/>
						<input type="submit" name="update" value="update Comment"/>
					</form></center>
<?php
		if(isset($_POST['update'])){
			$name=$_POST['title'];
			$new_comment=$_POST['content'];

			$update="update comments set comment_auther='$name',comments='$new_comment' where com_id='$com_id'";
			
			$run=mysqli_query($con,$update);
			
			if($run){
				echo"<script>alert('comment has been updated!')</script>";
					echo"<script>window.open('index.php?view_comments','_self')</script>";
			}
			
		}		
}
					
	?>
		

			</div>
			
			
			<footer>
			
			</footer>
		
		</div>
	
	
	
	</body>

</html>


