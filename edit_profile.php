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
			form #search:hover{
				color: crimson;
				background-color: burlywood;
				text-decoration: underline;
				border: 1px solid green;
			}
			#content_timeline form table tr{
				background-color: aquamarine;
				height: 67px;
			}
			#content_timeline form table td{
				font-size: 25px;
				font-family: monospace;
				font-style: italic;
			}
		</style>
	</head>
	<link rel="stylesheet" href="styles/home.css" media="all">
	<link rel="stylesheet" href="styles/posts.css" media="all">
	<link rel="stylesheet" href="styles/new_posts.css" media="all">

		<?php include("includes/user_session.php");?>
		<!--content timeline start-->
				<div id="content_timeline">
					<form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
						<table>
							<tr align="center">
								<td colspan="6"><h2>Edit your Profile:</h2></td>
							</tr>
							<tr>
								<td align="right">Name:</td>
								<td>
									<input type="text" name="u_name" required="required" value="<?php echo $user_name;?>"/>
								</td>
							</tr>
							<tr>
								<td align="right">Password:</td>
								<td>
									<input type="password" name="u_pass" required="required" value="<?php echo $user_pass;?>"/>
								</td>
							</tr>
							<tr>
								<td align="right">Email:</td>
								<td>
									<input type="email" name="u_email" required="required" value="<?php echo $user_e;?>"/>
								</td>
							</tr>
							<tr>
								<td align="right">Country:</td>
								<td>
									<select name="u_country" disabled="disabled">
									<option><?php echo $user_country?></option>
									<option>Afganistan</option>
									<option>Pakistan</option>
									<option>United State</option>
									<option>United Arab Emirates</option>
									<option>Iran</option>
										</select>
								</td>
							</tr>
							<tr>
								<td align="right">Gender:</td>
								<td>
									<select name="u_gender" disabled="disabled">
									<option><?php echo $user_gender?></option>
									<option>Male</option>
									<option>Female</option>
									</select>
								</td>
							</tr>
							<tr>
								<td align="right">Photo:</td>
								<td>
									<input type="file" name="u_photo" required="required"/>
								</td>
							</tr>
							<tr align="center">
								<td colspan="6">
									<input type="submit" name="udate" value="Update"/>
								</td>
							</tr>
						</table>
					
					</form>
<?php
		if(isset($_POST['udate'])){
			$u_name=$_POST['u_name'];
			$u_pass=$_POST['u_pass'];
			$u_email=$_POST['u_email'];
			$u_image=$_FILES['u_photo']['name'];
			$image_tmp=$_FILES['u_photo']['tmp_name'];
			
			move_uploaded_file($image_tmp,"users/$u_image");
			$update="update users set user_name='$u_name',user_pass='$u_pass',user_email='$u_email',user_image='$u_image' where user_id='$user_id'";
			
			$run=mysqli_query($con,$update);
			
			if($run){
				echo"<script>alert('Your profile updated!')</script>";
					echo"<script>window.open('home.php','_self')</script>";
			}
			
		}			
					
	?>
				</div>
		<!--content area ends-->
	</div>
	<!--container ends-->
	
</body>
</html>