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
				text-align: center;
				margin: 20px;
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
					
					<?php
						
						/* this u_id we can get from user profile.php by using user profile function*/
						
						if(isset($_GET['u_id'])){
							$u_id=$_GET['u_id'];
							
							/* query for message according to this user session that can be get from table of message */
							
							$sel="select * from users where user_id='$u_id'";
							
							$run=mysqli_query($con,$sel);
					$row=mysqli_fetch_array($run);
					$user_image=$row['user_image'];
					$user_name=$row['user_name'];
					$user_register_date=$row['user_reg_date'];
						}
					?>
					<h2>Send message to <span style="color:red;"><?php echo $user_name?></span></h2>
					
					<form action="message.php?u_id=<?php echo $u_id?>" method="post" id="f">
						<h2>Edit your post:</h2>
						<input type="text" name="msg_title"  size="49" required="required" placeholder="Message Subject"/><br/>
						<textarea cols="50" rows="5" name="msg" placeholder="write message" required="required"></textarea><br/>
						<input type="submit" name="message" value="Send message"/>
					</form><br/>
					<img style="border:2px solid blue;border-radius:5px;" src="users/<?php echo $user_image?>" width="100" height="100"/>
				</div>
		<!--content area ends-->
		  <?php
	if(isset($_POST['message'])){
		$msg_title=$_POST['msg_title'];
		$msg=$_POST['msg'];
		
		$insert="insert into messages (sender,receiver,msg_subject,msg_topic,reply,status,msg_date) values('$user_id','$u_id','$msg_title','$msg','no_reply','unread',NOW())";
		
		$run_insert=mysqli_query($con,$insert);
			
		if($run_insert){
			echo"<h2> message was sent to ".$user_name." successfully</h2>";
}
		else{
			echo"<h2> message was not sent....!</h2>";
		}
	}
		?>
	</div>
	<!--container ends-->
	
</body>
</html>