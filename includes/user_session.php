<body>
	<!--container starts-->
	<div class="container">
		<!--header wrapper starts-->
		<div id="head_wrap">
			<!--header starts-->
			<div id="header">
				<ul id="menu">
					<li><a href="home.php">Home</a></li>
					<li><a href="members.php">Members</a></li>
					<strong>Topic</strong>
					<?php
					$get_topics="SELECT * FROM topics";
					$result = mysqli_query($con,$get_topics);
					if (!$result) {
						die('Query failed');
					}	else{			
					while($rows=mysqli_fetch_array($result)){
						$topic_id=$rows['topic_id'];
						$topic_name=$rows['topic_name'];
						echo"<li><a href='topic.php? topic=$topic_id'>$topic_name</a></li>";
					}
						}	
					?>
				</ul>
				<form method="get" action="results.php" id="form1">
					<input type="text" name="user_query" placeholder="Search topic"/>
					<input id="search" type="submit" name="search" value="Search"/>
				</form>
			</div>
			<!--header ends-->
		</div>
		<!--header wrapper ends-->
		
		<!--content area starts-->
		<div class="content">
			<!--user timeline start-->
			<div id="user_timeline">
				<div id="user_detail">
					<!--we can get all information of user-->
					<?php
					$user_e=$_SESSION['user_email'];
					$get_user="select * from users where user_email='$user_e'";
					$run_user=mysqli_query($con,$get_user);
					$rows=mysqli_fetch_array($run_user);
					$user_pass=$rows['user_pass'];
					$user_gender=$rows['user_gender'];
					$user_id=$rows['user_id'];
					$user_name=$rows['user_name'];
					$user_country=$rows['user_country'];
					$user_image=$rows['user_image'];
					$register_date=$rows['user_reg_date'];
					$ver_code=$rows['ver_code'];
					
					/*we can get post information according to session user_id*/
					$user_posts="select * from pposts where user_id='$user_id'";
					$run_posts=mysqli_query($con,$user_posts);
					$posts=mysqli_num_rows($run_posts);
					
					/*query for counting current user messages*/
					$sel_msg="select * from messages where receiver='$user_id' AND status='unread' ORDER by 1 DESC";
					$run_msg=mysqli_query($con,$sel_msg);
					$count_msg=mysqli_num_rows($run_msg);
					
					echo"
						<center>
						<img src='users/$user_image' width='200' height='200'/>
						</center>
						<div id='user_mention'>
						<p><strong>ID:</strong>$user_id</p>
						<p><strong>Name:</strong>$user_name</p>
						<p><strong>Country:</strong>$user_country</p>
						<p><strong>Verification Code:</strong>$ver_code</p>
						<p><strong>Member Since:</strong>$register_date</p>
						
						<!--when we click on message link that will goes to current user messages by my_message.php-->
						
						<p><a href='my_message.php?inbox&u_id=$user_id'>Message($count_msg)
						</a></p>
						
						<!--when we click on (My Posts) link that will goes to current user_post by using my_post.php-->
						
						<p><a href='my_post.php?inbox&u_id=$user_id'>My Posts($posts)</a></p>
						
						<!--when we click on (Edit My Account) link that will goes to current user_profile for editing by using edit_profile.php-->
						
						<p><a href='edit_profile.php?inbox&u_id=$user_id'>Edit My Account</a></p>
						
						<!--when we click on (logout) link so we are logout from account-->
						
						<p><a href='logout.php?'>logout</a></p>
						</div>
					"
				?>
				</div>
			</div>
			<!--user timeline ends-->
			
		</div>