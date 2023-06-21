<center>
	<form action="" method="post" id="f">
						<h2>Add new topic:</h2>
						<input type="text" name="title"  /><br/>
						<input type="submit" name="insert" value="Add new Topics"/>
	</form>
</center>
<?php
include("connection.php");
if(isset($_POST['insert'])){
	$topic=$_POST['title'];
	$insert="insert into topics (topic_name) values ('$topic')";
	$run_insert=mysqli_query($con,$insert);
	if($run_insert){
		
	echo"<script>alert('topic has been added:')</script>";
echo"<script>window.open('index.php?view_topics','_self')</script>";
	}
}
?>