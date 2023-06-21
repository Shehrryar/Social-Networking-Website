
<div id="content">
					<!--content area start here-->
					<div id="div1">
						<img src="images/soc_image.jpg"/>	
					</div >
					<div id="div2" style="color: beige">
						<form action="index.php" method="post" id="form_2">
							<h2>Sign up form!</h2>
							<table>
								<tr>
									<td><strong>Name:</strong></td>
									<td><input type="text" name="u_name" required="required" placeholder="enter your name"/></td>
								</tr>
								<tr>
									<td><strong>Password:</strong></td>
									<td><input type="password" name="u_pass" required="required" placeholder="enter your password"/></td>
								</tr>
								<tr>
									<td><strong>Email:</strong></td>
									<td><input type="email" name="u_email" required="required" placeholder="enter your email"/></td>
								</tr>
								<tr>
									<td><strong>Country:</strong></td>
									<td><input type="text" name="u_country" required="required" placeholder="enter your country name"/></td>
								</tr>
							 	<tr>
									<td><strong>Gender:</strong></td>
									<td><select name="u_gender">
										<option>Male</option>
										<option>Female</option></select></td>
								</tr>
								<tr>
									<td>
										<button name="sign_up">Sign up</button>
									</td>
								</tr>
							</table>
						</form>
						
					</div>
						<?php include("insert_user.php");?>
				</div>
				<!--content area ends here-->