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
	$get_post="select * from pposts where post_id='$edit_id'";
	$run_post=mysqli_query($con,$get_post);
	$rows=mysqli_fetch_array($run_post);
			$post_new_id=$rows['post_id'];
			$post_title=$rows['post_title'];
			$post_content=$rows['post_content'];
?>	
				<center><h2>Update the post</h2></center>
	
					<center><form action="" method="post" id="f">
						<h2>Edit your post:</h2>
						<input type="text" name="title"  size="82" required="required" value="<?php echo $post_title;?>"/><br/>
						<textarea cols="83" rows="4" name="content" value="<?php echo $post_content;?>" required="required"></textarea><br/>
						<select name="topic">
							<option>Select Topic</option>
							<?php getTopics();?>
						</select>
						<input type="submit" name="update" value="post to timeline"/>
					</form></center>
<?php
		if(isset($_POST['update'])){
			$title=$_POST['title'];
			$content=$_POST['content'];
			$topic=$_POST['topic'];

			$update="update pposts set post_title='$title',post_content='$content',topic_id='$topic' where post_id='$post_new_id'";
			
			$run=mysqli_query($con,$update);
			
			if($run){
				echo"<script>alert('post has been updated!')</script>";
					echo"<script>window.open('index.php?view_posts','_self')</script>";
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


