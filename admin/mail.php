<?php 
	$link='Send Mail';
	include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php require_once('include/header.php'); ?>
	<section class="content-section">


		<div class="container">	
			<div class="page-area">
				<div class="row">
						<div class="page-left admin-mail">
							<form action="mail.php" method="POST" enctype="multipart/form-data">
								<h3>Send Emails To User As Admin</h3>
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="admin-mail-input">
											<input type="email" name="email" placeholder="Enter Your mail Address" />
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="admin-mail-input">
											<input type="text" name="subject" placeholder="ex.type your prblm" />
										</div>
									</div>
									<div class="col-12 col-md-12">
										<div class="admin-mail-input">
											<textarea type="text" name="message" placeholder="Describe Your Problem"></textarea>
										</div>
									</div>
									<div class="col-12 col-md-12">
										<div class="admin-mail-input mail-submit-button">
											<input type="submit" name="Send_email" value="Send Email" />
										</div>
									</div>
								</div>
							</form>
<?php
	if(isset($_POST['Send_email'])){
		
		$sender_email="abc@gmail.com";
		$subject=$_POST['subject'];
		$message1=$_POST['message'];
		$to=$_POST['email'];
		
			$message="Email From:<br>".$message1;
			
		if($sender_email=='' or $subject=='' or $message==''){
		
			echo"<script>alert('Please Fill The Blank Feild..!!')</script>";
			exit();
		}
		else	
			mail($to,$subject,$message,$sender_email);

			// i think Eta hbe but sure na 
			//mail($from,$subject1,$message2,$to_sender);
		
		echo "<script>alert('Email Sent..!!')</script>";
	}

?>						

					</div><!-- page-left end-->


						<div class="page-right">
							<div class="content admin-mail-table">
								<h3>Check your Contact Information</h3>
									<table>
										<tr>
											<th>Mail No.</th>
											<th>sender</th>
											<th>subject</th>
											<th>message</th>
											<th>send to</th>
											<th>mail type</th>
											<th>date</th>
											<th>time</th>
										</tr>
<?php
						//WHERE mail_type='user email'
						$query="SELECT * from mail ORDER BY 1 DESC";
						$run= mysqli_query($connection,$query);
						while($row=mysqli_fetch_array($run)){
							
							$mail_No=$row['mail_no'];
							$sender=$row['sender'];
							$subject=$row['subject'];
							$message=$row['message'];
							$send_to=$row['send_to'];
							$mail_type=$row['mail_type'];
							$date=$row['date'];
							$time=$row['time'];
?>	
										<tr>
											<td><?php echo $mail_No;?></td>
											<td><?php echo $sender;?></td>
											<td><?php echo $subject;?></td>
											<td><?php echo $message;?></td>
											<td><?php echo $send_to;?></td>
											<td><?php echo $mail_type;?></td>
											<td><?php echo $date;?></td>
											<td><?php echo $time;?></td>
										</tr>
					<?php   }?>	
										
									</table>
							</div><!-- Content end-->
						</div> <!-- page-right end-->
				</div> <!-- row end-->
			</div> <!-- page-area end-->
		</div> <!-- container end-->
	</section> <!-- content-section end-->
	
<?php require_once('include/footer.php'); ?>
<?php }?>