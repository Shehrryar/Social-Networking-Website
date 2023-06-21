<?php
$con=mysqli_connect("localhost","root","","Social_media") or die ("connection was not established");

function getTopics(){
	global $con;
	$get_topics="select * from topics";
	$run_topics=mysqli_query($con,$get_topics);
	while($row=mysqli_fetch_array($run_topics)){
		$topic_id=$row['topic_id'];
		$topic_name=$row['topic_name'];
		echo"<option value='$topic_id'>$topic_name</option>";
		
	}
}
function insertpost(){
	if(isset($_POST['sub'])){
		global $con;
		global $user_id;
		$title=addslashes($_POST['title']);
		$content=addslashes($_POST['content']);
		$topics=$_POST['topic'];
		if($content=='' and $title==''){
			echo"<h2>please enter something ........</h2>";
		}
		else
		{
			$sql = "INSERT INTO pposts (user_id, topic_id, post_title,post_content,post_date)
    VALUES ('$user_id', '$topics', '$title','$content',NOW())";
			$run=mysqli_query($con,$sql);
			if($run){
				echo"<h3>post to timeline,look good!</h3>";
				$update="update users set posts='yes' where user_id='$user_id'";
				$run_update=mysqli_query($con,$update);
			}
			}
		}
	}

/* that function is call from home.php */

function get_post(){
	global $con;
	$per_page=5;
	if(isset($_GET['page']))
	{
		$page=$_GET['page'];
	}
	else
	{
		$page=1;
	}
	$start_from=($page-1)*$per_page;
	$get_posts="select * from pposts order by 1 desc limit $start_from,$per_page";
	$run_posts=mysqli_query($con,$get_posts);
	while($row_pposts=mysqli_fetch_array($run_posts)){
		$post_id=$row_pposts['post_id'];
		$user_id=$row_pposts['user_id'];
		$post_title=$row_pposts['post_title'];
		$content=$row_pposts['post_content'];
		$post_date=$row_pposts['post_date'];
		
		/*post get according to with their related name and images according to user_id*/
		
		$get_users="select user_name,user_image from users where user_id='$user_id' and posts='yes'";
		
		$run_users=mysqli_query($con,$get_users);
		$row_users=mysqli_fetch_array($run_users);
		$user_name=$row_users['user_name'];
		$user_image=$row_users['user_image'];
		
		
		echo"
		<div id='posts' style='background:PapayaWhip;'>
			<p><img src='users/$user_image' width='50' height='50'></p>
			<h3 id='name'><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
			<h3>$post_title</h3>
			<p>$post_date</p>
			<p id='p2'>$content</p>
			<a href='single_post.php?post_id=$post_id' style='float:right;'>
			<button>see replies or reply</button></a>
		</div><br/>";
	
		
}
	include("pagination.php");
}
/* that fuction can show only single pos*/
function single_post(){
	/* this post_id can be get from function get_post
	*/
	if(isset($_GET['post_id'])){
		
	global $con;
	$get_id=$_GET['post_id'];
	$get_posts="select * from pposts where post_id='$get_id'";
	$run_posts=mysqli_query($con,$get_posts);
	$row_pposts=mysqli_fetch_array($run_posts);
		$post_id=$row_pposts['post_id'];
		$user_id=$row_pposts['user_id'];
		$post_title=$row_pposts['post_title'];
		$content=$row_pposts['post_content'];
		$post_date=$row_pposts['post_date'];
		
		
		$user_info="select * from users where user_id='$user_id' AND posts='yes'";
		$run_user=mysqli_query($con,$user_info);
		$row_user=mysqli_fetch_array($run_user);
		$user_name=$row_user['user_name'];
		$user_image=$row_user['user_image'];
		
		$user_com=$_SESSION['user_email'];
		$get_com="select * from users where user_email='$user_com'";
		$run_com=mysqli_query($con,$get_com);
		$row_com=mysqli_fetch_array($run_com);
		$user_com_id=$row_com['user_id'];
		$user_com_name=$row_com['user_name'];
		
		
		echo"
		<div id='posts' style='background-color: antiquewhite;'>
			<p><img src='users/$user_image' width='50' height='50'></p>
			<h3 id='name'><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
			<h3>$post_title</h3>
			<p>$post_date</p>
			<p id='p1'>$content</p>
			</div>
			";
		
		echo"
			<form action='' method='post' id='reply'>
			<textarea cols='105' rows='3' name='comment' placeholder='write your reply'></textarea>
			<input id='input1' type='submit' name='reply' value='reply to this'/>
		</form>";
		
		if(isset($_POST['reply'])){
			$comments=$_POST['comment'];
			$insert="insert into comments (post_id,user_id,comments,comment_auther,date) values ('$post_id','$user_id','$comments','$user_com_name',NOW())";
			$run=mysqli_query($con,$insert);
			echo"<center><h2>your reply was added!</h2></center>";
		}
		include("comment.php");
	}
}
function members()
{
	
	global $con;
	$user="select * from users LIMIT 0,10";
	$run_users=mysqli_query($con,$user);
	while($row_users=mysqli_fetch_array($run_users)){
		$user_name=$row_users['user_name'];
		$user_id=$row_users['user_id'];
		$user_image=$row_users['user_image'];
		
		echo"<div id='div1'>
			<a href='user_profile.php?u_id=$user_id'>
			<img src='users/$user_image' width='50' height='50' title='$user_name'/><h3 style='float:right;'>$user_name</h3></a>
			
			</div>";
		
}
}
/* that function is only show a current user posts*/
function user_post(){
	global $con;
	/* this user session u_id*/
	if(isset($_GET['u_id'])){
		$u_id=$_GET['u_id'];
		
		/* fetch only  current user posts*/
		
	$get_post="select * from pposts where user_id='$u_id' order by 1 desc limit 5";
	$run_post=mysqli_query($con,$get_post);
	while($row_posts=mysqli_fetch_array($run_post)){
		$user_id=$row_posts['user_id'];
		$post_id=$row_posts['post_id'];
		$post_title=$row_posts['post_title'];
		$content=$row_posts['post_content'];
		$post_date=$row_posts['post_date'];
		
		/* we can get a user name and image by using forign key of user id in post table*/
		
		$user="select * from users where user_id='$user_id' and posts='yes'";
	$run_users=mysqli_query($con,$user);
	$row_users=mysqli_fetch_array($run_users);
		$user_name=$row_users['user_name'];
		$user_id=$row_users['user_id'];
		$user_image=$row_users['user_image'];
		
		echo"
		<div id='posts' style='background-color: #FFEFD5; border-radius:10px; margin:12px;'>
			<p><img src='users/$user_image' width='50' height='50'></p>
			<h3 id='name'><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
			<h3>$post_title</h3>
			<p>$post_date</p>
			<p>$content</p>
			<a class='a_tag_user' href='single_post.php?post_id=$post_id' style='float:right;'>
		<button style='height:30px; border-radius:50px; '>View</button></a>
		<a class='a_tag_user'  href='edit_post.php?post_id=$post_id' style='float:right;'><button style='height:30px; border-radius:50px;'>Edit</button></a>
		<a class='a_tag_user' href='function/delete_post.php?post_id=$post_id' style='float:right;'><button style='height:30px; border-radius:50px;'>Delete</button></a>
			</div><br/>
			";
		}
		/* this file delete user posts that kept in function folder*/
		include("delete_post.php");
	}
}
function user_profile(){
	/* this id can be get from member.php,my_post.php,home.php by using function member,get_post,user_post*/
	if(isset($_GET['u_id'])){
		global $con;
	 $user_id=$_GET['u_id'];
	$select="select * from users where user_id='$user_id'";
					$run=mysqli_query($con,$select);
					$row=mysqli_fetch_array($run);
					$id=$row['user_id'];
					$image=$row['user_image'];
					$name=$row['user_name'];
					$user_country=$row['user_country'];
					$user_gender=$row['user_gender'];
					$register_date=$row['user_reg_date'];
					$ver_code=$row['ver_code'];
		
		echo"<div id='user_profile' >
					<table>
						<tr>
						<td>
						<img src='users/$image' width='150' height='150'/>
						</td>
						</tr>
						<tr>
						<td><strong>ID:</strong></td>
						<td>$id</td>
						</tr>
						<tr>
						<td><strong>Name:</strong></td>
						<td>$name</td>
						</tr>
						<tr>
						<td><strong>Country:</strong></td>
						<td>$user_country</td>
						</tr>
						<tr>
						<td><strong>Verification code:</strong></td>
						<td>$ver_code</td>
						</tr>
						<tr>
						<td><strong>Member Since:</strong></td>
						<td>$register_date</td>
						</tr>
						<tr>
						<td>
						</td>
						<td>
						<a href='message.php?inbox&u_id=$id'><button>Send Message</button></a>
						</td>
						</tr>
						</table>
						</div>
					";
}
}

