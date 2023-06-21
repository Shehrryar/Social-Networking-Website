<?php
include("includes/connection.php");
if(isset($_GET['delete'])){
	$g_id=$_GET['delete'];
	$delete="delete from pposts where post_id='$g_id'";
	$run_delete=mysqli_query($con,$delete);
	
	echo"<script>alert('post has been deleted:')</script>";
echo"<script>window.open('index.php?view_posts','_self')</script>";
}
?>
