<?php
include("includes/connection.php");
if(isset($_GET['delete'])){
	$g_id=$_GET['delete'];
	$delete="delete from users where user_id='$g_id'";
	$run_delete=mysqli_query($con,$delete);
	
	echo"<script>alert('User has been deleted:')</script>";
echo"<script>window.open('index.php?view_users','_self')</script>";
}
?>
