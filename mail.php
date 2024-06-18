<?php 
	$page='contact Us';
	include("include/connection.php"); ?>
<?php
session_start();
if(!isset($_SESSION['first_name'])){
	
	header("location: sign_in.php");
}
else{

?>
<?php require_once('include/blog_header.php'); ?>
<section class="content-section">
		<div class="container">
			
		
			<div class="page-area">
				<div class="row">










					<div class="col-xs-12 col-sm-6">
						<div class="page-left">
						
							<div class="contact-us">

								<!-- <div class="conntact-us-map">
									<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d58406.299810694436!2d90.32570353083504!3d23.804593963269433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1seastern+university!5e0!3m2!1sen!2sbd!4v1536406751315" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div> -->
								<form action="mail.php" method="POST" enctype="multipart/form-data">
									<h3>Share Your Problems To Admin</h3>
								
									
									<span class="contact-us-input">
										<input type="email" name="email" placeholder="Enter Your mail Address" />
									</span>
									
									
									<span class="contact-us-input">
										<input type="text" name="subject" placeholder="ex.type your prblm" />
									</span>
									
									<span class="contact-us-input">
										<textarea type="text" name="message" placeholder="Describe Your Problem"></textarea>
									</span>
									
									<span class="contact-button">
										<input type="submit" name="Send_email" value="Send Email" />
									</span>
								</form>
							</div>
<?php
	if(isset($_POST['Send_email'])){
		//////////////////////////////////
		////Default Date and Time Zone////
		/////////////////////////////////
		date_default_timezone_set("Asia/Dhaka");
		$date=date("Y-m-d");
		$time=date("h:i:sa");
		
		////////////////////////
		////Sender Mail Zone////
		////////////////////////
		$sender_email=$_POST['email'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];
		$to="abc@gmail.com";
		
			
		if($sender_email=='' or $subject=='' or $message==''){
		
			echo"<script>alert('Please Fill The Blank Feild..!!')</script>";
			exit();
		}
		else{
			$query="INSERT INTO mail(sender,subject,message,send_to,mail_type,date,time)
					VALUES('$sender_email','$subject','$message','$to','user email','$date','$time')";
			mysqli_query($connection,$query);
		
			echo"</br>";
			mail($to,$subject,$message,$sender_email);	
		}	
		
		////////////////////////
		////Admin reply Zone////
		////////////////////////
		
		$to_sender = "abc@gmail.com";
		$subject1 = "we got it";
		$message2 = "Thanks We will get to You soon";
		$from=$_POST['email'];
		
		if($to_sender=='' or $subject1=='' or $message2==''){
	
		echo"<script>alert('Please Fill The Blank Feild..!!')</script>";
		exit();
		}
		else{	
			$query="INSERT INTO mail(sender,subject,message,send_to,mail_type,date,time)
					VALUES('$to_sender','$subject1','$message2','$from','auto reply','$date','$time')";
			mysqli_query($connection,$query);
		
			echo"</br>";
			mail($to_sender,$subject1,$message2,$from);	
			
			// i think Eta hbe but sure na 
			//mail($from,$subject1,$message2,$to_sender);
		
		echo "<script>alert('Email Sent..!!')</script>";
		echo "<script>window.open('mail.php','self')</script>";
	}}

?>					</div><!-- page-left end-->
				</div>
				

				<div class="col-xs-12 col-sm-6">
					<div class="contact-right">
						<div class="hotline">
							<h4>Our Hotline...</h4>
							<p><i class="material-icons">phone_android</i>01733430738</p>
						</div>
						<div class="contact-location">
							<address class="">
								<p class="address-heading">Our Location address.</p>
								<p class="address-text">
									House no: #26 <br>
									Road No: Mirpur-1 <br>
									Dhaka: 1206.
								</p>
							</address>
						</div>
					</div>
				</div>


					</div> <!-- row end-->
				</div> <!-- page-area end-->
			</div> <!-- page-area end-->
			
			
			
		</div> <!-- container end-->
	</section> <!-- content-section end-->
	
	<div class="user-contact profile-menu">
		<ul>
			<li><a href=""><i class="fa fa-envelope"></i>Message <span>(10)</span></a> </li>
			<li><a href=""><i class="fa fa-bell"></i>Notification <span>(10)</span></a> </li>
		<ul>
	</div>
	
<?php require_once('include/blog_footer.php'); ?>
<?php }?>