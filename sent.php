<table id="tab_heading">
						<tr>
							<th>Receive:</th>
							<th>Subject:</th>
							<th>Date:</th>
							<th>Reply:</th>
						</tr>
					
					<?php
	
						$sel_msg="select * from messages where sender='$user_id' order by 1 desc";
						$run_msg=mysqli_query($con,$sel_msg);
						$count_msg=mysqli_num_rows($run_msg);
					
					while($row=mysqli_fetch_array($run_msg)){
						$msg_id=$row['message_id'];
						$sender=$row['sender'];
						$receiver=$row['receiver'];
						$subject=$row['msg_subject'];
						$topic=$row['msg_topic'];
						$date=$row['msg_date'];
						
						
					$get_receiver="select * from users where user_id='$receiver'";
					
					$run_receiver=mysqli_query($con,$get_receiver);
						$row=mysqli_fetch_array($run_receiver);
						
						$receiver_name=$row['user_name'];
									
					 ?>
					<tr id="tr2" align="center">
						<td><a href="user_profile.php?u_id=<?php echo $receiver;?>" target="_blank">
							<?php echo $receiver_name;?>
							</a>
						</td>
						<td>
							<?php echo $topic?>
						</td>
						<td><?php echo $date;?></td>
						<td><a href="my_message.php?sent=<?php echo $msg_id;?>">View Reply
							
							</a>
						</td>
					</tr> 
						<?php } ?>
					</table>
					<?php
					if(isset($_GET['sent'])){
						$get_id=$_GET['sent'];
						$sel_message="select * from messages where message_id='$get_id'";
						
						$run_message=mysqli_query($con,$sel_message);
						$row_message=mysqli_fetch_array($run_message);
						
						$msgs_subject=$row_message['msg_subject'];
						$msgs_topic=$row_message['msg_topic'];
						$msg_reply=$row_message['reply'];
						
						$update_unread="update messages set status='read' where message_id='$get_id'";
						$run_thread=mysqli_query($con,$update_unread);
					
					echo "<center><br/><hr/>
		<table id='table2' width='400px'>
		<tr>
		<td>Subject</td><td><p>$msgs_subject</p></td>
		</tr>
		<tr>
		<td>Message</td><td><p>$msgs_topic</p></td>
		</tr>
		<tr>
		<td>My Reply</td><td><p>$msg_reply</p></td>
		</tr>
		</table>
		
		
	</center>";
						}
				

					?>