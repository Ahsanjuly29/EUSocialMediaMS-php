<?php include("conn/connection.php") ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dynamic Website with admin panel</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
<body>
	<div>	<?php 	include('include/header.php');?></div>

	<div class="post_body">
		<form action="contact.php" method="post">
		<center>
			<table width="400" align="center" border="0">
				<tr>
					<td><h2>Contact Us</h2></td>
				</tr>
				<tr>
					<td>Your Email:</td>
					<td><input type="email" name="email"></td>
				</tr>
				<tr>
					<td>Subject:</td>
					<td><input type="text" name="subject"></td>
				</tr>
				<tr>
					<td>Your message:</td>
					<td>
						<textarea cols="20" rows="10" name="message"> </textarea>
					</td>
				</tr>
				<tr>
					<td align="center"colspan="5">
						<input type="submit" name="send_email" value="send Email">
					</td>
				</tr>
				</center>
			</table>
		</form>
	</div>
	<?php
		
		if(isset($_POST['send_email'])){
			
		/* The sender Emailing to Admin */
			
			$sender_email = $_POST['email'];
			$subject = $_POST['subject'];
			$message1 = $_POST['message'];
			$message2 = "Email from:</br>".$message1;
			
			$to = "aa91898@gmail.com";
			
			if($sender_email=='' or $subject=='' or $message2==''){
				echo"<script>alert('any feild is Blank')</script>"; 
				exit();
			}
			
			mail($to,$subject,$message2,$sender_email);
		
		/* Admin Panel is Auto Replying */
			
			$to_sender = $_POST['email'];
			$sub = "Greetings</br>";
			$reply_message = "Thank You For Sending Email.We'll reply you Soon.</br>";
			$from = "aa91898@gmail.com";
			
			/* //bujhini_ei line ta
			$headers = "from:aa91898@gmail.com"."\r\n".
				"reply-To:aa91898@gmail.com";
			*/
			mail($to_sender,$sub,$reply_message,$from);
			
			echo "<center><h2>
					Email Sent,Get to You Soooon!! ok !
			</h2></center>";
		}
	?>
	
	<div>	<?php 	include('include/footer.php');?> </div>
</div>

</body>
</html>