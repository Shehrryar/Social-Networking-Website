<?php

if (isset($_POST['login'])){
	$admin_pass=$_POST['psw'];
	$admin_email=$_POST['uname'];
	
	$query="select * from admin where Admin_email='$admin_email' and Admin_password='$admin_pass'";
	$run_query=mysqli_query($con,$query);
	$row_query=mysqli_num_rows($run_query);
	if($row_query==0){
		echo"<script>alert('Email or Password is incorrect!')</script>";
	}
	else{
		
	        $_SESSION['Admin_email']=$admin_email;
			echo"<script>window.open('index.php','_self')</script>";
	}
}

?>