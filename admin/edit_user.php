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
	$get_user="select * from users where user_id='$edit_id'";
	$run_user=mysqli_query($con,$get_user);
	$rows=mysqli_fetch_array($run_user);
			$user_id=$rows['user_id'];
			$user_name=$rows['user_name'];
			$user_email=$rows['user_email'];
			$user_pass=$rows['user_pass'];
			$user_country=$rows['user_country'];
			$user_image=$rows['user_image'];
			$register_date=$rows['user_reg_date'];
			$user_gender=$rows['user_gender'];
?>	
	<form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
						<table  id="table1">
							<tr align="center">
								<td colspan="6"><h2>Editing user Account:</h2></td>
							</tr>
							<tr>
								<td align="right">Name:</td>
								<td>
									<input type="text" name="u_name" required="required" value="<?php echo $user_name;?>"/>
								</td>
							</tr>
							<tr>
								<td align="right">Passwoed:</td>
								<td>
									<input type="password" name="u_pass" required="required" value="<?php echo $user_pass;?>"/>
								</td>
							</tr>
							<tr>
								<td align="right">Email:</td>
								<td>
									<input type="email" name="u_email" required="required" value="<?php echo $user_email;?>"/>
								</td>
							</tr>
							<tr>
								<td align="right">Country:</td>
								<td>
									<select name="u_country">
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
									<select name="u_gender">
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
			
			move_uploaded_file($image_tmp,"../users/$u_image");
			$update="update users set user_name='$u_name',user_pass='$u_pass',user_email='$u_email',user_image='$u_image' where user_id='$edit_id'";
			
			$run=mysqli_query($con,$update);
			
			if($run){
				echo"<script>alert('User has been updated!')</script>";
					echo"<script>window.open('index.php?view_users','_self')</script>";
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


