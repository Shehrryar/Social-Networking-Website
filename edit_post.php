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
			form #search:hover{
				color: crimson;
				background-color: burlywood;
				text-decoration: underline;
				border: 1px solid green;
			}
			#f h2{
				text-shadow: 2px 1px black;
			}
			#f{
				margin-top: 40px;
				margin-left: -40px;
			}
			.for{
				margin-top: 20px;
			} 
		</style>
	</head>
	<link rel="stylesheet" href="styles/home.css" media="all">
	<link rel="stylesheet" href="styles/posts.css" media="all">
	<link rel="stylesheet" href="styles/new_posts.css" media="all">

	<?php include("includes/user_session.php");?>
		<!--content timeline start-->
	
				<div id="content_timeline">
						<?php
			if(isset($_GET['post_id'])){
				$get_id=$_GET['post_id'];
				$get_post="select * from pposts where post_id='$get_id'";
				$run_post=mysqli_query($con,$get_post);
				$row=mysqli_fetch_array($run_post);
				
				$post_title=$row['post_title'];
				 $post_content=$row['post_content'];
			}
		
		?>
					
					<center><form action="" method="post" id="f">
						<h2>Edit your post:</h2>
						<input class="for" type="text" name="title"  size="102" required="required" value="<?php echo $post_title;?>"/><br/>
						<textarea class="for" cols="103" rows="4" name="content" value="<?php echo $post_content;?>" required="required"></textarea><br/>
						<select class="for" name="topic">
							<option>Select Topic</option>
							<?php getTopics();?>
						</select>
						<input class="for" type="submit" name="update" value="post to timeline"/>
					</form></center>
<?php
						if(isset($_POST['update'])){
								$title=$_POST['title'];
								$content=$_POST['content'];
								$topics=$_POST['topic'];
							
							$update_post="update pposts set post_title ='$title', post_content='$content' ,topic_id='$topics' where post_id='$get_id'";
				$run_update=mysqli_query($con,$update_post);
							
							
	if($run_update){
		echo"<script>alert('post is updated!')</script>";
		echo"<script>window.open('my_post.php','_self')</script>";
		
	}
				}
	?>
					
				</div>
		<!--content area ends-->
	</div>
	<!--container ends-->
	
</body>
</html>