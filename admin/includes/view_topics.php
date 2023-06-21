<center><table align="center" width="950" bgcolor="aqua">
	<tr bgcolor="orange" border="2">
		<th>S.N</th>
		<th>Topic Name</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/connection.php");
	$sel_topics="select * from topics order by 1 desc";
	$run_topic=mysqli_query($con,$sel_topics);
	$i=0;
	while($rows=mysqli_fetch_array($run_topic)){
			$topic_id=$rows['topic_id'];
			$topic_name=$rows['topic_name'];
			$i++;	
		
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $topic_name;?></td>
		<td><a href="delete_topic.php?delete=<?php echo $topic_id;?>">Delete</a></td>
	</tr>
	<?php  }?>
	
</table>
</center>
