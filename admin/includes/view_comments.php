<center><table align="center" width="950" bgcolor="aqua">
	<tr bgcolor="orange" border="2">
		<th>S.N</th>
		<th>Post Content</th>
		<th>Comment</th>
		<th>Author Name</th>
		<th>Date</th>
		<th>Delete</th>
		<th>Edit</th>
	</tr>
	<?php
	include("includes/connection.php");
	$sel_com="select * from comments order by 1 desc";
	$run_com=mysqli_query($con,$sel_com);
	$i=0;
	while($rows=mysqli_fetch_array($run_com)){
			$post_id=$rows['post_id'];
			$com_id=$rows['com_id'];
			$comment=$rows['comments'];
			$comment_author=$rows['comment_auther'];
			$date=$rows['date'];
			$i++;	
		
		$sel_post="select * from pposts where post_id='$post_id'";
		$run_post=mysqli_query($con,$sel_post);
		while($row_post=mysqli_fetch_array($run_post)){
			$post_content=$row_post['post_content'];
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $post_content;?></td>
		<td><?php echo $comment;?></td>
		<td><?php echo $comment_author;?></td>
		<td><?php echo $date;?></td>
		<td><a href="delete_comment.php?delete=<?php echo $com_id?>">Delete</a></td>
		<td><a href="edit_comment.php?&edit=<?php echo $com_id?>">Edit</a></td>
	</tr>
	<?php } }?>
</table>
</center>
