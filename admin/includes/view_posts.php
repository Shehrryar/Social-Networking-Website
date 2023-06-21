<center><table align="center" width="950" bgcolor="aqua">
	<tr bgcolor="orange" border="2">
		<th>S.N</th>
		<th>Title</th>
		<th>Author</th>
		<th>Date</th>
		<th>Delete</th>
		<th>Edit</th>
	</tr>
	<?php
	include("includes/connection.php");
	$sel_post="select * from pposts order by 1 desc";
	$run_post=mysqli_query($con,$sel_post);
	$i=0;
	while($rows=mysqli_fetch_array($run_post)){
			$post_id=$rows['post_id'];
			$user_id=$rows['user_id'];
			$post_title=$rows['post_title'];
			$post_date=$rows['post_date'];
			$i++;	
		
		$sel_user="select * from users where user_id='$user_id'";
		$run_user=mysqli_query($con,$sel_user);;
		while($row_user=mysqli_fetch_array($run_user)){
			$user_name=$row_user['user_name'];
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $post_title;?></td>
		<td><?php echo $user_name;?></td>
		<td><?php echo $post_date;?></td>
		<td><a href="delete_post.php?delete=<?php echo $post_id?>">Delete</a></td>
		<td><a href="edit_post.php?&edit=<?php echo $post_id?>">Edit</a></td>
	</tr>
	<?php } }?>
</table>
</center>
