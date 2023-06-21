<!DOCTYPE>

<?php
session_start();
include("includes/connection.php");
include("function/function.php");
?>
<html>
	<head>
		<title>Homepage</title>
		<style>
			#msg #inbox{
				margin-top: 25px;
				font-size: 30px;
				}
			#msg #inbox a{
				color: cadetblue;
				text-decoration: none;
			}
			#tab_heading{
				width: 850px;
			}
			#tab_heading tr th{
				border: 2px solid brown;
				background-color: burlywood;
				color: deeppink;
			}
			#tab_heading #tr2{
				background-color: aliceblue;
			}
			#tab_heading #tr2 td:hover{
				background-color: chocolate;
			}
			#tab_heading #tr2 a{
				font-size: 20px;
				text-decoration: none;
				color: darkseagreen;
			}
			#tab_heading #tr2 a:hover{
				color: antiquewhite;
			}
			#table2 tr td{
				background-color: lemonchiffon;
				font-size: 20px;
				font-family: fantasy;
			}
			#table2 tr td p{
				color: darkblue;
				font-family: serif;
			}
			#form1 textarea{
				border-radius: 100px;
			}
			#form1 #rep{
				margin-top: 7px;
				height: 25px;
				border-radius: 10px;
				float: right;
			}
			#form1 #rep:hover{
				background-color: blue;
				color: white;
			}
			form #search:hover{
				color: crimson;
				background-color: burlywood;
				text-decoration: underline;
				border: 1px solid green;
			}
		</style>
	</head>
	<link rel="stylesheet" href="styles/home.css" media="all">
	<link rel="stylesheet" href="styles/posts.css" media="all">
	<link rel="stylesheet" href="styles/new_posts.css" media="all">

	<?php include("includes/user_session.php");?>
		<!--content timeline start-->
				<div id="msg">
					<p id="inbox" align="center">
						<a href="my_message.php?inbox">MY Inbox</a> ||
						<a href="my_message.php?sent">Sent Items</a>
					</p>
					<?php
						if(isset($_GET['sent'])){
							include("sent.php");
						}
					?>
					<?php if(isset($_GET['inbox'])){?>
					<table id="tab_heading">
						<tr>
							<th>SENDER</th>
							<th>SUBJECT</th>
							<th>DATE</th>
							<th>REPLY</th>
						</tr>
				
					<?php
	
						$sel_msg="select * from messages where receiver='$user_id' order by 1 desc";
						$run_msg=mysqli_query($con,$sel_msg);
						$count_msg=mysqli_num_rows($run_msg);
					
					while($row=mysqli_fetch_array($run_msg)){
						$msg_id=$row['message_id'];
						$sender=$row['sender'];
						$receiver=$row['receiver'];
						$subject=$row['msg_subject'];
						$topic=$row['msg_topic'];
						$date=$row['msg_date'];
						
						
					$get_sender="select * from users where user_id='$sender'";
					
					$run_sender=mysqli_query($con,$get_sender);
						$row=mysqli_fetch_array($run_sender);
						
						$sender_name=$row['user_name'];
									
					 ?>
					
					<tr id="tr2" align="center">
						<td><a href="user_profile.php?u_id=<?php echo $sender;?>" target="_blank">
							<?php echo $sender_name;?>
							</a>
						</td>
						<td><a href="my_message.php?msg_id&inbox=<?php echo $msg_id;?>">
							<?php echo $subject?>
							</a>
						</td>
						<td><?php echo $date;?></td>
						<td><a href="my_message.php?inbox=<?php echo $msg_id;?>">Reply
							
							</a>
						</td>
					</tr> 
						<?php }?>
					</table>
					<?php
					if(isset($_GET['inbox'])){
						$get_id=$_GET['inbox'];
						$sel_message="select * from messages where message_id='$get_id'";
						
						$run_message=mysqli_query($con,$sel_message);
						$row_message=mysqli_fetch_array($run_message);
						
						$msgs_subject=$row_message['msg_subject'];
						$msgs_topic=$row_message['msg_topic'];
						$msg_reply=$row_message['reply'];
						
						$update_unread="update messages set status='read' where message_id='$get_id'";
						$run_thread=mysqli_query($con,$update_unread);
					
					echo "<br/><hr/>
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
		
		<form id='form1' action='' method='post'>
			<textarea cols='53' rows='3' name='reply'></textarea><br/>
			<input id='rep' type='submit' name='msg_reply' value='Reply to this'/>
		</form>";
						}
					
					if(isset($_POST['msg_reply'])){
						$user_reply=$_POST['reply'];
						if($msg_reply!='no_reply'){
							echo"<h2 align='center'>this message is already replied!</h2>";
							exit();
						}
						else{
							$update_unread="update messages set reply='$user_reply' where message_id='$get_id' and reply='no_reply'";
						$run_update=mysqli_query($con,$update_unread);
							echo"<h2 align='center'>Message was replied</h2>";
						}
					}
}
					?>
				</div>
		<!--content area ends-->
	</div>
	<!--container ends-->
	
</body>
	
</html>