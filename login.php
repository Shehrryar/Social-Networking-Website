<?php
session_start();
include("includes/connection.php");
	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$select_user="select * from users where user_email='$email' && user_pass='$pass'";
		$result=mysqli_query($con,$select_user);
		$row_fetch=mysqli_fetch_array($result);
		$d_email=$row_fetch['user_email'];
		$d_pass=$row_fetch['user_pass'];
		if($email==$d_email && $d_pass==$pass)
		{
			$_SESSION['user_email']=$email;
			echo"<script>window.open('home.php','_self')</script>";
		}
		else 
		{
			echo"<script>alert('email or password  are incorrect:')</script>";
		}
		
	}
//mysqli_real_escape_string($con,
?>