function show_topics(){
	global $con;
	if(isset($_GET['topic'])){
		$id=$_GET['topic'];
	$get_post="select * from pposts where topic_id='$id'";
	$run_post=mysqli_query($con,$get_post);
	while($row_posts=mysqli_fetch_array($run_post)){
		$user_id=$row_posts['user_id'];
		$post_id=$row_posts['post_id'];
		$post_title=$row_posts['post_title'];
		$content=$row_posts['post_content'];
		$post_date=$row_posts['post_date'];
		
		$user="select * from users where user_id='$user_id' and posts='yes'";
	$run_users=mysqli_query($con,$user);
	$row_users=mysqli_fetch_array($run_users);
		$user_name=$row_users['user_name'];
		$user_id=$row_users['user_id'];
		$user_image=$row_users['user_image'];
		
		echo"
		<div id='posts' style='background-color: #FFEFD5;'>
			<p><img src='users/$user_image' width='50' height='50'></p>
			<h3 id='name'><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
			<h3>$post_title</h3>
			<p>$post_date</p>
			<p id='p2'>$content</p>
			<a href='single_post.php?post_id=$post_id' style='float:right;'>
		<button>View</button></a>
			</div><br/>
			";
		}
	}
}
function results(){
	global $con;
	if(isset($_GET['search'])){
		$search_query=$_GET['user_query'];
	$get_post="select * from pposts where post_title like '%$search_query%'";
	$run_post=mysqli_query($con,$get_post);
	while($row_posts=mysqli_fetch_array($run_post)){
		$user_id=$row_posts['user_id'];
		$post_id=$row_posts['post_id'];
		$post_title=$row_posts['post_title'];
		$content=$row_posts['post_content'];
		$post_date=$row_posts['post_date'];
		
		$user="select * from users where user_id='$user_id' and posts='yes'";
	$run_users=mysqli_query($con,$user);
	$row_users=mysqli_fetch_array($run_users);
		$user_name=$row_users['user_name'];
		$user_id=$row_users['user_id'];
		$user_image=$row_users['user_image'];
		
		echo"
		<div id='posts' style='background-color: #FFEFD5;'>
			<p><img src='users/$user_image' width='50' height='50'></p>
			<h3 id='name'><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
			<h3>$post_title</h3>
			<p>$post_date</p>
			<p>$content</p>
			<a href='single_post.php?post_id=$post_id'>
		<button>View</button></a>
			</div><br/>
			";
		}
		include("delete_post.php");
	}
}
?>
<html>
	<body>

	</body>
</html>
