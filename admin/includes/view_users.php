<table align="center" width="950" bgcolor="aqua">
	<tr bgcolor="orange" border="2">
		<th>S.N</th>
		<th>Name</th>
		<th>Country</th>
		<th>Gender</th>
		<th>Image</th>
		<th>Delete</th>
		<th>Edit</th>
	</tr>
	<?php
	include("includes/connection.php");
	$get_user="select * from users order by 1 desc";
	$run_user=mysqli_query($con,$get_user);
	$i=0;
	while($rows=mysqli_fetch_array($run_user)){
			$user_id=$rows['user_id'];
			$user_name=$rows['user_name'];
			$user_country=$rows['user_country'];
			$user_image=$rows['user_image'];
			$register_date=$rows['user_reg_date'];
			$user_gender=$rows['user_gender'];
			$i++;		
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $user_name;?></td>
		<td><?php echo $user_country;?></td>
		<td><?php echo $user_gender;?></td>
		<td><img src="../users/<?php echo $user_image;?>" width="50" height="50"/></td>
		<td><a href="delete_user.php?delete=<?php echo $user_id?>">Delete</a></td>
		<td><a href="edit_user.php?&edit=<?php echo $user_id?>">Edit</a></td>
	</tr>
	<?php } ?>
</table>

