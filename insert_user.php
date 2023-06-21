<?php
include("includes/connection.php");


if(isset($_POST['sign_up'])){
	$name=$_POST['u_name'];
	echo $email=$_POST['u_email'];
	echo $password=$_POST['u_pass'];
	$country=$_POST['u_country'];
	$gender=$_POST['u_gender'];
	$status="unverified";
	$posts="no";
	$ver_code=mt_rand();
	
	if(strlen($password)<8){
		echo "<script>alert('password should be minnimum 8 characters!')</script>";
			exit();
	}
	$check_email="select * from users where user_email='$email' ";
		$run_email=mysqli_query($con,$check_email);
		$check=mysqli_num_rows($run_email);
		if($check==1){
	
			echo"<script>alert('Email is already Exist!!!')</script>";
			exit();
		}
	else{
	
$sql="INSERT INTO users(user_name,user_pass,user_email,user_country,user_gender,user_image,user_reg_date,status,ver_code,posts)"."VALUES('$name','$password','$email','$country','$gender','default.jpg',NOW(),'$status','$ver_code','$posts')";
$res=mysqli_query($con,$sql);
if(!$res)
{
	die('Query failed'.mysqli_error(con));
	
}
else
{
echo"<script>alert('data inserted sucessfuly!')</script>";	
}
	}
$con->close();
	
}
?>