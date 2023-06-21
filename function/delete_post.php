<?php
$con=mysqli_connect("localhost","root","","Social_media") or die ("connection was not established");

if(isset($_GET['post_id'])){
	$post_id=$_GET['post_id'];
	$delete_post="delete from pposts where post_id='$post_id'";
	$run_delete=mysqli_query($con,$delete_post);
	
	if($run_delete){
		echo"<script>alert('post is deleted!')</script>";
		echo"<script>window.open('../my_post.php','_self')</script>";
		
	}

}
?>